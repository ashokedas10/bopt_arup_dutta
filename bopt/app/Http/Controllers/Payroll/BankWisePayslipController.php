<?php
namespace App\Http\Controllers\Payroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\PayrollDetails;
use App\Company;
use App\Grade;
use App\EmployeeMaster;
use Validator;
use Session;
use View;
use NumberToWords\NumberToWords;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Crypt;
use Excel;
use App\Bank;
use App\Exports\BankStatementExport;

class BankWisePayslipController extends Controller
{
    //
	public function getBankWisePayslip()
	{
		$data['result']='';
		$data['month_details']= DB::table('payroll_details')->distinct()->get(['month_yr']);
		$data['bank_details']= DB::table('bank_masters')->get();
		$data['bankname'] = $data['monthyr'] = '';

		$payroll_details_rs='';
		return view('pis/bank-statement',$data);
    }
	
	public function showBankWiseStatement(Request $request)
	{
		//print_r($request->all()); exit;
		$data['payroll_details_rs'] = $data['result'] ='';
		$data['monthyr'] =  $request['month_yr'];//dd($emp_id);
		$data['bankname'] =  $request['bank'];
		
		
		$validator=Validator::make($request->all(),[		
			'month_yr'=>'required',
			// 'bank'=>'required',
			[
			'month_yr.required'=>'Month Year Required',
			'bank.required'=>'Bank Required'
			]
		]);
		
		if($validator->fails())
		{
			return redirect('pis/vw-bank-statement')->withErrors($validator)->withInput();
		}
		if($request['bank'] == '14'){
			$data['payroll_details_rs']=DB::table('payroll_details')
                    ->join('employee','payroll_details.employee_id','=','employee.emp_code')
                    ->where(['payroll_details.month_yr'=>$request['month_yr'],'employee.emp_bank_name'=>$request['bank']])
                    ->select('payroll_details.*','employee.*')
                    ->get();


		}elseif($request['bank'] == '') {

                    $data['payroll_details_rs']=DB::table('payroll_details')
                    ->join('employee','payroll_details.employee_id','=','employee.emp_code')
                    ->where('payroll_details.month_yr','=', $request['month_yr'])
                    ->where('employee.emp_bank_name', '!=', '14')
                    ->select('payroll_details.*','employee.*')
                     ->get();

             

		}
		
        // print_r($data['payroll_details_rs']); exit;
        foreach($data['payroll_details_rs'] as $payroll)
        {
                   
			$data['result'].='<tr style="text-align:center;">
						<td>'.$payroll->employee_id.'</td>
						<td>'.$payroll->emp_name.'</td>
						<td>'.$payroll->emp_net_salary.'</td>
						<td>'.$payroll->month_yr.'</td>
						
					</tr>';
				//dd($result);
        }
              
      	$data['month_details']= DB::table('payroll_details')->distinct()->get(['month_yr']);
		$data['bank_details']= DB::table('bank_masters')->get();
		//print_r($data);die;
		return view('pis/bank-statement',$data);					
	}
	
	public function viewBankStatement(Request $request)
	{
		// dd($request);
		$data['bankdeatils'] = DB::table('bank_masters')
            ->join('bank','bank_masters.id','=','bank.bank_name')
            ->where('bank_masters.id','=',$request['bankname'])
            ->select('bank.*','bank_masters.*')
            ->first();

            if(is_null($request['bankname'])) {
            	$data['payroll_details_rs']=DB::table('payroll_details')
                    ->join('employee','payroll_details.employee_id','=','employee.emp_code')
                    ->where('payroll_details.month_yr','=', $request['monthyr'])
                    ->where('employee.emp_bank_name', '!=', '14')
                    ->select('payroll_details.*','employee.*')
                     ->get();
            }
            else {
            	$data['payroll_details_rs']=DB::table('payroll_details')
                    ->join('employee','payroll_details.employee_id','=','employee.emp_code')
                    ->where(['payroll_details.month_yr'=>$request['monthyr'],'employee.emp_bank_name'=>$request['bankname']])
                    ->select('payroll_details.*','employee.*')
                    ->get();
            }
            // dd($data['payroll_details_rs']);
        
		// $data['payroll_details_rs']=DB::table('payroll_details')
  //           ->join('employee','payroll_details.employee_id','=','employee.emp_code')
  //           ->where(['payroll_details.month_yr'=>$request->monthyr,'employee.emp_bank_name'=>$request->bankname])
  //           ->select('payroll_details.*','employee.*')
  //           ->orderBy('payroll_details.emp_net_salary', 'desc')
  //           ->get();

       	$data['month']= $request->monthyr;
		$data['company'] = DB::table('company')->first();
		return view('pis/bank-statement-report',$data);
	}

	public function downloadExcel($bank,$month,$year)
	{
		$month_yr = $month .'/'.$year;
		return (new BankStatementExport($bank,$month_yr))->download('bank-statement.xlsx');
	}
}
