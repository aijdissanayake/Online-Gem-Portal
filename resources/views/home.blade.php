@extends('layouts.app')

@section('content')
@include('includes.message-block'){{--Display General Feed page title--}}
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <div class="col s6">
                <h1>Gem Feed</h1>
            </div>
        </div>
    </div>

    <div class="row">
        {{--Display General Posts--}}
        <div class="col s8">
            <div class="col s12">
                @foreach(App\Post::all() as $post)
                    <article class="card-panel">
                        <div>
                            <h2>
                                {{ $post['title'] }}
                            </h2>
                            <?php
                            $str = "$post->body";
                            echo htmlspecialchars_decode($str);
                            ?>
                        </div>

                        <div class="info">
                            Posted on {{ $post['created_at'] }}
                        </div>
                        <div class="interaction">
                            {{--<a href="#" id="edit">Edit</a> |--}}
                            <a target="_blank" href="{{ route('update_post', ['id' => $post['id']]) }}" id="edit">Edit</a> |
                            <a href="{{ route('de_activate_post', ['id' => $post['id']]) }}">{{$post->deleted? 'Activate' : 'Deactivate'}}</a>
                        </div>
                    </article>
                    <br>
                    <br>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
