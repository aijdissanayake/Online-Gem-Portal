<html>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://cdn.pubnub.com/pubnub-3.7.14.min.js"></script>
	<script src="https://cdn.pubnub.com/webrtc/webrtc.js"></script>
</head>

<body>
<div id="vid-box"></div>

<form name="loginForm" id="login" action="#" onsubmit="return login(this);">
    <input type="text" name="username" id="username" placeholder="Pick a username!" />
    <input type="submit" name="login_submit" value="Log In">
</form>

<form name="callForm" id="call" action="#" onsubmit="return makeCall(this);">
	<input type="text" name="number" placeholder="Enter user to dial!" />
	<input type="submit" value="Call"/>
</form>
<script type="text/javascript">
		var video_out = document.getElementById("vid-box");

		function login(form) {
			var phone = window.phone = PHONE({
			    number        : form.username.value || "Anonymous", // listen on username line else Anonymous
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

		function makeCall(form){
			if (!window.phone) alert("Login First!");
			else phone.dial(form.number.value);
			return false;
		}
</script>
</body>

</html>