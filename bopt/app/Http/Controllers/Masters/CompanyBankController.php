<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Masters\CompanyBank;
use App\Bank;
use view;
use Validator;
use Session;
use DB;
use Illuminate\Support\Facades\Input;

class CompanyBankController extends Controller
{
    
	public function getCompanyBankListing()
	{
		try {			
			//$data['company_bank_listing']  = CompanyBank::all();

			$data['company_bank_listing'] = DB::table('company_bank')->orderBy('id', 'desc')->get();
            //->leftJoin('bank_masters', 'company_bank.bank_name', '=', 'bank_masters.master_bank_name') 
            
			
		}catch(Exception $e){
			
			return $e->getMessage();
		}
		return view('masters/view-company-banks',$data);	
	}
	

	public function viewCompanyAddBank()
	{
		try {			
			
			
		}catch(Exception $e){
			
			return $e->getMessage();
		}
		$data['MastersbankName']=Bank::getMastersBank();
		return view('masters/add-company-bank',$data);	
	}
	
	public function saveCompanyBank(Request $request){
		//print_r($request->all()); exit;
		try{

			if(strlen($request->ifsc_code)<11 || strlen($request->ifsc_code)>11){

				$request->session()->flash('status','success');
				$request->session()->flash('message','Invalid IFSC Code');
				return redirect('masters/company_banklisting');
			}


			if(!is_numeric($request->opening_balance)){

				$request->session()->flash('status','success');
				$request->session()->flash('message','Wrong format for Opening Balance !');
				return redirect('masters/company_banklisting');
			}	

			$companybank = new CompanyBank();
			$data['bank_name'] = $request->bank_id;
			$data['branch_name'] = $request->branch_name;
			$data['ifsc_code']= $request->ifsc_code;
			$data['micr_code'] = $request->micr_code;
			$data['opening_balance'] = $request->opening_balance;
			$data['financial_year'] = $request->financial_year;
			$data['bank_status'] = "active";
			$data['created_at'] = date('Y-m-d H:i:s');
			
			if(empty($request->bankid)){
				$companybank->create($data);
				$request->session()->flash('status','success');
				$request->session()->flash('message','Record successfully added!');
			}else{

				DB::table('company_bank')
            	->where('id', $request->bankid)
            	->update(['bank_status' => $request->bank_status]);
				$request->session()->flash('status','success');
				$request->session()->flash('message','Record Update Successfully!');

			}
			
		}catch(Exception $e){

			$request->session()->flash('status','error');
			$request->session()->flash('message','Some error occured');
		}
		return redirect('masters/company_banklisting');
	}



	public function getCompanyBankDtl($bank_id){

		try{
			
			$data['bankdetails']= CompanyBank::find($bank_id);		
			
		}catch(Exception $e){
			return $e->getMessage();
		}
		$data['MastersbankName']=Bank::getMastersBank();
		return view('masters/add-company-bank',$data);
	}

}
