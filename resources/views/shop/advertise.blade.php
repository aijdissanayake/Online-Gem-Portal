@extends('layouts.app')

@section('styles')

    <script type="text/javascript">
        $(document).ready(function(){
            $('#reset').hide();
            $("#check").click(function(evt){
               evt.stopImmediatePropagation();
                console.log('inside');
               $('#reset').toggle(); 
            });
        });
    </script>

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Advertise a Gem Stone</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('advertise') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-4 control-label">Type</label>

                            <div class="col-md-6" style="display: flex;">
                                <select id="type" class="form-control" name="type" value="{{ old('type')}}" required>
                                    <option value="" disabled selected>Select Type</option>
                                    @foreach(\App\GemType::where('shop_id',Auth::user()->shop->id)->where('active',TRUE)->where('deleted',FALSE)->get() as $type)
                                        <option value="{{$type->id}}">{{$type->type}}</option>
                                    @endforeach
                                </select>
                                &nbsp;
                                <a href="{{ route('add_details') }}">
                                  <span style="font-size:1.0em; " class="glyphicon glyphicon-plus-sign"></span>
                                </a>

                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}">
                            <label for="size" class="col-md-4 control-label">Size</label>

                            <div class="col-md-6" style="display: flex;">
                                <select id="size" class="form-control" name="size" value="{{ old('size')}}" required>
                                    <option value="" disabled selected>Select Size</option>
                                    @foreach(\App\GemSize::where('shop_id',Auth::user()->shop->id)->where('active',TRUE)->where('deleted',FALSE)->get() as $size)
                                        <option value="{{$size->id}}">{{$size->size}}</option>
                                    @endforeach
                                </select>
                                &nbsp;
                                <a href="{{ route('add_details') }}">
                                  <span style="font-size:1.0em; " class="glyphicon glyphicon-plus-sign"></span>
                                </a>

                                @if ($errors->has('size'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('size') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control" name="price" value="{{ old('price') }}" required autofocus>

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image" class="col-md-4 control-label">Image</label>

                            <div class="btn">
                                <input type="file" id="image" name="image" class="validate">

                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="panel-footer">
                            <div class="form-group" >
                                <div class="col-md-4 col-md-offset-8" style="float: right;">
                                    <button type="submit" class="btn btn-primary">
                                        Advertise
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
