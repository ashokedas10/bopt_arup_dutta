<?php
namespace App;
namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use view;
use Validator;
use Illuminate\Support\Facades\DB;
use Session;
use App\Grade;
use App\Company;
use App\Employee;
use App\UploadAttendenceModel;
use App\ProcessAttendance;
use Illuminate\Support\Facades\Input;


class ProcessAttendanceController extends Controller
{
	public function viewProcessAttendance()
	{  
		$company_rs=Company::where('company_status','=','active')->get();
		$result='';
		return view('attendance/emp-process-attendance',compact('company_rs','result'));
	}
	
	public function getProcessAttandance(Request $request)
	{
		
		$filename=$result='';
		$per_day_salary=$late_salary_deducted=$no_of_days_salary_deducted=$no_of_days_salary=0;
                
		$working_day=30;
		
		$validator = Validator::make($request->all(), 
		[
		
		'month_yr' => 'required'		
        ],
		[
		
		 'month_yr.required'=>'Month, Year Field Required'
		]);
		
		if($validator->fails())
		{
			return redirect('attendance/process-attendance')->withErrors($validator)->withInput();
		}
		
	
		$month_yr=$request->month_yr;
		
		DB::enableQueryLog();
		
			/*
			DB::enableQueryLog();
			$leave_allocation_rs=DB::Table('employee')
				->leftJoin('company','employee.company_id','=','company.id')
				->leftJoin('upload_attendence','upload_attendence.employee_code','=','employee.employee_id')		
				->leftJoin('shift_management','employee.company_id','=','shift_management.company_id')
				->where('company.id','=',$company_id)
				->whereBetween('upload_attendence.attendence_date', [$from_dt, $to_dt])				
				->select('upload_attendence.attendence_date','upload_attendence.arrival_time','upload_attendence.departure_time','upload_attendence.id as upload_attendence_id',
				'upload_attendence.attendence','upload_attendence.location','employee.first_name','employee.middle_name',
				'employee.last_name','employee.employee_id','employee.reporting_person','shift_management.shift_in_time', 'shift_management.shift_out_time')->get();
			//dd(DB::getQueryLog());
			*/
			
//			$process_attendance_rs=DB::Table('employee')
////				->leftJoin('company','employee.company_id','=','company.id')
//				->leftJoin('grade','employee.grade_id','=','grade.id')	
//				->leftJoin('shift_management','employee.company_id','=','shift_management.company_id')
//				->where('company.id','=',$company_id)
//				->where('grade.id','=',$grade_id)						
//				->select('company.company_name','grade.grade_name','employee.first_name','employee.middle_name',
//				'employee.last_name','employee.employee_id','employee.department_id','employee.reporting_person','shift_management.shift_in_time', 'shift_management.shift_out_time','grade.grade_name')->get();
//				
			//dd(DB::getQueryLog());				
			//dd($process_attendance_rs);
                
    $montharr=explode('/',$month_yr);
	function countDays($year, $month, $ignore) {
	    $count = 0;
	    $counter = mktime(0, 0, 0, $month, 1, $year);
	    while (date("n", $counter) == $month) {
	        if (in_array(date("w", $counter), $ignore) == false) {
	            $count++;
	        }
	        $counter = strtotime("+1 day", $counter);
	    }
	    return $count;
	}

$daycount=countDays($montharr[1], $montharr[0], array(0, 6)); // 23
$monthvar='';
if($montharr[0]=='1'){
    $monthvar='Jan';
}
if($montharr[0]=='2'){
    $monthvar='Feb';
}
if($montharr[0]=='3'){
    $monthvar='Mar';
}
if($montharr[0]=='4'){
    $monthvar='Apr';
}
if($montharr[0]=='5'){
    $monthvar='May';
}
if($montharr[0]=='6'){
    $monthvar='Jun';
}
if($montharr[0]=='7'){
    $monthvar='Jul';
}
if($montharr[0]=='8'){
    $monthvar='Aug';
}
if($montharr[0]=='9'){
    $monthvar='Sep';
}
if($montharr[0]=='10'){
    $monthvar='Oct';
}
if($montharr[0]=='11'){
    $monthvar='Nov';
}
if($montharr[0]=='12'){
    $monthvar='Dec';
}

    $holidays=DB::table('holiday')->where('month','=',$monthvar)
            ->where('years','=',$montharr[1])->get(); 
    $totday=0;
        foreach($holidays as $holiday) 
        {
          $totday=$totday+$holiday->day;
        }     
        $total_wk_days=0;
      $total_wk_days=$daycount-$totday;
         
      $employee_rs=DB::Table('employee')
              ->join('upload_attendence','employee.emp_code','=','upload_attendence.employee_code')
              ->where('upload_attendence.month_yr','=',$month_yr)
               ->select('employee.*')
              ->distinct()
              ->get();
      
     // dd($employee_rs);
      $increment=0;
    foreach($employee_rs as $emp)
    {
		$tour_leave_count=0;
        $number_of_days_leave=0;
        $leave_apply_rs =  DB::select(DB::raw("SELECT SUM(no_of_leave) as number_of_days ,SUM(status),SUM(to_date) FROM `leave_apply` WHERE employee_id='$emp->emp_code' AND status='APPROVED' AND to_date LIKE '$montharr[1]-$montharr[0]-%'"));      
      	$tour_leave=DB::select(DB::raw("SELECT SUM(duration) as duration_sum FROM tour_apply WHERE `employee_code`='$emp->emp_code' AND tour_status='APPROVED' AND to_date LIKE '$montharr[1]-$montharr[0]-%'"));
      	
        //dd(count($tour_leave));
 if($tour_leave[0]->duration_sum!=null){
      $tour_leave_count= $tour_leave[0]->duration_sum;
     }else{   $tour_leave_count=0;  }
        
      $number_of_days_leave= $leave_apply_rs[0]->number_of_days;
       
      if($number_of_days_leave==null)$number_of_days_leave=0;
                    
      $no_of_present=0;     
                  
       $upload_attendence=DB::select(DB::raw("SELECT count(*) as no_of_present,employee_code FROM `upload_attendence` group by employee_code,month_yr"));     
       //dd($upload_attendence);
        $no_of_present=$upload_attendence[$increment]->no_of_present;
       $absent_days=0;
       $totleave_present=$no_of_present+$number_of_days_leave+$tour_leave_count;
        $absent_days=$total_wk_days-$totleave_present;
        
        $totsal=$no_of_present+$number_of_days_leave+$tour_leave_count;
        $total_salary_deduction=$total_wk_days-$totsal;
        
       $no_of_days_salary= $no_of_present+$number_of_days_leave;
        
         $result .=	'<tr>
				
								<input type="hidden" class="form-control" readonly="" name="month_yr" value="'.$month_yr.'">
								<input type="hidden" class="form-control" readonly="" name="no_of_working_days[]" value="'.$total_wk_days.'">
		
                                                                <input type="hidden" class="form-control" readonly="" name="no_of_days_absent[]" value="'.$absent_days.'">
                                                                <input type="hidden" class="form-control" readonly="" name="no_of_days_leave_taken[]" value="'.$number_of_days_leave.'">
                                                                <input type="hidden" class="form-control" readonly="" name="no_of_present[]" value="'.$no_of_present.'">						
                                                                <input type="hidden" class="form-control" readonly="" name="total_sal[]" value="'.$totsal.'">
                                                                <input type="hidden" class="form-control" readonly="" name="tour_leave[]" value="'.$tour_leave_count.'">

								<td><div class="checkbox"><label><input type="checkbox" name="employee_code[]" value="'.$emp->emp_code.'"></label></div></td>
								<td>'.$emp->emp_code.'</td>
								<td>'.$emp->emp_fname.' '.$emp->emp_mname.' '.$emp->emp_lname.'</td>
								<td>'.$total_wk_days.'</td>
								<td>'.$number_of_days_leave.'</td>
								<td>'.$tour_leave_count.'</td>
								<td>'.$absent_days.'</td>
								<td>'.$no_of_present.'</td>
								<td>'.$totsal.'</td>
							</tr>';
         $increment++;
         }

		return view('attendance/emp-process-attendance',compact('company_rs','result'));
	}
        
	
	public function saveProcessAttandance(Request $request)
	{
		//print_r($request->all()); exit;   
		$i=0;
		$enteremployee=array();
        $checkattendence= DB::table('process_attendance')->where('month_yr','=',$request->month_yr)->get();
		foreach($checkattendence as $chckatt){
			$enteremployee[]=$chckatt->employee_code;
		}
		if(!empty($request->employee_code)){
			foreach($request->employee_code as $checked)
			{    		
				$data['month_yr']=$request->month_yr;
				$data['employee_code']=$request->employee_code[$i];
				$data['no_of_working_days']=$request->no_of_working_days[$i];
	            $data['no_of_tour_leave']=$request->tour_leave[$i];	           
				$data['no_of_days_leave_taken']=$request->no_of_days_leave_taken[$i];
				$data['no_of_present']=$request->no_of_present[$i];
				$data['no_of_days_absent']=$request->no_of_days_absent[$i];
				$data['no_of_days_salary']=$request->total_sal[$i];

				if(in_array($request->employee_code[$i], $enteremployee)) 
				{ 
				  Session::flash('message','Alraedy Attendance Processed for the month of '.$request->month_yr.'.');
				  return redirect('attendance/process-attendance');
				} 
				else
				{ 
				  if(($data['no_of_working_days']<$data['no_of_days_salary']) || ($data['no_of_present']<0) || ($data['no_of_days_absent']<0)){
				  	Session::flash('message','There was a problem in your monthly attandance sheet  upload attandance.');
					return redirect('attendance/process-attendance');

				  }else{
				  	DB::table('process_attendance')->insert($data);
				  }

				} 
	            
				$i++;	
			}
			Session::flash('message','Attendance Process Information Successfully Saved.');
			return redirect('attendance/process-attendance');

		}else{
			Session::flash('message','Please select before process!!.');
			return redirect('attendance/process-attendance');
		}
    }
	
	/*
	public function updateDailyAttendance(Request $request)
	{
		if($request->upload_attendence_id)
		{
			$i=0;
			foreach($request->upload_attendence_id as $attandance_id)
			{
				$upload_attendence=UploadAttendenceModel::find($attandance_id);
				
				//$id=$request->upload_attendence_id[$i];
				$data['arrival_time']=$request->arrival_time[$i];
				$data['departure_time']=$request->departure_time[$i];
				//dd($data);
				$upload_attendence->fill($data);
				$upload_attendence->save();
				$i++;
			}
			Session::flash('message','Daily Attendance Information Successfully Updated.');
		}
		
		return redirect('attendance/daily-attendance');
	}
	
	public function getGrades()
	{
		//$grade_rs=Grade::all();
		$grade_rs=DB::Table('grade')
		->leftJoin('company','grade.company_id','=','company.id')
		->select('grade.*','company.*')->get();
		
		return view('pis/view-grade', compact('grade_rs'));
	}
	
	*/
	
}
