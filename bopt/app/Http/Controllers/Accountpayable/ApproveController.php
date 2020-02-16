<?php

namespace App\Http\Controllers\Accountpayable;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Payable\Voucherentry;
use View;
use Validator;
use Session;
use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;

class ApproveController extends Controller
{
    public function listing()
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
			$voucher = DB::table('voucher_entry')
			->where('voucher_type','!=','salary_voucher')
			->where('approve_status','=','Not Approve')
			->where('bill_status','=','NP')

            ->groupBy('voucher_no')
            ->get();

foreach($voucher as $voucheritem){


	$data['payablelisting'][] = DB::table('voucher_entry')
			->where('voucher_type','!=','salary_voucher')
			->where('approve_status','=','Not Approve')
			->where('bill_status','=','NP')
            ->where('voucher_no','=',$voucheritem->voucher_no)
        	->orderBy('id', 'desc')
            ->first();

}
			
		}catch(Exception $e){
			
			return $e->getMessage();
		}
		  $data['voucher'] = DB::table('voucher_entry')
			->where('voucher_type','!=','salary_voucher')
			->where('approve_status','=','Not Approve')
			->where('bill_status','=','NP')

            ->groupBy('voucher_no')
            ->get();

		return view('accountpayable/nonapprovelisting',$data);
	}

	public function getNonapproveVoucherById($voucher_id){

		$email = Auth::user()->email;
	   	$data['Roledata']=DB::table('role_authorization')      
	    ->join('module', 'role_authorization.module_name', '=', 'module.id')
	    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
	    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
	    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
	    ->where('member_id','=',$email) 
	    ->get();

		try{
			
			    $voucher = DB::table('voucher_entry')
			->where('voucher_type','!=','salary_voucher')
			->where('approve_status','=','Not Approve')
			->where('bill_status','=','NP')
            ->where('voucher_no','=',$voucher_id)
            ->groupBy('voucher_no')
            ->get();

foreach($voucher as $voucheritem){


	$data['payment_details'] = DB::table('voucher_entry')
			->where('voucher_type','!=','salary_voucher')
			->where('approve_status','=','Not Approve')
			->where('bill_status','=','NP')
            ->where('voucher_no','=',$voucheritem->voucher_no)
        	->orderBy('id', 'desc')
            ->first();
            $data['payment'] = DB::table('voucher_entry')
            ->select(DB::raw('sum(payable_amt) as payable_amt'))
			->where('voucher_type','!=','salary_voucher')
            ->where('approve_status','=','Not Approve')
            ->where('account_tool','=','debit')
			->where('bill_status','=','NP')
            ->where('voucher_no','=',$voucheritem->voucher_no)

        	->orderBy('id', 'desc')
            ->get();


}
			
		}catch(Exception $e){
			return $e->getMessage();
		}

	    $data['journalhead']=DB::table('coa_master')->get();
	    $data['employeelist']=DB::table('employee')->where('status','=','active')->orderBy('emp_fname', 'asc')->get();
	    $data['supplierlist']=DB::table('supplier')->get();
	    $data['accounthead']=DB::table('account_master')->get();
	    $data['banklist'] = DB::table('company_bank')
            ->leftJoin('bank_masters', 'company_bank.bank_name', '=', 'bank_masters.master_bank_name')
            ->groupBy('company_bank.bank_name')
            ->get();


		return view('accountpayable/vw-nonapprove',$data);
	}


	public function BillReleaselisting()
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
			 $voucher = DB::table('voucher_entry')
			->where('voucher_type','!=','salary_voucher')
			->where('approve_status','=','Approve')
			->where('bill_status','=','NP')


            ->groupBy('voucher_no')
            ->get();

foreach($voucher as $voucheritem){


	$data['payablelisting'][] = DB::table('voucher_entry')
		->where('voucher_type','!=','salary_voucher')
			->where('approve_status','=','Approve')
			->where('bill_status','=','NP')

            ->where('voucher_no','=',$voucheritem->voucher_no)
        	->orderBy('id', 'desc')
            ->first();

}

$data['voucher'] = DB::table('voucher_entry')
->where('voucher_type','!=','salary_voucher')
->where('approve_status','=','Approve')
->where('bill_status','=','NP')

    ->groupBy('voucher_no')
    ->get();
		}catch(Exception $e){
			
			return $e->getMessage();
		}

		return view('accountpayable/approvelisting',$data);
	}


	public function getApproveVoucherById($voucher_id){

		$email = Auth::user()->email;
	   	$data['Roledata']=DB::table('role_authorization')      
	    ->join('module', 'role_authorization.module_name', '=', 'module.id')
	    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
	    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
	    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
	    ->where('member_id','=',$email) 
	    ->get();

		try{
			
			$data['payment_details']= DB::table('voucher_entry')->where('voucher_no','=',$voucher_id)

        	->orderBy('id', 'desc')
            ->first();;		
			
		}catch(Exception $e){
			return $e->getMessage();
		}


	       $data['journalhead']=DB::table('coa_master')->get();
	    $data['employeelist']=DB::table('employee')->where('status','=','active')->orderBy('emp_fname', 'asc')->get();
	    $data['supplierlist']=DB::table('supplier')->get();
	    $data['accounthead']=DB::table('account_master')->get();
	    $data['banklist'] = DB::table('company_bank')
            ->leftJoin('bank_masters', 'company_bank.bank_name', '=', 'bank_masters.master_bank_name')
            ->groupBy('company_bank.bank_name')
            ->get();

            $data['payment'] = DB::table('voucher_entry')
            ->select(DB::raw('sum(payable_amt) as payable_amt'))
			->where('voucher_type','!=','salary_voucher')
            ->where('approve_status','=','Approve')
            ->where('account_tool','=','debit')
			->where('bill_status','=','NP')
            ->where('voucher_no','=',$voucher_id)

        	->orderBy('id', 'desc')
            ->get();
           
		return view('accountpayable/vw-approve',$data);
	}


	public function updateBillStatus(Request $request){
		
		
		DB::table('voucher_entry')
                ->where('voucher_no', $request['voucher_no'])
                ->update(['bill_status' => $request['bill_status']]);
        return redirect('approve/list');
	}



	public function billPaylisting()
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
            ->leftJoin('voucher_entry', 'payment_dtl.voucher_id', '=', 'voucher_entry.voucher_no')
            ->where('voucher_entry.voucher_type','!=','salary_voucher')
            //->where('voucher_entry.bill_status','=','Release')
            ->where('voucher_entry.bill_status','=','Paid')
            ->groupBy('voucher_entry.voucher_no')
            ->get();
			
		}catch(Exception $e){
			
			return $e->getMessage();
		}
		return view('accountpayable/paybilllisting',$data);
	}	
	


	public function paymentView()
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
$data['voucherlist']=DB::table('voucher_entry')
		->where('voucher_type','!=','salary_voucher')
		->where('bill_status','=','Release')
		->where('approve_status','=','Approve')
        ->groupBy('voucher_no')
        ->get();



        $data['journalhead']=DB::table('coa_master')->get();
	    $data['employeelist']=DB::table('employee')->where('status','=','active')->orderBy('emp_fname', 'asc')->get();
	    $data['supplierlist']=DB::table('supplier')->get();
	    $data['accounthead']=DB::table('account_master')->get();
	    $data['banklist'] = DB::table('company_bank')
            ->leftJoin('bank_masters', 'company_bank.bank_name', '=', 'bank_masters.master_bank_name')
            ->groupBy('company_bank.bank_name')
            ->get();
		return view('accountpayable/vw-payment',$data);
	}

	public function addPayment(Request $request){

      $tot_item=count($request->account_head_id);


      for($i=0;$i<$tot_item;$i++)
      {

  if( $request['account_type'.$i]=='credit'){

      $check_bank_balance = DB::table('bank_balance')
      //->where('bank_id', $request['payment_bank_id'])
   ->where('bank_branch_id',$request['bank_branch_id'.$i])
   ->orderBy('id', 'desc')
   ->first();
  //echo "<pre>"; print_r($check_bank_balance); exit;
  if(!empty($check_bank_balance)){

   $opening_balance = $check_bank_balance->balance_amt;

  }else{

   $company_bank_dtl= DB::table('company_bank')
       ->where('id', $request['bank_branch_id'.$i])
       ->first();
   $opening_balance = $company_bank_dtl->opening_balance;
  }

  $current_balance = $opening_balance -$request['payment_amount'.$i];


  $company_bank= DB::table('company_bank')
  ->where('id', $request['bank_branch_id'.$i])
  ->first();
  if($current_balance>=0){


  }else{

    DB::rollback();
    Session::flash('message','You have insufficient Fund.');
    return redirect('billpay/list');

}

    }
  }

  for($i=0;$i<$tot_item;$i++)
    {

        if( $request['account_type'.$i]=='credit'){
    $check_bank_balance = DB::table('bank_balance')
    //->where('bank_id', $request['payment_bank_id'])
 ->where('bank_branch_id', $request['bank_branch_id'.$i])
 ->orderBy('id', 'desc')
 ->first();
//echo "<pre>"; print_r($check_bank_balance); exit;
if(!empty($check_bank_balance)){

 $opening_balance = $check_bank_balance->balance_amt;

}else{

 $company_bank_dtl= DB::table('company_bank')
     ->where('id', $request['bank_branch_id'.$i])
     ->first();
 $opening_balance = $company_bank_dtl->opening_balance;
}

$current_balance = $opening_balance -$request['payment_amount'.$i];


$company_bank= DB::table('company_bank')
->where('id', $request['bank_branch_id'.$i])
->first();


if($current_balance>=0){


    $payment_entry = DB::table('payment_dtl')->insert(
    ['payment_code' => $request['payment_code'],
    'voucher_id' => $request['voucher_no'],
    'vouchertype' => $request['voucher_type'],
    'payment_mode' =>$request['payment_mode'.$i],
     'payment_mode_no' => $request['cheque_draft'.$i],
     'cheque_draft_date' =>$request['cheque_date'.$i],
     'bank_id' => $request['payment_bank_id'.$i],
     'bank_branch_id' => $request['bank_branch_id'.$i],
     'payment_amount' =>$request['payment_amount'.$i],
     'due_amount' => '0',
     'payment_booking_date' => $request['payment_booking_date'],
     'payment_release_date' => $request['release_date'],
     'encloser_dtl' =>'',
     'narration' => $request['remarks'.$i],
     'payment_status' =>'Paid',
     'created_at' => date('Y-m-d H:i:s')]
    );

    DB::table('bank_balance')->insert(
    ['opening_balance' => $opening_balance,
    'voucher_no' => $request['voucher_no'],
    'bank_id' =>$request['payment_bank_id'.$i],'bank_branch_id' =>$request['bank_branch_id'.$i],
    'income' => '0',
    'expense' => $request['payment_amount'.$i], 'balance_amt' => $current_balance,
    'created_at' => date('Y-m-d H:i:s')]
    );

    DB::table('voucher_entry')
        ->where('voucher_no', $request['voucher_no'])
        ->update(['bill_status' => 'Paid']);

       $transaction_id="GL".date("d/m/Y")."/".time()."";

       if(!empty($request['vendor_id'])){

        $gl_account= $request['vendor_id'];

    } elseif (!empty($request['payment_bank_id'.$i])) {

        $gl_account= $request['bank_id'];

    } else {

        $gl_account= $request['employee_id'];

    }


        DB::table('gl_entry')->insert(
        ['transaction_id' => $transaction_id,
        'gl_account_head' => $request->account_head_id[$i],
        'transaction_head' => $request['transaction_code'.$i],
        'transaction_type' => 'debit' ,
        'voucher_no' => $request['voucher_no'],
        'amount' =>$request['payment_amount'.$i],
        'gl_date' => date("Y-m-d"),
        'voucher_date' => "", 'payment_release_date' => $request['release_date'],'payment_rcv_date' => $request['payment_booking_date'],
        'status' => "0"]
        );
        DB::table('gl_entry')->insert(
            ['transaction_id' => $transaction_id,
            'gl_account_head' => '07/003',
            'transaction_head' => $company_bank->account_code,
            'transaction_type' => 'credit' ,
            'voucher_no' => $request['voucher_no'],
            'amount' =>$request['payment_amount'.$i],
            'gl_date' => date("Y-m-d"),
            'voucher_date' => "", 'payment_release_date' => $request['release_date'],'payment_rcv_date' => $request['payment_booking_date'],
            'status' => "0"]
            );







}



}

    }

    DB::table('sundae_debtors')
        ->where('voucherno', $request['voucher_no'])
        ->update(['payment_release_date' => $request['release_date'], 'status' => "Paid"]);

    DB::commit();
    Session::flash('message','Record Add Successfully.');
    return redirect('billpay/list');
	    
	}


	public function paymentDtl($voucher_no){

		$data['payabledtl'] = DB::table('payment_dtl')
            ->leftJoin('voucher_entry', 'payment_dtl.voucher_id', '=', 'voucher_entry.voucher_no')
            ->where('payment_dtl.voucher_id','=',$voucher_no) 
            ->first();

        $data['coa_dtl'] = DB::table('coa_master')
            ->where('coa_code','=',$data['payabledtl']->transaction_code) 
            ->first();

         $data['account_master_dtl'] = DB::table('account_master')
            ->where('account_code','=',$data['payabledtl']->account_head_id) 
            ->first();
        //echo "<pre>"; print_r($data['coa_dtl']); exit;
        return view('accountpayable/print-payment-voucher',$data);
	}

	public function getPaymentById($voucher_id){

		$email = Auth::user()->email;
	   	$data['Roledata']=DB::table('role_authorization')      
	    ->join('module', 'role_authorization.module_name', '=', 'module.id')
	    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
	    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
	    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
	    ->where('member_id','=',$email) 
	    ->get();

		try{
			
			$data['payment_details']= Voucherentry::find($voucher_id);
			$data['payablelisting'] = DB::table('payment_dtl')
            ->leftJoin('voucher_entry', 'payment_dtl.voucher_id', '=', 'voucher_entry.id')
            ->get();		
			
		}catch(Exception $e){
			return $e->getMessage();
		}

		$data['voucherlist']=DB::table('voucher_entry')->get();
		$data['supplierlist']=DB::table('supplier')->get();
	    $data['accounthead']=DB::table('account_master')->get();
	    $data['journalhead']=DB::table('coa_master')->get();
	    $data['banklist']=DB::table('company_bank')->get();
		return $data;
	}
	
}
