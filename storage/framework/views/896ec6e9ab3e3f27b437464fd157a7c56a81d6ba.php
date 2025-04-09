<link rel="stylesheet" href="<?php echo e(asset('design/')); ?>/assets/index-admin.css?t=<?= time() ?>">

<div id="root" user_id="<?php echo e(auth()->user()->id); ?>"></div>
<script type="module" crossorigin src="<?php echo e(asset('design/')); ?>/assets/index-admin.js?t=<?= time() ?>"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<script>
  $(document).on('click', '._navBarButton_g4jvl_285', function() {
    if ($(this).html() == 'Close') {
      window.location.href = "<?php echo e(url('/admin-panel/journey-templates')); ?>";
    }


  });
  $(document).on('click', '._createButton_1qtdd_44, ._cardButton_c75t4_111.edit__221',
    function(e) {
      setTimeout(() => {
        parent.$('.dashboard-cont-wrap').addClass('m-0');
        parent.$('.sidebar-wrap.h-100').addClass('d-none');
        parent.$('.dashboard-cont-wrap').css({
          'width': '100vw !important',
          'max-width': '97vw',
        });
        parent.$('.drp-wrap').hide();
        parent.$('header').hide();
      }, 250);
      parent.$('#mainStyle').attr("disabled", "disabled");
      parent.$('#bootstrapStyle').attr("disabled", "disabled");
      parent.$('.cont-sidebar').hide();
      parent.$('.dash-cont-table').css({
        'height': '100vh',
        'width': '100vw',
        'min-width': '100vw'
      });
    });
  $(document).on('keyup', '._searchInput_c75t4_60', function() {
    var txt = $(this).val();
    $('._card_c75t4_80').hide();
    $('._card_c75t4_80:contains("' + txt + '")').show();
  })
</script>
<?php /**PATH D:\xampp\htdocs\projects\harpoon\resources\views/admin-panel/journey-templates-react-app.blade.php ENDPATH**/ ?>