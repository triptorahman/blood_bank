@extends('user.layouts.master')
@section('content')
<div class="container">
<?php //dd('hello'); ?>
  <h2>User Information</h2>

  

@if(Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
  
<form method="POST" enctype="multipart/form-data">
    {{@csrf_field()}}  
   
    <div class="form-group">
      <label for="name">Change Name:</label>
      <input type="text" class="form-control" name="name" id="name"  value="{{$info->name}}">
    </div>
    <div class="form-group">
      <label for="name">Change Phone No:</label>
      <input type="text" class="form-control" name="phone_number" id="phone_number"  value="{{$info->phone_number}}">
    </div>
    <div class="form-group">
        
        <input type="submit" class="btn btn-secondary" value="Update" name="Update">
    </div>
    
    </form>
    
    
  
</div>

@endsection