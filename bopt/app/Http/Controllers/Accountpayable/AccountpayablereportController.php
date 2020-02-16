<?php

namespace App\Http\Controllers\Accountpayable;

use App\Http\Controllers\Controller;
use App\Model\Masters\Supplier;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Payable\Voucherentry;
use View;
use Validator;
use Session;
use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;

class AccountpayablereportController extends Controller
{

	public function bankbookView()
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


	    $data['banklist'] = DB::table('company_bank')
            ->leftJoin('bank_masters', 'company_bank.bank_name', '=', 'bank_masters.master_bank_name')
            ->groupBy('company_bank.bank_name')
            ->get();

		return view('accountpayable/vw-bankbook',$data);
	}



    public function showBankbookReport(Request $request)
    {

		try{
			$data['payment_dtl'] = DB::table('bank_balance')
            ->leftJoin('payment_dtl', 'bank_balance.voucher_no', '=', 'payment_dtl.voucher_id')
            ->leftJoin('payment_rcvd_dtl', 'bank_balance.voucher_no', '=', 'payment_rcvd_dtl.voucher_no')
            //->whereBetween('DATE(bank_balance.created_at)', [$request->from_date, $request->to_date])
            ->where('bank_balance.bank_branch_id','=',$request->bank_branch_id)
            ->whereDate('bank_balance.created_at','>=',$request->from_date)
            ->whereDate('bank_balance.created_at','<=',$request->to_date)
            ->select('bank_balance.*', 'payment_dtl.narration', 'payment_dtl.vouchertype', 'payment_dtl.payment_booking_date', 'payment_rcvd_dtl.remarks', 'payment_rcvd_dtl.voucher_type', 'payment_rcvd_dtl.payment_rcv_date')
            ->get();

            // echo "<pre>"; print_r($data['payment_dtl']); exit;

            $data['current_balance'] = DB::table('company_bank')
            ->where('id', '=', $request->bank_branch_id)
            ->first();

		}catch(Exception $e){
			return $e->getMessage();
		}

		$data['fromdate']=$request->from_date;
		$data['todate']=$request->to_date;

		return view('accountpayable/report-bankbook',$data);
	}


	public function trialView()
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




		return view('accountpayable/vw-trial');
	}


    public function showtrialReport(Request $request)
    {

        $range = [$request->from_date, $request->to_date];
		try{
 $dtl = DB::table('gl_entry')

 ->whereBetween('gl_date', $range)
 ->groupBy('gl_account_head')

  ->get();


  foreach($dtl as $val){

   $account=DB::table('account_master')


    ->where('account_code','=',$val->gl_account_head)
    ->first();





  $data['gldtl'][]=array('gl_account_head'=>$account->account_name,'account_head'=>$val->gl_account_head);

  }

}catch(Exception $e){
			return $e->getMessage();
        }




		$data['fromdate']=$request->from_date;
		$data['todate']=$request->to_date;

		return view('accountpayable/trial-balance',$data);
	}

	public function billregisterView()
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

		return view('accountpayable/vw-billregister');
	}



	public function showBillRegisterReport(Request $request){

		try{
			$data['voucher_list'] = DB::table('voucher_entry')
            ->leftJoin('payment_dtl', 'voucher_entry.voucher_no', '=', 'payment_dtl.voucher_id')
            ->where('voucher_entry.voucher_type','=','payment_vendor')
            ->whereDate('bill_booking_date','>=',$request->from_date)
  			->whereDate('bill_booking_date','<=',$request->to_date)
            ->get();
			//echo "<pre>"; print_r($data['voucher_list']); exit;
		}catch(Exception $e){
			return $e->getMessage();
		}

		$data['fromdate']=$request->from_date;
		$data['todate']=$request->to_date;

		return view('accountpayable/bill-register',$data);
    }

    public function incomeExpenditureView()
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

		return view('accountpayable/vw-income-expenditure',$data);
	}


    public function incomeExpenditureReport(Request $request)
    {
		//echo "<pre>"; print_r($request->financial_year); exit;
		$getyear_range = explode("-",$request->financial_year);
		$start_year=date("$getyear_range[0]-04-01");
		$end_year=date("$getyear_range[1]-03-31");

		try{

            $income_account_heads = DB::table('schedule_master')->where('particular_type', 'income')->get();

                foreach($income_account_heads as $income_account_head)
                {
	                $income_lists = DB::table('received_voucher_entry')
	                ->select(DB::raw('sum(total_amt) as total_amt'))
	                ->where('bill_status', '=','Received')
	                ->where('account_head_id', 'LIKE', $income_account_head->schedule.'%')
	                ->whereBetween('created_at',[$start_year,$end_year])
	               	->get();

	                $data['currentyear_income_list'][]=array('schedule_code'=>$income_account_head->schedule,'schedule_name'=>$income_account_head->particulars,'payable_amt'=>$income_lists[0]->total_amt);
                }

            // echo "<pre>"; print_r($data['currentyear_income_list']); exit;

            $account_expenses = DB::table('schedule_master')->where('particular_type', 'expense')->get();

                foreach($account_expenses as $expenses)
                {
	                $expense = DB::table('voucher_entry')
	                ->select(DB::raw('sum(payable_amt) as payableamt'))
	                ->where('bill_status', '=','Paid')
	                ->where('account_head_id', 'LIKE', $expenses->schedule.'%')
	                ->whereBetween('bill_booking_date',[$start_year,$end_year])
	               	->get();

	                $data['currentyear_expenditure_list'][]=array('schedule_code'=>$expenses->schedule,'schedule_name'=>$expenses->particulars,'payable_amt'=>$expense[0]->payableamt);
                }



	             //echo "<pre>"; print_r($data['currentyear_expenditure_list']); exit;


                // exit;

		}catch(Exception $e){
			return $e->getMessage();
		}
        // $data['income_expenditure']=array(4,9,10,11,12,13,14,15,16,17,18,19,20,21,22);
		//$data['fromyear']=$start_year;
		$data['toyear']=$getyear_range[1];

		return view('accountpayable/income-expenditure-report',$data);
	}

    public function getSundryDebtorsReport()
    {
        $due_parties = DB::table('sundae_debtors')->where('status', 'NP')->groupBy('party_name')->get();

        return view('accountpayable/get-sundry-debtors-report', compact('due_parties'));
        // dd($due_parties);
    }

    public function viewSundryDebtorsReport(Request $request)
    {
        //print_r($request->party_name); exit;
        if($request->party_name == '0')
        {
            $due_parties = DB::table('sundae_debtors')->where('status', 'NP')->get();
            return view('accountpayable/sundry-debtors-report-all', compact('due_parties'));
        }
        else
        {
            $due_parties = DB::table('sundae_debtors')->where('party_name','=', $request->party_name)->get();
            return view('accountpayable/sundry-debtors-report-individual', compact('due_parties'));
        }
        // echo "<pre>" ;print_r($due_parties); exit;
        // return view('accountpayable/sundry-debtors-report', compact('due_parties'));
    }

    public function getPartyLedgerReport()
    {
        $suppliers = Supplier::where('supplier_status', 'active')->get();
        return view('accountpayable/get-party-ledger-report', compact('suppliers'));
    }

    public function showPartyLedgerReport(Request $request)
    {
        // dd($request);
        $credit_amt = 0;
        $debit_amt = 0;
        $party_name = $request->party_name;
        $party_details = DB::table('gl_entry')
                    ->leftJoin('payment_dtl', 'gl_entry.voucher_no', '=', 'payment_dtl.voucher_id')
                    ->leftJoin('payment_rcvd_dtl', 'gl_entry.voucher_no', '=', 'payment_rcvd_dtl.voucher_no')
                    ->leftJoin('account_master', 'gl_entry.gl_account_head', '=', 'account_master.account_code')
                    ->where('dr_account', '=', $request->party_name)
                    ->orWhere('cr_account', '=', $request->party_name)
                    ->select('gl_entry.*', 'payment_dtl.narration', 'payment_rcvd_dtl.remarks', 'payment_dtl.vouchertype', 'payment_dtl.payment_status', 'account_master.account_name')
                    ->get();

        foreach($party_details as $party_detail)
        {

            if((!empty($party_detail->vouchertype)) && $party_detail->payment_release_date == '0000-00-00')
            {
                $credit_amt+=$party_detail->amount;
                // $debit_amt = 0;
            }
            elseif((!empty($party_detail->vouchertype)) && $party_detail->voucher_date == '0000-00-00')
            {
                $debit_amt+=$party_detail->amount;
                // $credit_amt = 0;
            }


        }
        // echo"<pre>"; echo $debit_amt; exit;

        // dd($party_details);
        return view('accountpayable/party-ledger-report', compact('party_details', 'party_name', 'debit_amt', 'credit_amt'));
    }

    public function glHeadView()
    {
        return view('accountpayable/vw-report-gl-head');
    }

    public function getGlHeadView($gl_type)
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

            if($gl_type == 'income')
            {
                $gl_heads = DB::table('account_master')->where('account_type', 'income')->get();
            }
            else
            {
                $gl_heads = DB::table('account_master')->where('account_type', '!=', 'income')->get();
            }


		}catch(Exception $e){

			return $e->getMessage();
		}

        // $gl_heads = DB::table('account_master')->get();

        echo json_encode($gl_heads);
		// return view('accountpayable/vw-report-gl-head',$data);
	}

    public function showGlHeadReport(Request $request)
    {
        //print_r($request->all()); exit;
        $financial_year=date('Y')+1;
        $start_year=date("Y-04-01");
        $end_year=date("$financial_year-03-31");

        try{
                if($request->gl_head_type == 'income'){
                    $account_heads = DB::table('received_voucher_entry')
                    ->where('account_head_id', '=', $request->gl_head)
                    ->whereBetween('created_at',[$start_year,$end_year])
                    ->get();
                    //print_r($account_heads); exit;
                    foreach($account_heads as $account_head)
                    {

                        $income_lists = DB::table('gl_entry')
                        ->where('voucher_no', '=',$account_head->voucher_no)
                        ->orderBy('voucher_date','ASC')
                        ->first();
                        //echo "<pre>"; print_r($income_lists); exit;
                        if(empty($account_head->voucher_date)){

                            $account_name= DB::table('company_bank')
                            ->where('id', '=',$income_lists->dr_account)
                            ->first();
                            $payer_name= $account_name->bank_name;

                        }else{

                            $account_name= DB::table('account_master')
                            ->where('account_code', '=',$income_lists->dr_account)
                            ->first();
                            $payer_name= $account_name->account_name;

                        }

                        $data['currentyear_income_expenses_list'][]=array('gl_date'=>$income_lists->gl_date,'credit_name'=>$payer_name,'narration'=>$account_head->remarks,'voucher_type'=>$account_head->voucher_type,'amount'=>$account_head->total_amt);
                    }

                }else{

                    $account_heads = DB::table('voucher_entry')
                    //->where('bill_status', '=','Paid')
                    ->where('account_head_id', '=', $request->gl_head)
                    ->whereBetween('bill_booking_date',[$start_year,$end_year])
                    ->get();
                    //print_r($account_heads); exit;
                    foreach($account_heads as $account_head)
                    {

                       /*$expenses_lists = DB::table('gl_entry')
                        ->where('voucher_no', '=',$account_head->voucher_no)
                        ->orderBy('voucher_date','ASC')
                        ->first();
                        echo "<pre>"; print_r($expenses_lists); exit;*/

                        if(!empty($account_head->employee_id)){

                            $payer_name = $account_head->employee_id;

                        } elseif (!empty($account_head->vendor_id)){

                            $payer_name = $account_head->vendor_id;

                        } else {

                            $payer_name = $account_head->bank_name;
                        }
                       //echo "<pre>"; print_r($account_head); exit;
                        $data['currentyear_income_expenses_list'][]=array('gl_date'=>$account_head->bill_booking_date,'credit_name'=>$payer_name,'narration'=>$account_head->entry_remark,'voucher_type'=>$account_head->voucher_type,'amount'=>$account_head->payable_amt);
                    }


                }

        }catch(Exception $e){
            return $e->getMessage();
        }

        $data['fromdate']=$request->from_date;
        $data['todate']=$request->to_date;

        //$data['current_balance'] = DB::table('bank_balance')->first();

        return view('accountpayable/gl-report',$data);
    }

    public function libalitiesView()
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

		return view('accountpayable/vw-libilities',$data);
	}


    public function showLibalitiesReport(Request $request)
    {

		$getyear_range = explode("-",$request->financial_year);
		$start_year=date("$getyear_range[0]-04-01");
		$end_year=date("$getyear_range[1]-03-31");

		try{

			$account_liabilities = DB::table('account_master')
            ->where('account_type', '=', 'liabilities')
        	->get();

        	foreach($account_liabilities as $liabilities){

        		$liability = DB::table('voucher_entry')
        		->select(DB::raw('sum(payable_amt) as payableamt'))
            	->where('bill_status', '=','Paid')
            	->where('account_head_id', '=',$liabilities->account_code)
            	->whereBetween('bill_booking_date',[$start_year,$end_year])
        		->get();

        		$data['currentyear_liabilities_list'][]=array('sub_account_name'=>$liabilities->account_name,'payable_amt'=>$liability[0]->payableamt);
        	}

		}catch(Exception $e){
			return $e->getMessage();
		}


		$data['fromyear']=$getyear_range[0];
		$data['toyear']=$getyear_range[1];

		return view('accountpayable/libilities-report',$data);
    }

    public function getReceiptVoucherReport()
    {
        return view('mis-reports/get-receipt-voucher');
    }

    public function viewReceiptVoucherReport(Request $request)
    {
        // dd($request);
        $data['start'] = $request->from_date;
        $data['end'] = $request->to_date;

        $data['receipt_details'] = DB::table('gl_entry')
                ->leftJoin('payment_rcvd_dtl','gl_entry.voucher_no','=','payment_rcvd_dtl.voucher_no')
                ->whereDate('gl_entry.payment_rcv_date','>=',$request->from_date)
                ->whereDate('gl_entry.payment_rcv_date','<=',$request->to_date)
                ->select('gl_entry.*', 'payment_rcvd_dtl.remarks as narration','payment_rcvd_dtl.payment_mode')
                ->orderBy('id')
          // ->toSql();
                ->get();

        foreach($data['receipt_details'] as $receipt_detail)
        {
            if($receipt_detail->voucher_date == '0000-00-00' && $receipt_detail->payment_mode == 'cash')
            {
                $dr_act = DB::table('coa_master')->where('coa_code', $receipt_detail->dr_account)->first();

                $cr_act = DB::table('coa_master')->where('coa_code', $receipt_detail->cr_account)->first();

                $data['debt_act'] = $dr_act->head_name;
                $data['crdt_act'] = $cr_act->head_name;
                // echo "<pre>"; print_r($data['dr_act']->head_name);
            }
            elseif($receipt_detail->voucher_date == '0000-00-00' && $receipt_detail->payment_mode != 'cash')
            {
                $dr_act_1 = DB::table('company_bank')->where('id', $receipt_detail->dr_account)->first();

                $cr_act_1 = DB::table('coa_master')->where('coa_code', $receipt_detail->cr_account)->first();

                $data['debt_act_1'] = $dr_act_1->bank_name;
                $data['crdt_act_1'] = $cr_act_1->head_name;
            }


        }
        echo "<pre>"; print_r($data);

             exit;

        return view('mis-reports/receipt-voucher-report', $data);
    }

    public function getPaymentVoucherReport()
    {
        return view('mis-reports/get-payment-voucher');
    }

    public function viewPaymentVoucherReport(Request $request)
    {
        // dd($request);
        $data['start'] = $request->from_date;
        $data['end'] = $request->to_date;

        $payment_details = DB::table('gl_entry')
                ->leftJoin('payment_dtl','gl_entry.voucher_no','=','payment_dtl.voucher_id')
                ->whereDate('gl_entry.payment_release_date','>=',$request->from_date)
                ->whereDate('gl_entry.payment_release_date','<=',$request->to_date)
                //->orWhereDate('gl_entry.voucher_date','>=',$request->from_date)
                //->orWhereDate('gl_entry.voucher_date','<=',$request->to_date)
                ->where('payment_dtl.vouchertype', '!=', 'contra')
                ->where('payment_dtl.payment_status', '=', 'Paid')
                ->select('gl_entry.*', 'payment_dtl.narration as narration', 'payment_dtl.vouchertype as vouchertype')
                ->orderBy('id')
                ->get();
                //echo "<pre>"; print_r($payment_details); exit;

                foreach($payment_details as $payment_dels)
                {
                    $debt_act='';
                    $cr_act='';
                    $crdt_act='';

                    $debt_act = $payment_dels->dr_account;
                    $cr_act = DB::table('company_bank')->where('id', $payment_dels->cr_account)->first();
                    $crdt_act = $cr_act->bank_name;

                    $data['payment_details'][]=array('payment_release_date'=> $payment_dels->payment_release_date, 'voucher_no'=> $payment_dels->voucher_no, 'dr_account'=> $debt_act,'cr_account'=> $crdt_act,'amt'=> $payment_dels->amount, 'narration'=> $payment_dels->narration);

                }
                //echo "<pre>"; print_r($data['payment_details']);exit;

        return view('mis-reports/payment_voucher', $data);
    }

    public function viewIncomeScheduleReport(Request $request)
    {
        // dd($request);

        $data['start_year']=date('Y');
        $data['end_year']=date('Y')+1;


        // $start_financial_year = $data['start_year']."-04-01";
        // $to_financial_year = $data['end_year']."-03-31";


        $financial_year=date('Y')+1;
		$start_year=date("Y-04-01");
		$end_year=date("$financial_year-03-31");


        $data['currentyear_income_list']=array();
        $data['currentyear_expense_list']=array();

        $account_heads = DB::table('account_master')->where('account_code', 'LIKE', $request->party_name.'%')->get();

                foreach($account_heads as $account_head)
                {
                    $sub_accountlist=array();
                    $schedule_no = explode("/",$account_head->account_code);
                    // echo $schedule_no[0]; exit;
                    if($schedule_no[0] == '10')
                    {
                        $data['total_received_amount'] = DB::table('received_voucher_entry')
                                ->select(DB::raw('sum(total_amt) as total_amt'))
                                ->where('bill_status', '=', 'Received')
                                ->whereBetween('created_at',[$start_year,$end_year])
                                ->get();
                                // echo "<pre>"; print_r($data['total_received_amount']); exit;

                        return view('mis-reports/schedule_10',$data);
                    }

                    if($schedule_no[0] == '12')
                    {
                        $data['schedule_details_12'] = DB::table('schedule_12')->get();

                        foreach($data['schedule_details_12'] as $schedule_12_det)
                        {
                            if($schedule_12_det->account_id != '')
                            {
                                $schedule_12 = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as total_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('account_head_id', 'LIKE', $schedule_12_det->account_id.'%')
                                    ->whereBetween('bill_booking_date',[$start_year,$end_year])
                                    // ->toSql();
                                    ->get();

                                $data['schedule_det'][] = array('sl_no' => $schedule_12_det->sl_no, 'account_name' => $schedule_12_det->account_name, 'coa_name' => '', 'total_amount' => $schedule_12[0]->total_amt);
                            }
                            elseif($schedule_12_det->coa_name != '' && $schedule_12_det->account_id == '')
                            {
                                $data['schedule_det'][] = array('sl_no' => $schedule_12_det->sl_no, 'account_name' => $schedule_12_det->account_name, 'coa_name' => $schedule_12_det->coa_name, 'total_amount' => '0');
                            }
                            else
                            {
                                $data['schedule_det'][] = array('sl_no' => $schedule_12_det->sl_no, 'account_name' => $schedule_12_det->account_name, 'coa_name' => '', 'total_amount' => '0');
                            }



                        }
                        // echo "<pre>"; print_r($data['schedule_det']); exit;

                        return view('mis-reports/schedule_12',$data);

                    }

                    if($schedule_no[0] == '13')
                    {
                        // $data['guest_houae_rent'] = DB::table('received_voucher_entry')
                        //             ->select(DB::raw('sum(total_amt) as guest_house_rent_amt'))
                        //             ->where('bill_status', '=', 'Received')
                        //             ->where('transaction_code', 'LIKE', '13/001/001'.'%')
                        //             ->whereNotNull('transaction_code')
                        //             ->whereBetween('created_at',[$start_year,$end_year])
                        //              //->toSql();
                        //             ->get();

                        // $data['rti_fees'] = DB::table('received_voucher_entry')
                        //             ->select(DB::raw('sum(total_amt) as rti_amt'))
                        //             ->where('bill_status', '=', 'Received')
                        //             ->where('transaction_code', 'LIKE', '13/004/002'.'%')
                        //             ->whereNotNull('transaction_code')
                        //             ->whereBetween('created_at',[$start_year,$end_year])
                        //              //->toSql();
                        //             ->get();

                        // $data['application_fees'] = DB::table('received_voucher_entry')
                        //             ->select(DB::raw('sum(total_amt) as application_amt'))
                        //             ->where('bill_status', '=', 'Received')
                        //             ->where('transaction_code', 'LIKE', '13/004/004'.'%')
                        //             ->whereNotNull('transaction_code')
                        //             ->whereBetween('created_at',[$start_year,$end_year])
                        //              //->toSql();
                        //             ->get();


                        // $data['misc_receipt'] = DB::table('received_voucher_entry')
                        //             ->select(DB::raw('sum(total_amt) as misc_amt'))
                        //             ->where('bill_status', '=', 'Received')
                        //             ->where('transaction_code', 'LIKE', '09/003'.'%')
                        //             ->whereNotNull('transaction_code')
                        //             ->whereBetween('created_at',[$start_year,$end_year])
                        //              //->toSql();
                        //             ->get();

                        $data['schedule_details_13'] = DB::table('schedule_13')->get();
                        $parent_list=DB::table('schedule_13')->where('sub_item',null)->get();
                        // dd($parent_list);
                        $i=0;
                        foreach($parent_list as $individual_total){

                            $data['total'][$i] = DB::table('schedule_13')
                                ->select(DB::raw('sum(balance_posting.closing_balance) as total_amt','schedule_13.coa_code'))
                                ->join('balance_posting','transaction_code','=','coa_code')
                                ->where('schedule_13.sub_item', '=', $individual_total->id)
                                ->get();
                                $i++;
                        }
                        //dd($data['total'][1][0]->total_amt);


                        foreach($data['schedule_details_13'] as $schedule_13_det)
                        {
                            if($schedule_13_det->coa_code != '')
                            {

                                $schedule_13 = DB::table('balance_posting')
                                ->select(DB::raw('sum(closing_balance) as total_amt'))

                                ->where('transaction_code', '=', $schedule_13_det->coa_code)

                                ->orderBy('id', 'desc')
                                ->first();
                                    //echo "<pre>"; print_r(); exit;

                                $data['schedule_det'][] = array('account_name' => $schedule_13_det->account_name, 'total_amount' => $schedule_13->total_amt, 'is_sub_item' => $schedule_13_det->sub_item);

                            }
                            else
                            {
                                $data['schedule_det'][] = array('account_name' => $schedule_13_det->account_name, 'total_amount' => '0', 'is_sub_item' => $schedule_13_det->sub_item);
                            }

                        }
                    //    dd($data);
                        return view('mis-reports/schedule_13',$data);

                    }

                    if($schedule_no[0] == '15')
                    {
                        $data['salary_n_wages'] = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as sal_wag_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('transaction_code', 'LIKE', '15/001'.'%')
                                    ->whereNotNull('transaction_code')
                                    ->whereBetween('bill_booking_date',[$start_year,$end_year])
                                     //->toSql();
                                    ->get();

                        $data['allowances_n_bonus'] = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as allow_bonus_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('transaction_code', 'LIKE', '15/013'.'%')
                                    ->whereNotNull('transaction_code')
                                    ->whereBetween('bill_booking_date',[$start_year,$end_year])
                                     //->toSql();
                                    ->get();

                        $data['ltc_facility'] = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as ltc_facility_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('transaction_code', 'LIKE', '15/007'.'%')
                                    ->whereNotNull('transaction_code')
                                    ->whereBetween('bill_booking_date',[$start_year,$end_year])
                                     //->toSql();
                                    ->get();


                        $data['medical_facility'] = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as medical_facility_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('transaction_code', 'LIKE', '15/008'.'%')
                                    ->whereNotNull('transaction_code')
                                    ->whereBetween('bill_booking_date',[$start_year,$end_year])
                                     //->toSql();
                                    ->get();

                        $data['cea_amount'] = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as cea_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('transaction_code', 'LIKE', '03/006/001'.'%')
                                    ->whereNotNull('transaction_code')
                                    ->whereBetween('bill_booking_date',[$start_year,$end_year])
                                     //->toSql();
                                    ->get();



                         $data['honorarium'] = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as honorarium_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('transaction_code', 'LIKE', '16/010/003'.'%')
                                    ->whereNotNull('transaction_code')
                                    ->whereBetween('bill_booking_date',[$start_year,$end_year])
                                     //->toSql();
                                    ->get();

                        $data['grant_recreation'] = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as grant_recreation_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('transaction_code', 'LIKE', '15/005/001'.'%')
                                    ->whereNotNull('transaction_code')
                                    ->whereBetween('bill_booking_date',[$start_year,$end_year])
                                     //->toSql();
                                    ->get();

                        $data['news_paper_rein'] = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as newapaper_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('transaction_code', 'LIKE', '15/005/003'.'%')
                                    ->whereNotNull('transaction_code')
                                    ->whereBetween('bill_booking_date',[$start_year,$end_year])
                                     //->toSql();
                                    ->get();


                        $data['current_gpf_data'] = DB::table('gpf_details')
                        ->select(DB::raw('sum(own_share) as gpf_own_share'),DB::raw('sum(company_share) as gpf_company_share'))
                        ->whereBetween('created_at',[$start_year,$end_year])
                        ->get();


                        $data['current_nps_data'] = DB::table('nps_details')
                        ->select(DB::raw('sum(own_share) as nps_own_share'),DB::raw('sum(company_share) as nps_company_share'))
                        ->whereBetween('created_at',[$start_year,$end_year])
                        ->get();


                        return view('mis-reports/schedule_15',$data);

                    }


                    if($schedule_no[0] == '17')
                    {
                        $data['schedule_details_17'] = DB::table('schedule_17')->get();

                        foreach($data['schedule_details_17'] as $schedule_17_det)
                        {
                            if($schedule_17_det->coa_code != '')
                            {

                                $schedule_17 = DB::table('balance_posting')
                                    ->select(DB::raw('sum(closing_balance) as total_amt'))

                                    ->where('transaction_code', '=', $schedule_17_det->coa_code)

                                    ->orderBy('id', 'desc')
                                    ->first();
                                     //->toSql();

                                    //echo "<pre>"; print_r(); exit;

                                $data['schedule_det'][] = array('account_name' => $schedule_17_det->account_name, 'coa_name' => $schedule_17_det->coa_name, 'total_amount' => $schedule_17->total_amt);

                            }

                            else
                            {
                                $data['schedule_det'][] = array('account_name' => $schedule_17_det->account_name, 'coa_name' => $schedule_17_det->coa_name, 'total_amount' => '0');
                            }

                        }
                        // echo "<pre>"; print_r($data); exit;

                        return view('mis-reports/schedule_17',$data);

                    }


                    if($schedule_no[0] == '18')
                    {
                        $data['schedule_details_18'] = DB::table('schedule_18')->get();

                        foreach($data['schedule_details_18'] as $schedule_18_det)
                        {
                            if($schedule_18_det->coa_code != '')
                            {

                                $schedule_18 = DB::table('balance_posting')
                                ->select(DB::raw('sum(closing_balance) as total_amt'))

                                ->where('transaction_code', '=', $schedule_18_det->coa_code)

                                ->orderBy('id', 'desc')
                                ->first();
                                    //echo "<pre>"; print_r(); exit;

                                $data['schedule_det'][] = array('account_name' => $schedule_18_det->account_name, 'coa_name' => $schedule_18_det->coa_name, 'total_amount' => $schedule_18->total_amt);

                            }
                            else
                            {
                                $data['schedule_det'][] = array('account_name' => $schedule_18_det->account_name, 'coa_name' => $schedule_18_det->coa_name, 'total_amount' => '0');
                            }

                        }


                        return view('mis-reports/schedule_18',$data);

                    }


                    if($schedule_no[0] == '19')
                    {
                        $data['schedule_details_19'] = DB::table('schedule_19')->get();

                        foreach($data['schedule_details_19'] as $schedule_19_det)
                        {
                            if($schedule_19_det->coa_code != '')
                            {
                                $schedule_19 =  DB::table('balance_posting')
                                ->select(DB::raw('sum(closing_balance) as total_amt'))

                                ->where('transaction_code', '=', $schedule_19_det->coa_code)

                                ->orderBy('id', 'desc')
                                ->first();

                                    $data['schedule_det'][] = array('sl_no' => $schedule_19_det->sl_no,
                                    'account_name' => $schedule_19_det->account_name, 'coa_name' => '',
                                     'total_amount' => $schedule_19->total_amt);
                            }

                            else
                            {
                                $data['schedule_det'][] =
                                 array('sl_no' => $schedule_19_det->sl_no,
                                    'account_name' => $schedule_19_det->account_name, 'coa_name' => '',
                                     'total_amount' => '0');
                            }


                        }
                        // echo "<pre>"; print_r($data['schedule_det']);exit;
                        // exit;
                        return view('mis-reports/schedule_19',$data);
                    }

                    if($schedule_no[0] == '22')
                    {
                        $data['schedule_details_22'] = DB::table('schedule_22')->get();

                        foreach($data['schedule_details_22'] as $schedule_22_det)
                        {
                            if($schedule_22_det->coa_code != '')
                            {

                                $schedule_22 =DB::table('balance_posting')
                                ->select(DB::raw('sum(closing_balance) as total_amt'))

                                ->where('transaction_code', '=', $schedule_22_det->coa_code)

                                ->orderBy('id', 'desc')
                                ->first();
                                    //echo "<pre>"; print_r(); exit;

                                $data['schedule_det'][] = array('account_name' => $schedule_22_det->account_name, 'coa_name' => $schedule_22_det->coa_name, 'total_amount' => $schedule_22->total_amt);

                            }
                            else
                            {
                                $data['schedule_det'][] = array('account_name' => $schedule_22_det->account_name, 'coa_name' => $schedule_22_det->coa_name, 'total_amount' => '0');
                            }

                        }
                        // echo "<pre>"; print_r($data); exit;
                        // dd($data['schedule_det']);

                        return view('mis-reports/schedule_22',$data);

                    }


                }
                // echo "<pre>"; print_r($data['currentyear_expense_list']);

        // exit;

        if($request->party_name == '09')
        {
            return view('mis-reports/schedule_09',$data);
        }
        if($request->party_name == '11')
        {
            return view('mis-reports/schedule_11',$data);
        }
        if($request->party_name == '14')
        {
            return view('mis-reports/schedule_14',$data);
        }
        if($request->party_name == '16')
        {
            return view('mis-reports/schedule_16',$data);
        }
        if($request->party_name == '20')
        {
            return view('mis-reports/schedule_20',$data);
        }
        if($request->party_name == '21')
        {
            return view('mis-reports/schedule_21',$data);
        }



    }


	public function viewBalanceSchedules()
    {
        $schedules = DB::table('bs_schedule_master')->get();
        return view('mis-reports/get-balance-schedules', compact('schedules'));
    }

    public function viewBalanceScheduleReport(Request $request)
    {
        // dd($request);
        $data['start_year']=date('Y');
        $data['end_year']=date('Y')+1;

        $financial_year=date('Y')+1;
		$start_year=date("Y-04-01");
		$end_year=date("$financial_year-03-31");

        $data['currentyear_income_list']=array();
        $data['currentyear_expense_list']=array();

        if($request->party_name == '01')
        {
            $data['grant_sum'] = DB::table('received_voucher_entry')
                                ->select(DB::raw('sum(total_amt) as grant_sum_amt'))
                                ->where('bill_status', '=', 'received')
                                ->where('account_head_id', 'LIKE', '10/001'.'%')
                                ->whereNotNull('transaction_code')
                                ->whereBetween('created_at',[$start_year,$end_year])
                                    //->toSql();
                                ->get();

            return view('mis-reports/schedule_01',$data);
        }

        if($request->party_name == '03')
        {

            $data['overdue_other'] = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as overdue_other_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('transaction_code', 'LIKE', '03/003/010')

                                    ->whereBetween('bill_booking_date',[$start_year,$end_year])
                                     //->toSql();
                                    ->get();

            $data['cea_liabilities'] = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as cea_liabilities_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('transaction_code', 'LIKE', '03/006/001')

                                    ->whereBetween('bill_booking_date',[$start_year,$end_year])
                                     //->toSql();
                                    ->get();


            $data['pay_allowances'] = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as pay_allowances_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('transaction_code', 'LIKE', '03/006/002')

                                    ->whereBetween('bill_booking_date',[$start_year,$end_year])
                                     //->toSql();
                                    ->get();

            $data['libalities_erp'] = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as libalities_erp_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('transaction_code', 'LIKE', '03/003/004')

                                    ->whereBetween('bill_booking_date',[$start_year,$end_year])
                                     //->toSql();
                                    ->get();

            $data['leaseline_charges'] = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as leaseline_charges_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('transaction_code', 'LIKE', '03/003/001')

                                    ->whereBetween('bill_booking_date',[$start_year,$end_year])
                                     //->toSql();
                                    ->get();

             $data['liabilities_telephone_chages'] = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as liabilities_telephone_chages_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('transaction_code', 'LIKE', '03/003/002')
                                    ->whereBetween('bill_booking_date',[$start_year,$end_year])
                                     //->toSql();
                                    ->get();

            return view('mis-reports/schedule_3',$data);
        }

        if($request->party_name == '07')
        {
            $data['cash_in_hand'] = DB::table('cash_balance')
                                ->select('balance_amt')
                                ->whereBetween('created_at',[$start_year,$end_year])
                                ->orderByDesc('id')
                                    //->toSql();
                                ->first();
                                // echo "<pre>"; print_r($data['cash_in_hand']); exit;

            $data['current_bank_balance'] = DB::table('bank_balance')->select('balance_amt as total_amt')->where('bank_id', '=', 'State Bank of India')->whereBetween('created_at',[$start_year,$end_year])->orderByDesc('id')->first();

            $data['savings_bank_balance'] = DB::table('bank_balance')->select('balance_amt as total_amt_savings')->where('bank_id', '=', 'Canara Bank')->whereBetween('created_at',[$start_year,$end_year])->orderByDesc('id')->first();
            // echo "<pre>"; print_r($data['bank_balance']); exit;

            return view('mis-reports/schedule_07',$data);
        }

        if($request->party_name == '08')
        {

            $data['festival_other'] = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as festival_other_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('transaction_code', 'LIKE', '08/001/002')

                                    ->whereBetween('bill_booking_date',[$start_year,$end_year])
                                     //->toSql();
                                    ->get();

            $data['medical_advance'] = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as medical_advance_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('transaction_code', 'LIKE', '08/001/004')

                                    ->whereBetween('bill_booking_date',[$start_year,$end_year])
                                     //->toSql();
                                    ->get();


            $data['other_ltc_advance'] = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as other_ltc_advance_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('transaction_code', 'LIKE', '08/001/001')

                                    ->whereBetween('bill_booking_date',[$start_year,$end_year])
                                     //->toSql();
                                    ->get();

            $data['security_deposit'] = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as security_deposit_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('transaction_code', 'LIKE', '17/014/014')

                                    ->whereBetween('bill_booking_date',[$start_year,$end_year])
                                     //->toSql();
                                    ->get();

            $data['insurance'] = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as insurance_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('transaction_code', 'LIKE', '08/004/001')

                                    ->whereBetween('bill_booking_date',[$start_year,$end_year])
                                     //->toSql();
                                    ->get();

             $data['other_expenses'] = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as other_expenses_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('transaction_code', 'LIKE', '08/004/003')
                                    ->whereBetween('bill_booking_date',[$start_year,$end_year])
                                     //->toSql();
                                    ->get();

            return view('mis-reports/schedule_8',$data);
        }


        if($request->party_name == '02')
        {
            return view('mis-reports/schedule_02',$data);
        }
		if($request->party_name == '04')
        {
            return view('mis-reports/schedule_04',$data);
        }
        if($request->party_name == '05')
        {
            return view('mis-reports/schedule_05',$data);
        }
        if($request->party_name == '06')
        {
            return view('mis-reports/schedule_06',$data);
        }
        if($request->party_name == '13')
        {
            return view('mis-reports/schedule_13',$data);
        }




    }

    public function viewIncomeSchedules()
    {
        $schedules = DB::table('schedule_master')->get();
        return view('mis-reports/get-income-schedules', compact('schedules'));
    }

    public function getIncomeSummaryReport()
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

		return view('mis-reports/get-income-summary-report',$data);
    }

    public function viewIncomeSummaryReport(Request $request)
    {
        $financial_year=date('Y')+1;
		$start_year=date("Y-04-01");
        $end_year=date("$financial_year-03-31");

        $schedules = DB::table('schedule_master')->get();

        $sum_amt_income = 0;
        $sum_amt_expense = 0;
        foreach($schedules as $schedule)
        {
            $income_amount_total = DB::table('payment_rcvd_dtl')
                        ->where('payment_status', 'Received')
                        ->where('account_code', 'LIKE', $schedule->schedule.'%')
                        ->whereBetween('payment_rcv_date',[$start_year,$end_year])
                        ->select(DB::raw('sum(net_amt) as total_amt'))
                        ->get();

            // echo "<pre>"; print_r($income_amount_total); exit;
            $sum_amt_income += $income_amount_total[0]->total_amt;

            $expense_amount_total = DB::table('payment_dtl')
                        ->leftJoin('voucher_entry', 'payment_dtl.voucher_id', '=', 'voucher_entry.voucher_no')
                        ->where('payment_dtl.payment_status', 'Paid')
                        ->where('voucher_entry.account_head_id', 'LIKE', $schedule->schedule.'%')
                        ->whereBetween('payment_dtl.payment_release_date',[$start_year,$end_year])
                        ->select(DB::raw('sum(payment_dtl.payment_amount) as total_amt'))
                        ->get();

            $sum_amt_expense += $expense_amount_total[0]->total_amt;

            $sum_amt = $sum_amt_income - $sum_amt_expense;

        }
        // echo "<pre>"; print_r($sum_amt); exit;


        // echo "<pre>"; print_r($income_amount_total); exit;

        return view('mis-reports/income-summary-report', compact('sum_amt'));
    }




	 public function balanceSheetView()
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

		return view('mis-reports/get-balance-sheet',$data);
    }

    public function balanceSheetReport(Request $request)
    {
		//echo "<pre>"; print_r($request->financial_year); exit;
		$getyear_range = explode("-",$request->financial_year);
		$start_year=date("$getyear_range[0]-04-01");
		$end_year=date("$getyear_range[1]-03-31");

		try{

            $income_account_heads = DB::table('bs_schedule_master')->where('particular_type', 'income')->get();

                foreach($income_account_heads as $income_account_head)
                {
	                $income_lists = DB::table('received_voucher_entry')
	                ->select(DB::raw('sum(total_amt) as total_amt'))
	                ->where('bill_status', '=','Received')
	                ->where('account_head_id', 'LIKE', $income_account_head->schedule.'%')
	                ->whereBetween('created_at',[$start_year,$end_year])
	               	->get();

	                $data['currentyear_income_list'][]=array('schedule_code'=>$income_account_head->schedule,'schedule_name'=>$income_account_head->particulars,'payable_amt'=>$income_lists[0]->total_amt);
                }

            // echo "<pre>"; print_r($data['currentyear_income_list']); exit;

            $account_expenses = DB::table('bs_schedule_master')->where('particular_type', 'expense')->get();

                foreach($account_expenses as $expenses)
                {
	                $expense = DB::table('voucher_entry')
	                ->select(DB::raw('sum(payable_amt) as payableamt'))
	                ->where('bill_status', '=','Paid')
	                ->where('account_head_id', 'LIKE', $expenses->schedule.'%')
	                ->whereBetween('bill_booking_date',[$start_year,$end_year])
	               	->get();

	                $data['currentyear_expenditure_list'][]=array('schedule_code'=>$expenses->schedule,'schedule_name'=>$expenses->particulars,'payable_amt'=>$expense[0]->payableamt);
                }



	             //echo "<pre>"; print_r($data['currentyear_expenditure_list']); exit;


                // exit;

		}catch(Exception $e){
			return $e->getMessage();
		}
        // $data['income_expenditure']=array(4,9,10,11,12,13,14,15,16,17,18,19,20,21,22);
		//$data['fromyear']=$start_year;
		$data['toyear']=$getyear_range[1];

		return view('mis-reports/balance-sheet-report',$data);
    }

	public function getContraVoucherReport()
    {
        return view('mis-reports/get-contra-voucher');
    }

    public function viewContraVoucherReport(Request $request)
    {
        $data['start'] = $request->from_date;
        $data['end'] = $request->to_date;

        $payment_contralist = DB::table('payment_dtl')
		        			  ->where('vouchertype','=','contra')
				              ->whereDate('payment_booking_date','>=',$request->from_date)
				              ->whereDate('payment_booking_date','<=',$request->to_date)
				              ->get();
        //echo "<pre>";print_r($payment_contralist); exit;
		$data['contra_list']=array();

		foreach($payment_contralist as $paycontra){

			$entrylist = DB::table('gl_entry')->where('voucher_no','=',$paycontra->voucher_id)
	        ->orderBy('id', 'asc')
	        ->first();

			$credit_account_name = DB::table('company_bank')->where('id','=',$entrylist->cr_account)->first();

            if(!empty($credit_account_name)){

                    $cr_account= $credit_account_name->bank_name;
            }else{
                    $credit_account_name = DB::table('coa_master')->where('coa_code','=',$entrylist->cr_account)->first();
                    $cr_account= $credit_account_name->head_name;
            }
            //$cr_account= $credit_account_name->bank_name;
			//echo "<pre>";print_r($cr_account);

			$data['contra_list'][]=array('booking_date' => $paycontra->payment_booking_date, 'voucher_no' => $paycontra->voucher_id,'dr_account' => $entrylist->dr_account, 'cr_account' => $cr_account, 'narration' => $paycontra->narration,'dr_amt' => $paycontra->payment_amount,'cr_amt' => $paycontra->payment_amount);

		}
        //exit;
        return view('mis-reports/contra-voucher-report', $data);
    }

    public function getCashbookReport()
    {
        return view('mis-reports/get-cashbook');
    }


   public function viewCashbookReport(Request $request)
    {

		$data['fromdate']=$request->from_date;
		$data['todate']=$request->to_date;

        $cash_balance = DB::table('cash_balance')
			            ->whereDate('created_at','>=',$request->from_date)
			            ->whereDate('created_at','<=',$request->to_date)
			            ->get();
        //echo "<pre>";print_r($cash_balance); exit;
		$data['cash_list']=array();

		foreach($cash_balance as $cashdtl){

			$entrylist = DB::table('gl_entry')
            ->leftJoin('payment_dtl','gl_entry.voucher_no','=','payment_dtl.voucher_id')
            ->where('gl_entry.voucher_no','=',$cashdtl->voucher_no)
            ->select('gl_entry.*','payment_dtl.bank_id','payment_dtl.narration','payment_dtl.vouchertype','payment_dtl.created_at')
	        ->orderBy('gl_entry.id', 'asc')
	        ->first();
            //echo "<pre>";print_r($entrylist); exit;

            $credit_account_name = DB::table('company_bank')->where('id','=',$entrylist->cr_account)->first();

            if(!empty($credit_account_name)){

                    $cr_account= $credit_account_name->bank_name;
            }else{
                    $credit_account_name = DB::table('coa_master')->where('coa_code','=',$entrylist->cr_account)->first();
                    $cr_account= $credit_account_name->head_name;
            }


			$data['contra_list'][]=array('booking_date' => $cashdtl->created_at,'vouchertype' => $entrylist->vouchertype, 'voucher_no' => $entrylist->voucher_no,'dr_account' => $entrylist->dr_account, 'cr_account' => $cr_account, 'narration' => $entrylist->narration,'income_amt' => $cashdtl->income,'expense_amt' => $cashdtl->expense,'balance_amt' => $cashdtl->balance_amt);
		}

        $data['current_balance'] = DB::table('company_cash')
            ->first();

		return view('mis-reports/report-cashbook', $data);
	}



    public function getPettyCashReport()
    {
        return view('mis-reports/get-pettycash');
    }

	public function viewPettyCashReport(Request $request)
    {
        $data['fromdate']=$request->from_date;
        $data['todate']=$request->to_date;

        $petty_balance = DB::table('petty_balance')
                        ->whereDate('created_at','>=',$request->from_date)
                        ->whereDate('created_at','<=',$request->to_date)
                        ->get();

        $data['petty_list']=array();

        foreach($petty_balance as $pettydtl){

            $entrylist = DB::table('gl_entry')
            ->leftJoin('payment_dtl','gl_entry.voucher_no','=','payment_dtl.voucher_id')
            ->where('gl_entry.voucher_no','=',$pettydtl->voucher_no)
            ->select('gl_entry.*','payment_dtl.bank_id','payment_dtl.narration','payment_dtl.vouchertype','payment_dtl.created_at')
            ->orderBy('gl_entry.id', 'asc')
            ->first();
            //echo "<pre>";print_r($entrylist); exit;
            $credit_account_name = DB::table('company_bank')->where('id','=',$entrylist->cr_account)->first();
            $cr_account= $credit_account_name->bank_name;

            $data['petty_list'][]=array('booking_date' => $pettydtl->created_at,'vouchertype' => $entrylist->vouchertype, 'voucher_no' => $entrylist->voucher_no,'dr_account' => $entrylist->dr_account, 'cr_account' => $cr_account, 'narration' => $entrylist->narration,'income_amt' => $pettydtl->income,'expense_amt' => $pettydtl->expense,'balance_amt' => $pettydtl->balance_amt);
        }


        $data['current_balance'] = DB::table('company_petty')
            ->first();
        //echo "<pre>"; print_r($data); exit;
        return view('mis-reports/report-pettycash', $data);
    }

	public function receiptPaymentView()
    {
        return view('mis-reports/vw-receipt-payment-report');
    }


    public function receiptPaymentReport(Request $request)
    {
        // dd($request);

        $financial_year=date('Y')+1;
        $start_year=date("Y-04-01");
        $end_year=date("$financial_year-03-31");

        $data['payment']= DB::table('payment_dtl')->select(DB::raw('sum(payment_amount) as total_payment'))->get();
        $data['receipt']= DB::table('payment_rcvd_dtl')->select(DB::raw('sum(net_amt) as total_receipt'))->get();
        $data['stipend_graduate']= DB::table('stipend')->select(DB::raw('sum(graduate) as total_graduate'))->get();
        $data['stipend_diploma']= DB::table('stipend')->select(DB::raw('sum(diploma) as total_diploma'))->get();
        //echo "<pre>"; print_r($data['payment']); print_r($data['receipt']); exit;

        return view('mis-reports/receipt-payment-report',$data);
    }



	public function establishmentReceiptPayment()
    {
        return view('mis-reports/vw-establishment-payment-receipt');
    }


    public function establishmentReceiptPaymentReport(Request $request)
    {
        $getyear_range = explode("-",$request->financial_year);
        $data['start_year']=date("$getyear_range[0]");
        $data['end_year']=date("$getyear_range[1]");

        $start_financial_year = date("$getyear_range[0]-04-01");
        $to_financial_year = date("$getyear_range[1]-03-31");

        $data['receive_cash_in_hand'] = DB::table('cash_balance')
                                ->select(DB::raw('sum(income) as closing_amt'))
                                ->whereBetween('created_at',[$start_financial_year,$to_financial_year])
                                ->get();

        $data['receive_saving_balance'] = DB::table('bank_balance')
                                ->where('bank_branch_id','=',1)
                                ->select(DB::raw('sum(income) as receive_saving_amt'))
                                ->whereBetween('created_at',[$start_financial_year,$to_financial_year])
                                ->get();


        $data['receive_current_balance'] = DB::table('bank_balance')
                                ->where('bank_branch_id','=',2)
                                ->select(DB::raw('sum(income) as receive_current_amt'))
                                ->whereBetween('created_at',[$start_financial_year,$to_financial_year])
                                ->get();

        $data['grant_in_aid'] = DB::table('received_voucher_entry')
                                ->select(DB::raw('sum(total_amt) as grant_in_aid_amt'))
                                ->where('transaction_code', 'LIKE', '10/001'.'%')
                                ->where('bill_status', '=', 'Received')
                                ->whereBetween('created_at',[$start_financial_year,$to_financial_year])
                                ->get();

        $data['saving_bank_account'] = DB::table('received_voucher_entry')
                                ->select(DB::raw('sum(total_amt) as saving_account_amt'))
                                ->where('transaction_code', 'LIKE', '12/001'.'%')
                                ->where('bill_status', '=', 'Received')
                                ->whereBetween('created_at',[$start_financial_year,$to_financial_year])
                                ->get();

        $data['other_income'] = DB::table('received_voucher_entry')
                                ->select(DB::raw('sum(total_amt) as other_income_amt'))
                                ->where('transaction_code', 'LIKE', '15/001'.'%')
                                ->where('bill_status', '=', 'Received')
                                ->whereBetween('created_at',[$start_financial_year,$to_financial_year])
                                ->get();


        $data['deposit_advance'] = DB::table('received_voucher_entry')
                                ->select(DB::raw('sum(total_amt) as deposit_advance_amt'))
                                ->where('transaction_code', 'LIKE', '13/004'.'%')
                                ->where('bill_status', '=', 'Received')
                                ->whereBetween('created_at',[$start_financial_year,$to_financial_year])
                                ->get();
        $data['other_receipt'] = DB::table('received_voucher_entry')
                                ->select(DB::raw('sum(total_amt) as other_receipt_amt'))
                                ->where('transaction_code', 'LIKE', '13/001'.'%')
                                ->where('bill_status', '=', 'Received')
                                ->whereBetween('created_at',[$start_financial_year,$to_financial_year])
                                ->get();

        $data['establishment_expenses'] = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as establishment_expenses_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('transaction_code', 'LIKE', '15'.'%')
                                    ->whereBetween('bill_booking_date',[$start_financial_year,$to_financial_year])
                                    ->get();

        $data['administrative_expenses'] = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as administrative_expenses_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('transaction_code', 'LIKE', '17'.'%')
                                    ->whereBetween('bill_booking_date',[$start_financial_year,$to_financial_year])
                                    ->get();

        $data['transport_expenses'] = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as transport_expenses_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('transaction_code', 'LIKE', '18'.'%')
                                    ->whereBetween('bill_booking_date',[$start_financial_year,$to_financial_year])
                                    ->get();

        $data['repairs_expenses'] = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as repairs_expenses_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('transaction_code', 'LIKE', '19'.'%')
                                    ->whereBetween('bill_booking_date',[$start_financial_year,$to_financial_year])
                                    ->get();
        $data['period_expenses'] = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as period_expenses_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('transaction_code', 'LIKE', '22/001'.'%')
                                    ->whereBetween('bill_booking_date',[$start_financial_year,$to_financial_year])
                                    ->get();

        $data['other_payment'] = DB::table('voucher_entry')
                                    ->select(DB::raw('sum(payable_amt) as other_payment_amt'))
                                    ->where('bill_status', '=', 'Paid')
                                    ->where('transaction_code', 'LIKE', '15'.'%')
                                    ->whereBetween('bill_booking_date',[$start_financial_year,$to_financial_year])
                                    ->get();

        $data['payment_cash_in_hand'] = DB::table('cash_balance')
                                ->select(DB::raw('sum(expense) as closing_amt'))
                                ->whereBetween('created_at',[$start_financial_year,$to_financial_year])
                                ->get();

         $data['payment_saving_balance'] = DB::table('bank_balance')
                                ->where('bank_branch_id','=',1)
                                ->select(DB::raw('sum(expense) as closing_amt'))
                                ->whereBetween('created_at',[$start_financial_year,$to_financial_year])
                                ->get();


        $data['payment_current_balance'] = DB::table('bank_balance')
                                ->where('bank_branch_id','=',2)
                                ->select(DB::raw('sum(expense) as closing_amt'))
                                ->whereBetween('created_at',[$start_financial_year,$to_financial_year])
                                ->get();

        return view('mis-reports/establishment-payment-receipt-report',$data);
    }


	public function consoliatedBalancesheetView()
    {

       return view('mis-reports/vw-consoliated-balancesheet');
    }

    public function consoliatedBalancesheetReport()
    {

       return view('mis-reports/report-consoliated-balancesheet');
    }

}
