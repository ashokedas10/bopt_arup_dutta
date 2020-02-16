<?php
namespace App;
namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\DB;
//use Illuminate\Contracts\Validation\Rule;

use App\LeaveType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Session;
use Auth;
use view;


class LeaveBalanceController extends Controller
{
   
   
   public function getLeaveBalance()
	{

		$email = Auth::user()->email;
       	$data['Roledata']=DB::table('role_authorization')      
        ->join('module', 'role_authorization.module_name', '=', 'module.id')
        ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
        ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
        ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
        ->where('member_id','=',$email) 
        ->get();


		/*$leave_balance_rs = DB::Table('leave_allocation')
			->leftJoin('company','leave_allocation.company_id','=','company.id')
			->leftJoin('employee','leave_allocation.employee_code','=','employee.employee_id')
			->leftJoin('leave_type','leave_allocation.leave_type_id','=','leave_type.id')
			->select('company.company_name','employee.first_name','employee.middle_name','employee.last_name','leave_type.leave_type_name','leave_allocation.*')
			->get();*/


        $data['leave_balance_rs']=DB::table('leave_allocation')
            ->join('leave_type', 'leave_allocation.leave_type_id', '=', 'leave_type.id')
            ->join('employee', 'leave_allocation.employee_code', '=', 'employee.emp_code') 
            ->select('leave_allocation.*', 'leave_type.leave_type_name','employee.*')
            ->get();



		return view('attendance/leave-balance', $data);
	}

    public function leaveBalanceView()
    {

        $email = Auth::user()->email;
        $data['Roledata']=DB::table('role_authorization')      
        ->join('module', 'role_authorization.module_name', '=', 'module.id')
        ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
        ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
        ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
        ->where('member_id','=',$email) 
        ->get();

        return view('attendance/leave-balance-view', $data);
    }

	
	public function leaveBalanceReport(Request $request)
    {
        $employeelist=DB::table('employee')->where('status','=','active')->get();
    
        $leave_rs=DB::Table('leave_allocation')
        ->leftJoin('leave_type','leave_allocation.leave_type_id','=','leave_type.id')
        ->leftJoin('employee','leave_allocation.employee_code','=','employee.emp_code')
        ->whereYear('leave_allocation.created_at', '=', $request->year_value)
        ->select('leave_allocation.*','employee.emp_fname','employee.emp_mname','employee.emp_designation','employee.emp_lname','leave_type.leave_type_name','leave_type.id as leavetypeid')
        ->orderBy('leave_allocation.leave_type_id','ASC')
        ->get();

        foreach($employeelist as $employeers){
            $leave_count=array();
            foreach($leave_rs as $key=>$ls){
             
                if($ls->employee_code==$employeers->emp_code)
                {
                    
                    //$leave_count[$ls->leave_type_name]=$ls->leave_in_hand;  
                    $leave_count[]=$ls->leave_in_hand;
                }
            }
            $data['leave_rs'][]=array('emp_code'=>$employeers->emp_code,'emp_name'=>$employeers->emp_fname." ".$employeers->emp_mname." ".$employeers->emp_lname,'emp_designation'=>$employeers->emp_designation,'leave_type_id'=>$ls->leave_type_id,'leave_type_name'=>$ls->leave_type_name,'emp_leavein_hand'=>$leave_count);

        }
            
        $data['leave_type']=DB::table('leave_type')->orderBy('id','ASC')->get();
        $data['year_value']=$request->year_value;
        //echo "<pre>"; print_r($data['leave_type']); print_r($data['leave_rs']); exit;
        return view('attendance/leave-balance-report',$data);
        
    }
	
}
