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
	<style type="text/css">
		body {
		  padding-top: 60px;
		}
		@media (max-width: 979px) {
		  body {
		    padding-top: 0px;
		  }
		}
		.shop-container{
            padding: 0 5% 0 5%;
        }
	</style>
</head>
<body>

	@include('layouts/navbar')

	<div class="shop-container">
		<div class="row">
			<div class="col-xs-3">
                <h2><a href="#">{{$shop->user->name}} </a></h2>
                <div class="list-group">
                    <a href="{{route('shop_front',['id' => $shop->id])}}" class="list-group-item">Shop Front</a>
                    <a href="{{route('shop_gems',['id' => $shop->id])}}" class="list-group-item">All Gems</a>
                    <a style="background-color: #dcdcdc;" href="#" class="list-group-item">Inspect Live!</a>
                </div>
                <br><br>
                <div>
                <h3>Visit Us :</h3>
                <h4>{{$shop->user->address}}</h4><br> <br> 
                <div> <h3>Contact Us : </h3><h4>  
                    &emsp;&emsp;&emsp;&nbsp;&nbsp;{{$shop->user->email}}<br><br>  
                    &emsp;&emsp;&emsp;&nbsp; 0{{$shop->user->tel}}<br></h4>
                </div>

            </div>
            </div>

			<div class="col-xs-9">
				<div>
					<h1 align="center">Inspect Gems Live!</h1>
					<br><br>

					<h3>How does this work?</h3>
					<ul>
						<li>You can Request a Session any time. Just Click the 'Start Session' Button</li>
						<li>We will accept the request, when available</li>
						<li>If the rquest is not accepted in a while, may be we are not available</li>
						<li>If so please give it a try again, in a little while</li>
					</ul>
					<br><br>

					@if(Auth::user()->id != $shop->user->id )						
						<form name="callForm" id="call" action="#" onsubmit="return makeCall(this);">
							<input style="display:none;" type="text" name="number" value="{{$shop->user->name}}"/>
							<input type="submit" name="start_session" value="Start a Session" id="start_session" />
						</form>
						<div class="row">
							<!-- Buttons for in call features -->
							<div class="col-xs-5">
								<div id="inCall" style="float: right;">
									<button id="end" onclick="end()">End</button>
									<button id="mute" onclick="mute()">Mute</button>
									<button id="pause" onclick="pause()">Pause</button>
								</div>
								<hr>							
								<div id="vid-thumb"></div>
							</div>
							<div class="col-xs-7" id="vid-box"></div>
						</div>
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
								$('#start_session').hide();
								ctrl.ready(function(){

									console.log('Ready to Start Session');
									form.start_session.hidden="true";	// Hide start button
									$('#start_session').hide();
									console.log('nubmer is ' + num);
									ctrl.addLocalStream(vid_thumb);
									$( "#vid-thumb" ).find( "video" ).width(100);
									phone.dial(num);
									$('#inCall').show();
								});

								ctrl.receive(function(session){
									    session.connected(function(session) { 
									    	video_out.appendChild(session.video);
									    	ctrl.getVideoElement(session.number).width(400);
									    });
									    session.ended(function(session) { 
									    	//ctrl.getVideoElement(session.number).remove();
									    	ctrl.getVideoElement(session.number).css("opacity",0); 
									    });
								});

								ctrl.videoToggled(function(session, isEnabled){
									//ctrl.getVideoElement(session.number).toggle(isEnabled); // Hide video is stream paused
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
								video_out.innerHTML='';
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
						<button id="reload" value="reload">Disable Sessions</button>
						<div class="row">
							<!-- Buttons for in call features -->
							<div class="col-xs-5">
								<div id="inCall" style="float: right;">
									<button id="end" onclick="end()">End</button>
									<button id="mute" onclick="mute()">Mute</button>
									<button id="pause" onclick="pause()">Pause</button>
								</div>
								<hr>							
								<div id="vid-thumb"></div>
							</div>
							<div class="col-xs-7" id="vid-box"></div>
						</div>
						<script type="text/javascript">

							var video_out = document.getElementById("vid-box");
							var vid_thumb  = document.getElementById("vid-thumb");
							var vid_incall = document.getElementById("inCall");
							var enabled = false;
							var reload = document.getElementById("reload");

							function login(form) {
								if(!enabled){
									var phone = window.phone = PHONE({
									    number        : form.username.value, // listen on username line else Anonymous
									    publish_key   : 'pub-c-b551173f-d10f-45f6-a7f2-385740ff22f5',
									    subscribe_key : 'sub-c-a740530a-360a-11e7-b860-02ee2ddab7fe',
									    ssl : (('https:' == document.location.protocol) ? true : false)
									});

									var ctrl = window.ctrl = CONTROLLER(phone);

									ctrl.ready(function(){										
										$('#login_submit').hide();
										$('#reload').show();
									});

									ctrl.receive(function(session){
										confirm("Accept Incoming Call?");
										$('#inCall').show();
										$('#reload').hide();

										ctrl.addLocalStream(vid_thumb);
										$( "#vid-thumb" ).find( "video" ).width(100);

									    session.connected(function(session) { 
									    	video_out.appendChild(session.video);
									    	ctrl.getVideoElement(session.number).width(400); 
									    });
									    session.ended(function(session) { 
									    	//video_out.innerHTML='';
									    	ctrl.getVideoElement(session.number).css("opacity",0); 
									    });
									});

									ctrl.videoToggled(function(session, isEnabled){
										//ctrl.getVideoElement(session.number).toggle(isEnabled); // Hide video is stream paused
									});

									ctrl.audioToggled(function(session, isEnabled){
										ctrl.getVideoElement(session.number).css("opacity",isEnabled ? 1 : 0.75); // 0.75 opacity is audio muted
									});


									enabled = true;
									return false; 	// So the form does not submit.
								}else{
									enabled = false;
									$('#reload').hide();
									$('#login_submit').show();
									
								}
							}

							function end(){
								ctrl.hangup();
								$('#reload').show();
								$('#inCall').hide();
								video_out.innerHTML='';
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

							$('#reload').click(function (){
								window.location.reload(true);
							});


						</script>
					@endif
					
				</div>			
			</div>
		</div>		
	</div>
</body>  
<script>
	$(document).ready(function(){
		$('#myTable').dataTable({
			order: [[ 0 , 'desc' ]]
		});
		$('#example').DataTable(  );
		$('#inCall').hide();
		$('#reload').hide();
	});
</script>
</html>  
