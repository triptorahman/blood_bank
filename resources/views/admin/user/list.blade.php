
@extends('admin.layouts.master')
@section('content')

{{-- {{dd($users)}} --}}

       
        @if(Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Users List</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Blood Group</th>
                        <th>District</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                       @foreach ($users as $single_user)
                        <tr>
                        <td>{{$loop->iteration}}</td>
                          <td>{{$single_user->name}}</td>
                          <td>{{$single_user->email}}</td>
                          <td>{{$single_user->phone_number}}</td>
                          <td>{{$single_user->bloodGroup->group_name}}</td>
                          <td>{{$single_user->district->name}}</td>
                          <td>@php
                          if($single_user->status==1) echo 'Approved';
                          else if($single_user->status==2) echo 'Pending';
                          else echo 'Block/Rejected';
                          @endphp</td>
                          
                        
                        <td><a href="{{route('admin-usermanagement.user-approved', $single_user['id'])}}"><i class="fas fa-check"></i> Approve</a>{!! "&nbsp;&nbsp;&nbsp;" !!}<a href="{{route('admin-usermanagement.user-block', $single_user['id'])}}"><i class="fas fa-ban"></i> Block</a></td>
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