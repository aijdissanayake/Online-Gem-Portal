@extends('layouts.app')
@section('styles')
    <link href="css/shop/shopfront.css" rel="stylesheet">
@endsection

@section('content')
    <!-- Page Content -->
    <div class="shop-container">
    <br><br><br><br>

        <div class="row">

            <div class="col-md-3">
                <h2><a href="#">{{$shop->user->name}} </a></h2>
                <div class="list-group">
                    <a href="#" class="list-group-item">Shop Front</a>
                    <a href="#" class="list-group-item">All Gems</a>
                    <a href="#" class="list-group-item">Inspect Live!</a>
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
            </div>

        </div>

    </div>

@endsection