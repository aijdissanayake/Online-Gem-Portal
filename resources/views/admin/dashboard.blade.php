<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<title>{{ config('app.name', 'Gem Portal') }}</title>-->
    <title>Gem Portal</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            ]) !!};
    </script>

    <style type="text/css">
        body {
          padding-top: 60px;
        }
        @media (max-width: 979px) {
          body {
            padding-top: 0px;
          }
        }
    </style>

    </head>
    <body>
        <div id="app">
            @include('layouts/navbar')
        </div>

        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h3>Summary</h3>
                        </div>
                    </div>
                </div>
                <div class="row" style="border-style: ridge; padding: 2%">
                    <div class="card col-xs-2">
                        <div class="card">
                            <h3 class="card-header primary-color white-text">All Users</h3>
                            <div class="card-block">
                                <h4 class="card-title">{{count(App\User::all())}}</h4>
                                <p class="card-text"> Active : {{count(App\User::where('active',true)->get())}} </p>
                                <p class="card-text"> Inactive : {{count(App\User::where('active',false)->get())}} </p>
                                <a href="{{route('all_shops')}}" class="btn btn-primary">User Settings</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-1"></div>
                    <div class="card col-xs-2">
                        <h3 class="card-header primary-color white-text">All Shops</h3>
                        <div class="card-block">
                            <h4 class="card-title">{{count(App\Shop::all())}}</h4>
                            <p class="card-text"> Active : {{count(App\User::where('role','shop')->where('active',true)->get())}} </p>
                            <p class="card-text"> Inactive : {{count(App\User::where('role','shop')->where('active',false)->get())}} </p>
                            <a href="{{route('all_shops')}}"  class="btn btn-primary">Shop Settings</a>
                        </div>
                    </div>
                    <div class="col-xs-1"></div>
                    <div class="card col-xs-2 offset-xs-1">
                        <h3 class="card-header primary-color white-text">All Buyers</h3>
                        <div class="card-block">
                            <h4 class="card-title">{{count(App\User::where('role','buyer')->get())}}</h4>
                            <p class="card-text"> Active : {{count(App\User::where('role','buyer')->where('active',true)->get())}} </p>
                            <p class="card-text"> Inactive : {{count(App\User::where('role','buyer')->where('active',false)->get())}} </p>
                            <a href="{{route('all_buyers')}}"  class="btn btn-primary">Buyer Settings</a>
                        </div>
                    </div>
                    <div class="col-xs-1"></div>
                    <div class="card col-xs-2 offset-xs-1">
                        <h3 class="card-header primary-color white-text">All Ads</h3>
                        <div class="card-block">
                            <h4 class="card-title">{{count(App\GemStone::all())}}</h4>
                            <p class="card-text"> Active : {{count(App\GemStone::where('active',true)->get())}} </p>
                            <p class="card-text"> Inactive : {{count(App\GemStone::where('active',false)->get())}} </p>
                            <a href="{{route('all_gems')}}" class="btn btn-primary">Ads Settings</a>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h3>Add New Post</h3>
                        </div>
                    </div>
                </div>

                <div class="row" style="border-style: ridge; padding: 2%">
                    <div class="col-xs-12" >
                       @include('includes.message-block')
                        <html>
                            <head>
                                <!-- Path to CKEditor -->
                                <script src='{{asset('ckeditor/ckeditor.js')}}'></script>
                            </head>
                            <body>
                                <form action="{{ route('create_post') }}" method="post">

                                    {{-- Input Post title--}}
                                    <div class="row">
                                        <div>
                                            <div class="input-field">
                                                <label for="title">Title * :</label> <br>
                                                <input id="title" name="title" type="text" class="validate" value="{{ old('title')}}" style="width: 100%">
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <label>For :</label> &nbsp;&nbsp;
                                        <input type="checkbox" name="shop">Shops &nbsp;&nbsp;
                                        <input type="checkbox" name="buyer">Buyers 
                                    </div>
                                    <br>

                                    {{-- Input text body --}}
                                    <div class="row">
                                        <div>
                                            <label for="body">Content * :</label> <br>
                                            <textarea name="body" id="body" rows="10" cols="80">
                                                {{--Textarea to be replaced with CKEditor.--}}
                                                {{ old('body')}}
                                            </textarea>
                                        </div>
                                    </div>

                                    {{-- Calling CKEditor --}}
                                    <script>
                                        // Replace the <textarea id="body"> with a CKEditor instance, using default configuration.
                                        CKEDITOR.replace( 'body' );
                                    </script>

                                    {{--Button to save the post--}}
                                    <div class="row">
                                        <div class="col-xs-12 center">
                                            <br>
                                            <button class="btn btn-primary" style="float: right;" type="submit" id="publish_post">Publish Post</button>
                                            <input type="hidden" value="{{ Session::token() }}" name="_token"><br><br><br>
                                        </div>
                                    </div>
                                </form>
                            </body>
                        </html>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>