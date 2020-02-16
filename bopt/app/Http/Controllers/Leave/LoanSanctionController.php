<?php
namespace App;
namespace App\Http\Controllers\Leave;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\LoanApplyModel;
use App\LoanModel;
use App\LoanSanction;
use App\Employee;
use App\LoanConfigurationModel;
use App\LoanSanctionConfig;
use Validator;
use Session;
use View;

class LoanSanctionController extends Controller
{
    //
	public function viewLoanSanction()
	{
		$loan_sanction_rs = LoanSanction::all(); 
		return view('leave/view-loan-sanction',compact('loan_sanction_rs'));
	}
	
	public function viewFormLoanSanction()
	{
		$emp_id=Session::get('empID');
		$loan_apply_rs=LoanApplyModel::where('employee_code','=',$emp_id)
		->where('loan_status','=','NOT APPROVED')->get()->first();
		
		$employee_rs=Employee::where('employee_id','=',$emp_id)
		->where('employee_status','=','active')->get()->first();
		
		/*
		$loan_apply_rs=DB::table('loan_apply')->select('*')
					->where('loan_status','=','NOT APPROVED')
					->whereNOTIn('loan_applied_no', function($query){
						$query->select('loan_applied_no')->from('loan_sanction');
					})
					->get();
		*/
		
		$loan_type=$loan_apply_rs->loan_type;
		$loan_configuration_rs=LoanConfigurationModel::where('loan_type','=',$loan_type)->where('loan_config_status','=','active')->get()->first();
				
		$loan_type_rs=LoanModel::where('loan_status','=','active')->get();
		
		return view('leave/loan-sanction', compact('loan_apply_rs','loan_type_rs','employee_rs','loan_configuration_rs'));
	}
	
	public function saveLoanSanction(Request $request)
	{
		$loan_sanction_rs=$loan_sanction_code='';
		$loan_sanction_id=$k=0;
		
		
		$validator=Validator::make($request->all(),[
		'purpose_of_loan'=>'required',
		'sanction_amt'=>'required',
		'loan_sanction_status'=>'required'
		],
		[
		'purpose_of_loan.required'=>'Purpose of Loan Required',
		'sanction_amt.required'=>'Sanction Amount Required',
		'loan_sanction_status.required'=>'Sanction Status Required'
		]);
		
		if($validator->fails())
		{
			return redirect('leave/loan-sanction')->withErrors($validator)->withInput();
			
		}
		
		
		
		$loan_sanction_rs=LoanSanction::all()->last();
		
		if(!empty($loan_sanction_rs))
		{
			$loan_sanction_id=$loan_sanction_rs->id;
			$k=$loan_sanction_id+1;
			if($k<10)
			{
				$loan_sanction_code='LS-'.date('Y').'-0'.$k;
			}
			
			if($k>=10)
			{
				$loan_sanction_code='LS-'.date('Y').'-'.$k;
			}
		}
		else
		{
			$k=$loan_sanction_id+1;
			
			if($k<10)
			{
				$loan_sanction_code='LS-'.date('Y').'-0'.$k;
			}
		}
		
			
		$data=request()->except(['_token']);		
		$data['loan_sanction_no']=$loan_sanction_code;
		
		$sanction_month=date('m');
		$sanction_year=date('Y');
		
		$data['months']=$sanction_month;
		$data['years']=$sanction_year;
		
		$loan_sanction=new LoanSanction();
		$loan_sanction->create($data);
		$loan_sanction_date=date('Y-m-d');
		$data=(object)$data;
		//Session::flash('message','Loan Sanction Successfully Saved.');
		return view('leave/loan-sanction-config', compact('data','loan_sanction_date'));
		
		
	}
	
	
	public function saveLoanSanctionConfig(Request $request)
	{
		//$loan_sanction_config_rs=LoanSanctionConfig::
		$loan_sanction_structure=new LoanSanctionConfig();
		$data = request()->except(['_token','sanction_month','recover_month','recover_year']);
		//$data['sanction_status']=$sanction_status="Not Approved";
		//$data['loan_sanction_no']=$sanction_code;
		//dd($data);
		
		$loan_sanction_amount=$request->loan_sanction_amount;
		$rate_of_intrest=$request->rate_of_intrest;
		$number_of_installement=$request->number_of_installement;
		$months=$request->recover_month;
		$years=$request->recover_year;
		$recover_status=$request->loan_sanction_status;
		
		$intrest_amt=($loan_sanction_amount*$rate_of_intrest)/100;
		
		$principal_amt_per_month=$loan_sanction_amount/$number_of_installement;
		
		$intrest_amt_per_month=$intrest_amt/$number_of_installement;

		$principal_amt_per_month=round($principal_amt_per_month,2);
		$intrest_amt_per_month=round($intrest_amt_per_month,2);
			
		$k=1;
		for($i=$number_of_installement; $i >= 1; $i--)
		{
			if($months == 13){ $months=1;  $years=$years+$k;}
			else if($months == 1){ $months=$months+$k;  }
			else {  $months=$months+$k; } 
		
			$data['principal_amt']=$principal_amt_per_month;
			$data['intrest_amt']=$intrest_amt_per_month;
			$data['recover_month']=$months;
			$data['recover_year']=$years;
			
			$loan_sanction_structure->create($data);			
		
		}
		//dd($data);
		
		return redirect('leave/vw-loan-sanction');
	}
	
}
