<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Masters\Loan;
use View;
use Validator;
use Session;
use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;

class LoanController extends Controller
{
    

    public function loanListing()
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
			$data['loanlisting']  = Loan::all();
			
		}catch(Exception $e){
			
			return $e->getMessage();
		}
		
		return view('masters/loanlist',$data);
	}
	

	public function viewLoan()
	{
		try {			
			//$data['coalisting']  = Coa::all();
			
		}catch(Exception $e){
			
			return $e->getMessage();
		}
		
		return view('masters/vw-loan');
	}


	public function saveLoan(Request $request){
		
		try{	
			$loan = new Loan();
			$data['loan_id'] = $request->loan_id;
			$data['loan_type'] = $request->loan_type;
			$data['remarks'] = $request->remarks;
			$data['loan_status'] = $request->loan_status;
			$data['created_at']= date('Y-m-d');
			
			if(empty($request['id'])){

				$loan->create($data);
				$request->session()->flash('status','success');
				$request->session()->flash('message','Record successfully added!');

			}else{

				DB::table('loan_master')
            	->where('id',$request['id'])
            	->update(['loan_type' => $data['tds_percentage']]);
				$request->session()->flash('status','success');
				$request->session()->flash('message','Record Update Successfully!');

			}
			
		}catch(Exception $e){

			$request->session()->flash('status','error');
			$request->session()->flash('message','Some error occured');
		}
		return redirect('masters/loanlisting');
	}

	/*
	* update Department view
	* created on: 27-07-2016
	*/
	public function getLoanDtl($loan_id){

		try{
			
			$data['loan_details']= Loan::find($loan_id);		
			
		}catch(Exception $e){
			return $e->getMessage();
		}

		return view('masters/vw-loan',$data);
	}

	
}
