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
use App\Grade;
use Validator;
use Session;
use View;
use Auth;
class HomeController extends Controller
{
    public function viewDashboard() {
		
        $empid = Auth::user()->employee_id;
		
		$first_day_this_year = date('Y-01-01'); 
        $last_day_this_year  = date('Y-12-t');
		
        $data['LeaveAllocation'] = DB::table('leave_allocation')
                ->join('leave_type', 'leave_allocation.leave_type_id', '=', 'leave_type.id')
                ->where('leave_allocation.employee_code','=',$empid)
                ->whereBetween('leave_allocation.created_at',[$first_day_this_year,$last_day_this_year])
				//->whereDate('leave_allocation.created_at','>=',$first_day_this_year)
                ->select('leave_allocation.*', 'leave_type.leave_type_name','leave_type.alies')
                ->get();
				
				
			
        $data['leaveApply']=DB::table('leave_apply')
              ->join('leave_type','leave_apply.leave_type','=','leave_type.id') 
              ->select('leave_apply.*','leave_type.leave_type_name','leave_type.alies')
              ->where('employee_id','=',$empid)
              ->whereDate('leave_apply.from_date','>=',$first_day_this_year)
              ->whereDate('leave_apply.to_date','<=',$last_day_this_year)
              ->get();
                // dd($data['leaveApply']);
        $data['TourApply']=DB::table('tour_apply')
                ->where('employee_code','=',$empid)
                ->whereDate('from_date','>=',$first_day_this_year)
                ->whereDate('to_date','<=',$last_day_this_year)
                ->get();
		$data['ltcapply']=DB::table('ltc_apply')
                ->where('employee_code','=',$empid)
                ->whereDate('from_date','>=',$first_day_this_year)
                ->whereDate('to_date','<=',$last_day_this_year)
                ->get();
		
		$data['LoanApply']=DB::table('gpf_loan_apply')->where('employee_code','=',$empid)->get();
		
		$employee_details = DB::table('employee')->where('emp_code', '=', $empid)->first();

        $data['pf_status'] = '';

        if($employee_details->emp_pf_type == 'gpf')
        {
            $data['pf_status'] = DB::table('gpf_details')
                ->where('emp_code', '=', $empid)
                ->orderByDesc('month_year')
                ->first();
        }

        elseif($employee_details->emp_pf_type == 'nps')
        {
            $data['pf_status'] = DB::table('nps_details')
                ->where('emp_code', '=', $empid)
                ->orderByDesc('month_year')
                ->first();
        }
        
        $email = Auth::user()->email;
        $data['Roledata']=DB::table('role_authorization')      
        ->join('module', 'role_authorization.module_name', '=', 'module.id')
        ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
        ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
        ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
        ->where('member_id','=',$email) 
        ->get();
        
        return View('leave/dashboard',$data);
    }

    public function viewHolidayCalendar() {
        $holidays = HolidayModel::all();
        return view('leave/holiday-calendar', compact('holidays'));
    }

	
}
