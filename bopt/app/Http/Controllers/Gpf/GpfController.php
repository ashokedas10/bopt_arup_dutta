<?php

namespace App\Http\Controllers\Gpf;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use View;
use Validator;
use Session;
use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;

class GpfController extends Controller
{

	public function viewApproveListing()
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
            $data['approve_gpf_listing']  = DB::table('gpf_loan_apply')
            ->leftJoin('employee', 'gpf_loan_apply.employee_code', '=', 'employee.emp_code')
            ->where('gpf_loan_apply.loan_status','=','APPROVED')
            ->orWhere('gpf_loan_apply.loan_status','=','Paid')
            ->select('gpf_loan_apply.*', 'employee.emp_fname', 'employee.emp_mname','employee.emp_lname')
            ->orderBy('gpf_loan_apply.id', 'desc')
            ->get();
            
        }catch(Exception $e){
            
            return $e->getMessage();
        }

		return view('gpf/approvegpflisting',$data);
	}

    public function applyGpf($loan_id){
       
        $email = Auth::user()->email;
        $data['Roledata']=DB::table('role_authorization')      
        ->join('module', 'role_authorization.module_name', '=', 'module.id')
        ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
        ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
        ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
        ->where('member_id','=',$email) 
        ->get();

        $data['banklist'] = DB::table('gpf_bank')->get();

        $data['tdslist']=DB::table('tds_master')->get();

        $data['gpf_loan_dtl']=DB::table('gpf_loan_apply')->where('id','=',$loan_id) ->first();
        $data['emp_dtl']=DB::table('employee')->where('emp_code','=',$data['gpf_loan_dtl']->employee_code) ->first();
        $data['gpf_details']=DB::table('gpf_details')->select(DB::raw('sum(closing_balance) as total_closing_balance'))->where('emp_code','=',$data['gpf_loan_dtl']->employee_code)->get();
        //print_r($data['gpf_details']); exit;
        return view('gpf/vw-gpfapproved',$data);
    }

	public function saveApplyGpf(Request $request){
       
        $get_bank_balance = DB::table('gpf_bank_balance')
        ->where('bank_branch_id', $request['bank_branch_id'])
        ->orderBy('id', 'desc')
        ->first();

        if(empty($get_bank_balance)){

            $bank_balance = DB::table('gpf_bank')
            ->where('id', $request['bank_branch_id'])
            ->first();

            $opening_balance = $bank_balance->opening_balance;

        }else{
            $opening_balance = $get_bank_balance->balance_amt;
        }

        $current_balance = $opening_balance - $request['payable_amt'];

        if($opening_balance<$request['payable_amt']){

                $request->session()->flash('status','success');
                $request->session()->flash('message','Insufficient fund!');

        }else{

                DB::table('gpf_loan_apply_dtl')->insert(['loan_id' => $request['loan_id'],'emp_code' =>  $request['emp_code'], 'gpf_amt' => $request['gpf_amt'],'apply_amt' => $request['apply_amt'],'bank_id' => $request['bank_branch_id'],'tds_id' => $request['tds_id'],'tds_percentage' => $request['tds_percentage'],'deduction_amt'=> $request['deduction_amt'],'sanction_amt' => $request['scanction_amt'],'created_at' => date("Y-m-d")]);

                $get_last_month_gpf = DB::table('gpf_details')
                ->where('emp_code', $request['emp_code'])
                ->orderBy('id', 'desc')
                ->first();

               
                $gpf_closing_balance = ($get_last_month_gpf->closing_balance - $request['scanction_amt']);

                DB::table('gpf_details')
                ->where('id', $get_last_month_gpf->id)
                ->update(['closing_balance' => $gpf_closing_balance]);

                DB::table('gpf_loan_apply')
                ->where('id', $request['loan_id'])
                ->update(['loan_status' => 'Paid']);

                DB::table('gpf_bank_balance')->insert(['bank_id' => $request['bank_id'],'bank_branch_id' =>  $request['bank_branch_id'], 'opening_balance'=> $opening_balance, 'income' => "",'expense' => $request['scanction_amt'],'balance_amt' => $current_balance,'created_at' => date("Y-m-d")]);

                $request->session()->flash('status','success');
                $request->session()->flash('message','Record successfully added!');
        }

       
		return redirect('gpf/approvedlisting');
    }


    public function termDepositListing()
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
            $data['term_deposit_listing']  = DB::table('term_deposit')
            ->orderBy('id', 'desc')
            ->get();
            
        }catch(Exception $e){
            
            return $e->getMessage();
        }

        return view('gpf/termdepositlisting',$data);
    }
    
    public function viewTermDeposit()
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
          
            
        }catch(Exception $e){
            
            return $e->getMessage();
        }

        return view('gpf/vw-termdeposit',$data);
    }



    public function saveTermDeposit(Request $request){
       
        DB::table('term_deposit')->insert(
            ['bank_name' => $request['bank_name'],'account_no' => $request['account_no'],'date_of_invesment' => $request['date_of_invesment'],'invested_amt' => $request['invested_amt'],'rate_of_interest'=>$request['rate_of_interest'],'date_of_maturity' => $request['date_of_maturity'],'maturity_value' => $request['maturity_value'],'actual_maturity' => $request['actual_maturity'],'term_period' => $request['term_period'],'reinvested_value' => $request['reinvested_value'],'tds_amt' => $request['tds_amt'],'deposit_status' => $request['deposit_status'],'created_at' => date("Y-m-d")]
            );
        
        $request->session()->flash('status','success');
        $request->session()->flash('message','Record successfully added!');
        return redirect('gpf/termdepositlisting');
    }

    public function viewPaymentListing()
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
            $data['payment_gpf_listing']  = DB::table('gpf_payment')
            ->orderBy('id', 'desc')
            ->get();
            
        }catch(Exception $e){
            
            return $e->getMessage();
        }

        return view('gpf/paymentgpflisting',$data);
    }


    public function viewGpfPaymentView()
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
          
            
        }catch(Exception $e){
            
            return $e->getMessage();
        }

        return view('gpf/vw-gpfpayment',$data);
    }



    public function addGpfPaymentView(Request $request){
       
        $check_year = DB::table('gpf_payment')->whereDate('created_at', '=', date('Y-m-d'))->first();
        
        if(empty($check_year)){
            DB::table('gpf_payment')->insert(
            ['inest_rcv_tdr' => $request['inest_rcv_tdr'],'invt_encash' => $request['invt_encash'],'inst_recv' => $request['inst_recv'],'tds_inest' => $request['tds_inest'],'invt_year'=>$request['invt_year'],'created_at' => date("Y-m-d")]
            );
        $request->session()->flash('status','success');
        $request->session()->flash('message','Record successfully added!');

        }else{

        $request->session()->flash('status','success');
        $request->session()->flash('message','Their is a duplicate Entry in table');

        }
        
        return redirect('gpf/paymententrylisting');
    }



          public function applyterm($term_id){

             $email = Auth::user()->email;
        $data['Roledata']=DB::table('role_authorization')      
        ->join('module', 'role_authorization.module_name', '=', 'module.id')
        ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
        ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
        ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
        ->where('member_id','=',$email) 
        ->get();
 $data['term_deposit']=DB::table('term_deposit')->where('id','=',$term_id) ->first();

  return view('gpf/vw-termapproved',$data);
          }
          public function upadteTermDeposit(Request $request){


    $data2=array(
           'bank_name'=>$request->bank_name,
            'account_no'=>$request->account_no,
            'date_of_invesment'=>$request->date_of_invesment,
            'invested_amt'=>$request->invested_amt,
            'rate_of_interest'=>$request->rate_of_interest,
            'maturity_value'=>$request->maturity_value,
            'date_of_maturity'=>$request->date_of_maturity,
            'actual_maturity'=>$request->actual_maturity,
            'term_period'=>$request->term_period,
            'reinvested_value'=>$request->reinvested_value,
            'tds_amt'=>$request->tds_amt,
            'deposit_status'=>$request->deposit_status
            
            );

 DB::table('term_deposit')
                ->where('id', $request['term_id'])
                ->update($data2);
                 
                  

  $email = Auth::user()->email;
        $data['Roledata']=DB::table('role_authorization')      
        ->join('module', 'role_authorization.module_name', '=', 'module.id')
        ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
        ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
        ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
        ->where('member_id','=',$email) 
        ->get();



 $data['term_deposit_listing']  = DB::table('term_deposit')
            ->orderBy('id', 'desc')
            ->get();
            



  $request->session()->flash('status','success');
        $request->session()->flash('message','Record successfully Updated!');

        return redirect('gpf/termdepositlisting');




}
public function listinggpf()
{
    $email = Auth::user()->email;
    $data['Roledata']=DB::table('role_authorization')
        ->join('module', 'role_authorization.module_name', '=', 'module.id')
        ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
        ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
        ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
        ->where('member_id','=',$email)
        ->get();


        $data['receivablelisting']  =  DB::table('received_voucher_entry_gpf')
        ->orderBy('id', 'desc')
        ->get();


    $data['accounthead']=DB::table('gpf_account_head')
    ->where('acc_type','=','Income')
    ->get();


    return view('gpf/receivablelisting',$data);
}


public function viewgpf()
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


    }catch(Exception $e){

        return $e->getMessage();
    }

    $data['accounthead']=DB::table('gpf_account_head') ->where('acc_type','=','Income')
    ->distinct()->get(['account_head']);

    $data['banklist'] = DB::table('gpf_bank')

        ->get();

    return view('gpf/vw-receivable',$data);
}



public function savegpfbooking(Request $request)
{
    


            $check_bank_balance = DB::table('gpf_bank_balance')
        ->where('bank_branch_id', $request['bank_branch_id'])
        ->orderBy('id', 'desc')
        ->first();

        if (!empty($check_bank_balance)) {

            $opening_balance = $check_bank_balance->balance_amt;
             $opening_balance;

        }
        else
        {

                    $company_bank_dtl = DB::table('gpf_bank')
                    ->where('id', $request['bank_branch_id'])
                    ->first();
                $opening_balance = $company_bank_dtl->opening_balance;


        }

        $current_balance = $opening_balance + $request['payable_amt'];

      //  $schedule_no = explode("/", $request['account_head_id']);

        $voucher_entry = DB::table('received_voucher_entry_gpf')->insert(
            ['voucher_no' => $request['voucher_no'], 'account_head_id' => $request['account_head_id'], 'sub_act_head_id' => $request['sub_account_id'],'account_tool' => $request['account_tool'], 'payment_mode' => $request['payment_mode'], 'bank_name' => $request['bank_id'],'bank_branch_id' => $request['bank_branch_id'], 'received_amount' => $request['bill_amt'],'gst_amt' => $request['bill_gst_amt'],'total_amt' => $request['payable_amt'],'remarks' => $request['entry_remark'],'bill_status' => 'Received', 'created_at' => date("Y-m-d")]
        );


       // $transaction_id="GL".date("d/m/Y")."/".time()."";
        $payment_code = time();


        //

        // if($request['account_tool']=='debit'){

        //     DB::table('gl_entry')->insert(
        //         ['transaction_id' => $transaction_id, 'gl_account_head' => $request['account_head_id'],'dr_account' => $request['transaction_code'],'cr_account' => $request['bank_branch_id'],'voucher_no' => $request['voucher_no'],'amount' => $request['payable_amt'],'gl_date' => date("Y-m-d"), 'voucher_date' => date("Y-m-d"), 'payment_release_date' => "", 'payment_rcv_date' => date("Y-m-d")]
        //     );

        //     DB::table('gl_entry')->insert(
        //         ['transaction_id' => $transaction_id, 'gl_account_head' => $request['account_head_id'], 'dr_account' => $request['bank_branch_id'], 'cr_account' => $request['transaction_code'], 'voucher_no' => $request['voucher_no'], 'amount' => $request['net_amt'], 'gl_date' => date("Y-m-d"), 'voucher_date' => "", 'payment_release_date' => "", 'payment_rcv_date' => date("Y-m-d")]
        //     );


        // }


           // DB::table('gl_entry')->insert(
               // ['transaction_id' => $transaction_id, 'gl_account_head' => $request['account_head_id'],'dr_account' => $request['bank_branch_id'],'cr_account' => $request['transaction_code'],'voucher_no' => $request['voucher_no'],'amount' => $request['payable_amt'],'gl_date' => date("Y-m-d"), 'voucher_date' => "", 'payment_release_date' => date("Y-m-d"), 'payment_rcv_date' => date("Y-m-d")]
           // );

           // DB::table('gl_entry')->insert(
               // ['transaction_id' => $transaction_id, 'gl_account_head' => $request['account_head_id'], 'dr_account' => $request['transaction_code'], 'cr_account' => $request['bank_branch_id'], 'voucher_no' => $request['voucher_no'], 'amount' => $request['payable_amt'], 'gl_date' => date("Y-m-d"), 'voucher_date' => date("Y-m-d"), 'payment_release_date' => "", 'payment_rcv_date' => date("Y-m-d")]
           // );



        $payment_entry = DB::table('payment_rcvd_dtl_gpf')->insert(
            ['payment_code' => $payment_code, 'voucher_no' => $request['voucher_no'], 'account_code' => $request['account_head_id'], 'sub_account_id' => $request['sub_account_id'],  'account_type' => $request['account_tool'], 'bank_id' => $request['bank_id'], 'bank_branch_id' => $request['bank_branch_id'], 'final_bill_amt' => $request['bill_amt'], 'bill_gst_amt' => $request['bill_gst_amt'], 'net_amt' => $request['payable_amt'], 'payment_mode' => $request['payment_mode'], 'cheque_draft' => $request['cheque_draft'], 'cheque_date' => $request['cheque_date'], 'payment_rcv_date' => date('Y-m-d'), 'remarks' => $request['entry_remark'], 'payment_status' => 'Received', 'created_at' => date('Y-m-d H:i:s')]
        );


        DB::table('gpf_bank_balance')->insert(
            ['opening_balance' => $opening_balance, 'voucher_no' => $request['voucher_no'], 'bank_id' => $request['bank_id'], 'bank_branch_id' => $request['bank_branch_id'], 'income' => $request['payable_amt'], 'expense' => '0', 'balance_amt' => $current_balance, 'created_at' => date('Y-m-d H:i:s')]
        );




  Session::flash('message','Information Successfully Added.');
    return redirect('gpf/list');


}



public function listingpay()
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
        $data['payablelisting']  =   DB::table('voucher_entry_gpf')
        ->orderBy('id', 'desc')
        ->get();

    }catch(Exception $e){

        return $e->getMessage();
    }



    $data['accounthead']=DB::table('gpf_account_head') ->where('acc_type','=','Expense')->get();

    return view('gpf/paylist',$data);
}



public function viewpay()
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


    }catch(Exception $e){

        return $e->getMessage();
    }




    $data['accounthead']=DB::table('gpf_account_head')
    ->where('acc_type','=','Expense')
    ->get();

    $data['banklist'] = DB::table('gpf_bank')

    ->get();

    return view('gpf/vw-payable',$data);
}


public function savepaybooking(Request $request){

    $voucher_entry = DB::table('voucher_entry_gpf')->insert(
        ['voucher_no' => $request['voucher_no'], 'account_head_id' => $request['account_head_id'],


        'sub_account_id' => $request['sub_account_id'],'account_tool' => $request['account_tool'],
        'voucher_type' => $request['voucher_type'], 'bank_id' => $request['bank_id'],
        'bank_branch_id' => $request['bank_branch_id'],'created_at' =>  date('Y-m-d H:i:s'),
        'bill_amt' => $request['bill_amt'],
       'remarks' => $request['remarks'],'bill_status' => '0']
    );


 //   $transaction_id="GL".date("d/m/Y")."/".time()."";


       // if(!empty($request['bank_id'])){

       //     $gl_account= $request['bank_id'];

       // } elseif (!empty($request['employee_id'])) {

          //  $gl_account= $request['employee_id'];

      //  } else {

          //  $gl_account= $request['vendor_name'];
//DB::table('purchase_item')
         //   ->where('purchase_order_no', $request['purchase_code'])
         //   ->update(['status' => 'Bill Generated']);
       // }


  //  if($request['account_tool']=='debit'){

     //   DB::table('gl_entry')->insert(
      //  ['transaction_id' => $transaction_id, 'gl_account_head' => $request['account_head_id'],'dr_account' => $request['transaction_code'],'cr_account' => $gl_account,'voucher_no' => $request['voucher_no'],'voucher_date'=> $request['bill_booking_date'],'amount' => $request['payable_amt'],'gl_date' => date("Y-m-d"),'voucher_date' => $request['billdate'], 'payment_release_date' => ""]
      //  );


   // }else{

     //   DB::table('gl_entry')->insert(
      //  ['transaction_id' => $transaction_id, 'gl_account_head' => $request['account_head_id'],'dr_account' => $gl_account,'cr_account' => $request['transaction_code'],'voucher_no' => $request['voucher_no'], 'voucher_date'=> $request['bill_booking_date'],'amount' => $request['payable_amt'],'gl_date' => date("Y-m-d"),'voucher_date' => $request['billdate'], 'payment_release_date' => ""]
      //  );

  //  }


  $check_bank_balance = DB::table('gpf_bank_balance')
  ->where('bank_branch_id', $request['bank_branch_id'])
  ->orderBy('id', 'desc')
  ->first();

  if (!empty($check_bank_balance)) {

      $opening_balance = $check_bank_balance->balance_amt;
       $opening_balance;

  }
  else
  {

              $company_bank_dtl = DB::table('gpf_bank')
              ->where('id', $request['bank_branch_id'])
              ->first();
          $opening_balance = $company_bank_dtl->opening_balance;


  }

  $current_balance = $opening_balance - $request['bill_amt'];

  DB::table('gpf_bank_balance')->insert(
    ['opening_balance' => $opening_balance, 'voucher_no' => $request['voucher_no'], 'bank_id' => $request['bank_id'], 'bank_branch_id' => $request['bank_branch_id'], 'income' =>'0', 'expense' =>  $request['bill_amt'], 'balance_amt' => $current_balance, 'created_at' => date('Y-m-d H:i:s')]
);
}

}
