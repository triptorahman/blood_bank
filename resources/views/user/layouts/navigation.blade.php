    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    
                    <li class="active">
                        <a href="{{route('user.index')}}"> <i class="menu-icon fa fa-cubes"></i>Dashboard </a>
                    </li>
                    
                    {{-- if you are not blocked --}}
                <?php if(auth()->user()->status!=3){ ?> 
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-medkit"></i>Profile</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-info-circle"></i><a href="{{route('user.profile', auth()->user()->id)}}">User Information</a></li>
                            <li><i class="fa fa-info-circle"></i><a href="{{route('userChange.profile', auth()->user()->id)}}">Change Information</a></li>
                            {{-- <li><i class="fa fa-table"></i><a href="">Change Password</a></li> --}}
                        </ul>
                    </li>

                <?php } 
                
                if(auth()->user()->status==1){ ?>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-medkit"></i>Need Blood</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i><a href="{{route('bloodneed.create')}}">Make a Request</a></li>
                            <li><i class="fa fa-list-ol"></i><a href="{{route('bloodneed.history')}}">My Total Request</a></li>
                            {{-- <li><i class="fa fa-table"></i><a href="">Change Password</a></li> --}}
                        </ul>
                    </li>

                    

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-medkit"></i>Donar's List</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-address-card"></i><a href="{{route('donar.list')}}">Available Donar</a></li>
                            
                            
                        </ul>
                    </li>


                <?php } ?>
                  

                  
                   
                   
                   
                    
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->