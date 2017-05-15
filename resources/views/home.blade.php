@extends('layouts.app')

@section('content')
@include('includes.message-block')
<div class="container">

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
                @if(Auth::user()->role == 'buyer')
                    <?php $posts = App\Post::where('buyer', true)->where('deleted', false)->orderBy('id', 'DESC')->get() ?>
                @elseif(Auth::user()->role == 'shop')
                    <?php $posts = App\Post::where('shop', true)->where('deleted', false)->orderBy('id', 'DESC')->get() ?>
                @else
                    <?php $posts = App\Post::orderBy('id', 'DESC')->get() ?>
                @endif
                @foreach($posts as $post)
                    <article class="card">
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
                        @if(Auth::user()->role == 'admin')
                            <div class="interaction">
                                <a target="_blank" href="{{ route('view_update_post', ['id' => $post['id']]) }}" id="edit">Edit</a> |
                                <a href="{{ route('de_activate_post', ['id' => $post['id']]) }}">{{$post->deleted? 'Activate' : 'Deactivate'}}</a>
                            </div>
                        @endif
                    </article>
                    <br>
                    <br>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
