@extends('layouts.master')

@section('title')
    Payroll Information System-Designation
@endsection

@section('sidebar')
    @include('partials.sidebar')
@endsection

@section('header')
    @include('partials.header')
@endsection



@section('scripts')
    @include('partials.scripts')
@endsection

@section('content')
    <style>


    </style>
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <!-- Widgets  -->
            <div class="row">

                <div class="main-card">
                    <div class="card">

                        <div class="card-body card-block">

                        </div>

                    </div>
                    <div class="card">
                        <div class="card-header"> <strong class="card-title">View Payroll</strong> </div>

                        @if(Session::has('message'))
                            <div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
                        @endif
                        <div class="aply-lv"><a href="{{url('pis/add-payroll-generation-arrear')}}" class="btn btn-default">Generate Payroll <i class="fa fa-plus"></i></a></div>
                        <br/>
                        <div class="clear-fix">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered table-responsive" style="width:1180px;overflow-x: scroll;">
                                <thead>
                                <tr>
                                    <th rowspan="2">Sl. No.</th>
                        <th rowspan="2">Employee Id</th>
                        <th rowspan="2">Employee Name</th>
                        <th rowspan="2">Designation</th>
                        <th rowspan="2">Month</th>
                        <th colspan="15" style="text-align:center;">Additions</th>
                        <th colspan="9" style="text-align:center">Deductions</th>
                        <th rowspan="2">Gross Salary</th>
                        <th rowspan="2">Total Deductions</th>
                        <th rowspan="2">Net Salary</th>
                        </tr>

                        <tr class="spl">
                            <td>Basic Pay</td>
                            <td>Dear. Allow.</td>
                            <td>HRA</td>
                            <td>TRAN. ALLOW.</td>
                            <td>D.A. on T.A.</td>
                            <td>LTC</td>
                            <td>CEA</td>
                            <td>T.A.</td>
                            <td>D.A.</td>
                            <td>Advance</td>
                            <td>Adjustment of Advance</td>
                            <td>Medical Reimbursement</td>
                            <td>SPCL ALLOW.</td>
                            <td>CHA</td>
                            <td>Others</td>
                            <td>GPF</td>
                            <td>NPS</td>
                            <td>CPF</td>
                            <td>GSLI</td>
                            <td>Prof. Tax</td>
                            <td>Inc. Tax.</td>
                            <td>CESS</td>
                            <td>Absent Deduction</td>
                            <td>Others</td>
                        </tr>

                        </thead>
                        <tbody>
                        @foreach($payroll_rs as $payroll)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$payroll->employee_id}}</td>
                                <td>{{$payroll->emp_name}}</td>
                                <td>{{$payroll->emp_designation}}</td>
                                <td>{{$payroll->month_yr}}</td>
                                <td>{{$payroll->emp_basic_pay}}</td>
                                <td>{{$payroll->emp_da}}</td>
                                <td>{{$payroll->emp_hra}}</td>
                                <td>{{$payroll->emp_transport_allowance}}</td>
                                <td>{{$payroll->emp_da_on_ta}}</td>
                                <td>{{$payroll->emp_ltc}}</td>
                                <td>{{$payroll->emp_cea}}</td>
                                <td>{{$payroll->emp_travelling_allowance}}</td>
                                <td>{{$payroll->emp_daily_allowance}}</td>
                                <td>{{$payroll->emp_advance}}</td>
                                <td>{{$payroll->emp_adjustment}}</td>
                                <td>{{$payroll->emp_medical}}</td>
                                <td>{{$payroll->emp_spcl}}</td>
                                <td>{{$payroll->emp_cash_handle}}</td>
                                <td>{{$payroll->other_addition}}</td>
                                <td>{{$payroll->emp_gpf}}</td>
                                <td>{{$payroll->emp_nps}}</td>
                                <td>{{$payroll->emp_cpf}}</td>
                                <td>{{$payroll->emp_gslt}}</td>
                                <td>{{$payroll->emp_pro_tax}}</td>
                                <td>{{$payroll->emp_income_tax}}</td>
                                <td>{{$payroll->emp_cess}}</td>
                                <td>{{$payroll->emp_absent_deduction}}</td>
                                <td>{{$payroll->other_deduction}}</td>
                                <td>{{$payroll->emp_gross_salary}}</td>
                                <td>{{$payroll->emp_total_deduction}}</td>
                                <td>{{$payroll->emp_net_salary}}</td>

                            </tr>
                        @endforeach

                        </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>



    </div>
    <!-- /Widgets -->


@endsection
