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
.navbar .navbar-nav li > a{padding:4px 0;}
.navbar .navbar-nav li.menu-item-has-children a:before{top:16px;}
.navbar .navbar-nav li.menu-item-has-children a{}
</style>

@if(auth()->user()->user_type=='user')


 @else


 <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ url('depreciation/dashboard') }}"><img src="{{ asset('images/dashboard-icon.png') }}" alt="" />Dashboard </a>
                    </li>

                    <li>
                        <a href="{{ url('depreciation/show-table') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Show Asset List </a>
                    </li>
                    <li>
                        <a href="{{ url('depreciation/report') }}"><img src="{{ asset('images/lv-rule.png') }}" alt="" />Report View </a>
                    </li>


                </ul>
            </div>
        </nav>
</aside>

@endif
