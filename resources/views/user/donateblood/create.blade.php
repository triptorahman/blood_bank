@extends('user.layouts.master')
@section('content')

<div class="container">
  <h2>Need Blood</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif


  <form method="POST" enctype="multipart/form-data">
    {{@csrf_field()}}
    <div class="form-group">
      <label for="Blood Group">Select Blood Group:</label>
      <select class="form-control" aria-label="blood_group" name="blood_group">
        <option selected value="">Select Your Blood Group</option>
        @foreach($blood_group as $row)
        
        <option value="{{$row->id}}">{{$row->group_name}}</option>

        @endforeach

      </select>
    </div>

    <div class="form-group">
      <label for="Date">Date:</label>
      <input type="date" class="form-control" name="date" id="date" placeholder="Select Date">
    </div>

    <div class="form-group">
      <label for="Purpose">Purpose:</label>
      <textarea class="form-control" id="purpose" name="purpose"></textarea>
    </div>

    <div class="form-group">
        
        <input type="submit" class="btn btn-secondary" value="Post" name="Add">
    </div>

  </form>

</div>



@endsection