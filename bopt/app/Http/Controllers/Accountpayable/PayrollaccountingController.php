<?php
namespace App\Http\Controllers\Accountpayable;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use View;
use Validator;
use Session;
use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;


class PayrollaccountingController extends Controller
{

	public function viewPayrollAccounting()
	{
		$email = Auth::user()->email;
        $data['Roledata']=DB::table('role_authorization')      
        ->join('module', 'role_authorization.module_name', '=', 'module.id')
        ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
        ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
        ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
        ->where('member_id','=',$email) 
        ->get();
        $data['process_payroll']=DB::table('payroll_details')->where('proces_status','=','process')->groupby('month_yr')->get();

        $data['accounthead']=DB::table('account_master')
        ->where('account_code', 'LIKE', '%15%')
        ->orderBy('account_name', 'asc')
        ->get();

        $data['banklist'] = DB::table('company_bank')
            ->leftJoin('bank_masters', 'company_bank.bank_name', '=', 'bank_masters.master_bank_name')
            ->groupBy('company_bank.bank_name')
            ->get();
        return view('payrollaccounting/vw_payroll_accounting',$data);
	}
	
    public function savePayrollAccounting(Request $request)
    {
        echo "<pre>";print_r($request->all()); exit;
        $data=request()->except(['_token']);

        $check_bank_balance = DB::table('bank_balance')
            ->where('bank_branch_id', $request['bankbranch_id'])
            ->orderBy('id', 'desc')
            ->first();


        if(!empty($check_bank_balance)){
            
            $opening_balance = $check_bank_balance->balance_amt;

        }else{
            
            $company_bank_dtl= DB::table('company_bank')
                ->where('id', $data['bank_branch_id'])
                ->first();

            $opening_balance = $company_bank_dtl->opening_balance;  
        }


        $current_balance = $opening_balance - $request['payment_amount'];

        $last_insert_id = DB::table('payroll_payment_booking')->orderBy('id', 'desc')->first();
           
        if(!empty($last_insert_id)){
            
            $voucher_no = 'PR'.'-'.(($last_insert_id->id)+1).'-'.date('Y').'-'.(date('Y')+1);
            
        }else{

            $voucher_no = 'PR'.'-1-'.date('Y').'-'.(date('Y')+1);
           
        }

        
        foreach($data['account_head_id'] as $key=>$value){

            $transaction_id="GL".date("d/m/Y")."/".time()."";
            
            $payroll_voucher_entry = DB::table('payroll_payment_booking')->insert(
                ['voucher_no' => $voucher_no, 'account_head_id' => $value,'sub_account_id' => $data['sub_account_id'][$key],'transaction_code' => $data['transaction_code'][$key],'account_tool' =>$data['account_tool'][$key],'voucher_type' => 'salary_voucher', 'bank_name' => $data['payment_bank_id'],'bank_branch_id' => $data['bank_branch_id'],'final_bill_amt' => $data['payable_amount'][$key],'payable_amt' => $data['payable_amount'][$key],'approve_status' => 'Paid']
            );

            $voucher_entry = DB::table('voucher_entry')->insert(
                ['voucher_no' => $voucher_no, 'account_head_id' => $value,'sub_account_id' => $data['sub_account_id'][$key],'transaction_code' => $data['transaction_code'][$key],'account_tool' =>$data['account_tool'][$key],'voucher_type' => 'salary_voucher', 'bank_name' => $data['payment_bank_id'],'bank_branch_id' => $data['bank_branch_id'],'final_bill_amt' => $data['payable_amount'][$key],'payable_amt' => $data['payable_amount'][$key],'bill_status'=>'Paid','approve_status' => 'Approve']
            );


            if($data['account_tool'][$key]=='debit'){
                 
                DB::table('gl_entry')->insert(
                ['transaction_id' => $transaction_id, 'gl_account_head' => $value,'dr_account' => $data['transaction_code'][$key],'cr_account' => $data['bank_branch_id'],'voucher_no' => $voucher_no,'amount' => $data['payable_amount'][$key],'gl_date' => date("Y-m-d"),'voucher_date' => date("Y-m-d"), 'payment_release_date' => ""]
                );

                $payment_entry = DB::table('payment_dtl')->insert(
                ['payment_code' => time(),'voucher_id' => $voucher_no,'vouchertype' => 'salary_voucher','payment_mode' => 'neft', 'payment_mode_no' => '','cheque_draft_date' => '','bank_id' => $data['payment_bank_id'],'bank_branch_id' => $data['bank_branch_id'],'payment_amount' => $data['payable_amount'][$key],'due_amount' => '','payment_booking_date' => date('Y-m-d'),'payment_release_date' => date('Y-m-d'),'encloser_dtl' =>'','narration' => '','payment_status' =>'Paid','created_at' => date('Y-m-d H:i:s')]
                );

                DB::table('bank_balance')->insert(
                ['opening_balance' => $opening_balance,'voucher_no' => $request['voucher_no'],'bank_id' => $request['bank_id'],'bank_branch_id' => $request['bankbranch_id'],'income' => '0','expense' => $request['payment_amount'], 'balance_amt' => $current_balance,'created_at' => date('Y-m-d H:i:s')]
                );

            }else{

                DB::table('gl_entry')->insert(
                ['transaction_id' => $transaction_id, 'gl_account_head' => $value,'dr_account' => $data['bank_branch_id'],'cr_account' => $data['transaction_code'][$key],'voucher_no' => $voucher_no,'amount' => $data['payable_amount'][$key],'gl_date' => date("Y-m-d"),'voucher_date' => date("Y-m-d"), 'payment_release_date' => ""]
                ); 
            }


           

            if($data['account_tool'][$key]=='debit'){
                 
                DB::table('gl_entry')->insert(
                ['transaction_id' => $transaction_id, 'gl_account_head' => $value,'dr_account' => $data['bank_branch_id'] ,'cr_account' => $data['transaction_code'][$key],'voucher_no' => $voucher_no,'amount' => $data['payable_amount'][$key],'gl_date' => date("Y-m-d"),'voucher_date' => date("Y-m-d"), 'payment_release_date' => ""]
                );

            }else{

                DB::table('gl_entry')->insert(
                ['transaction_id' => $transaction_id, 'gl_account_head' => $value,'dr_account' => $data['transaction_code'][$key],'cr_account' => $data['bank_branch_id'],'voucher_no' => $voucher_no,'amount' => $data['payable_amount'][$key],'gl_date' => date("Y-m-d"),'voucher_date' => date("Y-m-d"), 'payment_release_date' => ""]
                ); 
            }
        }


        //DB::table('payroll_details')->where('month_yr', $request['month_year'])->update(['proces_status' => 'Paid']);

        $request->session()->flash('status','success');
        $request->session()->flash('message','Record successfully added!');
        return redirect('payroll/accounting');
    }


    /*public function payrollPaymentListing()
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
            
            $data['payablelisting'] = DB::table('payment_dtl')
            ->leftJoin('payroll_payment_booking', 'payment_dtl.voucher_id', '=', 'payroll_payment_booking.voucher_no')
            ->where('payroll_payment_booking.approve_status','=','Paid')
            ->get();
        }catch(Exception $e){
            
            return $e->getMessage();
        }

        return view('payrollaccounting/payrollbilllisting',$data);
    }


    public function viewPayrollpayment()
    {
        $email = Auth::user()->email;
        $data['Roledata']=DB::table('role_authorization')      
        ->join('module', 'role_authorization.module_name', '=', 'module.id')
        ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
        ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
        ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
        ->where('member_id','=',$email) 
        ->get();
        
        $data['voucherlist']=DB::table('payroll_payment_booking')
        ->where('approve_status','=','Not Approve')
        ->where('account_tool','=','debit')
        ->groupBy('voucher_no')
        ->get();

        $data['accounthead']=DB::table('account_master')
        ->where('account_code', 'LIKE', '%15%')
        ->orderBy('account_name', 'asc')
        ->get();

        $data['journalhead']=DB::table('coa_master')->get();
        $data['banklist'] = DB::table('company_bank')->get();

        return view('payrollaccounting/vw_payroll_payment',$data);
    }


    public function payrollAccountingPayment(Request $request)
    {
        //echo "<pre>"; print_r($request->all()); exit;
        $check_bank_balance = DB::table('bank_balance')
            ->where('bank_branch_id', $request['bankbranch_id'])
            ->orderBy('id', 'desc')
            ->first();


        if(!empty($check_bank_balance)){
            
            $opening_balance = $check_bank_balance->balance_amt;

        }else{
            
            $company_bank_dtl= DB::table('company_bank')
                ->where('id', $request['bankbranch_id'])
                ->first();

            $opening_balance = $company_bank_dtl->opening_balance;  
        }


        $current_balance = $opening_balance - $request['payment_amount'];

        if($current_balance>=0){

            DB::beginTransaction();

            $payment_entry = DB::table('payment_dtl')->insert(
            ['payment_code' => $request['payment_code'],'voucher_id' => $request['voucher_no'],'vouchertype' => $request['voucher_type'],'payment_mode' => $request['payment_mode'], 'payment_mode_no' => $request['cheque_draft'],'cheque_draft_date' => $request['cheque_date'],'bank_id' => $request['bank_id'],'bank_branch_id' => $request['bankbranch_id'],'payment_amount' => $request['payment_amount'],'due_amount' => '','payment_booking_date' => $request['payment_booking_date'],'payment_release_date' => $request['release_date'],'encloser_dtl' => $request['enclosure_dtl'],'narration' => '','payment_status' =>'Paid','created_at' => date('Y-m-d H:i:s')]
            );

            DB::table('bank_balance')->insert(
            ['opening_balance' => $opening_balance,'voucher_no' => $request['voucher_no'],'bank_id' => $request['bank_id'],'bank_branch_id' => $request['bankbranch_id'],'income' => '0','expense' => $request['payment_amount'], 'balance_amt' => $current_balance,'created_at' => date('Y-m-d H:i:s')]
            );

            DB::table('payroll_payment_booking')
                ->where('voucher_no', $request['voucher_no'])
                ->update(['approve_status' => 'Paid']);

            $transaction_id="GL".date("d/m/Y")."/".time()."";

            DB::table('gl_entry')->insert(
                ['transaction_id' => $transaction_id, 'gl_account_head' => $request['account_code'],'dr_account' => $request['bankbranch_id'] ,'cr_account' => $request['transaction_code'] ,'voucher_no' => $request['voucher_no'],'amount' => $request['payment_amount'],'gl_date' => date("Y-m-d"),'voucher_date' => "", 'payment_release_date' => $request['release_date']]
                );
            DB::commit();
            $request->session()->flash('status','success');
            $request->session()->flash('message','Record successfully added!');


        }else{
            
            DB::rollback();
            $request->session()->flash('status','success');
            $request->session()->flash('message','You have insufficient Fund!');
        }   

        return redirect('payrollpayment/listing');
    }*/

}
