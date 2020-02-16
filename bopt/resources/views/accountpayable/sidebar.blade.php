<?php
$master_module='';
$payroll_menu='';
$employee='';
$report='';
//dd($Roledata);
// dd($Roledata);
?>
<style>
.navbar .navbar-nav li.menu-item-has-children .sub-menu{padding-left:0;}
</style>

@if(auth()->user()->user_type=='user')


 @else


 <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ url('accountpayable/dashboard') }}"><img src="{{ asset('images/dashboard-icon.png') }}" alt="" />Dashboard </a>
                    </li>

                    <!--<li><a href="{{ url('accountpayable/list') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Voucher Entry</a></li>

                    <li><a href="{{ url('nonapprove/list') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Voucher Approve</a></li>

                     <li><a href="{{ url('approve/list') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Voucher Release</a></li>

                     <li><a href="{{ url('billpay/list') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Voucher Payment</a></li>

                     <li><a href="{{ url('bankbook/report') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Bank Book</a></li>-->


                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('images/attendence.png') }}" alt="" /> Account Payable</a>
                        <ul class="sub-menu children dropdown-menu">

                           <li><a href="{{ url('accountpayable/list') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Voucher Entry</a></li>

                            <li><a href="{{ url('nonapprove/list') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Voucher Approve</a></li>

                            <li><a href="{{ url('approve/list') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Voucher Release</a></li>

                            <li><a href="{{ url('billpay/list') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Voucher Payment</a></li>
							
							<li><a href="{{ url('contra/list') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Contra Voucher Entry</a></li>
							
							 <li><a href="{{ url('bank-reconcillation') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Bank Reconcillation</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('accountpayable/balance') }}"><img src="{{ asset('images/attendence.png') }}" alt="" />Balance Posting </a>
                    </li>
                </ul>
            </div>
        </nav>
</aside>

@endif