@extends('sms.result-management.layouts.master')

@section('title')
Result Management-Marks Allocation
@endsection

@section('sidebar')
	@include('sms.result-management.partials.sidebar')
@endsection

@section('header')
	@include('sms.result-management.partials.header')
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
                            <div class="card-header">
                                <strong class="card-title">Marks Allocation</strong>
                            </div>
							
                            <div class="card-body">
							
							<div class="srch-rslt" style="overflow-x:scroll;">
							<form method="post" action="{{ url('sms/result-management/institute-config-marks-data') }}">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
								<table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Select</th>
											<th>Subject</th>
											<th>Total Marks</th>
											<th>Pass Marks</th>
											<th>Exam Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php print_r($data_rs); ?>
										
                                        
                                        
                                    </tbody>
									
                                </table>
							</form>
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
	@include('sms.room-management.partials.scripts')
	<script>
	
		function getInstituteName()
		{
			var institute_name=$("#institute_code :selected").text();
			//alert(institute_name);
			$("#institute_name").val(institute_name);
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
@endsection