<?php

namespace App\Http\Controllers\Payroll;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\LoanConfigurationModel;
use App\LoanModel;
use Validator;
use Session;
use View;

class LoanConfigurationController extends Controller
{
    //
	public function getLoanConf()
	{
		$loan_config_rs = LoanConfigurationModel::all(); 
		return view('pis/loan-conf', compact('loan_config_rs'));
	}
	
	public function viewLoanConf()
	{
		$loan_config_code=0;
		$loan_config_rs=LoanConfigurationModel::all()->last();
		
	
		if(!empty($loan_config_rs))
		{
			$loan_config_code=$loan_config_rs->id;
			$k=$loan_config_code+1;
			if($k<10)
			{
				$loan_config_code='LC-'.date('Y').'-0'.$k;
			}
			
			if($k>=10)
			{
				$loan_config_code='LC-'.date('Y').'-'.$k;
			}
		}
		else
		{
			$k=$loan_config_code+1;
			
			if($k<10)
			{
				$loan_config_code='LC-'.date('Y').'-0'.$k;
			}
		}
		
		$loan_rs = LoanModel::all(); 
		
		return view('pis/add-new-loan-conf', compact('loan_config_code','loan_rs'));
	}
	
	public function saveLoanConf(Request $request)
	{
		$validator = Validator::make($request->all(), [
		'loan_type' => 'required',
		'max_sanction_amt' => 'required',
		'max_time'=>'required',
		'rate_of_interest'=>'required',
		'loan_config_status'=>'required'
        ]);
		
		if ($validator->fails()) {
            return redirect('pis/add-new-loan-conf')
                        ->withErrors($validator)
                        ->withInput();
        }
		
		$data = $request->all();
		//dd($data);
		$data=request()->except(['_token']);
		$loan_config=new LoanConfigurationModel();
		$loan_config->create($data);
		Session::flash('message','Loan Configuration Information Successfully Saved.');

		return redirect('pis/vw-loan-conf');
		
	}
}
