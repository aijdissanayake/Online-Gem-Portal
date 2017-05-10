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
@include('layouts/navbar')
<div class="container">
<div style="display: inline;">
  <label style=" background-color: #C0C0C0">
    <span> {{count(App\User::where('role','shop')->get())}}</span>
    <a href="{{route('all_shops')}}">  Shops </a> 
  </label> |
  <label>
    <a href="{{route('all_buyers')}}"> Buyers </a>
    <span> {{count(App\User::where('role','buyer')->get())}}</span>
  </label>
</div>
<div class="row header">
<h3 id="user_type"></h3>
</div>
<table id="myTable" class="table table-striped" >  
        <thead>  
          <tr>  
            <th>ID</th>  
            <th>Name</th>  
            <th>Telephone</th>  
            <th>E-mail</th>
            <th>In/Activate</th>   
          </tr>  
        </thead>  
        <tbody>
        @foreach(App\User::where('role','shop')->get() as $user)  
          <tr>  
            <td>{{$user->id}}</td>  
            <td>{{$user->name}}</td>  
            <td>{{$user->tel}}</td>  
            <td>{{$user->email}}</td>
            <td>{{$user->active==1?"Active":"Inactive"}}<a href="{{route('de_activate', ['id' => $user->id])}}">[change]</a></td> 
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
