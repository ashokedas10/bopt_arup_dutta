
 
 <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ url('sms/admission/dashboard') }}"><img src="{{ asset('images/dashboard-icon.png') }}" alt="" />Dashboard </a>
                    </li>
                    <!--<li class="menu-title">UI elements</li>--><!-- /.menu-title -->
					
					<li class="menu-item-has-children dropdown"><a href="room-config.php" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{ asset('images/branch.png') }}" alt="" />Batch Master</a>
					
			<ul class="sub-menu children dropdown-menu">
            <li><a href="{{ url('sms/admission/batch') }}"><img src="{{ asset('images/branch.png') }}" alt="" /> Create Batch</a></li>
            <li><a href="{{ url('sms/admission/batch-config') }}"><img src="{{ asset('images/branch.png') }}" alt="" /> Batch Configuration</a></li>
          </ul>
					</li>
					
					<li class="menu-item-has-children dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="{{ asset('images/login-logout.png') }}" alt="" /> Admission Master</a>
						<ul class="sub-menu children dropdown-menu">
					<li><a href="{{ url('sms/admission/vw-admission') }}"><img src="{{ asset('images/login-logout.png') }}" alt="" /> Admission</a></li>
          </ul>
					</li>
					
					
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
	
	