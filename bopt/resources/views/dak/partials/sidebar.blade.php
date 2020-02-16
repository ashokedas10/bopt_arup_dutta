<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
  <nav class="navbar navbar-expand-sm navbar-default">
    <div id="main-menu" class="main-menu collapse navbar-collapse">
      <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ url('dak/dashboard') }}">
                          <img src="{{ asset('images/dashboard-icon.png') }}" alt="" />  Dashboard </a>
                    </li>
                   
                    <li class="menu-item-has-children dropdown">
   <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
    <img src="{{ asset('images/master.png') }}" alt="" />  
  Diary Module
</a>

          <ul class="sub-menu children dropdown-menu">  
              <li><a href="{{ url('dak/dak-receipt') }}">
                <img src="{{ asset('images/company.png') }}" alt="" /> Create Receipts</a>
              </li>                          
              <li><a href="{{ url('dak/dak-forward') }}">
                <img src="{{ asset('images/company.png') }}" alt="" /> Forwarding Receipts</a></li>
              
            </ul>
          </li> 
          
          <li class="menu-item-has-children dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
            <img src="{{ asset('images/payroll.png') }}" alt="" /> Status Report</a>
              <ul class="sub-menu children dropdown-menu">                            
              
              <li><a href="{{ url('dak/dairy-view') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" / style="margin-top:8px;"> Diary Register</a></li>
              <li><a href="{{ url('dak/forward-view') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" / style="margin-top:8px;"> Forwarding History</a></li>
			  <li><a href="{{ url('dak/dak-history') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" / style="margin-top:8px;"> DAK History Report</a></li>
			  <li><a href="{{ url('dak/dak-search') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" / style="margin-top:8px;"> DAK Search History</a></li>
            </ul>
          </li> 
                            
                </ul>
    </div>
    <!-- /.navbar-collapse -->
  </nav>
</aside>
<!-- /#left-panel -->
