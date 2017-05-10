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
				<h1>Gem <small>Sizes</small></h1>
				<h3> Add Type</h3>
				<div class="form-group">
					<form role="form">
						<input type="text" class="form-control" placeholder="Add Type" name="type" id="type">
					</form>
					<button type="button" class="btn btn btn-primary" id="type_button">Add</button>
				</div>
				<h3> Active Types </h3>
				<hr>
				<ul class="list-unstyled col-md-offset-1"  id="types">
					@foreach(\App\GemType::where('shop_id',Auth::user()->shop->id)->where('active',TRUE)->where('deleted',FALSE)->get() as $type)
					<li class='type-size row' typeID = '{{$type->id}}' >
					<span class="col-md-9"> {{$type->type}} </span>
					<span class="col-md-1" style="border-width: 1px">
					{{count(\App\GemStone::where('gem_type_id', $type->id)->get())}}
					</span>
					<span>
					<a href='#' class='close' style="color: black;" aria-hidden='true'>&times;</a>
					</span>
					</li>
					@endforeach
				</ul>
			</div>


		</div>

		<div class = "col-md-6">
			<div class="col-md-8 col-md-offset-2">
				<h1>Gem <small>Sizes</small></h1>
				<h3> Add Size</h3>
				<div class="form-group">
					<form role="form">
						<input type="text" class="form-control" placeholder="Add Size" name="size" id="size">
					</form>
					<button type="button" class="btn btn btn-primary" id="size_button">Add</button>
				</div>
				<h3> Active Sizes</h3>
				<hr>
				<ul class="list-unstyled" id="sizes" >
					@foreach(\App\GemSize::where('shop_id',Auth::user()->shop->id)->where('active',TRUE)->where('deleted',FALSE)->get() as $size)		
					<li class='type-size row col-md-offset-1' typeID = '{{$size->id}}'>
					<span class="col-md-9 "> {{$size->size}}</span>
					<span class="col-md-1" style="border-width: 1px">
					{{count(\App\GemStone::where('gem_size_id', $size->id)->get())}}
					</span>
					<span>
					<a href='#' class='close' style="color: black;" aria-hidden='true'>&times;</a>
					</span>
					</li>
					@endforeach
				</ul>
			</div>
		</div>

	</div>
</div>




@endsection