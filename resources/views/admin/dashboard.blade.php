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

    </head>
    <body>
        <div id="app">
            @include('layouts/navbar')
        </div>

        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="card col-xs-3" style="border: 5px;">
                        <h3 class="card-header primary-color white-text">All Users</h3>
                        <div class="card-block">
                            <h4 class="card-title">{{count(App\User::all())}}</h4>
                            <p class="card-text"> Users </p>
                            <a class="btn btn-primary">User Settings</a>
                        </div>
                    </div>
                    <div class="card col-xs-3">
                        <h3 class="card-header primary-color white-text">All Shops</h3>
                        <div class="card-block">
                            <h4 class="card-title">{{count(App\Shop::all())}}</h4>
                            <p class="card-text"> Shops </p>
                            <a class="btn btn-primary">Shop Settings</a>
                        </div>
                    </div>
                    <div class="card col-xs-3">
                        <h3 class="card-header primary-color white-text">All Buyers</h3>
                        <div class="card-block">
                            <h4 class="card-title">{{count(App\User::where('role','buyer')->get())}}</h4>
                            <p class="card-text"> Buyers </p>
                            <a class="btn btn-primary">Buyer Settings</a>
                        </div>
                    </div>
                    <div class="card col-xs-3">
                        <h3 class="card-header primary-color white-text">Advertisements</h3>
                        <div class="card-block">
                            <h4 class="card-title">{{count(App\User::where('role','buyer')->get())}}</h4>
                            <p class="card-text"> Active Advertisements </p>
                            <a class="btn btn-primary">Ads Settings</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h3>Add New Post</h3>
                        </div>
                    </div>
                </div>

                <div class="row">
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
                                                <input id="title" name="title" type="text" class="validate" value="{{ old('title')}}">
                                                <label for="title">Post Title</label>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Input text body --}}
                                    <div class="row">
                                        <div>
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
                                        <div class="col-xs-10 center">
                                            <button type="submit" id="publish_post">Publish Post</button>
                                            <input type="hidden" value="{{ Session::token() }}" name="_token">
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