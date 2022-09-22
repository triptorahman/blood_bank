
@extends('admin.layouts.master')
@section('content')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Blood Donate History</h1>
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
                        <th>Donar Name</th>
                        <th>Date</th>
                        <th>Blood Group</th>
                        
                        
                        
                    </thead>
                    <tbody>
                       @foreach ($donate_list as $row)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->donar->name}}</td>
                            <td>{{$row->donate_date}}</td>
                            <td>{{$blood_group[$row->donar->blood_group]}}</td>
                              
                              
                              

                            
                           
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