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
							<input type="submit" name="start_session" value="Start a Session" id="start_session" />
						</form>
						<div id="vid-box"></div>
						<div id="vid-thumb"></div>
						<script type="text/javascript">
							var video_out  = document.getElementById("vid-box");
							var vid_thumb  = document.getElementById("vid-thumb");
							var vid_incall = document.getElementById("inCall");


							function makeCall(form){

								var phone = window.phone = PHONE({
								    number        : "gemBuyer", 
								    // || "Anonymous", // listen on username line else Anonymous
								    publish_key   : 'pub-c-b551173f-d10f-45f6-a7f2-385740ff22f5',
								    subscribe_key : 'sub-c-a740530a-360a-11e7-b860-02ee2ddab7fe',
								});	

								var ctrl = window.ctrl = CONTROLLER(phone);
								var num = form.number.value;

								ctrl.ready(function(){

									console.log('Ready to Start Session');
									form.start_session.hidden="true";	// Hide start button
									
									console.log('nubmer is ' + num);
									ctrl.addLocalStream(vid_thumb);	
									phone.dial(num);
									$('#inCall').show();
									// setInterval(function(){ctrl.isOnline(num, function(isOn){// Check if other is listening for calls
									// 	console.log("isOn respond");
									// 	console.log(isOn);
									// // 	if (isOn) {ctrl.dial(num);}		// Dial if they are online
									// // 	else {alert("No User Chack");}	// Alert if not
									// 	//vid_incall.hidden = "false";
									// });},1);

								});

								ctrl.receive(function(session){
									    session.connected(function(session) { video_out.appendChild(session.video); });
									    session.ended(function(session) { ctrl.getVideoElement(session.number).remove(); });
								});

								ctrl.videoToggled(function(session, isEnabled){
									ctrl.getVideoElement(session.number).toggle(isEnabled); // Hide video is stream paused
								});

								ctrl.audioToggled(function(session, isEnabled){
									ctrl.getVideoElement(session.number).css("opacity",isEnabled ? 1 : 0.75); // 0.75 opacity is audio muted
								});

								return false;
							}

							function end(){
								ctrl.hangup();
								$('#start_session').show();
								$('#inCall').hide();
								vid_thumb.innerHTML=''; 
								
							}

							function mute(){
								var audio = ctrl.toggleAudio();
								if (!audio) $("#mute").html("Unmute");
								else $("#mute").html("Mute");
							}

							function pause(){
								var video = ctrl.toggleVideo();
								if (!video) $('#pause').html('Unpause');
								else $('#pause').html('Pause');
							}

						</script>
					@else
						<form name="loginForm" id="login" action="#" onsubmit="return login(this);">
						    <input style="display: none;" type="text" name="username" id="username" value="{{Auth::user()->name}}" />
						    <input type="submit" name="login_submit" value="Enable Sessions" id="login_submit">
						</form>
						<div id="vid-box"></div>
						<div id="vid-thumb"></div>
						<script type="text/javascript">

							var video_out = document.getElementById("vid-box");
							var vid_thumb  = document.getElementById("vid-thumb");
							var vid_incall = document.getElementById("inCall");
							var enabled = false;

							function login(form) {
								if(!enabled){
									var phone = window.phone = PHONE({
									    number        : form.username.value, // listen on username line else Anonymous
									    publish_key   : 'pub-c-b551173f-d10f-45f6-a7f2-385740ff22f5',
									    subscribe_key : 'sub-c-a740530a-360a-11e7-b860-02ee2ddab7fe',
									});

									var ctrl = window.ctrl = CONTROLLER(phone);

									ctrl.ready(function(){});
									ctrl.receive(function(session){

										$('#inCall').show();
										$('#login_submit').value("Disable Sessions");
										$('#login_submit').hide();

										ctrl.addLocalStream(vid_thumb);	
									    session.connected(function(session) { 
									    	video_out.appendChild(session.video); 
									    });
									    session.ended(function(session) { video_out.innerHTML=''; });
									});


									enabled = true;
									return false; 	// So the form does not submit.
								}else{
									$('#login_submit').show();
									$('#login_submit').value("Enable Sessions");
								}
							}

							function end(){
								ctrl.hangup();
								$('#login_submit').show();
								$('#inCall').hide();
								vid_thumb.innerHTML=''; 
								
							}

							function mute(){
								var audio = ctrl.toggleAudio();
								if (!audio) $("#mute").html("Unmute");
								else $("#mute").html("Mute");
							}

							function pause(){
								var video = ctrl.toggleVideo();
								if (!video) $('#pause').html('Unpause');
								else $('#pause').html('Pause');
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
		$('#inCall').hide();
	});
</script>
</html>  
