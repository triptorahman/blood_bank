@extends('admin.layouts.master')
@section('content')
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                  
    
                    <div class="page-title">
                        <h1>Admin Dashboard</h1>
                    </div>
                   
                    
                    
                    
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        

        <div class="content mt-3">


            <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-flat-color-1">
                            <div class="card-body pb-0">
                                <div class="dropdown float-right">
                                    <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                        <i class="fa fa-hand-o-right"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="dropdown-menu-content">
                                            <a class="dropdown-item" href="{{route('post.list')}}">View Details</a>
                                            
                                        </div>
                                    </div>
                                </div>
                                <h4 class="mb-0">
                                    <span class="count">{{$post_list_count}}</span>
                                </h4>
                                <p class="text-light">Total Request</p>
        
                                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                                    
                                </div>
        
                            </div>
    
                    </div>
             </div>
             <!--/.col-->
 
             <div class="col-sm-6 col-lg-3">
                 <div class="card text-white bg-flat-color-2">
                     <div class="card-body pb-0">

                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                <i class="fa fa-hand-o-right"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="{{route('today-post.list')}}">View Details</a>
                                    
                                </div>
                            </div>
                        </div>
                         
                         <h4 class="mb-0">
                             <span class="count">{{$today_post_list_count}}</span>
                         </h4>
                         <p class="text-light">Today's Request</p>
 
                         <div class="chart-wrapper px-0" style="height:70px;" height="70">
                             
                         </div>
 
                     </div>
                 </div>
             </div>
             <!--/.col-->
 
             <div class="col-sm-6 col-lg-3">
                 <div class="card text-white bg-flat-color-3">
                     <div class="card-body pb-0">

                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                <i class="fa fa-hand-o-right"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="{{route('donate.list')}}">View More</a>
                                    
                                </div>
                            </div>
                        </div>
                         
                         <h4 class="mb-0">
                             <span class="count">{{$donate_list_count}}</span>
                         </h4>
                         <p class="text-light">Total Blood Donate</p>
 
                     </div>
 
                         <div class="chart-wrapper px-0" style="height:70px;" height="70">
                             
                         </div>
                 </div>
             </div>
             <!--/.col-->
 
             <div class="col-sm-6 col-lg-3">
                 <div class="card text-white bg-flat-color-4">
                     <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                <i class="fa fa-hand-o-right"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="{{route('today-donate.list')}}">View More</a>
                                    
                                </div>
                            </div>
                        </div>
                         
                         <h4 class="mb-0">
                             <span class="count"></span>
                         </h4>
                         <p class="text-light">Today Blood Donate</p>
                         
 
                         <div class="chart-wrapper px-3" style="height:70px;" height="70">
                             
                         </div>
 
                     </div>
                 </div>
             </div>
            
 
             
 
 
             
 
 
             
 

        </div> <!-- .content -->

@endsection