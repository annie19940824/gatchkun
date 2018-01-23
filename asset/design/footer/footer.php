
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
  $('.bs-component [data-toggle="popover"]').popover();
  $('.bs-component [data-toggle="tooltip"]').tooltip();

  $('#anti-yu-gothic-button').on('click', function() {
    if ( $('body').hasClass('no-thank-yu') ) {
      $('body').removeClass('no-thank-yu');
      $(this).text('游ゴシックを無効にする').removeClass('btn-primary').addClass('btn-danger');
      $("#anti-yu-gothic-message").html('現在デモページは游ゴシックの指定が<span class="text-primary">有効</span>になっています。');
    }
    else {
      $('body').addClass('no-thank-yu');
      $(this).text('游ゴシックを有効にする').removeClass('btn-danger').addClass('btn-primary');
      $("#anti-yu-gothic-message").html('現在デモページは游ゴシックの指定が<span class="text-danger">無効</span>になっています。');
    }
  });
</script>

<footer>
	フッターだよー
</footer>