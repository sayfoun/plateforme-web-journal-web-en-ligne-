@extends('layouts.entete')
@section('sayfoun')
<div class="col-md-6">
	@if ( $errors->any() )
		<ul class="alert alert-danger">
			@foreach ( $errors->all() as $error )
					<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif
</div>
@section
