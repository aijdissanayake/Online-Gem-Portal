@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">

		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="row" >
					<h3 class="panel-title col-xs-10">{{Auth::user()->name}}</h3>
					<span class="col-xs-2">
						<a href="{{route('update_view')}}" data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-pencil"> Edit</i></a>
					</span>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
					<div class="col-md-3 col-lg-3 " align="center"> 
					@if(Auth::user()->role=='buyer')
						<img alt="User Pic" src="buyer_avatar.jpg" class="img-circle img-responsive">
					@else
						<img alt="User Pic" src="shop_avatar.jpg" class="img-circle img-responsive">
					@endif
					</div>

		                
		              <div class=" col-md-9 col-lg-9 "> 
		              	<table class="table table-user-information">
		              		<tbody>
		              			<tr>
		              				<td>Department:</td>
		              				<td>Programming</td>
		              			</tr>
		              			<tr>
		              				<td>Hire date:</td>
		              				<td>06/23/2013</td>
		              			</tr>
		              			<tr>
		              				<td>Date of Birth</td>
		              				<td>01/24/1988</td>
		              			</tr>

		              			<tr>
		              				<tr>
		              					<td>Gender</td>
		              					<td>Female</td>
		              				</tr>
		              				<tr>
		              					<td>Address</td>
		              					<td>{{Auth::user()->address}}</td>
		              				</tr>
		              				<tr>
		              					<td>Email</td>
		              					<td>{{Auth::user()->email}}</td>
		              				</tr>
		              				<td>Phone Number</td>
		              				<td>{{Auth::user()->tel}}</td>

		              			</tr>

		              		</tbody>
		              	</table>
<!-- 
		              	<a href="#" class="btn btn-primary">My Sales Performance</a>
		              	<a href="#" class="btn btn-primary">Team Sales Performance</a> -->
		              </div>
		          </div>
		      </div>
		      <div class="panel-footer">
		      	<!-- <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a> -->
		      	<!-- <span class="pull-right">
		      		<a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
		      		<a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
		      	</span> -->
		      </div>
		  </div>
		</div>
	</div>
</div>

@endsection