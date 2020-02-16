<!-- Left Panel -->
<style>
.nav.navbar-nav li a {background: url('images/icon-list.png') no-repeat;}
</style>
<aside id="left-panel" class="left-panel">
  <nav class="navbar navbar-expand-sm navbar-default">
    <div id="main-menu" class="main-menu collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active dashboard"><a href="{{ url('hr/dashboard') }}"><img src="{{ asset('images/dashboard-icon.png') }}" alt="" /> Dashboard</a></li>
        <li class="menu-item-has-children dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('images/leave-icon.png') }}" alt="" /> Job Master</a>
          <ul class="sub-menu children dropdown-menu">
            <li><a href="{{ url('hr/vw-job') }}"><img src="{{ asset('images/mng-leave.png') }}" alt="" /> Job</a></li>
            <li><a href="{{ url('hr/vw-job-description') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" /> Job Description</a></li>
            <li><a href="{{ url('hr/vw-job-requisition') }}"><img src="{{ asset('images/lv-allo.png') }}" alt="" /> Job Requisition</a></li>
          </ul>
        </li>
		<li class="menu-item-has-children dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{ asset('images/time-sheet.png') }}" alt="" /> Job Application</a>
          <ul class="sub-menu children dropdown-menu">
            <li><a href="{{ url('hr/vw-job-application') }}"><img src="{{ asset('images/view.png') }}" alt="" / style="margin-top:10px;"> View</a></li>
          </ul>
        </li>
		<li class="menu-item-has-children dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{ asset('images/leave-mng.png') }}" alt="" /> Schedule Interview</a>
          <ul class="sub-menu children dropdown-menu">
			<li><a href="{{ url('hr/tagg-interviewer') }}"><img src="{{ asset('images/view.png') }}" alt="" / style="margin-top:10px;"> Tagg Interviewer</a></li>
          </ul>
        </li>
		<li class="menu-item-has-children dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{ asset('images/leave-mng.png') }}" alt="" />Interviewer Remarks</a>
          <ul class="sub-menu children dropdown-menu">
			<li><a href="{{ url('hr/view_interviewer_remarks') }}"><img src="{{ asset('images/view.png') }}" alt="" / style="margin-top:10px;">Remarks</a></li>
          </ul>
        </li>
		
        <!--<li class="menu-item-has-children dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="images/time-sheet.png" alt="" /> Time Sheet Management</a>
          <ul class="sub-menu children dropdown-menu">
            <li><a href="shift-time.php"><img src="images/time-sht-mng.png" alt="" /> Shift Management</a></li>
            <li><a href="employee-offday.php"><img src="images/comp-off.png" alt="" /> Offday</a></li>
            <li><a href="branch-grace-period.php"><img src="images/grace.png" alt="" /> Grace Period</a></li>
            <li><a href="employee-duty-roaster.php"><img src="images/roster.png" alt="" /> Duty Roster</a></li>
          </ul>
        </li>-->
		
		<!--<li class="menu-item-has-children dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="images/holiday.png" alt=""/> Holiday Management</a>
          <ul class="sub-menu children dropdown-menu">
            <li><a href="companywise-holiday.php"><img src="images/holi-list.png" alt="" /> Holiday List</a></li>
            <li><a href="view-companywise-holiday.php"><img src="images/company.png" alt="" /> View Company Wise</a></li>
            <li><a href="view-gradewise-holiday.php"><img src="images/grade.png" alt="" /> View Grade Wise</a></li>
          </ul>
        </li>-->
		
		<!--<li class="menu-item-has-children dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="images/allowance.png" alt="" /> Allowance Management</a>
          <ul class="sub-menu children dropdown-menu">
            <li><i class="fa fa-check"></i> <a href="#">Branch Wise</a></li>
            <li><i class="fa fa-check"></i> <a href="#">Extra Class</a></li>
          </ul>
        </li>-->
		
	<!--<li class="menu-item-has-children dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="images/attendence.png" alt="" /> Attendence Management</a>
          <ul class="sub-menu children dropdown-menu">
            <li><a href="upload-data.php"><img src="images/upload.png" alt="" /> Upload</a></li>
            <li><a href="daily-attendence.php"><img src="images/daily-att.png" alt="" /> Daily Attendence Sheet</a></li>
          </ul>
        </li>-->
        <!--<li class="menu-title">UI elements</li>-->
        <!-- /.menu-title -->
        <!--<li class="menu-item-has-children dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Admin Access Module</a>
          <ul class="sub-menu children dropdown-menu">
            <li><i class="fa fa-bars"></i><a href="companywise-gradewise-leave.php">Company Wise Grade Wise Leave Rule</a></li>
            <li><i class="fa fa-bars"></i><a href="companywise-holiday.php">Company wise Holiday List</a></li>
            <li><i class="fa fa-bars"></i><a href="employee-offday.php">Employee Wise Off Day</a></li>
            <li><i class="fa fa-bars"></i><a href="upload-data.php">Mass Upload/Download Data</a></li>
            <li><i class="fa fa-bars"></i><a href="daily-attendence.php">Daily Attendance Sheet Maintenance</a></li>
            <li><i class="fa fa-bars"></i><a href="shift-time.php">Shift Timing Maintenance</a></li>
            <li><i class="fa fa-bars"></i><a href="employee-duty-roaster.php">Employee Duty Roaster</a></li>
            <li><i class="fa fa-bars"></i><a href="employee-hierarchy.php">Employee Hierarchy Maintanence</a></li>
            <li><i class="fa fa-bars"></i><a href="#">Monthly Payroll Time Card</a></li>
            <li><i class="fa fa-bars"></i><a href="branch-grace-period.php">Branch Grace Period</a></li>
            <li><i class="fa fa-bars"></i><a href="leave-balance.php">Leave Balance</a></li>
          </ul>
        </li>-->
        <!--<li class="menu-item-has-children dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Report Module</a>
          <ul class="sub-menu children dropdown-menu">
            <li><i class="fa fa-bars"></i><a href="#">Leave Register Grade Wise</a></li>
            <li><i class="fa fa-bars"></i><a href="#">Attendance Sheet Grade Wise</a></li>
            <li><i class="fa fa-bars"></i><a href="#">Date Wise Attendance Report</a></li>
            <li><i class="fa fa-bars"></i><a href="#">Absenteeism Report</a></li>
            <li><i class="fa fa-bars"></i><a href="#">Branch Allowance Detail Report</a></li>
            <li><i class="fa fa-bars"></i><a href="#">Leave Register Month Wise</a></li>
            <li><i class="fa fa-bars"></i><a href="#">Extra Class Allowance Details</a></li>
          </ul>
        </li>-->
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </nav>
</aside>
<!-- /#left-panel -->
