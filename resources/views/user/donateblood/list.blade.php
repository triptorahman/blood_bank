
@extends('user.layouts.master')
@section('content')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Available Blood Request</h1>
                    </div>
                </div>
            </div>
           
            

        </div>
        @if(Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <th>SL</th>
                        <th>User Name</th>
                        <th>Requested Blood Group</th>
                        <th>Purpose</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                       @foreach ($history as $row)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->user->name}}</td>
                            <td>{{$row->bloodGroup->group_name}}</td>
                            <td>{{$row->purpose}}</td>
                            <td>{{$row->user->phone_number}}</td>
                            @if($donar_all_running_request_processing_count > 0)
                            <td>
                                
                                <a href="{{route('donate.history')}}"><i class="fas fa fa-check"></i> Already a Request (In Progress) .Check History</a>
                                
                                

                            </td>
                            @else

                            
                                
                                
                            <td>
                            
                                <a href="{{route('donate.process', $row['id'])}}"><i class="fas fa fa-tint"></i> Donate</a>
                                
                                

                            </td>
                                
                                



                            @endif
                           
                       </tr>
                        @endforeach
          
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
@endsection