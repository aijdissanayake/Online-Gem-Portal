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
            @include('includes.message-block')
            <br>
            <div class="row">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h3>Update Post</h3>
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
                            <form action="{{ route('update_post') }}" method="post">                            
                                {{-- Input Post title--}}
                                    <div class="row">
                                        <div>
                                            <div class="input-field">
                                                <label for="title">Title * :</label> <br>
                                                <input id="title" name="title" type="text" value="{{$post->title}}" class="validate" style="width: 100%">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    {{-- Input text body --}}
                                    <div class="row">
                                        <div>
                                            <label for="body">Content * :</label> <br>
                                            <textarea name="body" id="body" rows="10" cols="80">
                                                {{--Textarea to be replaced with CKEditor.--}}
                                                <?php
                                                $str = "$post->body";
                                                echo htmlspecialchars_decode($str);
                                                ?>
                                            </textarea>
                                        </div>
                                    </div>

                                    {{-- Calling CKEditor --}}
                                    <script>
                                        // Replace the <textarea id="body"> with a CKEditor instance, using default configuration.
                                        CKEDITOR.replace( 'body' );
                                    </script>

                                    {{--Initialize the id of the post to be sent--}}
                                    <input type="hidden" name="id" value="{{$post->id}}">

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
    </body>
</html>
