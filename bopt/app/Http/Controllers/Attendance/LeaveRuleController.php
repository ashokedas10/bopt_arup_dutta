<?php

namespace App\Http\Controllers\Attendance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\LeaveRule;
use App\Company;
use App\LeaveType;
use App\Grade;
use Validator;
use Session;
use View;
use Auth;

class LeaveRuleController extends Controller
{
    //
	
	public function leaveRules()
	{	

		$email = Auth::user()->email;
	   	$data['Roledata']=DB::table('role_authorization')      
	    ->join('module', 'role_authorization.module_name', '=', 'module.id')
	    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
	    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
	    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
	    ->where('member_id','=',$email) 
	    ->get();

		$data['leave_type_rs']=LeaveType::where('leave_type_status','=','active')->select('id','leave_type_name')->get();
		//$company_rs=Company::where('company_status','=','active')->select('id','company_name')->get();
        $data['grade']=Grade::where('grade_status','=','active')->select('*')->get();
		return view('attendance/leave-rule', $data);
	}

	public function checkEntry($leave_type_id,$effective_from,$effective_to)
	{
		$results = DB::select( DB::raw("SELECT * FROM `leave_rule` WHERE `leave_type_id`='".$leave_type_id."' AND (`effective_from` >='".$effective_from."' AND `effective_from` <='".$effective_from."' OR `effective_to` >='".$effective_to."' AND `effective_to` <='".$effective_to."')") );
		return $results;
	}

	
	public function saveAddLeaveRule(Request $request)
	{
		$email = Auth::user()->email;
	   	$data['Roledata']=DB::table('role_authorization')      
	    ->join('module', 'role_authorization.module_name', '=', 'module.id')
	    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
	    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
	    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
	    ->where('member_id','=',$email) 
	    ->get();


		$validator=Validator::make($request->all(),[

		'leave_type_id'=>'required|max:255',
		'max_no'=>'required|max:10',
		'entitled_from_month'=>'required',
		'max_balance_enjoy'=>'required',
		'carry_forward_type'=>'required',
		'effective_from'=>'required',
		'effective_to'=>'required'
		],
		[
		'leave_type_id.required'=>'Leave Type Name Required',
		'max_no.required'=>'Maximum No. Required',
		'entitled_from_month.required'=>'Entitled From Month Required',
		'max_balance_enjoy.required'=>'Maximum Balance Enjoy Required',
		'carry_forward_type.required'=>'Carry Forward Type Required',
		'effective_from.required'=>'Effective From Required',
		'effective_to.required'=>'Effective To Required'
		]);
		
		if($validator->fails())
		{
			return redirect('leave-management/leave-rule-listing')->withErrors($validator)->withInput();
		}
		
		//$data=request()->except(['_token']);
		
		$data=$request->all();
		if(!empty($request->id)){
			
	        DB::table('leave_rule')
	        ->where('id', $request->id)
	        ->update(['leave_type_id' =>$request->leave_type_id,
	        'max_no'=>$request->max_no,'entitled_from_month' =>$request->entitled_from_month,'max_balance_enjoy' =>$request->max_balance_enjoy,'carry_forward_type' =>$request->carry_forward_type,'effective_from' =>$request->effective_from,'effective_to' =>$request->effective_to]);

		}else{
		
		$leave_rule=new LeaveRule();
		$check_entry=$this->checkEntry($data['leave_type_id'],$data['effective_from'],$data['effective_to']);
		
			if(count($check_entry)==0){
				$leave_rule->create($data);
			}else{
				Session::flash('message','Leave Rule Information alredy Exists.');
				return redirect('attendance/vw-leave-rule');
			}
		}
		
		Session::flash('message','Leave Rule Information Successfully Saved.');
		return redirect('leave-management/leave-rule-listing');
	}
	
	public function getLeaveRules()
	{
		//$leave_rule_rs=LeaveRule::all();
		$email = Auth::user()->email;
	   	$data['Roledata']=DB::table('role_authorization')      
	    ->join('module', 'role_authorization.module_name', '=', 'module.id')
	    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
	    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
	    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
	    ->where('member_id','=',$email) 
	    ->get();

		$data['leave_rule_rs']=DB::Table('leave_rule')
               ->join('leave_type', 'leave_rule.leave_type_id', '=', 'leave_type.id')
           
            ->select('leave_rule.*', 'leave_type.leave_type_name')
            ->where('leave_rule_status','=','active')
            ->get();
//		->leftJoin('company','leave_rule.company_id','=','company.id')
//		->leftJoin('grade','leave_rule.grade_id','=','grade.id')
//		->leftJoin('leave_type','leave_rule.leave_type_id','=','leave_type.id')
//		->select('leave_rule.*','company.company_name','grade.grade_name','leave_type.leave_type_name')->get();
//		
		return view('attendance/view-leave-rule', $data);
	}


	public function getLeaveRulesById($leave_rule_id)
	{
		//$leave_rule_rs=LeaveRule::all();

		$email = Auth::user()->email;
	   	$data['Roledata']=DB::table('role_authorization')      
	    ->join('module', 'role_authorization.module_name', '=', 'module.id')
	    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
	    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
	    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
	    ->where('member_id','=',$email) 
	    ->get();

        $data['leave_rule_rs'] = DB::table('leave_rule')->where('id', $leave_rule_id)->first();

        $data['leave_rule_data'] = DB::table('leave_rule')->where('id', $leave_rule_id)->first();
        $data['leave_type_rs']=LeaveType::where('leave_type_status','=','active')->select('id','leave_type_name')->get();
		//$company_rs=Company::where('company_status','=','active')->select('id','company_name')->get();
        $data['grade']=Grade::where('grade_status','=','active')->select('*')->get(); 
		return view('attendance/leave-rule', $data);
	}
	
}
