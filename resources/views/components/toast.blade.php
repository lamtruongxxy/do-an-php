@if (Session::has('msg'))
  $.toast({
  text: '{{ Session::get('msg')['text'] }}',
  heading: "Thông báo", 
  icon: '{{ Session::get('msg')['icon'] }}',
  showHideTransition: 'fade',
  allowToastClose: true,
  hideAfter: 2000,
  stack: 2,
  position: 'top-right',
  textAlign: 'left',
  loader: true, 
  loaderBg: '#9EC600'
});
@endif