<!DOCTYPE html>   
<html lang="en">   
<head>   
  <meta charset="utf-8">   
  <title>Gem Portal</title>   
  <meta name="description" content="Creating a Employee table with Twitter Bootstrap. Learn with example of a Employee Table with Twitter Bootstrap.">  
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
  <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
  @include('layouts/navbar')
  <div class="container">
  <div class="row header">
    <h1 align="center"> <b>Visit Shops</b></h1>
  </div>
  <table id="myTable" class="table table-striped" >  
    <thead>  
      <tr>
        <th style="display: none;">Name</th>  
      </tr>  
    </thead>  
    <tbody>
      @foreach(App\User::where('role','shop')->where('active',TRUE)->get() as $user)  
      <tr> 
        <td><h3><b><a href="{{route('visit_shop',['id' => $user->shop->id])}}">{{$user->name}}</a></b></h3>
          @if($user->id == Auth::user()->id)
          <a href="{{route('update')}}">[Edit]</a><br>
          @endif
          <b>{{$user->address}}</b><br>  
          <div> Contact Info : T.P. {{$user->tel}}<br>  
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;E-mail: {{$user->email}}<br>
          </div>
        </td> 
      </tr>
      @endforeach
    </tbody>  
  </table>  
</div>
</body>  
<script>
  $(document).ready(function(){
    $('#myTable').dataTable();
  });
</script>
</html>  
