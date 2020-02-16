<?php

namespace App\Http\Controllers\AccountReceivable;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use View;
use Validator;
use Session;
use Auth;

class BillReceivableController extends Controller
{
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

            $data['receivablelisting'] = DB::table('payment_rcvd_dtl')
                ->leftJoin('received_voucher_entry', 'payment_rcvd_dtl.voucher_no', '=', 'received_voucher_entry.voucher_no')
                //->where('voucher_entry.bill_status','=','Release')
                ->where('received_voucher_entry.bill_status','=','Paid')
                ->get();

        }catch(Exception $e){

            return $e->getMessage();
        }
        return view('accountreceivable/receivedbilllisting',$data);
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


        $data['voucherlist']=DB::table('received_voucher_entry')
            ->where('bill_status','=','NR')
            ->orderBy('id', 'desc')
            ->get();

        $data['journalhead'] = DB::table('coa_master')->get();
        $data['accounthead']=DB::table('account_master')->get();
        $data['banklist'] = DB::table('company_bank')
            ->leftJoin('bank_masters', 'company_bank.bank_name', '=', 'bank_masters.master_bank_name')
            ->groupBy('company_bank.bank_name')
            ->get();

        return view('accountreceivable/vw-received',$data);
    }

    public function addPayment(Request $request)
    {
//            dd($request);
        $check_bank_balance = DB::table('bank_balance')
            //->where('bank_id', $request['payment_bank_id'])
            ->where('bank_branch_id', $request['bank_branch_id'])
            ->orderBy('id', 'desc')
            ->first();
        //echo "<pre>"; print_r($check_bank_balance); exit;
        if (!empty($check_bank_balance)) {

            $opening_balance = $check_bank_balance->balance_amt;

        } else {

            $company_bank_dtl = DB::table('company_bank')
                ->where('id', $request['bank_branch_id'])
                ->first();
            $opening_balance = $company_bank_dtl->opening_balance;
        }

        $current_balance = $opening_balance - $request['payment_amount'];

        if ($current_balance >= 0) {

            DB::beginTransaction();

            $payment_entry = DB::table('payment_rcvd_dtl')->insert(
                ['payment_code' => $request['payment_code'], 'voucher_no' => $request['voucher_no'], 'account_code' => $request['account_code'], 'sub_account_id' => $request['sub_account_id'], 'transaction_code' => $request['transaction_code'], 'account_type' => $request['account_type'], 'voucher_type' => $request['voucher_type'], 'bank_id' => $request['bank_id'], 'bank_branch_id' => $request['bank_branch_id'], 'final_bill_amt' => $request['final_bill_amt'], 'bill_gst_amt' => $request['bill_gst_amt'], 'net_amt' => $request['net_amt'], 'payment_mode' => $request['payment_mode'], 'cheque_draft' => $request['cheque_draft'], 'cheque_date' => $request['cheque_date'], 'payment_rcv_date' => date('Y-m-d'), 'remarks' => $request['remarks'], 'payment_status' => 'Paid', 'created_at' => date('Y-m-d H:i:s')]
            );

            DB::table('bank_balance')->insert(
                ['opening_balance' => $opening_balance, 'voucher_no' => $request['voucher_no'], 'bank_id' => $request['bank_id'], 'bank_branch_id' => $request['bank_branch_id'], 'income' => $request['net_amt'], 'expense' => '0', 'balance_amt' => $current_balance, 'created_at' => date('Y-m-d H:i:s')]
            );

            DB::table('received_voucher_entry')
                ->where('voucher_no', $request['voucher_no'])
                ->update(['bill_status' => 'Paid']);

            $transaction_id = "GL" . date("d/m/Y") . "/" . time() . "";


            if ($request['account_type'] == 'debit') {

                DB::table('gl_entry')->insert(
                    ['transaction_id' => $transaction_id, 'gl_account_head' => $request['account_code'], 'dr_account' => $request['bank_branch_id'], 'cr_account' => $request['transaction_code'], 'voucher_no' => $request['voucher_no'], 'amount' => $request['net_amt'], 'gl_date' => date("Y-m-d"), 'voucher_date' => "", 'payment_release_date' => "", 'payment_rcv_date' => date("Y-m-d")]
                );

            } else {

                DB::table('gl_entry')->insert(
                    ['transaction_id' => $transaction_id, 'gl_account_head' => $request['account_code'], 'dr_account' => $request['transaction_code'], 'cr_account' => $request['bank_branch_id'], 'voucher_no' => $request['voucher_no'], 'amount' => $request['net_amt'], 'gl_date' => date("Y-m-d"), 'voucher_date' => "", 'payment_release_date' => "", 'payment_rcv_date' => date("Y-m-d")]
                );

            }



            DB::commit();
            Session::flash('message', 'Record Add Successfully.');
            return redirect('billpay/list');

        } else {

            DB::rollback();
            Session::flash('message', 'You have insufficient Fund.');
            return redirect('billpay/list');

        }
    }

    public function getPaymentbookingById($voucher_id)
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

                $data['payment_details']= DB::table('received_voucher_entry')
                    ->leftJoin('company_bank', 'received_voucher_entry.bank_branch_id', '=', 'company_bank.id')
                    ->select('received_voucher_entry.*', 'company_bank.branch_name as bank_branch_name')
                    ->where('voucher_no', $voucher_id)
                    ->first();

            }catch(Exception $e){
                return $e->getMessage();
            }
            return $data;
    }


}
