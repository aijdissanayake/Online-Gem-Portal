<!DOCTYPE html>   
<html lang="en">

@include('layouts/datatableheader')
@include('layouts/navbar')

<body>
  <div class="container">
    <h2><b>All Users</b></h2>
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
          <th>All Ads</th>
          <th>Active Ads</th>
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
          <td>{{count($user->shop->gemStones)}}</td>
          <td>{{count($user->shop->gemStones->where('active',true))}}</td>
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
