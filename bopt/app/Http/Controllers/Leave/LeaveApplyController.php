<?php
namespace App;
namespace App\Http\Controllers\Leave;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Session\Store;
use App\LeaveType;
use App\HolidayModel;
use App\EmployeeMaster;
use App\LeaveAllocation;
use App\LeaveApplyModel;
use App\Designation;
use App\Employee;
use App\Grade;
use Validator;
use Session;
use View;
use Auth;
class LeaveApplyController extends Controller
{
    //
	public function viewleaveapplication()
	{
		$leave_apply_rs = LeaveApplyModel::all(); 
		return view('leave/leave-application',compact('leave_apply_rs'));
	}
	
	public function viewapplyleaveapplication()
	{
//		DB::enableQueryLog();
//		$leave_allocation_rs=$leave_rs=$designation_rs=$grade_rs=$emp_id=$leave_type_rs='';
//		$emp_id=Session::get('empID');
//	
//		if(!empty($emp_id))
//		{			
//			$leave_allocation_rs=DB::Table('leave_allocation')
//							->leftJoin('company','leave_allocation.company_id','=','company.id')
//							->leftJoin('employee','leave_allocation.employee_code','=','employee.employee_id')
//							->where('employee.employee_id','=',$emp_id)
//						
//								->select('leave_allocation.*', 'company.company_name','employee.*')->get()->first();
//			//dd(DB::getQueryLog());
//		}
//		//dd($leave_allocation_rs);
//		
//		if($leave_allocation_rs)
//		{
//			//dd($leave_allocation_rs);
//		
//			$leave_rs=DB::Table('view_leavetype')
//								->where('employee_code','=',$emp_id)->select('*')->get();
//			//
//			
//			$designation_id=$leave_allocation_rs->designation_id;
//			$designation_rs=Designation::where('id','=',$designation_id)->select('id','designation_name')->get()->first();
//			$grade_id=$leave_allocation_rs->grade_id;
//			$grade_rs=Grade::where('id','=',$grade_id)->select('id','grade_name')->get()->first();
//			//dd($designation);
//		}
//		
//		$leave_type_rs=LeaveType::get();
//		
       $empid = Auth::user()->employee_id;    
       $employee=DB::table('employee')->where('emp_code','=',$empid)->first();
       $leave_type_rs=DB::table('leave_type')->get();
	   //echo "<pre>"; print_r($employee); exit;
       $holiday_rs=DB::Table('holiday')->select('from_date', 'to_date', 'day', 'holiday_type')->get();
       // dd($holiday_rs);

       $holidays = array();
       $holiday_type = array();

       foreach ($holiday_rs as $holiday) 
       {
	       
	       	if($holiday->day > '1')
	       	{
	       		$from_date = \Carbon\Carbon::parse($holiday->from_date);
	       		$to_date = \Carbon\Carbon::parse($holiday->to_date);

	       		$date1 = date_format($from_date, "d-m-Y"); 
				$date2 = date_format($to_date, "d-m-Y");
				  // dd($date1);
				// Declare an empty array 
				// $holiday_array = array(); 
				  
				// Use strtotime function 
				$variable1 = strtotime($date1); 
				$variable2 = strtotime($date2); 
				  
				// Use for loop to store dates into array 
				// 86400 sec = 24 hrs = 60*60*24 = 1 day 
				for ($currentDate = $variable1; $currentDate <= $variable2; $currentDate += (86400)) { 
				                                      
				$Store = date('Y-m-d', $currentDate);
				 
				$holidays[] = $Store;
				$holiday_type[] =  $holiday->holiday_type;

				} 
				  
				// Display the dates in array format 
				
       		}
       		elseif($holiday->day == '1')
       		{
       			$Store = $holiday->from_date; 
				$holidays[] = $Store;
				$holiday_type[] =  $holiday->holiday_type; 
       		}

     
           
       		$holiday_array=array("holidays" =>$holidays,"holiday_type"=>$holiday_type);

       		
       	}


       	// dd($holiday_array);
	   return view('leave/apply-leave', compact('leave_type_rs','employee','designation_rs','grade_rs','leave_rs','holiday_array'));
	}

	public function holidayLeaveApplyAjax(Request $request)
	{
		// dd($request->all());
        $holidays=$request['holiday']['holidays'];
       
        $endDate = strtotime($request['to_date']);
        $startDate = strtotime($request['from_date']);

            if($request['leave_type']==1){
                $days = ($endDate - $startDate) / 86400 + 1;
                $no_full_weeks = floor($days / 7);
                $no_remaining_days = fmod($days, 7);
                
                $the_first_day_of_week = date("N", $startDate);
                $the_last_day_of_week = date("N", $endDate);
       
                if ($the_first_day_of_week <= $the_last_day_of_week) {
                    if ($the_first_day_of_week <= 6 && 6 <= $the_last_day_of_week) $no_remaining_days--;
                    if ($the_first_day_of_week <= 7 && 7 <= $the_last_day_of_week) $no_remaining_days--;
                }
                else {
                    
                    if ($the_first_day_of_week == 7) {
                       
                        $no_remaining_days--;
                        if ($the_last_day_of_week == 6) {
                           
                            $no_remaining_days--;
                        }
                    }
                    else {
                        
                        $no_remaining_days -= 2;
                    }
                }
        
                $workingDays = $no_full_weeks * 5;
                if ($no_remaining_days > 0 )
                {
                  $workingDays += $no_remaining_days;
                }
                //We subtract the holidays
                foreach($holidays as $key => $holiday){
                    $time_stamp=strtotime($holiday);
                    $hol_type = $request['holiday']['holiday_type'][$key];
                    //If the holiday doesn't fall in weekend
                    if ($startDate <= $time_stamp && $time_stamp <= $endDate && date("N",$time_stamp) != 6 && date("N",$time_stamp) != 7 && $hol_type == 'closed')
                        $workingDays--;
                }

                if($request['cl_type'] == 'half')
                {
                	$workingDays = $workingDays/2;
                }

            }else{

                $diff = $endDate - $startDate;

                $workingDays = abs(round($diff / 86400))+1;

                foreach($holidays as $key => $holiday){
                    $time_stamp=strtotime($holiday);
                    $hol_type = $request['holiday']['holiday_type'][$key];
                    //If the holiday doesn't fall in weekend
                    if ($startDate <= $time_stamp && $time_stamp <= $endDate && date("N",$time_stamp) != 6 && date("N",$time_stamp) != 7 && $hol_type == 'closed')
                        $workingDays--;
                }

            }
           echo json_encode($workingDays);
    
	}


	public function saveApplyLeaveData(Request $request)
	{
		// dd($request);
		$emp_code = Auth::user()->employee_id;

		$report_auth = Employee::where('emp_code', $emp_code)->first();
		
		$report_auth_name = $report_auth->emp_reporting_auth;
		// dd($report_auth_name);
		// $lv_sanc_auth = $report_auth->emp_lv_sanc_auth;
		// $sanc_auth = Employee::where('emp_code', $report_auth_name)->first();

		// $sanc_auth_name = $sanc_auth->emp_reporting_auth;

		$validator=Validator::make($request->all(),[
		'leave_type'=>'required',
		'from_date'=>'required',
		'to_date'=>'required',
		'leave_inhand'=>'required',
		'days'=>'required'
		],
		[
		'leave_type.required'=>'Leave Type Required',
		'from_date.required'=>'From Date Required',
		'to_date.required'=>'To Date Required',
		 'leave_inhand.required'=>'Leave In Hand required',
		'days.required'=>'No. of Days Required'
		]);
		
		if($validator->fails())
		{
			return redirect('leave/apply-leave')->withErrors($validator)->withInput();
			
		}

        $diff = abs(strtotime($request->to_date) - strtotime($request->from_date));
 		$years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days =(floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)))+1;

       
		if($request->no_of_leave>$days){

			Session::flash('Leave_msg','Apply leave More than leave in hand');
            return redirect('leave/apply-leave');
		}

		if(!empty($request->doc_image)){   
            $files = $request->file('doc_image');       
            $filename = $files->store('emp_doc_folder');
        }else{

            $filename = ""; 
        }
        //  $request->leave_inhand;
       	if($request->leave_inhand >=$request->no_of_leave)
        {
            $data['employee_id']= $request->employee_id;
			$data['employee_name']= $request->employee_name;
			$data['emp_reporting_auth']= $report_auth_name;
			$data['emp_lv_sanc_auth']= '';
			$data['date_of_apply']= $request->date_of_apply;
			$data['leave_type']= $request->leave_type;
			$data['half_cl']= $request->half_cl;
			$data['from_date']= $request->from_date;
			$data['to_date']= $request->to_date;
			$data['no_of_leave']= $request->days;
			$data['status']= "NOT APPROVED";
			$data['doc_image']= $filename;
                    //dd($data);
            $leave_apply=new LeaveApplyModel();
			$leave_apply->create($data);
			Session::flash('message','Leave Apply Successfully..!.');
			return redirect('leave/dashboard');
        }else{
            Session::flash('Leave_msg','Sorry, No Leave Available');
            return redirect('leave/apply-leave');        
        }

	}
	
}
