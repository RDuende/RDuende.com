jQuery(function($){
  function fmt(n){
    n = Number(n);
    if (isNaN(n)) return '—';
    return n.toFixed(2) + ' ' + (RDVITAC.currency_symbol || '€');
  }

  function calc($wrap){
    const $scope = $wrap.find('.rdcalc').first();
    const data = {
      action: 'rdvitac_calc',
      nonce: RDVITAC.nonce,
      width: $scope.find('[name="width"]').val(),
      depth: $scope.find('[name="depth"]').val(),
      height: $scope.find('[name="height"]').val(),
      qty: $scope.find('[name="qty"]').val(),
      base: $scope.find('[name="base"]').is(':checked') ? '1':'0',
      engrave: $scope.find('[name="engrave"]').is(':checked') ? '1':'0',
      led: $scope.find('[name="led"]').is(':checked') ? '1':'0',
    };

    const $status = $scope.find('.rdcalc__status');
    $status.text('Calculando…');

    $.post(RDVITAC.ajax_url, data)
      .done(function(res){
        if(!res || !res.success){ throw res; }
        const r = res.data;
        $scope.find('[data-rdvitac-unit]').text(fmt(r.unit));
        $scope.find('[data-rdvitac-total]').text(fmt(r.total));
        $scope.find('[data-rdvitac-area]').text((r.area_cm2 || '—'));
        $scope.find('[data-rdvitac-note]').text(r.note || '');
        $scope.find('.rdcalc__result').prop('hidden', false);
        $status.text('');
      })
      .fail(function(xhr){
        let msg = 'No se pudo calcular. Revisa las medidas.';
        try{
          const j = xhr.responseJSON;
          if (j && j.data && j.data.errors) msg = j.data.errors.join(' ');
        }catch(e){}
        $status.text(msg);
        $scope.find('.rdcalc__result').prop('hidden', true);
      });
  }

  $(document).on('click', '[data-rdvitac-calc]', function(){
    const $wrap = $(this).closest('.rdvitac-wrap');
    calc($wrap);
  });

  $(document).on('change', '.rdcalc input', function(){
    const $wrap = $(this).closest('.rdvitac-wrap');
    const $res = $wrap.find('.rdcalc__result');
    if ($res.length && !$res.prop('hidden')) calc($wrap);
  });
});
