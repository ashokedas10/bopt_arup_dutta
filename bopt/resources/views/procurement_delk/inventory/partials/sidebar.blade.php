<!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"><img src="{{ asset('images/dashboard-icon.png') }}" alt="" />Dashboard </a>
                    </li>
                    <!--<li class="menu-title">UI elements</li>--><!-- /.menu-title -->
					
					
					
					
				<li class="menu-item-has-children dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{ asset('images/daily-att.png') }}" alt="" />Issue Register</a>
					<ul class="sub-menu children dropdown-menu">
						<li><a href="{{ url('procurement/inventory/issue-register-component') }}"><img src="{{ asset('images/daily-att.png') }}" alt="" /> For Component</a></li>
						<li><a href="{{ url('procurement/inventory/issue-register-item') }}"><img src="{{ asset('images/daily-att.png') }}" alt="" /> For Item</a></li>
					</ul>
				</li>
				<li class="menu-item-has-children dropdown"><a href="room-config.php" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{ asset('images/daily-att.png') }}" alt="" />Recieve Item</a>
					<ul class="sub-menu children dropdown-menu">
						<li><a href="{{ url('procurement/inventory/receive-component') }}"><img src="{{ asset('images/daily-att.png') }}" alt="" /> For Component</a></li>
						<li><a href="{{ url('procurement/inventory/receive-item') }}"><img src="{{ asset('images/daily-att.png') }}" alt="" /> For Item</a></li>
					</ul>
				</li>	
					
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->