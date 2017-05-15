@extends('layouts.app')
@section('styles')
    <link href="css/shop/shopfront.css" rel="stylesheet">
    <style type="text/css">
        body {
          padding-top: 60px;
        }
        @media (max-width: 979px) {
          body {
            padding-top: 0px;
          }
        }

.slide-image {
    width: 100%;
}

.carousel-holder {
    margin-bottom: 30px;
}

.carousel-control,
.item {
    border-radius: 4px;
}

.caption {
    height: 130px;
    overflow: hidden;
}

.caption h4 {
    white-space: nowrap;
}

.thumbnail img {
    width: 100%;
}

.ratings {
    padding-right: 10px;
    padding-left: 10px;
    color: #d17581;
}

.thumbnail {
    padding: 0;
}

.thumbnail .caption-full {
    padding: 9px;
    color: #333;
}
.shop-container{
    padding: 0 5% 0 5%;
}

footer {
    margin: 50px 0;
}
    </style>
@endsection

@section('content')
    <!-- Page Content -->
    <div class="shop-container">

        <div class="row">

            <div class="col-md-3">
                <h2><a href="#">{{$shop->user->name}} </a></h2>
                <div class="list-group">
                    <a style="background-color: #dcdcdc;" href="#" class="list-group-item">Shop Front</a>
                    <a href="{{route('shop_gems',['id' => $shop->id])}}" class="list-group-item">All Gems</a>
                    <a href="{{route('shop_live',['id' => $shop->id])}}" class="list-group-item">Inspect Live!</a>
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

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="1500">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="{{$urls[0]}}" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="{{$urls[1]}}" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="{{$urls[2]}}" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">

                    @foreach(App\GemStone::where('active',TRUE)->where('shop_id',$shop->id)->orderBy('created_at', 'desc')->take(7)->get() as $gemStone)

                    <div class="col-sm-3 col-lg-3 col-md-3">
                        <div class="thumbnail" style="height: 400px;">
                            <div style="padding: 1%" align="center"> 
                                <img style="height: 200px;" alt="Gem Stone Pic" src="{{route('get_image',['id' => $gemStone->id])}} " class="img-rounded img-responsive">
                            </div>
                            <div class="caption">
                                <h4 class="pull-right">Rs. {{$gemStone->price}}.00</h4>
                                <h4><a href="#">{{$gemStone->type->type}}</a><br><br>
                                    {{$gemStone->size->size}}
                                </h4>
                                <p>{{$gemStone->description}}</p>
                            </div>                            
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <h4><a href="#">Want to Observe the Gems?</a>
                        </h4>
                        <p>If you want to check the gemstones live, Go to the <a target="_blank" href="#">Inspect Live</a> section and start a session. You will get the chance when ever channel is free.</p>
                        <a class="btn btn-primary" target="_blank" href="{{route('shop_live',['id' => $shop->id])}}">Inspect Live</a><br><br><br>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection