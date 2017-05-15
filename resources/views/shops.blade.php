<!DOCTYPE html>   
<html lang="en">   
@include('layouts/datatableheader')
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
          <div> Contact Info :  {{$user->email}}<br>  
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; {{$user->tel}}<br>
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
