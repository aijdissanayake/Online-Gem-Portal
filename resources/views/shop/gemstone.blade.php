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
		              				<td>{{$gemStone->description}}</td>
		              			</tr>

		              		</tbody>
		              	</table>

		              </div>
		          </div>
		      </div>
		      <div class="panel-footer">
		      	<a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
		      	<span class="pull-right">
		      		<a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
		      		<a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
		      	</span>
		      </div>
		  </div>
		</div>
	</div>
</div>

@endsection