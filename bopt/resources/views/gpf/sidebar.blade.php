<?php	
$master_module='';
$payroll_menu='';
$employee='';
$report='';
//dd($Roledata);
// dd($Roledata);
foreach($Roledata as $roles) 
{
   if(auth()->user()->email==$roles->member_id)
   {
        if($roles->menu=='Master Module')
        {
             $master_module='master_module';
        }
         if($roles->menu=='payroll head')
        {
             $payroll_menu='payroll_menu';
        }
        if($roles->menu=='employee')
        {
            $employee='employee_menu';
        }
        if($roles->menu=='report')
        {
            $report='report_menu';
        }
        
    }
}

?>
<style>
.navbar .navbar-nav li.menu-item-has-children .sub-menu{padding-left:0;}
</style>

@if(auth()->user()->user_type=='user')
<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">

                <?php $menus = array();
                foreach($Roledata as $roleaccess){
                    $menus[]= $roleaccess->menu; 
                            
                    }  
                $menuslist= array_unique($menus); ?>
                <ul class="nav navbar-nav">
					
                </ul>
            </div>
        </nav>
</aside>

 @else 


 <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ url('gpf/dashboard') }}"><img src="{{ asset('images/dashboard-icon.png') }}" alt="" />Dashboard </a>
                    </li>

                    <li>
                        <a href="{{ url('gpf/approvedlisting') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Approved GPF</a>
                    </li>
      <li>
                        <a href="{{ url('gpf/list') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" /> Receivable</a>
                    </li>
                    <li>
                        <a href="{{ url('gpf/paylist') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" /> Payable</a>
                    </li>
                    <li>
                        <a href="{{ url('gpf/termdepositlisting') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Term iDeposit</a>
                    </li>

                    <!--<li>
                        <a href="{{ url('gpf/paymententrylisting') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Payment Entry</a>
                    </li>-->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('images/attendence.png') }}" alt="" /> Report Module</a>
                        <ul class="sub-menu children dropdown-menu">

                            <!--<li><a href="{{ url('month-wise-gpf-summary-report') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Month Wise </a></li>-->
                            <li><a href="{{ url('yearend-gpf-summary-report') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Year Wise</a></li>
                            <li><a href="{{ url('employeewise-gpf-summary-report') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Employee Wise </a></li>
                                                        
                            <li><a href="{{ url('provident-fund-report') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Receipt & Payment Account</a></li>
                            <li><a href="{{ url('provident-fund-income-expenditure-report') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Income & Expenditure Account</a></li>
                            <li><a href="{{ url('establishment-account-report') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Balance Sheet</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
</aside>

@endif