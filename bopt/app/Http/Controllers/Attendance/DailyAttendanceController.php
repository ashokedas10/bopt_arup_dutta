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
use Auth;
use DateTime;
class DailyAttendanceController extends Controller
{
    //
	public function viewDailyAttendance()
	{
		$email = Auth::user()->email;
	   	$Roledata=DB::table('role_authorization')      
	    ->join('module', 'role_authorization.module_name', '=', 'module.id')
	    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
	    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
	    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
	    ->where('member_id','=',$email) 
	    ->get();

		$company_rs=Company::where('company_status','=','active')->get();
		$result='';
		return view('attendance/daily-attendence',compact('company_rs','result','Roledata'));
	}
	
	public function getDailyAttandance(Request $request)
	{
		
		$email = Auth::user()->email;
   	$Roledata=DB::table('role_authorization')      
    ->join('module', 'role_authorization.module_name', '=', 'module.id')
    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
    ->where('member_id','=',$email) 
    ->get();


		$filename=$result='';
		
		$validator = Validator::make($request->all(), 
		[
		'month_yr' => 'required'		
        ],
		[
		 'month_yr.required'=>'Month, Year Field Required'
		]);
		
		if($validator->fails())
		{
			return redirect('attendance/daily-attendance')->withErrors($validator)->withInput();
		}
		
		
		$employee_id=$request->employee_code;
		$month_yr=$request->month_yr;
		
		//$from_dt = date($from_dt);
		//$to_dt = date($to_dt);

		//echo $company_id."-".$from_dt."-".$to_dt; die;
		//DB::enableQueryLog();
		if($employee_id == '')
		//if($employee_id == '')
		{
		

			//dd(DB::getQueryLog());
                   $leave_allocation_rs=DB::table('upload_attendence')
                           ->where('month_yr','=',$month_yr)
                            ->get();
		}
		else
		{
 			$leave_allocation_rs=DB::table('upload_attendence')
            ->where('month_yr','=',$month_yr)
         	->where('employee_code','=',$employee_id)
            ->get();
		}
		
		//dd($leave_allocation_rs);
		if($leave_allocation_rs)
		{
			foreach($leave_allocation_rs as $leave_allocation)
			{
				$result .='<tr>
							<td><div class="checkbox"><label><input type="checkbox" name="upload_attendence_id[]" value="'.$leave_allocation->id.'"></label></div></td>
							<td>'.$leave_allocation->employee_code.'</td>
							
							<td>'.$leave_allocation->name.'</td>
							
							<td>'.$leave_allocation->att_date.'</td> 
							
							<td><input type="text" class="form-control" name="arrival_time[]" value="'.$leave_allocation->arrival_time.'"></td>
							<td><input type="text" class="form-control" name="departure_time[]" value="'.$leave_allocation->departure_time.'"></td>
							<td>'.$leave_allocation->duty_hrs.'</td>
							<!-- <td><a href="#" title="Edit"><i class="ti-pencil-alt"></i></a><a href="#" title="Delete"><i class="ti-trash"></i></a></td> -->
						</tr>';
			}
		}
		//$company_rs=Company::where('company_status','=','active')->get();
		return view('attendance/daily-attendence',compact('company_rs','result','Roledata'));
	}
	
	public function updateDailyAttendance(Request $request)
	{
		if($request->upload_attendence_id)
		{
			$i=0;
			foreach($request->upload_attendence_id as $attandance_id)
			{
				$upload_attendence=UploadAttendenceModel::find($attandance_id);
				
$datetime1 = new DateTime($request->arrival_time[$i]);
$datetime2 = new DateTime($request->departure_time[$i]);
$interval = $datetime1->diff($datetime2);
$dutyhr=$interval->format('%h')." Hours ".$interval->format('%i')." Minutes";
//dd($dutyhr);
				//$id=$request->upload_attendence_id[$i];
				$data['arrival_time']=$request->arrival_time[$i];
				$data['departure_time']=$request->departure_time[$i];
                                $data['duty_hrs']=$dutyhr;
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
	
	
	
}
