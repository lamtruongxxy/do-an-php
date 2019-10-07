@if (Session::has('msg'))
	<div class="alert alert-success alert-nofi-success" role="alert">
     <i class="mdi mdi-check-all mr-2"></i> <strong>{{ Session::get('msg') }}</strong>!
	</div>
@endif 