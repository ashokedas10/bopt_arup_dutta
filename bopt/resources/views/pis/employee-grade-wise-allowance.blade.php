@extends('layouts.master')

@section('title')
Payroll Information System- Employee Grade Wise Allowance
@endsection

@section('sidebar')
	@include('partials.sidebar')
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
          <div class="card">
            <div class="card-header"> <strong>Employeewise Gradewise Allowance</strong> </div>
            <div class="card-body card-block">
              <form action="{{ url('pis/emp-grade-allowance-detail') }}" method="post">
			   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row form-group">
                  <div class="col-md-4">
                    <label class=" form-control-label">Select Company <span>(*)</span></label>
					<select class="form-control" name="company_id" id="company_id" onchange="getGrades(this.value);" >
						<option value='' selected disabled>Select</option>
						@foreach($company_rs as $company)
						<option value="{{$company->id}}" <?php if(old('company_id') == $company->id){ echo "selected"; } ?>>{{ $company->company_name }}</option>
						@endforeach
					</select>
					@if ($errors->has('company_id'))
						<div class="error" style="color:red;">{{ $errors->first('company_id') }}</div>
					@endif
                  </div>
                  <div class="col-md-4">
                    <label class=" form-control-label">Grade <span>(*)</span></label>
                    <select class="form-control" name="grade_id" id="grade_id" >
						<option value="" selected disabled >Select</option>
						
					</select>
					@if ($errors->has('grade_id'))
						<div class="error" style="color:red;">{{ $errors->first('grade_id') }}</div>
					@endif
                  </div>
                  <div class="col-md-4">
                    <label class=" form-control-label">Type <span>(*)</span></label>
                    <select data-placeholder="Type" class="form-control" name="type">
                      <option value="" selected disabled>Select</option>
                      <option value="Additional" <?php if(old('type') == 'Additional') { echo "selected"; } ?>>Additional</option>
                      <option value="Deduction" <?php if(old('type') == 'Deduction') { echo "selected"; } ?> >Deduction</option>
                    </select>
					@if ($errors->has('type'))
						<div class="error" style="color:red;">{{ $errors->first('type') }}</div>
					@endif
                  </div>
                </div>
                <button type="submit" class="btn btn-danger btn-sm">Go </button>
                <button type="reset" class="btn btn-danger btn-sm"> Reset </button>
                <p>(*) marked fields are mandatory</p>
              </form>
            </div>
          </div>
		  
		  <?php //print_r($company_grade_rs); ?>
          <div class="card">
            <div class="card-header"> <strong class="card-title">View Employeewise Gradewise Allowance</strong> </div>
            <br/>
            <div class="clear-fix">
            <form method="post" action="{{ url('pis/emp-grade-allowance') }}" >
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
			  <table id="bootstrap-data-table1" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>
					<div class="checkbox">
                    <label><input type="checkbox"  name="all" id="all" width="30px;" height="30px;">
                        Select</label>
                      </div></th>
                    <th>Head Name</th>
                    <th>In (%)</th>
                    <th>In (Rs.)</th>
                    <th>Minimum Basic</th>
                    <th>Maximum Basic</th>
					<th>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
               
					<?php print_r($result); ?>
					
                </tbody>
              </table>
			</form>
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
				
				}
				
			});
		}
	</script>
	
	<script>
	// Listen for click on toggle checkbox for each Page
		$('#all').click(function(event) {   
			if(this.checked) {
				//alert("test");
				// Iterate each checkbox
				$(':checkbox').each(function() {
					this.checked = true;                        
				});
			} else {
				$(':checkbox').each(function() {
					this.checked = false;                       
				});
			}
		});
		
		
		
		
	</script>
	
	<script>
	
		function del(i,head)
		{
			//alert(i);
			//alert(head);
			var classrow=head+''+i;
			
			/*
			if (rowid != ''){
				//alert(rowid);
				//$('#add'+rowid).prop('disabled', false);
				//$('#add'+rowid).removeAttr('disabled');
				alert("DEL"+i);
				$('#addrow'+rowid).attr('disabled',false);
			}
			*/
			
			$(".row" + classrow).html('');
			
			
						
		}
	
	</script>

	<script>
		function addnewrow(row,head)
		{			
			//alert(row);
			//alert(head);
			/*
			var rowid=row-1;
			if (rowid != '')
			{
				$('#add'+rowid).attr('disabled',true);
			}
			*/
			var head_id=$("#add"+head+''+row).data("id");
			var head_name=$("#add"+head+''+row).data("head");
			//alert(head_id);
			//alert(head_name);
			//var rowid=row+1;
			$.ajax({
				type:'GET',
				url:'{{url('attendance/get-row-add-emp-grade-allowance')}}/'+row+'/'+head_name+'/'+head,						
				success: function(jsonStr) {
					//alert(jsonStr);
					console.log(jsonStr);
				
					//var jqObj = jQuery(jsonStr);
					
					var classrow=head;
					//alert(classrow);
					$("."+classrow).append(jsonStr);					
					
				  //$("#itemslot").removeAttr('disabled');
				//	$("#itemslot").html('<i class="fa fa-plus"></i> Add Row');
				}
			});
			
			//alert(a);
			//d++;
		}
	</script>
	

	
@endsection

