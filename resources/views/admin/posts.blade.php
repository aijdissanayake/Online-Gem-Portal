<!DOCTYPE html>   
<html lang="en">
@include('layouts/datatableheader')
@include('layouts/navbar')
<body>
  <div class="container">
    <h2><b>All Posts</b></h2>
    <div class="row header">
      <h3 id="user_type"></h3>
    </div>
    <table id="myTable" class="table table-striped" >  
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
        @foreach(App\Post::all() as $post)  
        <tr>  
          <td>{{$post->id}}</td>
          <td>{{$post->title}}</td>  
          <td>{{$post->created_at}}</td>
          <td>{{$post->buyer?"Yes":"No"}}</td>
          <td>{{$post->shop?"Yes":"No"}}</td>
          <td>{{$post->deleted?"Inactive":"Active"}}<a href="{{route('de_activate_post', ['id' => $post->id])}}">[change]</a></td> 
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
