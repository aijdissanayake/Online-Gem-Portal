<!DOCTYPE html>   
<html lang="en">
@include('layouts/datatableheader')
@include('layouts/navbar')
<body>
  <div class="container">
    <!-- <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-primary active">
        <input type="radio" name="shops" id="shops" autocomplete="off" checked> Shops
      </label>
      <label class="btn btn-primary">
        <input type="radio" name="buyers" id="buyers" autocomplete="off"> Buyers
      </label>
    </div> -->
    <h2><b>All Advertisements</b></h2>
    <div class="row header">
      <h3 id="user_type"></h3>
    </div>
    <table id="myTable" class="table table-striped" >  
      <thead>  
        <tr>  
          <th>ID</th>  
          <th>Image</th>  
          <th>Description</th>  
          <th>Type</th>
          <th>Size</th>
          <th>Shop</th>
          <th>In/Activate</th>   
        </tr>  
      </thead>  
      <tbody>
        @foreach(App\Gemstone::all() as $gemstone)  
        <tr>  
          <td>{{$gemstone->id}}</td>  
          <td><img alt="Gem Stone Pic" src="{{route('get_image',['id' => $gemstone->id])}} " class="img-circle img-responsive"></td>  
          <td>{{$gemstone->description}}</td>  
          <td>{{$gemstone->type->type}}</td>
          <td>{{$gemstone->size->size}}</td>
          <td>{{$gemstone->shop->user->name}}</td>
          <td>{{$gemstone->active==1?"Active":"Inactive"}}<a href="{{route('de_activate_gem_stone', ['id' => $gemstone->id])}}">[change]</a></td> 
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
