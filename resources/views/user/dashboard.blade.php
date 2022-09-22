@extends('user.layouts.master')
@section('content')
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                  
    
                    <div class="page-title">
                        <h1>User Dashboard</h1>
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

           <?php if(auth()->user()->status==2){ ?>

                <h1 style="color: red">Your Status is Pending. Please Wait For Admin Approval.</h1>

           <?php }else if(auth()->user()->status==3){ ?>

            <h1 style="color: red">Your Are Blocked by Admin.</h1>

           <?php } ?>
            

           
               
        </div>
            <!--/.col-->

            
            <!--/.col-->

            
            <!--/.col-->

            
            <!--/.col-->

            


            


            


           

            

           

@endsection