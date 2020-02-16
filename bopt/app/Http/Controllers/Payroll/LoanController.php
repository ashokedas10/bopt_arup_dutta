<?php
namespace App\Http\Controllers\Payroll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\LoanModel;
use Validator;
use Session;
use View;

class LoanController extends Controller
{
    //
	public function getLoan()
	{
		$loan_rs = LoanModel::all(); 
		return view('pis/loan', compact('loan_rs'));
	}
	
	public function viewLoan()
	{
		
		$loan_id=0;
		$loan_rs=LoanModel::all()->last();
	
		if(!empty($loan_rs))
		{
			$loan_id=$loan_rs->id;
			$k=$loan_id+1;
			if($k<10)
			{
				$loan_code='L-'.date('Y').'-0'.$k;
			}
			
			if($k>=10)
			{
				$loan_code='L-'.date('Y').'-'.$k;
			}
		}
		else
		{
			$k=$loan_id+1;
			
			if($k<10)
			{
				$loan_code='L-'.date('Y').'-0'.$k;
			}
		}
		
		return view('pis/add-new-loan', compact('loan_code'));
		
	}
	
	public function saveLoan(Request $request)
	{
		//$info=array();
		 
		$validator = Validator::make($request->all(), [
		'loan_id' => 'required',
		'loan_type' => 'required',
		'loan_status'=>'required'
        ]);
		
		if ($validator->fails()) {
            return redirect('pis/add-new-loan')
                        ->withErrors($validator)
                        ->withInput();
        }
		
		//$info['loan_id']= $request->input('loan_id');
		//$info['loan_type']=	 $request->input('loan_type');
		//$info['remarks']=	 $request->input('remarks');
		//$info['loan_status']=	$request->input('loan_status');	
			
		//return last insert ID
		//$insertid=$this->lastInsertField=DB::table('loan_master')->insertGetId($info);
		$data = $request->all();
		$data=request()->except(['_token']);
		$loan=new LoanModel();
		$loan->create($data);
		Session::flash('message','Loan Information Successfully Saved.');

		return redirect('pis/vw-loan');
	}
}
