@if(count($errors) > 0)
  	@foreach ($errors->all() as $error)
  		<div class="alert alert-warning alert-block">
			<button type="button" class="close" data-dismiss="alert">x</button>	
			<strong>{{ $error }}</strong>
		</div>
  	@endforeach
@endif