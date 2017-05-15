 @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('message'))
  <div class="" style="background-color: green;">
      <ul>
          <li>{{Session::get('message')}}</li>
      </ul>
  </div>
@endif