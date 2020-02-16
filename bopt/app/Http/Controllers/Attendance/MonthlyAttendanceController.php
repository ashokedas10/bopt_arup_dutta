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


class MonthlyAttendanceController extends Controller
{
	public function viewMonthlyAttendance()
	{  
		$data['monthlist']=DB::table('upload_attendence')->select('month_yr')->distinct('month_yr')->get();
		$data['upload_record_rs']=array();
		return view('attendance/emp-monthly-attendance',$data);
	}
	
	public function getMonthlyAttandance(Request $request)
	{
       $data['upload_record_rs']=DB::select(DB::raw('SELECT count(DISTINCT(employee_code)) as empcount,month_yr FROM `upload_attendence` where month_yr="'.$request['month_yr'].'"'));
      
       	//print_r($data['upload_record_rs']); exit;
		$data['monthlist']=DB::table('upload_attendence')->select('month_yr')->distinct('month_yr')->get();
		
		return view('attendance/emp-monthly-attendance',$data);
	}
        
	
	public function deleteMonthlyAttandance()
	{      
		/*$month=Input::get('month'); 
		$check_process_table=DB::table('process_attendance')->where('month_yr','=',$month)->first();
		if(empty($check_process_table)){
			$check_process_table=DB::table('upload_attendence')->where('month_yr','=',$month)->delete();
			Session::flash('message','Attendance Process Information Successfully Deleted.');
		
		}else{

			Session::flash('message','You Can Not process this operation.');
		}
		
		return redirect('attendance/monthly-attendance');*/
        $month = Input::get('month');
        $processmonth= urldecode(base64_decode($month));

       $check_process_table=DB::table('process_attendance')->where('month_yr','=',$processmonth)->first();
		if(empty($check_process_table)){
			$check_process_table=DB::table('upload_attendence')->where('month_yr','=',$processmonth)->delete();
			Session::flash('message','Attendance Process Information Successfully Deleted.');
		
		}else{

			Session::flash('message','You Can Not process this operation.');
		}
		
		return redirect('attendance/monthly-attendance');
       
    }
	
}
