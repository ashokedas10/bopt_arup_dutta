<?php
namespace App;
namespace App\Http\Controllers\Leave;

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
use DateTime;
use Auth;
class LoginLogutController extends Controller
{
    //
	public function viewLoginLogout()
	{
             $employee_code = Auth::user()->employee_id;
		
		$result='';
		
		if($employee_code <> '')
		{
			$employee_rs=DB::Table('employee')->get();
			
			//->where('employee.employee_id','=',$employee_code)->get()->first();
		}
		$monthlist=DB::table('upload_attendence')->select('month_yr')->distinct('month_yr')->get();
		return view('leave/view-login-logout-status', compact('employee_rs','result','monthlist'));
	}
	
	public function searchLoginLogout(Request $request)
	{
		$employee_rs=$attendance_rs=$result='';		
		$employee_code= Auth::user()->employee_id;
		
		//DB::enableQueryLog();
		$attendance_rs=DB::Table('upload_attendence')
		->where('employee_code','=',$employee_code)
		->where('month_yr','=',$request->month_yr)							
		->get();
			
			foreach($attendance_rs as $attendance)
			{
				$result .=	'<tr>
								<td>'.date_format(date_create($attendance->att_date), 'd-m-Y').'</td>
								<td>'.$attendance->arrival_time .'</td>
								<td>'.$attendance->departure_time .'</td>
								<td>'.$attendance->duty_hrs.'</td>
							</tr>';
			}		
		
		$monthlist=DB::table('upload_attendence')->select('month_yr')->distinct('month_yr')->get();
		return view('leave/view-login-logout-status',compact('employee_rs','result','monthlist'));
		//return redirect('leave/login-logout-status')->with(['result'=>$result]);
	}
	
	
}
