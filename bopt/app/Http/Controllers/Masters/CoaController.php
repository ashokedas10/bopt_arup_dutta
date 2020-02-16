<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Masters\Coa;
use View;
use Validator;
use Session;
use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;

class CoaController extends Controller
{
    

    public function coaListing()
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
			$data['coalisting']  = Coa::all();
			
		}catch(Exception $e){
			
			return $e->getMessage();
		}
		
		return view('masters/coalist',$data);
	}
	

	public function viewCoa()
	{
		try {			
			//$data['coalisting']  = Coa::all();
			
		}catch(Exception $e){
			
			return $e->getMessage();
		}
		
		return view('masters/vw-coa');
	}


	public function saveCoa(Request $request){
		//print_r($request->all()); exit;
		try{	
			$coa = new Coa();
			$data['account_type'] = $request->account_type;
			$data['account_name'] = $request->account_name;
			$data['coa_code']= $request->coa_code;
			$data['head_name'] = $request->head_name;
			$data['account_tool'] = $request->account_tool;
			$data['account_reflect_on'] = $request->account_reflect_on;
			$data['coa_remarks'] = $request->coa_remarks;

			if(empty($request->id)){
				$coa->create($data);
				$request->session()->flash('status','success');
				$request->session()->flash('message','Record successfully added!');
			}
			
		}catch(Exception $e){

			$request->session()->flash('status','error');
			$request->session()->flash('message','Some error occured');
		}
		return redirect('masters/coas');
	}

	/*
	* update Department view
	* created on: 27-07-2016
	*/
	public function getCoaById($coa_id){

		try{
			
			$data['coa_details']= Coa::find($coa_id);		
			
		}catch(Exception $e){
			return $e->getMessage();
		}

		return view('masters/vw-coa',$data);
	}

	public function coaAccounttype($account_type){
		$account_types=DB::table('account_master')
		->where('account_type','=',$account_type)
		->get();
		
		echo json_encode($account_types);
	}

	public function getCoacode($account_type,$account_name){

		$coa_codes=DB::table('coa_master')
		//->where('account_type', 'LIKE', "%$account_type%")
		//->where('account_name', 'LIKE', "%$account_type%")
		->where('account_type','=',$account_type)
		->where('account_name','=',$account_name)
		->orderBy('id', 'DESC')
		->first();
		echo json_encode($coa_codes);
	}


	public function getBasecode($account_type,$account_name){

		$account_code=DB::table('account_master')
		->where('account_type','=',$account_type)
		->where('account_name','=',$account_name)
		->first();
		
		echo json_encode($account_code);
	}
		
}
