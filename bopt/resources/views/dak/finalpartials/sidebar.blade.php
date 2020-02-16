<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
  <nav class="navbar navbar-expand-sm navbar-default">
    <div id="main-menu" class="main-menu collapse navbar-collapse">
      <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ url('dak/fin/dashboard') }}">
                          <img src="{{ asset('images/dashboard-icon.png') }}" alt="" />  Dashboard </a>
                    </li>
                   
                    <li class="menu-item-has-children dropdown">
   <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
    <img src="{{ asset('images/master.png') }}" alt="" />  
  Diary Module
</a>

          <ul class="sub-menu children dropdown-menu">  
              <li><a href="{{ url('dak/dak-final-bill') }}">
                <img src="{{ asset('images/company.png') }}" alt="" /> Recieved Receipts(Bill)</a>
              </li>   
              <li><a href="{{ url('dak/dak-final') }}">
                <img src="{{ asset('images/company.png') }}" alt="" /> Recieved Receipts(Other)</a>
              </li>                       
              <li><a href="{{ url('dak/dak-final-closed') }}">
                <img src="{{ asset('images/company.png') }}" alt="" /> Recieved Receipts(Closed)</a>
              </li>
			  <li><a href="{{ url('dak/dak-final-forward') }}">
                <img src="{{ asset('images/company.png') }}" alt="" /> Receipts(Forward)</a>
              </li>
              
            </ul>
          </li> 
          
  
            </ul>
          </li> 
                            
                </ul>
    </div>
    <!-- /.navbar-collapse -->
  </nav>
</aside>
<!-- /#left-panel -->
