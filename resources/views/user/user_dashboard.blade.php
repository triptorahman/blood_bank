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
                                            <a class="dropdown-item" href="{{route('bloodneed.create')}}">Request Blood</a>
                                            
                                        </div>
                                    </div>
                                </div>
                                <h4 class="mb-0">
                                    <span class="count">{{$request_history_count}}</span>
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
                                    <a class="dropdown-item" href="{{route('bloodneed.history')}}">See History</a>
                                    
                                </div>
                            </div>
                        </div>
                         
                         <h4 class="mb-0">
                             <span class="count">{{$donate_history_count}}</span>
                         </h4>
                         <p class="text-light">Total Donate</p>
 
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
                                    <a class="dropdown-item" href="{{route('donar.list')}}">View More</a>
                                    
                                </div>
                            </div>
                        </div>
                         
                         <h4 class="mb-0">
                             <span class="count">{{$donar_history_count}}</span>
                         </h4>
                         <p class="text-light">Available Donar</p>
 
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
                                    <a class="dropdown-item" href="{{route('donate.available')}}">Donate Blood</a>
                                    
                                </div>
                            </div>
                        </div>
                         
                         <h4 class="mb-0">
                             <span class="count">{{$emergeny_post_count}}</span>
                         </h4>
                         <p class="text-light">Emergency Post</p>
                         
 
                         <div class="chart-wrapper px-3" style="height:70px;" height="70">
                             
                         </div>
 
                     </div>
                 </div>
             </div>
             <!--/.col-->
 
             <div class="col-lg-3 col-md-6">
                 <div class="social-box facebook">
                     <i >A (+)</i>
                     <ul>
                         <li>
                             <strong><span class="count">{{$country_wise_blood_group_data['A+']}}</span>&nbsp;</strong>
                             <span>Domestic</span>
                         </li>
                         <li>
                             <strong><span class="count">{{$district_wise_blood_group_data['A+']}}</span></strong>
                             <span>District</span>
                         </li>
                     </ul>
                 </div>
                 <!--/social-box-->
             </div><!--/.col-->
 
 
             <div class="col-lg-3 col-md-6">
                 <div class="social-box twitter">
                     <i >B (+)</i>
                     <ul>
                        
                         <li>
                             <strong><span class="count">{{$country_wise_blood_group_data['B+']}}</span>&nbsp;</strong>
                             <span>Domestic</span>
                         </li>
                         <li>
                             <strong><span class="count">{{$district_wise_blood_group_data['B+']}}</span></strong>
                             <span>District</span>
                         </li>
                     </ul>
                 </div>
                 <!--/social-box-->
             </div><!--/.col-->
 
 
             <div class="col-lg-3 col-md-6">
                 <div class="social-box linkedin">
                     <i >O (+)</i>
                     <ul>
                         <li>
                             <strong><span class="count">{{$country_wise_blood_group_data['O+']}}</span>&nbsp;</strong>
                             <span>Domestic</span>
                         </li>
                         <li>
                             <strong><span class="count">{{$district_wise_blood_group_data['O+']}}</span></strong>
                             <span>District</span>
                         </li>
                     </ul>
                 </div>
                 <!--/social-box-->
             </div><!--/.col-->
 
 
             <div class="col-lg-3 col-md-6">
                 <div class="social-box google-plus">
                     <i >AB (+)</i>
                     <ul>
                         <li>
                             <strong><span class="count">{{$country_wise_blood_group_data['AB+']}}</span>&nbsp;</strong>
                             <span>Domestic</span>
                         </li>
                         <li>
                             <strong><span class="count">{{$district_wise_blood_group_data['AB+']}}</span></strong>
                             <span>District</span>
                         </li>
                     </ul>
                 </div>
                 <!--/social-box-->
             </div><!--/.col-->

             <div class="col-lg-3 col-md-6">
                <div class="social-box facebook">
                    <i >A (-)</i>
                    <ul>
                        <li>
                            <strong><span class="count">{{$country_wise_blood_group_data['A-']}}</span>&nbsp;</strong>
                            <span>Domestic</span>
                        </li>
                        <li>
                            <strong><span class="count">{{$district_wise_blood_group_data['A-']}}</span></strong>
                            <span>District</span>
                        </li>
                    </ul>
                </div>
                <!--/social-box-->
            </div><!--/.col-->


            <div class="col-lg-3 col-md-6">
                <div class="social-box twitter">
                    <i >B (-)</i>
                    <ul>
                        <li>
                            <strong><span class="count">{{$country_wise_blood_group_data['B-']}}</span>&nbsp;</strong>
                            <span>Domestic</span>
                        </li>
                        <li>
                            <strong><span class="count">{{$district_wise_blood_group_data['B-']}}</span></strong>
                            <span>District</span>
                        </li>
                    </ul>
                </div>
                <!--/social-box-->
            </div><!--/.col-->


            <div class="col-lg-3 col-md-6">
                <div class="social-box linkedin">
                    <i >O (-)</i>
                    <ul>
                        <li>
                            <strong><span class="count">{{$country_wise_blood_group_data['O-']}}</span>&nbsp;</strong>
                            <span>Domestic</span>
                        </li>
                        <li>
                            <strong><span class="count">{{$district_wise_blood_group_data['O-']}}</span></strong>
                            <span>District</span>
                        </li>
                    </ul>
                </div>
                <!--/social-box-->
            </div><!--/.col-->


            <div class="col-lg-3 col-md-6">
                <div class="social-box google-plus">
                    <i >AB (-)</i>
                    <ul>
                        <li>
                            <strong><span class="count">{{$country_wise_blood_group_data['AB-']}}</span>&nbsp;</strong>
                            <span>Domestic</span>
                        </li>
                        <li>
                            <strong><span class="count">{{$district_wise_blood_group_data['AB-']}}</span></strong>
                            <span>District</span>
                        </li>
                    </ul>
                </div>
                <!--/social-box-->
            </div><!--/.col-->
        
        </div> <!-- .content -->
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