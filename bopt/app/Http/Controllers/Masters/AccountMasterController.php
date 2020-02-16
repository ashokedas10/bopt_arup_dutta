<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Masters\AccountMaster;
use View;
use Validator;
use Session;
use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;

class AccountMasterController extends Controller
{
    public function accountListing()
	{
		$email = Auth::user()->email;
	   	$data['Roledata']=DB::table('role_authorization')      
	    ->join('module', 'role_authorization.module_name', '=', 'module.id')
	    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
	    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
	    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
	    ->where('member_id','=',$email) 
	    ->get();

		try{			
			$data['accountlisting']  = AccountMaster::all();
			/*$data['accountlisting'] = DB::table('account_master')
            ->leftJoin('ledger_master', 'account_master.account_name', '=', 'ledger_master.id')
            ->get();*/
			
		}catch(Exception $e){
			
			return $e->getMessage();
		}
		return view('masters/accountlist',$data);
	}
	

	public function viewAccount()
	{
		try{			
			
			
		}catch(Exception $e){
			
			return $e->getMessage();
		}
		$data['account_head_list']=DB::table('ledger_master')->get();
		return view('masters/vw-account',$data);
	}


	public function saveAccount(Request $request){
		//echo "<pre>"; print_r($request->all()); exit;
		try{

			$check_duplicate_account_code=DB::table('account_master')->where('account_code','=',$request->account_code)->first();


			if(empty($check_duplicate_account_code)){
				$accountmaster = new AccountMaster();
				$data['account_code']= $request->account_code;
				$data['account_type'] = $request->account_type;
				$data['account_name'] = $request->account_name;
				$data['account_desc'] = $request->account_desc;
				$data['created_at'] = date("Y-m-d H:i:s");
				if(empty($request->id)){
					$accountmaster->create($data);
					$request->session()->flash('status','success');
					$request->session()->flash('message','Record successfully added!');
				}

			}else{
				$request->session()->flash('status','success');
				$request->session()->flash('message','Please Check Your Account Code!.');

			}	
			
		}catch(Exception $e){

			$request->session()->flash('status','error');
			$request->session()->flash('message','Some error occured');
		}
		return redirect('masters/accountmasters');
	}

	/*
	* update Department view
	* created on: 27-07-2016
	*/
	public function getAccountById($account_id){

		try{
			
			$data['account_details']= AccountMaster::find($account_id);
		
			
		}catch(Exception $e){
			return $e->getMessage();
		}
		$data['account_head_list']=DB::table('ledger_master')->get();
		return view('masters/vw-account',$data);
	}
		
}
