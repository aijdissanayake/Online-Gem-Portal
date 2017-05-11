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
	<script src="https://cdn.pubnub.com/pubnub-3.7.14.min.js"></script>
	<script src="https://cdn.pubnub.com/webrtc/webrtc.js"></script>
	<script src="https://cdn.pubnub.com/webrtc/rtc-controller.js"></script>
</head>
<body>
	@include('layouts/navbar')
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
				<h2><b>{{$shop->user->name}}</b></h2>
				<b>{{$shop->user->address}}</b><br>  
				<div> Contact Info :  {{$shop->user->email}}<br>  
					&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; {{$shop->user->tel}}<br>
				</div>
			</div>
			<div class="col-xs-8">
				<br><br>
				<div style="float: right;">
					<h4>Remote Observaton</h4>
					@if(Auth::user()->id != $shop->user->id )						
						<form name="callForm" id="call" action="#" onsubmit="return makeCall(this);">
							<input style="display:none;" type="text" name="number" value="{{$shop->user->name}}"/>
							<input type="submit" value="Start a Session"/>
						</form>
						<div id="vid-box"></div>
						<script type="text/javascript">
							var video_out = document.getElementById("vid-box");

							function makeCall(form){

								var phone = window.phone = PHONE({
								    number        : "Buyer", 
								    // || "Anonymous", // listen on username line else Anonymous
								    publish_key   : 'pub-c-b551173f-d10f-45f6-a7f2-385740ff22f5',
								    subscribe_key : 'sub-c-a740530a-360a-11e7-b860-02ee2ddab7fe',
								});	
								phone.ready(function(){ 
									// form.username.style.background="#55ff5b";
									console.log('Ready to Start Session');
									phone.dial(form.number.value); 
								});
								phone.receive(function(session){
									    session.connected(function(session) { video_out.appendChild(session.video); });
									    session.ended(function(session) { video_out.innerHTML=''; });
								});
								console.log(form.number.value);
								return false;
							}
						</script>
					@else
						<form name="loginForm" id="login" action="#" onsubmit="return login(this);">
						    <input style="display: none;" type="text" name="username" id="username" value="{{Auth::user()->name}}" />
						    <input type="submit" name="login_submit" value="Allow Sessions">
						</form>
						<div id="vid-box"></div>
						<script type="text/javascript">
							var video_out = document.getElementById("vid-box");

							function login(form) {
								var phone = window.phone = PHONE({
								    number        : form.username.value, // listen on username line else Anonymous
								    publish_key   : 'pub-c-b551173f-d10f-45f6-a7f2-385740ff22f5',
								    subscribe_key : 'sub-c-a740530a-360a-11e7-b860-02ee2ddab7fe',
								});	
								phone.ready(function(){ form.username.style.background="#55ff5b"; });
								phone.receive(function(session){
								    session.connected(function(session) { video_out.appendChild(session.video); });
								    session.ended(function(session) { video_out.innerHTML=''; });
								});
								return false; 	// So the form does not submit.
							}
						</script>
					@endif
					<div id="inCall"> <!-- Buttons for in call features -->
						<button id="end" onclick="end()">End</button> <button id="mute" onclick="mute()">Mute</button> <button id="pause" onclick="pause()">Pause</button>
					</div>
				</div>			
			</div>
		</div>
		<h3>Available Gems</h3>
		<hr>
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
				@foreach(App\GemStone::where('active',TRUE)->where('shop_id',$shop->id)->orderBy('created_at', 'desc')->get() as $gemStone)
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
