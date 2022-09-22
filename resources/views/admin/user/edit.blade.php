@extends('admin.layouts.master')
@section('content')
<div class="container">
  <h2>Edit Information</h2>

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
  <form method="POST">
    {{@csrf_field()}}
    <div class="form-group">
      <label for="name">User Name:</label>
      <input type="text" class="form-control" name="name" id="name"  value="{{$user->name}}">
    </div>
    <div class="form-group">
      <label for="email">Email Name:</label>
      <input type="email" class="form-control" name="email" id="email"  value="{{$user->email}}">
    </div>

    

      
<div class="form-group">
      <input type="hidden" name="permission_id" value="{{$user->id}}">
    <input type="submit" class="btn btn-default" value="Update" name="update">
    </div>
  
    
    
  </form>
</div>

@endsection