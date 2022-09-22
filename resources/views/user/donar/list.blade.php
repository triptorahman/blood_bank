
@extends('user.layouts.master')
@section('content')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Available Donar</h1>
                    </div>
                </div>
            </div>
           
            

        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <form method="POST" enctype="multipart/form-data">
                        {{@csrf_field()}}
                        <div class="form-group">
                          <label for="Blood Group">Select Blood Group:</label>
                          <select class="form-control" aria-label="blood_group" name="blood_group">
                                <option selected value="">Select Your Blood Group</option>
                            @foreach($blood_group as $row)
                            
                                <option value="{{$row->id}}">{{$row->group_name}}</option>
                    
                            @endforeach
                    
                          </select>
                        </div>

                        <div class="form-group">
                            <label for="District">Select District:</label>
                            <select class="form-control" aria-label="district_id" name="district_id">
                                <option selected value="">Select District</option>
                              @foreach($district as $row)
                              
                                <option value="{{$row->id}}">{{$row->name}}</option>
                      
                              @endforeach
                      
                            </select>
                        </div>
                    
                       
                    
                        
                    
                        <div class="form-group">
                            
                            <input type="submit" class="btn btn-secondary" value="Filter" name="Filter">
                        </div>
                    
                      </form>
                    
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        
        <?php if(isset($donar_list)){ ?>
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
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Blood Group</th>
                        <th>District</th>
                        <th>Address</th>
                    
                    </thead>
                    <tbody>
                       @foreach ($donar_list as $row)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                              
                              <td>{{$row->name}}</td>
                              <td>{{$row->email}}</td>
                              <td>{{$row->phone_number}}</td>
                              <td>{{$row->bloodGroup->group_name}}</td>
                              
                              <td>{{$row->district->name}}</td>
                              <td>{{$row->address}}</td>

                            
                           
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
        <?php } ?>
@endsection