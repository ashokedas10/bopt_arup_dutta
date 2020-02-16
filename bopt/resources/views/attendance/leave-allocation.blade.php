@extends('layouts.master')

@section('title')
Payroll Information System-Company
@endsection

@section('sidebar')
	@include('attendance.partials.sidebar')
@endsection

@section('header')
	@include('partials.header')
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
            <div class="card-header"> <strong class="card-title">Add New Leave Allocation</strong> </div>
            <div class="card-body card-block">
              <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal" style="padding:5% 12%;">
                <div class="row form-group">
                  <div class="col-md-6">
                    <label for="text-input" class=" form-control-label">Company Name <span>(*)</span></label>
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
                  <div class="col-md-6">
                    <label for="text-input" class=" form-control-label">Grade <span>(*)</span></label>
                    <select class="form-control">
                      <option>Select</option>
                      <option>Staff</option>
                      <option>Group D</option>
                      <option>Vocational</option>
                      <option>Teacher</option>
                      <option>Driver</option>
                      <option>Swipper</option>
                      <option>Helper</option>
                      <option>Assistant</option>
                      <option>Kitchen Staff</option>
                    </select>
                    <span class="text-center">OR</span> </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-6">
                    <label for="text-input" class=" form-control-label">Leave Type <span>(*)</span></label>
                    <select class="form-control">
                      <option>Select</option>
                      <option>Casual Leave</option>
                      <option>Privilege Leave</option>
                      <option>Sick Leave</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class=" form-control-label">Employee Code </label>
                    <input type="text" id="max.no" name="max-no" class="form-control">
                  </div>
                </div>
                <button type="button" class="btn btn-danger btn-sm">View</button>
                <p>(*) marked fields are mandatory</p>
              </form>
            </div>
          </div>-->
          <div class="card">
            <div class="card-body card-block">
              <div class="card-header"> <strong class="card-title">View Leave Allocation</strong> </div>
			  @if(Session::has('message'))										
					<div class="alert alert-success" style="text-align:center;"><span class="glyphicon glyphicon-ok" ></span><em > {{ Session::get('message') }}</em></div>
				@endif
              <div class="aply-lv"><a href="{{ url('attendance/add-new-leave-allocation') }}" class="btn btn-default">Add New Leave Allocation <i class="fa fa-plus"></i></a></div>
              <br/>
              <div class="clear-fix">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Sl. No</th>
                      <th>Employee Code</th>
                      <th>Employee Name</th>
                      <th>Leave Type</th>
                      <th>Maximum No.</th>
                      <th>Opening Balance</th>
                      <th>Leave in Hand</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>E001</td>
                      <td>Amitava Banerjee</td>
                      <td>12</td>
                      <td>Casual Leave</td>
                      <td>10</td>
                      <td>2</td>
                      <td><a href="#"><i class="ti-pencil-alt"></i></a><a href="#"><i class="ti-trash"></i></a></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>E002</td>
                      <td>Ashok Sharma</td>
                      <td>12</td>
                      <td>Casual Leave</td>
                      <td>8</td>
                      <td>4</td>
                      <td><a href="#"><i class="ti-pencil-alt"></i></a><a href="#"><i class="ti-trash"></i></a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /Widgets -->
</div>
<!-- .animated -->
</div>
<!-- /.content -->
<div class="clearfix"></div>

@endsection

@section('scripts')
	@include('partials.scripts')
	<script>
		function getGrades(company_id)
		{			
			//alert(company_id);
			$.ajax({
				type:'GET',
				url:'{{url('attendance/get-grades')}}/'+company_id,				
				success: function(response){
				console.log(response); 
				
				$("#grade_id").html(response);
				//var jqObj = jQuery.parseJSON(response); 
					//alert(response);
					//var jqObj =JSON.parse(response);
					//var jqObj = response.map(JSON.parse)
				//var jqObj = jQuery(response);
				//alert(jqObj.emp_present_address);
				//$("#grade_id").val(jqObj.emp_name);
				//$("#address").val(jqObj.emp_present_address);
				}
				
			});
		}
	</script>
	
@endsection

