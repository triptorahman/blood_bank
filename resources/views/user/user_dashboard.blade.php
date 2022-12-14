@extends('user.layouts.master')
@section('content')
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                  
    
                    <div class="page-title">
                        <h1>Hi, <b>{{$currentuser->name}}<b></h1>
                        <p class="alert alert-primary" role="alert">Welcome to Blood Management Dashboard</p>
                    </div>
                   
                    
                    
                    
                </div>
            </div>
            
        </div>

        @if(auth()->user()->status==1)

        <div class="alert alert-sucess" role="alert">
            <h1>Your Account Status is Active.</h1>
        </div>

        
        @elseif(auth()->user()->status==2)
        <div class="content mt-3">
            <div class="alert alert-warning" role="alert">
                <h1>Your Account Status is Pending. Please Wait for Admin Approval.</h1>
            </div>
        </div>
        @else
        
        <div class="content mt-3">
            
            <div class="alert alert-danger" role="alert">
                <h1>Your Account Status is Blocked. Please Contact with Admin</h1>
            </div>
        </div>
        @endif
             
 
       
 

            
@endsection