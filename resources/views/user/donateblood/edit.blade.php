@extends('user.layouts.master')
@section('content')

<div class="container">
  <h2>Donate Blood</h2>

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
    <?php if($today >= $next_donate_date_final){ ?>
    <div class="form-group">
      <label for="comment">Comment:</label>
      <textarea class="form-control" id="comment" name="comment" ></textarea>
    </div>


  <div class="form-group">
       
      <input type="submit" class="btn btn-secondary" value="Response" name="Response">
  </div>
  <?php }else{ ?>
    <div class="alert alert-info">
      <p>You are not available to Donate Blood. You are available on {{$next_donate_date_final}} again.</p>
    </div>

    <?php } ?>


  </form>

</div>



@endsection