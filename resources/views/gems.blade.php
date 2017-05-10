<!DOCTYPE html>   
<html lang="en">   
<head>   
	<meta charset="utf-8">   
	<title>Gem Portal</title>   
	<meta name="description" content="Creating a Employee table with Twitter Bootstrap. Learn with example of a Employee Table with Twitter Bootstrap.">  
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
	@include('layouts/navbar')
	<div class="container">
		<table border="0" id="myTable" class="table" >  
			<thead border-bottom="0">  
				<tr>
					<th border-bottom="0" style="display: none;">Gem</th> 
					<th border-bottom="0" style="display: none;">Name</th> 
					<th border-bottom="0" style="display: none;">Name</th>
				</tr>  
			</thead>  
			<tbody>
				<?php $count = 0 ?>
				@foreach(App\GemStone::where('active',TRUE)->orderBy('created_at', 'desc')->get() as $gemStone)
				<?php $count = $count + 1 ?>
				@if($count % 2)
				
				<tr class="row">
				<td style="display: none;" >{{$gemStone->created_at}}</td> 
				@endif					
					<td class="col-sm-6">
							<div class="row">
								<div class="col-sm-3" align="center"> 
									<img alt="Gem Stone Pic" src="{{route('get_image',['id' => $gemStone->id])}} " class="img-circle img-responsive">
								</div>
								<div class="col-sm-9">
								<h3><b><a href="{{route('gem_stone',['id' => $gemStone->id])}}">{{$gemStone->type->type}}</a></b></h3>
								@if($gemStone->shop->user->role != 'admin')
								<a href="{{route('visit_shop',['id'=>$gemStone->shop_id])}}" >
								<b>{{$gemStone->shop->user->name}}</b><br>
								</a>
								@endif
								@if($gemStone->shop->user->id == Auth::user()->id)
								<a href="{{route('view_update_gem_stone',['id' => $gemStone->id])}}">[Edit]</a><br>
								@endif
								{{$gemStone->size->size}}<br>
								LKR: {{$gemStone->price}}<br>
								<div> 
									{{$gemStone->description}}<br>
									{{$gemStone->created_at}}
								</div>
								</div>
							</div>
					</td>        
				@if(!($count % 2))
				
				</tr>
				@endif
				@endforeach
				@if($count%2)
					<td></td>
					</tr>
				@endif
			</tbody>  
		</table>  
	</div>
</body>  
<script>
	$(document).ready(function(){
		$('#myTable').dataTable({
			order: [[ 0 , 'desc' ]]
		});
		$('#example').DataTable(  );
	});
</script>
</html>  
