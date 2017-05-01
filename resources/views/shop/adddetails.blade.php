@extends('layouts.app')

@section('styles')

<style type="text/css">
	form {
	    display: inline-block;
	}
	.form-group {
	    text-align: center;
	    padding-bottom: 25px;
	}
	#todo {
	    margin: 0 auto;
	    width: 500px;
	}

	a.close {
	  float: right;
	}
	#types li {
	    border-top: 1px solid #ddd;
	    padding: 10px;
	}
	#types li:nth-of-type(odd) {
	    background-color: #eee;
	}
	.type{
		font-size: 20px;
		border-radius: 10px;
	}

</style>

<script type="text/javascript">

	$(document).ready(function () {
	    $('button').click(function () {
	        $('#types').append("<li class='type'>" + $("input[name=task]").val() + " <a href='#' class='close' aria-hidden='true'>&times;</a></li>");
	    });
	    $("body").on('click', '#todo a', function () {
	        $(this).closest("ul").remove();
	    });
	});

</script>

@endsection

@section('content')

<div class="container">
    <div class="row">
    	<div class = "col-md-6">
	        <div class="col-md-8 col-md-offset-2">
			    <div class="form-group">
			      <h1>Gem <small>Types</small></h1>
			    <form role="form">
			        <input type="text" class="form-control" placeholder="Your Task" name="task">
			    </form>
			    <button type="button" class="btn btn btn-primary">Add</button>
			        </div>
			    <ul class="list-unstyled"  id="types"></ul>
			</div>
			<div style="border-left:thin solid black"></div>
		</div>
		<div class = "col-md-6">
	        <div class="col-md-8 col-md-offset-2">
			    <div class="form-group">
			      <h1>Gem <small>Sizes</small></h1>
			    <form role="form">
			        <input type="text" class="form-control" placeholder="Your Task" name="task">
			    </form>
			    <button type="button" class="btn btn btn-primary">Add</button>
			        </div>
			    <ul class="list-unstyled" id="todo2" ></ul>
			</div>
		</div>
	</div>
</div>




@endsection