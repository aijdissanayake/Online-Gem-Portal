$(document).ready(function () {
	// Configure Kandy for calls.
kandy.setup({
    // Designate HTML elements to be our stream containers.
    remoteVideoContainer: document.getElementById('remote-stream'),
    localVideoContainer: document.getElementById('local-stream'),

    // Register listeners to call events.
    listeners: {
        // Media support event.
        media: onMedia,
        // Call events.
        callInitiated: onCallInitiated,
        callInitiateFailed: onCallInitiateFail,
        callRejected: onCallRejected,
        callRejectFailed: onCallRejectFailed,
        callIgnored: onCallIgnored,
        callIgnoreFailed: onCallIgnoreFailed,
        callIncoming: onCallIncoming,
        callAnswered: onCallAnswered,
        callAnswerFailed: onCallAnsweredFailed,
        oncall: onCall,
        callEnded: onCallEnded,
        callEndFailed: onCallEndedFailed
    }
});
});