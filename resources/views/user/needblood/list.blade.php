
@extends('user.layouts.master')
@section('content')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>My Total Request History</h1>
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
                        <th>Blood Group</th>
                        <th>Date</th>
                        <th>Purpose</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                       @foreach ($history as $row)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                              <td>{{$row->bloodGroup->group_name}}</td>
                              <td>{{$row->date}}</td>
                              
                              <td>{{$row->purpose}}</td>
                              <td>
                                @if($row->status==1)
                                    <div class="alert alert-success">Received</div>

                                @elseif($row->status==3)
                                    <div class="alert alert-info">Respond</div>
                                @else
                                    <div class="alert alert-warning">Pending</div>

                                @endif

                              </td>

                            <td>
                                @if($row->status==2)
                                <a href="{{route('bloodneed.edit', $row['id'])}}"><i class="fas fa-edit"></i> Edit</a>{!! "&nbsp;&nbsp;" !!}
                                <a href="{{route('bloodneed.delete', $row['id'])}}"><i class="fas fa-trash"></i> Delete</a>
                               
                                @endif
                                
                                

                            </td>
                           
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