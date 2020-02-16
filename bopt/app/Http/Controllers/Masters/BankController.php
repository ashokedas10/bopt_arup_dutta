<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bank;
use view;
use Validator;
use Session;
use Illuminate\Support\Facades\Input;

class BankController extends Controller
{
    
	public function viewAddBank()
	{
		if(Input::get('id')){

			$bankid= Input::get('id');
			$data['bankdetails']=Bank::where('id',$bankid)->get()->toArray();
			$data['MastersbankName']=Bank::getMastersBank();
			//print_r($data['MastersbankName']);die;
			return view('masters/add-bank', $data);	
		}else{
			$data['MastersbankName']=Bank::getMastersBank();
			//print_r($data['master_bank_name']); exit;
			return view('masters/add-bank', $data);	
		}
			
	}
	
	public function saveBank(Request $request)
	{

		if(is_numeric($request->branch_name)==1){
			Session::flash('message','Branch Name Should not be numeric.');
		    return redirect('masters/vw-bank');
			
		}
		
		if($request->bankid)
        {
              
            $data=array(
               	'bank_name'=>$request->bank_name,
				'branch_name'=>$request->branch_name,
				'ifsc_code'=>$request->ifsc_code,
				'swift_code'=>$request->swift_code,
				'created_at'=>date('Y-m-d h:i:s'),
				'updated_at'=>date('Y-m-d h:i:s'),
				'bank_status'=>$request->des_status,
                );
			Bank::where('id',$request->bankid)->update($data);
            Session::flash('message','Bank Information Successfully Updated.');
			return redirect('masters/vw-bank');
        }else{ 
			$validator=Validator::make($request->all(),[
			'bank_name'=>'required|max:255',
			'branch_name'=>'required|max:255',
			'ifsc_code'=>'required|unique:bank|max:255',
			'swift_code'=>'required|unique:bank|max:255'
			],
			[
			'bank_name.required'=>'Bank Name Required.',
			'branch_name.required'=>'Branch name Required',
			'branch_name.unique'=>'Branch name already exsits',
			'ifsc_code.required'=>'IFSC name Required',
			'ifsc_code.unique'=>'IFSC name already exsits',
			'swift_code.required'=>'Swift code Name Required',
			'swift_code.unique'=>'Swift code Name already exsits'
			]);
			
			if ($validator->fails()) {
	            return redirect('masters/bank')
	                        ->withErrors($validator)
	                        ->withInput();
	        }else{
	        	
	            	$data=request()->all();
					$bank=new Bank();
					//print_r($data); exit;
					$bank->create($data);
					Session::flash('message','Bank Information Successfully saved.');
					return redirect('masters/vw-bank');
			}
        }
		
		
	}	
		
	public function getBanks()
	{
		$bank_rs=Bank::getMasterAndBank();
		//print_r($bank_rs); exit;
		return view('masters/view-banks', compact('bank_rs'));	
	}

}
