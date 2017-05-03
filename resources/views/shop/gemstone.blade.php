@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">

		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="row" >
						<h2 class="panel-title col-xs-10"><b>Gem Stone</b></h2>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-3 col-lg-3 " align="center"> 
							<img alt="Gem Stone Pic" src="{{route('get_image',['id' => $gemStone->id])}} " class="img-circle img-responsive">
						</div>


						<div class=" col-md-9 col-lg-9 "> 
							<table class="table table-user-information">
								<tbody>
		              			<tr>
		              				<tr>
		              					<td>Type</td>
		              					<td>{{$type}}</td>
		              				</tr>
		              				<tr>
		              					<td>Size</td>
		              					<td>{{$size}}</td>
		              				</tr>
		              				<tr>
		              					<td>Price</td>
		              					<td>{{$gemStone->price}}</td>
		              				</tr>
		              				<td colspan="2">{{$gemStone->description}}</td>
		              			</tr>

		              		</tbody>
		              	</table>

		              </div>
		          </div>
		      </div>
		      <div class="panel-footer">
		      	<a href="{{route('search_gems')}}" data-original-title="View all gems" data-toggle="tooltip" type="button" class="btn btn-sm "><i style="font-size:1.5em;" class="glyphicon glyphicon-th-list"></i></a>
		      	@if(Auth::user()->id == $gemStone->shop->user->id)
			      	<span class="pull-right">
			      		<a href="{{route('view_update_gem_stone',['id' => $gemStone->id])}}" data-original-title="Edit this user" data-toggle="tooltip" type="button" 
			      		class="btn btn-sm"><i style="font-size:1.5em;" class="glyphicon glyphicon-pencil"></i></a>
			      		@if($gemStone->active)
			      			<a href="{{route('de_activate_gem_stone',['id' => $gemStone->id])}}" data-original-title="Deactivate this gem stone" data-toggle="tooltip" type="button" class="btn btn-sm "><i style="font-size:1.5em;" class="glyphicon glyphicon-eye-close"></i></a>
			      		@else
			      			<a href="{{route('de_activate_gem_stone',['id' => $gemStone->id])}}" data-original-title="Activate this gem stone" data-toggle="tooltip" type="button" class="btn btn-sm "><i style="font-size:1.5em;" class="glyphicon glyphicon-eye-open"></i></a>
			      		@endif
			      		<a href="{{route('delete_gem_stone',['id' => $gemStone->id])}}" data-original-title="Remove this gemstone" data-toggle="tooltip" type="button" class="btn btn-sm "><i style="font-size:1.5em;" class="glyphicon glyphicon-trash"></i></a>
			      	</span>
		      	@endif
		      </div>
		  </div>
		</div>
	</div>
</div>

@endsection