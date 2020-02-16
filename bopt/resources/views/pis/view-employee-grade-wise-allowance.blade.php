@extends('layouts.master')

@section('title')
Payroll Information System-Grade
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

  <!-- Content -->
  <div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
      <!-- Widgets  -->
      <div class="row">
        <div class="main-card">
          <!--<div class="card">
            <div class="card-header"> <strong>Employeewise Gradewise Allowance</strong> </div>
            <div class="card-body card-block">
              <form action="#" method="post">
                <div class="row form-group">
                  <div class="col-md-4">
                    <label class=" form-control-label">Select Company <span>(*)</span></label>
                    <select class="form-control">
                      <option>Select</option>
                      <option>Adamas Higher Secondary Model School</option>
                      <option>Adamas Institute of Technology</option>
                      <option>Adamas Career</option>
                      <option>Adamas Institute of Teachers Education</option>
                      <option>Adamas International School</option>
                      <option>Adamas University</option>
                      <option>Adamas World School</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label class=" form-control-label">Grade <span>(*)</span></label>
                    <select data-placeholder="Choose a Grade..." class="form-control">
                      <option value="" label="Select"></option>
                      <option value="Staff">Staff</option>
                      <option value="Group D">Group D</option>
                      <option value="vocational">Vocational</option>
                      <option value="teacher">Teacher</option>
                      <option value="driver">Driver</option>
                      <option value="swipper">Swipper</option>
                      <option value="helper">Helper</option>
                      <option value="assistant">Assistant</option>
                      <option value="kitchen-staff">Kitchen Staff</option>
                      <option value="marketing-staff">Marketing Staff</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label class=" form-control-label">Type <span>(*)</span></label>
                    <select data-placeholder="Type" class="form-control">
                      <option>Select</option>
                      <option>Additional</option>
                      <option>Deduction</option>
                    </select>
                  </div>
                </div>
                <button type="submit" class="btn btn-danger btn-sm">Go </button>
                <button type="reset" class="btn btn-danger btn-sm"> Reset </button>
                <p>(*) marked fields are mandatory</p>
              </form>
            </div>
          </div>-->
          <div class="card">
            <div class="card-header"> <strong class="card-title">View Employeewise Gradewise Allowance</strong> </div>
			@if(Session::has('message'))										
					<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
			@endif	
			<div class="aply-lv"><a href="{{ url('pis/emp-grade-allowance') }}" class="btn btn-default">Add New <i class="fa fa-plus"></i></a></div>
            <br/>
            <div class="clear-fix">
              <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Company Name</th>
					<th>Grade Name</th>
					<th>Head Name</th>
					<th>Head Type</th>
					<th>In (%)</th>
					<th>In (Rs.)</th>
					<th>Minimum Basic</th>
					<th>Maximum Basic</th>
                  </tr>
                </thead>
                <tbody>
				@foreach($employeeGradeWiseAllowance_rs as $allowance)
                  <tr>
                    <td>{{ $allowance->company_name }}</td>
                    <td>{{ $allowance->grade_name }}</td>
                    <td>{{ $allowance->head_name }}</td>
					 <td>{{ $allowance->head_type }}</td>
                    <td>{{ $allowance->in_per }}</td>
                    <td>{{ $allowance->in_rs }}</td>
                    <td>{{ $allowance->min_basic }}</td>
					<td>{{ $allowance->max_basic }}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /Widgets -->
    </div>
    <!-- .animated -->
  </div>
  <!-- /.content -->
  
@endsection
