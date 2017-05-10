@extends('layouts.app')

@section('styles')

<script type="text/javascript" src="/js/videocall.js"></script>

@endsection

@section('content')


{!! 
    KandyButton::videoCall(array(
        "id"      => "kandyVideoAnswerButton",
        "class"   => "myButtonStyle",
        "options" => array(
            "callOut"      => array(
                "id"       => "callOut",
                "label"    => "User to call",
                "btnLabel" => "Call"
            ),
            "calling"      => array(
                "id"       => "calling",
                "label"    => "Calling...",
                "btnLabel" => "End Call"
            ),
            "incomingCall" => array(
                "id"       => "incomingCall",
                "label"    => "Incoming Call",
                "btnLabel" => "Answer"
            ),
            "onCall"       => array(
                "id"       => "onCall",
                "label"    => "You're connected!",
                "btnLabel" => "End Call"
            ),
        )
    ))
 !!}

{!! 
    KandyVideo::show(
        array(
            "title"       => "Them",
            "id"          => "theirVideo",
            "class"       => "myVideoStyle",
            "htmlOptions" => array( // Example how to use inline stylesheet
                "style" => "width: 340px;
                height: 250px;
                background-color: darkslategray"
            )
        )
    )
 !!}

{!! 
    KandyVideo::show(
        array(
            "title"       => "Me",
            "id"          => "myVideo",
            "class"       => "myStyle",
            "htmlOptions" => array( // Example how to use inline stylesheet
                "style" => "width: 340px;
                height: 250px;
                background-color: darkslategray"
            )
        )
    )
 !!}

 @endsection