
 
 <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ url('masters/dashboard') }}"><img src="{{ asset('images/dashboard-icon.png') }}" alt="" />Dashboard </a>
                    </li>
                    <!--<li class="menu-title">UI elements</li>--><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{ asset('images/module.png') }}" alt="" /> Master Module</a>
                       <ul class="{{ request()->is('masters/vw-sub-cast') ? 'sub-menu children dropdown-menu show' : 'sub-menu children dropdown-menu' }}">                            
							<li><a href="{{ url('masters/vw-company') }}"><img src="{{ asset('images/company.png') }}" alt="" /> Company</a></li>
<!--							<li><a href="{{ url('masters/vw-branch') }}"><img src="{{ asset('images/branch.png') }}" alt="" /> Branch</a></li>
							<li><a href="{{ url('masters/vw-branch-allocation') }}"><img src="{{ asset('images/branch.png') }}" alt="" > Branch Allocation</a></li>-->
							<li><a href="{{ url('masters/vw-department') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" style="margin-top:10px;"> Department</a></li>
              <li><a href="{{ url('masters/vw-designation') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" style="margin-top:10px;"> Designation</a></li>
							
							<li><a href="{{ url('masters/vw-cast') }}"><img src="{{ asset('images/lv-rule.png') }}" alt=""  style="margin-top:10px;"> Caste</a></li>
            	<li><a href="{{ url('masters/vw-sub-cast') }}"><img src="{{ asset('images/lv-rule.png') }}" alt=""  style="margin-top:10px;"> Sub Caste</a></li>
              <li><a href="{{ url('masters/vw-religion') }}"><img src="{{ asset('images/lv-rule.png') }}" alt=""  style="margin-top:10px;"> Religion</a></li>     
                         <li><a href="{{ url('masters/opening-bal-generation') }}">
                <img src="{{ asset('images/lv-rule.png') }}" alt=""  style="margin-top:10px;"> Account Opening Balance</a></li>
              <li><a href="{{ url('masters/vw-grade') }}"><img src="{{ asset('images/grade.png') }}" alt="" /> Pay Level</a></li>
              <li><a href="{{ url('masters/vw-bank') }}"><img src="{{ asset('images/bank.png') }}" alt=""  style="margin-top:7px"> Bank</a></li><!--
							
							<li><a href="{{ url('masters/vw-loan') }}"><img src="{{ asset('images/bank.png') }}" alt="" style="margin-top:7px"> Loan</a></li>
							<li><a href="{{ url('masters/vw-loan-conf') }}"><img src="{{ asset('images/bank.png') }}" alt="" style="margin-top:7px"> Loan Configuration</a></li>-->
						<li><a href="{{ url('masters/vw-employee-type') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" /> Employee Type</a></li>
            <li><a href="{{ url('masters/ratelist') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" /> Rate Details</a></li>
			<li><a href="{{ url('masters/gpf-rate-listing') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" /> GPF Interest Rate</a></li>
            <li><a href="{{ url('masters/vw-category') }}"><img src="{{ asset('images/lv-rule.png') }}" alt=""  style="margin-top:7px"> Category</a></li>
            <li><a href="{{ url('masters/vw-sub-category') }}"><img src="{{ asset('images/lv-rule.png') }}" alt=""  style="margin-top:7px"> Sub Category</a></li>
            <li><a href="{{ url('masters/vw-item') }}"><img src="{{ asset('images/lv-rule.png') }}" alt=""  style="margin-top:7px"> Item</a></li>
            <li><a href="{{ url('masters/vw-supplier') }}"><img src="{{ asset('images/lv-rule.png') }}" alt=""  style="margin-top:7px"> Supplier</a></li>
            <li><a href="{{ url('masters/accountmasters') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Account Master</a></li>
            <li><a href="{{ url('masters/coas') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Chart Of Account</a></li>
             <li><a href="{{ url('masters/company_banklisting') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Company Bank</a></li>

              <li><a href="{{ url('masters/vw-stipend-bank') }}"><img src="{{ asset('images/bank.png') }}" alt=""  style="margin-top:7px">Stipend Bank</a></li>
			       <li><a href="{{ url('masters/gpf_banklisting') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />GPF Bank</a></li>
             <li><a href="{{ url('masters/tdslisting') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />TDS Master</a></li>
             <li><a href="{{ url('masters/loanlisting') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Loan Master</a></li>
              </ul>
              </li>
					<!--
					<li><a href="{{ url('masters/institute-wise-config') }}" aria-haspopup="true" aria-expanded="false"> <img src="{{ asset('images/company.png') }}" alt="" /> 
					 Course Configuration</a></li>
				    <li><a href="{{ url('masters/subject-configuration') }}" aria-haspopup="true" aria-expanded="false"> <img src="{{ asset('images/designation.png') }}" alt="" /> Subject Configuration</a></li>
					-->
					
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
	
	