@extends('layouts.app')

@section('styles')

<script src="https://kandy-portal.s3.amazonaws.com/public/javascript/kandy/2.10.1/kandy.js"></script>
<script type="text/javascript" src="/js/videocall.js"></script>

@endsection

@section('content')

<fieldset>
    <legend>Call Management</legend>

    <!-- User input: Callee field. -->
    Callee: <input type="text" id="callee"/>

    <!-- User input: Handle call buttons. -->
    <input type="button" value="Make Call" id="make-call" onclick="startCall();"/>

    <input type="button" value="Mute/Unmute Call" id="mute-call" onclick="toggleMute();" disabled/>

    <input type="button" value="Hold/Unhold Call" id="hold-call" onclick="toggleHold();" disabled/>

    <input type="button" value="Show/Hide Video" id="show-video" onclick="toggleVideo();"/>

    <input type="button" value="End Call" id="end-call" onclick="endCall();" disabled/>

    <input type="button" value="Accept Call" id="accept-call" onclick="acceptCall();" disabled/>

    <input type="button" value="Decline Call" id="decline-call" onclick="declineCall();" disabled/>
</fieldset>

<fieldset>
    <legend>Messages</legend>

    <!-- Message output container. -->
    <div id="messages"> </div>
</fieldset>

<!-- Media containers. -->
Remote video: <div id="remote-container"></div>

Local video: <div id="local-container"></div>


@endsection

@section('scripts')


@endsection