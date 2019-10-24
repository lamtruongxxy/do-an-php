@if (Session::has('msg'))
  <script type="text/javascript">
    $.toast({
      text: '{{ Session::get('msg') }}',
      heading: "Thông báo", 
      icon: 'success',
      showHideTransition: 'fade',
      allowToastClose: true,
      hideAfter: 2000,
      stack: 2,
      position: 'top-right',
      textAlign: 'left',
      loader: true, 
      loaderBg: '#9EC600'
    });
  </script>
@endif