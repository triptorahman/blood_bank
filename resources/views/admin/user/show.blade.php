@extends('admin.layouts.master')
@section('content')
<div class="container">
  <h2>User Information</h2>

  

@if(Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
  
    
    <div class="form-group">
      <label for="name">User Name:</label>
      <input type="text" class="form-control" name="name" id="name" readonly=""  value="{{$user->name}}">
    </div>
    <div class="form-group">
      <label for="email">Email Name:</label>
      <input type="email" class="form-control" name="email" id="email" readonly="" value="{{$user->email}}">
    </div>
    
  
</div>

@endsection