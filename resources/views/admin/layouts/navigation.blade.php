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
                        <a href="{{route('admin.index')}}"> <i class="menu-icon fa fa-cubes"></i>Admin Dashboard </a>
                    </li>
                    
                   
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>User Management</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list-ul"></i><a href="{{route('admin-usermanagement.list')}}">User List</a></li>
                            {{-- <li><i class="fa fa-table"></i><a href="">Change Password</a></li> --}}
                        </ul>
                    </li>

                    
                  

                  
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-medkit"></i>Blood Request History</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-calendar"></i><a href="{{route('post.list')}}">Total Request</a></li>
                            <li><i class="fa fa-calendar-check-o"></i><a href="{{route('today-post.list')}}">Today's Request</a></li>
                            
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tint"></i>Blood Donate History</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-calendar"></i><a href="{{route('donate.list')}}">Total Donate</a></li>
                            <li><i class="fa fa-calendar-check-o"></i><a href="{{route('today-donate.list')}}">Today's Donate</a></li>
                            
                        </ul>
                    </li>
                   
                   
                    
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->