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
        @include('includes.message-block')
        <br>
        <div class="row">
            <h3><b>Update Post</b></h3>
        </div>
        <br>
        <div class="row">
            <h4> Post Details: </h4>
        </div>

        <table id="myTable" class="table" >  
            <thead>  
                <tr>  
                  <th>ID</th>  
                  <th>Title</th>
                  <th>Created</th>  
                  <th>Buyers</th>  
                  <th>Shops</th>
                  <th>In/Activate</th>   
                </tr>  
            </thead>  
            <tbody> 
                <tr>  
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>  
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->buyer?"Yes":"No"}}</td>
                    <td>{{$post->shop?"Yes":"No"}}</td>
                    <td>{{$post->deleted?"Inactive":"Active"}}<a href="{{route('de_activate_post', ['id' => $post->id])}}">[change]</a></td> 
                </tr>
            </tbody>
        </table> 

        <div class="row">
            <h4> Edit : </h4>
        </div>

        <div class="row" style="border-style: ridge; padding: 2%">
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
                                    <button class="btn btn-primary" style="float: right;" type="submit" id="publish_post">Update Post</button>
                                    <input type="hidden" value="{{ Session::token() }}" name="_token"><br><br><br>
                                </div>
                            </div>
                        </form>
                    </body>
                </html>
            </div>
        </div>
        <br>
        <br>
    </div>
</body>
</html>
