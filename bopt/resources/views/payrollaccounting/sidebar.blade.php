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
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ url('payrollaccounting/dashboard') }}"><img src="{{ asset('images/dashboard-icon.png') }}" alt="" />Dashboard </a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('images/attendence.png') }}" alt="" /> Account Payable</a>
                    <ul class="sub-menu children dropdown-menu"> 
                        <li>
                            <a href="{{ url('payroll/accounting') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Payroll Accounting</a>
                        </li>

                        <li>
                            <a href="{{ url('payrollpayment/listing') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Payroll Accounting Listing</a>
                        </li>

                    </ul>
                </li>
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
                    <a href="{{ url('payrollaccounting/dashboard') }}"><img src="{{ asset('images/dashboard-icon.png') }}" alt="" />Dashboard </a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('images/attendence.png') }}" alt="" /> Account Payable</a>
                    <ul class="sub-menu children dropdown-menu"> 
                        <li>
                            <a href="{{ url('payroll/accounting') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Payroll Accounting</a>
                        </li>

                        <li>
                            <a href="{{ url('payrollpayment/listing') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Payroll Accounting Listing</a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</aside>

@endif