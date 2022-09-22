@extends('user.layouts.master')
@section('content')

<div class="container">
  <h2>Response to Blood Donar</h2>
  <hr>

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
      <label for="blood_group">Blood Group:</label>
      <input type="text" class="form-control" name="blood_group" id="blood_group" value="{{$post->bloodGroup->group_name}}" readonly>
    </div>
      

    <div class="form-group">
      <label for="Date">Date:</label>
      <input type="date" class="form-control" name="date" id="date" value="{{$post->date}}" readonly>
    </div>

    <div class="form-group">
      <label for="Purpose">Purpose:</label>
      <textarea class="form-control" id="purpose" name="purpose" readonly>{{$post->purpose}}</textarea>
    </div>
    @if($post->status==3)
    <hr> 
      <h1>Donar Information</h1>
    <hr> 

    <div class="form-group">
      <label for="blood_group">Donar's Name:</label>
      <input type="text" class="form-control" name="blood_group" id="blood_group" value="{{$post->donar->name}}" readonly>
    </div>

    <div class="form-group">
      <label for="blood_group">Donar's Phone Number:</label>
      <input type="text" class="form-control" name="blood_group" id="blood_group" value="{{$post->donar->phone_number}}" readonly>
    </div>

    <div class="form-group">
      <label for="blood_group">Donar's District:</label>
      <input type="text" class="form-control" name="blood_group" id="blood_group" value="{{$district[$post->donar->district_id]}}" readonly>
    </div>

    <div class="form-group">
      <label for="blood_group">Donar's Address:</label>
      <input type="text" class="form-control" name="blood_group" id="blood_group" value="{{$post->donar->address}}" readonly>
    </div>

    <div class="form-group">
      <label for="comment">Comment:</label>
      <textarea class="form-control" id="comment" name="comment" readonly >{{$post->comment}}</textarea>
    </div>


  <div class="form-group">
      <input type="hidden" name="reciver_id" value="{{$post->user_id}}">
      <input type="hidden" name="donar_id" value="{{$post->donator_id}}">
      <input type="hidden" name="blood_donate_date" value="{{$post->date}}">
       <?php if($post->status==3){ ?>
      <input type="submit" class="btn btn-secondary" value="Receive" name="Receive">
      <?php } ?>
  </div>
  @endif
  </form>


</div>



@endsection