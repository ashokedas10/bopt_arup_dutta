<?php

namespace App\Http\Controllers\Attendance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Company;
use App\Grade;
use App\HolidayModel;
use Validator;
use Session;
use View;
use Auth;
class HolidayController extends Controller
{
    //
	public function viewAddHoliday()
	{
		//$company_rs=Company::where('company_status','=','active')->select('*')->get();
           //$HolidayModel=HolidayModel::select('*')->get();

		$email = Auth::user()->email;
	   	$data['Roledata']=DB::table('role_authorization')      
	    ->join('module', 'role_authorization.module_name', '=', 'module.id')
	    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
	    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
	    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
	    ->where('member_id','=',$email) 
	    ->get();
	    // dd($data);
		return view('attendance/add-holiday',$data);
	}
	public function saveHolidayData(Request $request)
	{


		//echo "<pre>";print_r($request->all()); exit;
		$validator=Validator::make($request->all(),[
		
		'years'=>'required',
		'from_date'=>'required',
		'to_date'=>'required',
		'month'=>'required',
		'day'=>'required',
		'holiday_descripion'=>'required'
		],
		[
		
		'years.required'=>'Year Required',
		'from_date.required'=>'From Date Required',
		'to_date.required'=>'To Date Required',
		'month.required'=>'Month Required',
		'day.required'=>'Day Required',
		'holiday_descripion.required'=>'Holiday Descripion Required',
		]);
		
		/*if($validator->fails())
		{
			return redirect('attendance/add-holiday')->withErrors($validator)->withInput();
			
		}*/
		//$data = $request->all();
		
		//print_r($request->all()); exit;
		$monthYear= explode("-",$request->from_date);
		$data=array(
          'years'=>$monthYear[0],
          'month'=>$monthYear[1],
          'from_date'=>$request->from_date,
          'to_date'=>$request->to_date,
          'day'=>$request->day,
          'weekname'=>$request->weekname,
          'holiday_type'=>$request->holiday_type,
          'holiday_descripion'=>$request->holiday_descripion
        ); 
	
		if(!empty($request->id)){
			DB::table('holiday')
	        ->where('id', $request->id)
	        ->update($data);

		}else{
			$holiday=new HolidayModel();
			$holiday->create($data);
		}
		
		Session::flash('message','Holiday Information Successfully Saved.');
		return redirect('holidays');
	}
	public function viewHolidayDetails()
	{
		$email = Auth::user()->email;
	   	$data['Roledata']=DB::table('role_authorization')      
	    ->join('module', 'role_authorization.module_name', '=', 'module.id')
	    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
	    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
	    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
	    ->where('member_id','=',$email) 
	    ->get();

		$data['holiday_rs']=DB::Table('holiday')->select('*')->get();
		// dd($data['holiday_rs']);
		
		return view('attendance/companywise-holiday', $data);
	}

	public function getHolidayDtl($holiday_id)
	{
		
		$email = Auth::user()->email;
	   	$data['Roledata']=DB::table('role_authorization')      
	    ->join('module', 'role_authorization.module_name', '=', 'module.id')
	    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
	    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
	    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
	    ->where('member_id','=',$email) 
	    ->get();

		$data['holidaydtl']=DB::Table('holiday')->where('id',$holiday_id)->first();
		// dd($data);
		
		return view('attendance/add-holiday', $data);
	}

	public function deleteHoliday($holiday_id)
	{
		$result= DB::table('holiday')->where('id', $holiday_id)->delete();
		Session::flash('message','Holiday Deleted Successfully.');
		return redirect('holidays');
	}
}
