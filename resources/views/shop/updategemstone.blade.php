@extends('layouts.app')

@section('styles')

<script type="text/javascript">
	$(document).ready(function(){
		$('#reupload').hide();
		$("#check").click(function(evt){
			evt.stopImmediatePropagation();
			console.log('inside');
			$('#reupload').toggle(); 
		});
	});
</script>

@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Update Details</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-3 col-lg-3 " align="center"> 
							<img alt="Gem Stone Pic" src="{{route('get_image',['id' => $gemStone->id])}} " class="img-circle img-responsive">
						</div>


						<div class=" col-md-9 col-lg-9 "> 
							@if (count($errors) > 0)
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
							@endif
							<form class="form-horizontal" role="form" method="POST" action="{{ route('update_gem_stone',['id' => $gemStone->id]) }}" enctype="multipart/form-data">
								{{ csrf_field() }}

								<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
									<label for="description" class="col-md-4 control-label">Description</label>

									<div class="col-md-6">
										<input id="description" type="text" class="form-control" name="description" value="{{ $gemStone->description}}" required autofocus>

										@if ($errors->has('description'))
										<span class="help-block">
											<strong>{{ $errors->first('description') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
									<label for="type" class="col-md-4 control-label">Type</label>

									<div class="col-md-6" style="display: flex;">
										<select id="type" class="form-control" name="type"  required>
											@foreach(\App\GemType::where('shop_id',Auth::user()->shop->id)->where('active',TRUE)->where('deleted',FALSE)->get() as $otherType)
											@if($otherType == $type)
											<option value="{{$otherType->id}}" selected>{{$otherType->type}}</option>
											@else
											<option value="{{$otherType->id}}">{{$otherType->type}}</option>
											@endif
											@endforeach
										</select>
										&nbsp;
										<a href="{{ route('add_details') }}">
											<span style="font-size:1.0em; " class="glyphicon glyphicon-plus-sign"></span>
										</a>

										@if ($errors->has('type'))
										<span class="help-block">
											<strong>{{ $errors->first('type') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}">
									<label for="size" class="col-md-4 control-label">Size</label>

									<div class="col-md-6" style="display: flex;">
										<select id="size" class="form-control" name="size"  required>
											@foreach(\App\GemSize::where('shop_id',Auth::user()->shop->id)->where('active',TRUE)->where('deleted',FALSE)->get() as $otherSize)
											@if($otherSize == $size)
											<option value="{{$otherSize->id}}" selected>{{$otherSize->size}}</option>
											@else
											<option value="{{$otherSize->id}}">{{$otherSize->size}}</option>
											@endif
											@endforeach
										</select>
										&nbsp;
										<a href="{{ route('add_details') }}">
											<span style="font-size:1.0em; " class="glyphicon glyphicon-plus-sign"></span>
										</a>

										@if ($errors->has('size'))
										<span class="help-block">
											<strong>{{ $errors->first('size') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
									<label for="price" class="col-md-4 control-label">Price</label>

									<div class="col-md-6">
										<input id="price" type="number" class="form-control" name="price" value="{{ $gemStone->price }}" required autofocus>

										@if ($errors->has('price'))
										<span class="help-block">
											<strong>{{ $errors->first('price') }}</strong>
										</span>
										@endif
									</div>
								</div>

								<div class="checkbox" >
									<label><input type="checkbox" id="check" name="reupload"> Change Image</label>
								</div>

								<div id="reupload" class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
									<label for="image" class="col-md-4 control-label">Image</label>

									<div class="btn">
										<input type="file" id="image" name="image" class="validate">

										@if ($errors->has('image'))
										<span class="help-block">
											<strong>{{ $errors->first('image') }}</strong>
										</span>
										@endif
									</div>

								</div>


								<div class="panel-footer">
									<div class="form-group" >
										<div class="col-md-4 col-md-offset-8" style="float: right;">
											<button type="submit" class="btn btn-primary">
												Update
											</button>
										</div>
									</div>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
