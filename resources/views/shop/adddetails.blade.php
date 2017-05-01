@extends('layouts.app')

@section('styles')

<style type="text/css">
	form {
		display: inline-block;
	}
	.form-group {
		text-align: center;
		padding-bottom: 25px;
	}
	#todo {
		margin: 0 auto;
		width: 500px;
	}

	a.close {
		float: right;
	}
	#types li {
		border-top: 1px solid #ddd;
		padding: 10px;
	}
	#types li:nth-of-type(odd) {
		background-color: #eee;
	}
	#sizes li {
		border-top: 1px solid #ddd;
		padding: 10px;
	}
	#sizes li:nth-of-type(odd) {
		background-color: #eee;
	}
	.type-size{
		font-size: 20px;
		border-radius: 10px;
	}

</style>

<script type="text/javascript" src="/js/shop.js"></script>

@endsection

@section('content')

<div class="container">
	<div class="row">

		<div class = "col-md-6">
			<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<h1>Gem <small>Types</small></h1>
					<form role="form">
						<input type="text" class="form-control" placeholder="Add Type" name="type" id="type">
					</form>
					<button type="button" class="btn btn btn-primary" id="type_button">Add</button>
				</div>
				<ul class="list-unstyled"  id="types">
					@foreach(\App\GemType::where('shop_id',Auth::user()->id)->where('active',TRUE)->where('deleted',FALSE)->get() as $type)
					<li class='type-size' typeID = '{{$type->id}}' > {{$type->type}} <a href='#' class='close' aria-hidden='true'>&times;</a></li>
					@endforeach
				</ul>
			</div>


		</div>

		<div class = "col-md-6">
			<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<h1>Gem <small>Sizes</small></h1>
					<form role="form">
						<input type="text" class="form-control" placeholder="Add Size" name="size" id="size">
					</form>
					<button type="button" class="btn btn btn-primary" id="size_button">Add</button>
				</div>
				<ul class="list-unstyled" id="sizes" >
					@foreach(\App\GemSize::where('shop_id',Auth::user()->id)->where('active',TRUE)->where('deleted',FALSE)->get() as $size)
					<li class='type-size' sizeID = '{{$size->id}}' > {{$size->size}} <a href='#' class='close' aria-hidden='true'>&times;</a></li>
					@endforeach
				</ul>
			</div>
		</div>

	</div>
</div>




@endsection