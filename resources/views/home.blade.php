@extends('layouts.app')

@section('content')
@include('includes.message-block')
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-9">
                <h1>Gem News</h1>
            </div>
            <div class="col-md-3">
                <a href=""><h1>New Arrivals</h1></a>
            </div>
        </div>
    </div>
    <div class="row">
        {{--Display General Posts--}}
        <div class="col-md-9" style="padding: 5%">
                @if(Auth::user()->role == 'buyer')
                <?php $posts = App\Post::where('buyer', true)->where('deleted', false)->orderBy('id', 'DESC')->take(10)->get() ?>
                @elseif(Auth::user()->role == 'shop')
                <?php $posts = App\Post::where('shop', true)->where('deleted', false)->orderBy('id', 'DESC')->take(10)->get() ?>
                @else
                <?php $posts = App\Post::orderBy('id', 'DESC')->take(20)->get() ?>
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

                    <div class="info" style="float:right;">
                        Posted on {{ $post['created_at'] }}
                    </div>
                    <br>
                    @if(Auth::user()->role == 'admin')
                    <div class="interaction" style="float:right;">
                        <a href="{{ route('view_update_post', ['id' => $post['id']]) }}" id="edit">Edit</a> |
                        <a href="{{ route('de_activate_post', ['id' => $post['id']]) }}">{{$post->deleted? 'Activate' : 'Deactivate'}}</a>
                    </div>
                    @endif
                </article>                
                <hr style="border: 1px solid #ccc;">
                <br>
                <br>
                @endforeach
        </div>
        <div class="col-md-3">
         @foreach(App\GemStone::where('active',TRUE)->orderBy('created_at', 'desc')->take(10)->get() as $gemStone)

                <div class="thumbnail" style="height: 400px;">
                    <div style="padding: 1%" align="center"> 
                        <img style="height: 200px;" alt="Gem Stone Pic" src="{{route('get_image',['id' => $gemStone->id])}} " class="img-rounded img-responsive">
                    </div>
                    <div class="caption">
                        <h4 class="pull-right">Rs. {{$gemStone->price}}.00</h4>
                        <h4><a href="#">{{$gemStone->type->type}}</a><br><br>
                            {{$gemStone->size->size}}
                        </h4>
                        <a href="{{route('shop_front',['id' => $gemStone->shop_id])}}" >
                            <b>{{$gemStone->shop->user->name}}</b><br>
                        </a>
                        <p>{{$gemStone->description}}</p>
                    </div>                            
                </div>
        @endforeach
    
        </div>
    </div>
</div>

@endsection
