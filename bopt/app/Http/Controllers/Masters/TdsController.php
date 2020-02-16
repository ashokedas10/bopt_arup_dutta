<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Masters\Tds;
use View;
use Validator;
use Session;
use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;

class TdsController extends Controller
{
    

    public function tdsListing()
	{
		$email = Auth::user()->email;
	   	$data['Roledata']=DB::table('role_authorization')      
	    ->join('module', 'role_authorization.module_name', '=', 'module.id')
	    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
	    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
	    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
	    ->where('member_id','=',$email) 
	    ->get();
		try {			
			$data['tdslisting']  = Tds::all();
			
		}catch(Exception $e){
			
			return $e->getMessage();
		}
		
		return view('masters/tdslist',$data);
	}
	

	public function viewTds()
	{
		try {			
			//$data['coalisting']  = Coa::all();
			
		}catch(Exception $e){
			
			return $e->getMessage();
		}
		
		return view('masters/vw-tds');
	}


	public function saveTds(Request $request){
		
		try{	
			$tds = new Tds();
			$data['tds_section'] = $request->tds_section;
			$data['tds_percentage'] = $request->tds_percentage;
			$data['created_at']= date('Y-m-d');
			
			if(empty($request['id'])){

				$tds->create($data);
				$request->session()->flash('status','success');
				$request->session()->flash('message','Record successfully added!');

			}else{

				DB::table('tds_master')
            	->where('id',$request['id'])
            	->update(['tds_percentage' => $data['tds_percentage']]);
				$request->session()->flash('status','success');
				$request->session()->flash('message','Record Update Successfully!');

			}
			
		}catch(Exception $e){

			$request->session()->flash('status','error');
			$request->session()->flash('message','Some error occured');
		}
		return redirect('masters/tdslisting');
	}

	/*
	* update Department view
	* created on: 27-07-2016
	*/
	public function getTdsDtl($tds_id){

		try{
			
			$data['tds_details']= Tds::find($tds_id);		
			
		}catch(Exception $e){
			return $e->getMessage();
		}

		return view('masters/vw-tds',$data);
	}

	
}
