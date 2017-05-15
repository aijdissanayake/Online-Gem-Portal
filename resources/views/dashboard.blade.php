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
    <div id="app">
        @include('layouts/navbar')
    </div>

    <div class="row">
        <div class="col s12">
            <div class="col s6">
                <h5>Add New Post</h5>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <html>
                <head>
                    <!-- Path to CKEditor -->
                    <script src='{{asset('ckeditor/ckeditor.js')}}'></script>
                </head>
                <body>
                    <form action="#" method="post">

                        {{-- Input Post title--}}
                        <div class="row">
                            <div class="col s10 offset-s1">
                                <div class="input-field">
                                    <i class="material-icons blue-text prefix">library_add</i>
                                    <input id="title" name="title" type="text" class="validate">
                                    <label class="active" for="title">Post Title</label>
                                </div>
                            </div>
                        </div>

                        {{-- Input text body --}}
                        <div class="row">
                            <div class="col s10 offset-s1">
                                <textarea name="body" id="body" rows="10" cols="80">
                                    {{--This is my textarea to be replaced with CKEditor.--}}
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
                            <div class="col s10 offset-s1 center">
                                <button type="submit" id="publish_post" class="waves-effect waves-light btn-large">Publish Post<i class="material-icons right">done</i></button>
                                <input type="hidden" value="{{ Session::token() }}" name="_token">
                            </div>
                        </div>

                    </form>
                </body>
            </html>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</html>