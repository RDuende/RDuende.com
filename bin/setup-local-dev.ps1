<#
.SYNOPSIS
  Monta un entorno de desarrollo local para RDuende.com sin Docker:
  WordPress + PHP built-in server + SQLite (sin necesidad de MySQL).

.DESCRIPTION
  Descarga WordPress core y el plugin oficial "SQLite Database Integration",
  los configura en una carpeta local .wp-local (no versionada), enlaza el
  tema wp-content/themes/rduende del repositorio mediante un junction de
  NTFS, instala WordPress y ejecuta el script de contenido inicial.

.NOTES
  Requiere PHP en el PATH (con las extensiones curl, mbstring, openssl,
  pdo_sqlite y sqlite3 habilitadas en php.ini).
#>

$ErrorActionPreference = "Stop"

$repoRoot = Split-Path -Parent $PSScriptRoot
$wpLocal = Join-Path $repoRoot ".wp-local"
$phpDir = Split-Path -Parent (Get-Command php).Source
$wpCliPhar = Join-Path $phpDir "wp-cli.phar"

if ((Test-Path $wpLocal) -and (Get-ChildItem -Path $wpLocal -Force -ErrorAction SilentlyContinue)) {
    Write-Host "Ya existe $wpLocal con contenido - borralo primero si quieres empezar de cero." -ForegroundColor Yellow
    exit 1
}

New-Item -ItemType Directory -Path $wpLocal -Force | Out-Null

Write-Host "Descargando WordPress..." -ForegroundColor Cyan
$wpZip = Join-Path $wpLocal "wordpress.zip"
Invoke-WebRequest -Uri "https://wordpress.org/latest.zip" -OutFile $wpZip
Expand-Archive -Path $wpZip -DestinationPath $wpLocal
Get-ChildItem -Path (Join-Path $wpLocal "wordpress") | Move-Item -Destination $wpLocal
Remove-Item (Join-Path $wpLocal "wordpress"), $wpZip -Recurse -Force

Write-Host "Descargando el plugin SQLite Database Integration..." -ForegroundColor Cyan
$sqliteZip = Join-Path $wpLocal "sqlite-plugin.zip"
Invoke-WebRequest -Uri "https://downloads.wordpress.org/plugin/sqlite-database-integration.zip" -OutFile $sqliteZip
Expand-Archive -Path $sqliteZip -DestinationPath (Join-Path $wpLocal "wp-content\plugins")
Remove-Item $sqliteZip -Force
Copy-Item (Join-Path $wpLocal "wp-content\plugins\sqlite-database-integration\db.copy") (Join-Path $wpLocal "wp-content\db.php")

Write-Host "Generando wp-config.php..." -ForegroundColor Cyan
$salts = Invoke-WebRequest -Uri "https://api.wordpress.org/secret-key/1.1/salt/" -UseBasicParsing | Select-Object -ExpandProperty Content
$template = Get-Content -Path (Join-Path $PSScriptRoot "wp-config-template.php") -Raw
$wpConfig = $template.Replace("__SALTS__", $salts)
$utf8NoBom = New-Object System.Text.UTF8Encoding $false
[System.IO.File]::WriteAllText((Join-Path $wpLocal "wp-config.php"), $wpConfig, $utf8NoBom)

Write-Host "Enlazando el tema del repositorio..." -ForegroundColor Cyan
$themeTarget = Join-Path $repoRoot "wp-content\themes\rduende"
$themeLink = Join-Path $wpLocal "wp-content\themes\rduende"
cmd /c mklink /J "$themeLink" "$themeTarget" | Out-Null

Write-Host "Descargando WP-CLI..." -ForegroundColor Cyan
if (-not (Test-Path $wpCliPhar)) {
    Invoke-WebRequest -Uri "https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar" -OutFile $wpCliPhar
}

Write-Host "Iniciando servidor PHP temporal para instalar WordPress..." -ForegroundColor Cyan
$serverProcess = Start-Process -FilePath "php" -ArgumentList @("-S", "localhost:8080", "-t", $wpLocal) -PassThru -WindowStyle Hidden
Start-Sleep -Seconds 2

try {
    & curl.exe -s -o NUL -w "Install HTTP %{http_code}`n" --max-time 30 -X POST "http://localhost:8080/wp-admin/install.php?step=2" `
        --data-urlencode "weblog_title=RDuende" `
        --data-urlencode "user_name=admin" `
        --data-urlencode "admin_password=admin" `
        --data-urlencode "admin_password2=admin" `
        --data-urlencode "pw_weak=1" `
        --data-urlencode "admin_email=admin@example.com" `
        --data-urlencode "Submit=Install WordPress"

    Push-Location $wpLocal
    php $wpCliPhar --path=. theme activate rduende
    php $wpCliPhar --path=. eval-file (Join-Path $repoRoot "bin\seed-content.php")
    Pop-Location
}
finally {
    Stop-Process -Id $serverProcess.Id -Force -ErrorAction SilentlyContinue
}

Write-Host ""
Write-Host "Listo. Usuario admin / contrasena: admin." -ForegroundColor Green
Write-Host "Arranca el servidor con: php -S localhost:8080 -t .wp-local" -ForegroundColor Green
