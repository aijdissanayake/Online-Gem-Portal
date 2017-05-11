
	// // Configure Kandy for calls.
	// kandy.setup({
 //    	// Designate HTML elements to be our stream containers.
	//     remoteVideoContainer: document.getElementById('remote-stream'),
	//     localVideoContainer: document.getElementById('local-stream'),

	//     // Register listeners to call events.
	//     listeners: {
	//         // Media support event.
	//         media: onMedia,
	//         // Call events.
	//         callInitiated: onCallInitiated,
	//         callInitiateFailed: onCallInitiateFail,
	//         callRejected: onCallRejected,
	//         callRejectFailed: onCallRejectFailed,
	//         callIgnored: onCallIgnored,
	//         callIgnoreFailed: onCallIgnoreFailed,
	//         callIncoming: onCallIncoming,
	//         callAnswered: onCallAnswered,
	//         callAnswerFailed: onCallAnsweredFailed,
	//         oncall: onCall,
	//         callEnded: onCallEnded,
	//         callEndFailed: onCallEndedFailed
	//     }	
	// });

	// // Utility function for appending messages to the message div.
	// function log(message) {
	//     document.getElementById("messages").innerHTML += "<div>" + message + "</div>";
	// }

	// // Variable to keep track of video display status.
	// var showVideo = true;

	// // Get user input and make a call to the callee.
	// function startCall() {
	//     var callee = document.getElementById("callee").value;

	//     // Tell Kandy to make a call to callee.
	//     kandy.call.makeCall(callee, showVideo);
	// }

	// // Variable to keep track of the call.
	// var callId;

	// // What to do when a call is initiated.
	// function onCallInitiated(call, callee) {
	//     log("Call initiated with " + callee + ". Ringing...");

	//     // Store the call id, so the caller has access to it.
	//     callId = call.getId();

	//     // Handle UI changes. A call is in progress.
	//     document.getElementById("make-call").disabled = true;
	//     document.getElementById("end-call").disabled = false;
	// }

	// // Recieve an incoming call.
	// function onCallIncoming(call) {
	//     log("Incoming call from " + call.callerNumber);

	//     // Store the call id, so the callee has access to it.
	//     callId = call.getId();

	//     // Handle UI changes. A call is incoming.
	//     document.getElementById("accept-call").disabled = false;
	//     document.getElementById("decline-call").disabled = false;
	// }

	// // Accept an incoming call.
	// function acceptCall() {
	//     // Tell Kandy to answer the call.
	//     kandy.call.answerCall(callId, showVideo);
	//     // Second parameter is false because we are only doing voice calls, no video.

	//     log("Call answered.");
	//     // Handle UI changes. Call no longer incoming.
	//     document.getElementById("accept-call").disabled = true;
	//     document.getElementById("decline-call").disabled = true;
	// }

	// // Reject an incoming call.
	// function declineCall() {
	//     // Tell Kandy to reject the call.
	//     kandy.call.rejectCall(callId);

	//     log("Call rejected.");
	//     // Handle UI changes. Call no longer incoming.
	//     document.getElementById("accept-call").disabled = true;
	//     document.getElementById("decline-call").disabled = true;
	// }

	// // when call is established.
	// function onCallEstablished(call) {
	//     log("Call established.");

	//     // Handle UI changes. Call in progress.
	//     document.getElementById("make-call").disabled = true;
	//     document.getElementById("mute-call").disabled = false;
	//     document.getElementById("hold-call").disabled = false;
	//     document.getElementById("end-call").disabled = false;
	// }

	// // when a call is ended.
	// function onCallEnded(call) {
	//     log("Call ended.");

	//     // Handle UI changes. No current call.
	//     document.getElementById("make-call").disabled = false;
	//     document.getElementById("mute-call").disabled = true;
	//     document.getElementById("end-call").disabled = true;
	// }

	// // End a call.
	// function endCall() {
	//     // Tell Kandy to end the call.
	//     kandy.call.endCall(callId);
	// }

	// // Variable to keep track of mute status.
	// var isMuted = false;

	// // Mute or unmute the call, depending on current status.
	// function toggleMute() {
	//     if(isMuted) {
	//         kandy.call.unMuteCall(callId);
	//         log("Unmuting call.");
	//         isMuted = false;
	//     } else {
	//         kandy.call.muteCall(callId);
	//         log("Muting call.");
	//         isMuted = true;
	//     }
	// }

	// // Variable to keep track of hold status.
	// var isHeld = false;

	// // Hold or unhold the call, depending on current status.
	// function toggleHold() {
	//     if(isHeld) {
	//         kandy.call.unHoldCall(callId);
	//         log("Unholding call.");
	//         isHeld = false;
	//     } else {
	//         kandy.call.holdCall(callId);
	//         log("Holding call.");
	//         isHeld = true;
	//     }
	// }

	// // What to do when a call is ended.
	// function onCallEnded(call) {
	//     log("Call ended.");

	//     // Handle UI changes. No current call.
	//     document.getElementById("make-call").disabled = false;
	//     document.getElementById("mute-call").disabled = true;
	//     document.getElementById("hold-call").disabled = true;
	//     document.getElementById("end-call").disabled = true;

	//     // Call no longer active, reset mute and hold statuses.
	//     isMuted = false;
	//     isHeld = false;
	// }

	// // Show or hide video, depending on current status.
	// function toggleVideo() {
	//     if(showVideo) {
	//         kandy.call.stopCallVideo(callId);
	//         log("Stopping send of video.");
	//         showVideo = false;
	//     } else {
	//         kandy.call.startCallVideo(callId);
	//         log("Starting send of video.");
	//         showVideo = true;
	//     }
	// }


	// Variables for logging in.
	var projectAPIKey = "DAKcae4dcd797924ba080b035dfb86afb4a";
	var username = "shop@gemortal.gmail.com";
	var password = "Gem123@portal";

	// Setup Kandy to make and receive calls.
	kandy.setup({
	    // Designate HTML elements to be our stream containers.
	    remoteVideoContainer: document.getElementById("remote-container"),
	    localVideoContainer: document.getElementById("local-container"),

	    // Register listeners to call events.
	    listeners: {
	        callInitiated: onCallInitiated,
	        callIncoming: onCallIncoming,
	        callEstablished: onCallEstablished,
	        callEnded: onCallEnded,
	        callInitiateFailed: onCallInitiateFail,
	    }
	});

	// Login automatically as the application starts.
	kandy.login(projectAPIKey, username, password, onLoginSuccess, onLoginFailure);

	// What to do on a successful login.
	function onLoginSuccess() {
	    log("Login was successful.");
	}

	// What to do on a failed login.
	function onLoginFailure() {
	    log("Login failed. Make sure you input the user's credentials!");
	}

	// Utility function for appending messages to the message div.
	function log(message) {
	    document.getElementById("messages").innerHTML += "<div>" + message + "</div>";
	}

	// Variable to keep track of video display status.
	var showVideo = true;

	// Get user input and make a call to the callee.
	function startCall() {
	    var callee = document.getElementById("callee").value;

	    // Tell Kandy to make a call to callee.
	    kandy.call.makeCall(callee, showVideo);
	}

	// Variable to keep track of the call.
	var callId;

	//  when a call is initiated.
	function onCallInitiated(call, callee) {
	    log("Call initiated with " + callee + ". Ringing...");
	    
	    kandy.getDevices("DAKcae4dcd797924ba080b035dfb86afb4a", 
    	function (devices) {
    	log(devices);
    	console.log(devices);
    	console.log("devices");
    	}, 
    	function (errorMessage){
    		log(errorMessage);
    		console.log('no devicec details');

	    });

	    // Store the call id, so the caller has access to it.
	    callId = call.getId();

	    // Handle UI changes. A call is in progress.
	    document.getElementById("make-call").disabled = true;
	    document.getElementById("end-call").disabled = false;
	}

	function onCallInitiateFail(){
		log("Intiation Failed");
	}

	// What to do for an incoming call.
	function onCallIncoming(call) {
	    log("Incoming call from " + call.callerNumber);

	    // Store the call id, so the callee has access to it.
	    callId = call.getId();

	    // Handle UI changes. A call is incoming.
	    document.getElementById("accept-call").disabled = false;
	    document.getElementById("decline-call").disabled = false;
	}

	// Accept an incoming call.
	function acceptCall() {
	    // Tell Kandy to answer the call.
	    kandy.call.answerCall(callId, showVideo);
	    // Second parameter is false because we are only doing voice calls, no video.

	    log("Call answered.");
	    // Handle UI changes. Call no longer incoming.
	    document.getElementById("accept-call").disabled = true;
	    document.getElementById("decline-call").disabled = true;
	}

	// Reject an incoming call.
	function declineCall() {
	    // Tell Kandy to reject the call.
	    kandy.call.rejectCall(callId);

	    log("Call rejected.");
	    // Handle UI changes. Call no longer incoming.
	    document.getElementById("accept-call").disabled = true;
	    document.getElementById("decline-call").disabled = true;
	}

	// What to do when call is established.
	function onCallEstablished(call) {
	    log("Call established.");

	    // Handle UI changes. Call in progress.
	    document.getElementById("make-call").disabled = true;
	    document.getElementById("mute-call").disabled = false;
	    document.getElementById("hold-call").disabled = false;
	    document.getElementById("end-call").disabled = false;
	}

	// End a call.
	function endCall() {
	    // Tell Kandy to end the call.
	    kandy.call.endCall(callId);
	}

	// Variable to keep track of mute status.
	var isMuted = false;

	// Mute or unmute the call, depending on current status.
	function toggleMute() {
	    if(isMuted) {
	        kandy.call.unMuteCall(callId);
	        log("Unmuting call.");
	        isMuted = false;
	    } else {
	        kandy.call.muteCall(callId);
	        log("Muting call.");
	        isMuted = true;
	    }
	}

	// Variable to keep track of hold status.
	var isHeld = false;

	// Hold or unhold the call, depending on current status.
	function toggleHold() {
	    if(isHeld) {
	        kandy.call.unHoldCall(callId);
	        log("Unholding call.");
	        isHeld = false;
	    } else {
	        kandy.call.holdCall(callId);
	        log("Holding call.");
	        isHeld = true;
	    }
	}

	// What to do when a call is ended.
	function onCallEnded(call) {
	    log("Call ended.");

	    // Handle UI changes. No current call.
	    document.getElementById("make-call").disabled = false;
	    document.getElementById("mute-call").disabled = true;
	    document.getElementById("hold-call").disabled = true;
	    document.getElementById("end-call").disabled = true;

	    // Call no longer active, reset mute and hold statuses.
	    isMuted = false;
	    isHeld = false;
	}

	// Show or hide video, depending on current status.
	function toggleVideo() {
	    if(showVideo) {
	        kandy.call.stopCallVideo(callId);
	        log("Stopping send of video.");
	        showVideo = false;
	    } else {
	        kandy.call.startCallVideo(callId);
	        log("Starting send of video.");
	        showVideo = true;
	    }
	}
$(document).ready(function () {

});