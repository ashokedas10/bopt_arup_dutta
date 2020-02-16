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


class LeaveTypeController extends Controller
{
    //
	public function viewAddLeaveType()
	{
		$email = Auth::user()->email;
	   	$data['Roledata']=DB::table('role_authorization')      
	    ->join('module', 'role_authorization.module_name', '=', 'module.id')
	    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
	    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
	    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
	    ->where('member_id','=',$email) 
	    ->get();
		return view('attendance/manage-new-leave-type',$data);
	}
	
	public function saveLeaveType(Request $request)
	{

       //$data=$request->all();

		$email = Auth::user()->email;
	   	$data['Roledata']=DB::table('role_authorization')      
	    ->join('module', 'role_authorization.module_name', '=', 'module.id')
	    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
	    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
	    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
	    ->where('member_id','=',$email) 
	    ->get();

       $data=['leave_type_name' => trim(strtoupper($request->leave_type_name)), 'alies' => trim(strtoupper($request->alies)),'remarks' => $request->remarks];
       
		$leave_type = trim(strtoupper($request->leave_type_name));
		$alias = trim(strtoupper($request->alies));
		$validate = Validator::make($data,[
		'leave_type_name'=>['required',
						Rule::unique('leave_type')->where(function ($query) use($leave_type,$alias) {
						return $query->where('leave_type_name', $leave_type)
						->where('alies', $alias);
						}),
					],	
		'alies'=>'required',
        ],
          [
                'leave_type_name.required' =>'Leave Type required',
				'leave_type_name.unique'=>'Leave Type and Alias already exists',
                'alies.required'=>'Alias is required',
            ]);
		if ($validate->fails()) {
            return redirect('leave-management/leave-type-listing')
                        ->withErrors($validate)
                        ->withInput();
        }
       //$data = request()->except(['_token']);

        $leave_type = new LeaveType();
        
		$leave_type->create($data);
       
		Session::flash('message','Leave Type Added Successfully');  
		return redirect('leave-management/leave-type-listing');
		
	}
	
	public function getLeaveType()
	{
		$email = Auth::user()->email;
	   	$data['Roledata']=DB::table('role_authorization')      
	    ->join('module', 'role_authorization.module_name', '=', 'module.id')
	    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
	    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
	    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
	    ->where('member_id','=',$email) 
	    ->get();

		$data['leave_type_rs']=LeaveType::get();
		return view('attendance/manage-leave-type', $data);	
	}
	
	
	
}
