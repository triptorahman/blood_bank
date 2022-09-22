@extends('admin.layouts.master')
@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<div class="container">
  <h2>Delete Permission</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
  <form method="POST" id="form">
    {{@csrf_field()}}
    <div class="form-group">
      <label for="user_name">User Name:</label>
      <input type="text" class="form-control" readonly="" value="{{$user->name}}">
    </div>
    <div class="form-group">
      <label for="user_name">Email Name:</label>
      <input type="text" class="form-control" readonly="" value="{{$user->email}}">
    </div>
    
<div class="form-group">     
  
    <select id="choices-multiple-remove-button" name="delete_permission" placeholder="Select Permission" multiple>

      @if(!empty($user->getAllPermissions()))
        
        @foreach($user->getAllPermissions() as $permission)
        <option value="{{$permission->id}}">{{$permission->name}}</option>

        @endforeach
      @endif
            
    </select> 
</div>
      
<div class="form-group">
      <input type="hidden" name="permission_id" id="permission_id">
    <input type="submit" class="btn btn-default" value="Delete" name="Delete">
    </div>
  
    
    
  </form>
</div>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
<script>
  $(document).ready(function(){

var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
removeItemButton: true,
maxItemCount:5,
searchResultLimit:5,
renderChoiceLimit:5
});
});

$( "form" ).submit(function() {
  var permission_id=$("#choices-multiple-remove-button").val();
  $("#permission_id").val(permission_id);
  

});
  

</script>

@endsection