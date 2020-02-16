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
                        <a href="{{ url('stipend/dashboard') }}"><img src="{{ asset('images/dashboard-icon.png') }}" alt="" />Dashboard </a>
                    </li>

                    <li>
                        <a href="{{ url('stipend/upload') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Upload Stipend</a>
                    </li>
<li>
                        <a href="{{ url('stipend/listreceived') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Received Stipend</a>
                    </li>
                    <li>
                        <a href="{{ url('stipend/list') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Stipend</a>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{ asset('images/reports.png') }}" alt="" /> Stipend Report Module</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="{{ url('balance-sheet') }}"><img src="{{ asset('images/payroll.png') }}" alt="" /> Balance Sheet</a></li>
                            <li><a href="{{ url('schedule-1s') }}"><img src="{{ asset('images/payroll.png') }}" alt="" /> Schedule-1s</a></li>
                            <li><a href="{{ url('schedule-2s') }}"><img src="{{ asset('images/payroll.png') }}" alt="" /> Schedule-2s</a></li>
                            <li><a href="{{ url('schedule-3s') }}"><img src="{{ asset('images/payroll.png') }}" alt="" /> Schedule-3s</a></li>
                            <li><a href="{{ url('income-expenditure') }}"><img src="{{ asset('images/payroll.png') }}" alt="" /> Income & Expenditure Report</a></li>
                            <li><a href="{{ url('schedule-4s') }}"><img src="{{ asset('images/payroll.png') }}" alt="" /> Schedule-4s</a></li>
                            <li><a href="{{ url('schedule-5s') }}"><img src="{{ asset('images/payroll.png') }}" alt="" /> Schedule-5s</a></li>
                            <li><a href="{{ url('schedule-6s') }}"><img src="{{ asset('images/payroll.png') }}" alt="" /> Schedule-6s</a></li>
                            <li><a href="{{ url('schedule-7s') }}"><img src="{{ asset('images/payroll.png') }}" alt="" /> Schedule-7s</a></li>
                            <li><a href="{{ url('schedule-8s') }}"><img src="{{ asset('images/payroll.png') }}" alt="" /> Schedule-8s</a></li>
                            <li><a href="{{ url('schedule-9s') }}"><img src="{{ asset('images/payroll.png') }}" alt="" /> Schedule-9s</a></li>
                            <li><a href="{{ url('receipt-payment') }}"><img src="{{ asset('images/payroll.png') }}" alt="" /> Receipts and Payments Account</a></li>
                        </ul>
                    </li>


                </ul>
            </div>
        </nav>
</aside>

@endif
