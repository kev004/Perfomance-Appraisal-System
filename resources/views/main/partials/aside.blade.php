<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar"> 
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li id="dashboard" class="header">Main Navigation</li>
        <li>
          <a href="{{ url('/dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
          </a> 
        </li>
 
       

        @if(Auth::user()->hasRole('administrator') || Auth::user()->hasRole('manager'))
          <li id="employees" class="treeview">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>Staff</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ url('/employees/view/')}}">View Staff</a></li> 
              <li><a href="{{ url('/employee/create/')}}">Create New Staff</a></li>
            </ul>
          </li>
        @endif

        @if(Auth::user()->hasRole('administrator'))
          <li id="branchs" class="treeview">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>Branches</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ url('/branch/view/')}}">View Branches</a></li> 
              <li><a href="{{ url('/branch/create/')}}">Create Branches</a></li>
            </ul>
          </li>
        @endif

         @if(Auth::user()->hasRole('administrator'))
          <li id="departments" class="treeview">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>Departments</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ url('/departments/view/')}}">View Departments</a></li> 
              <li><a href="{{ url('/department/create/')}}">Create Department</a></li>
            </ul>
          </li>
        @endif

        
          <li id="attendances" class="treeview">
            <a href="#">
              <i class="fa fa-folder"></i>
              <span>Attendances</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a> 
            <ul class="treeview-menu"> 
              <li><a href="{{ url('/attendance/create') }}">Check In/Check Out</a></li>  
              <li><a href="{{ url('/attendances/view') }}">My Attendances</a></li>  
              @if(Auth::user()->hasRole('administrator') || Auth::user()->hasRole('manager'))
                <li><a href="{{ url('/attendances/all') }}">View All Attendances</a></li> 
              @endif

            </ul>
          </li>  

          <li id="leave" class="treeview">
            <a href="#">
              <i class="fa fa-folder"></i>
              <span>Leave</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a> 
            <ul class="treeview-menu"> 
              <li><a href="{{ url('/leave/request') }}">Request a Leave</a></li>  
              <li><a href="{{ url('/leaves/view') }}">My Past Requests</a></li>  
              @if(Auth::user()->hasRole('administrator') || Auth::user()->hasRole('manager'))
                <li><a href="{{ url('/leaves/all') }}">View All Leave Requests</a></li> 
              @endif

            </ul>
          </li>

        @if(Auth::user()->hasRole('administrator') || Auth::user()->hasRole('manager'))
          <li id="appraisal" class="treeview">
            <a href="#">
              <i class="fa fa-folder"></i>
              <span>Performance Appraisals</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ url('/performanceappraisals/view') }}">View All Appraisals</a></li>

              @if(Auth::user()->hasRole('manager') && !Auth::user()->hasRole('administrator'))
                <li><a href="{{ url('/performanceappraisal/create') }}">Create New Appraisal</a></li> 
              @endif

            </ul>
          </li> 
        @endif

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>