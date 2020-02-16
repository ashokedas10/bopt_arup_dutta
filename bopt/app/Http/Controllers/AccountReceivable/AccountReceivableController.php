<?php

namespace App\Http\Controllers\AccountReceivable;

use App\Model\AccountReceivable\ReceivedVoucherEntry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use View;
use Validator;
use Session;
use Auth;

class AccountReceivableController extends Controller
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

        try {
            $data['receivablelisting']  = ReceivedVoucherEntry::groupBy('voucher_no')->orderBy('id', 'desc')->get();

        }catch(Exception $e){

            return $e->getMessage();
        }
        $data['accounthead']=DB::table('account_master')->get();
        $data['journalhead']=DB::table('coa_master')->get();

        return view('accountreceivable/receivablelisting',$data);
    }

    public function viewPayment()
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

      
        $data['accounthead']=DB::table('account_master')

            ->where('account_code','not like','%S%')
            ->orderBy('account_name', 'asc')
            ->get();

        $data['banklist'] = DB::table('company_bank')
            ->leftJoin('bank_masters', 'company_bank.bank_name', '=', 'bank_masters.master_bank_name')
            ->groupBy('company_bank.bank_name')
            ->get();


        return view('accountreceivable/vw-receivable',$data);
    }

    public function savePaymentbooking(Request $request)
    {
        $tot_item=count($request->account_head_id);

        $transaction_id="GL".date("d/m/Y")."/".time()."";
        $payment_code = time();

        for($i=0;$i<$tot_item;$i++)
        {

            // echo "hi"; exit;





            $schedule_no = explode("/",  $request->account_head_id[$i]);

            $voucher_entry = DB::table('received_voucher_entry')->insert(
                ['voucher_no' => $request['voucher_no'],
                 'account_head_id' => $request->account_head_id[$i],
                  'sub_act_head_id' =>$request['sub_account_id'.$i],
                  'transaction_code' => $request['transaction_code'.$i],
                  'account_tool' => $request['account_tool'.$i],
                  'voucher_type' => $request['voucher_type'],
                   'payment_mode' =>'',

                     'received_amount' =>  $request['bill_amt'.$i],
                     'gst_amt' => $request['bill_gst_amt'.$i],
                     'total_amt' => $request['payable_amt'.$i],
                     'remarks' => $request['entry_remark'.$i],
                     'bill_status' => 'Received',
                      'created_at' => date("Y-m-d")]
            );



            if($request->account_tool[$i]=='debit'){


                DB::table('gl_entry')->insert(
                    ['transaction_id' => $transaction_id,  'gl_account_head' => $request->account_head_id[$i],
                    'transaction_head' =>$request['transaction_code'.$i],
                    'transaction_type' => $request['account_tool'.$i],
                    'voucher_no' => $request['voucher_no'], 'amount' => $request['payable_amt'.$i],
                    'gl_date' => date("Y-m-d"), 'voucher_date' => "",
                     'payment_release_date' => date("Y-m-d"), 'payment_rcv_date' => date("Y-m-d"),'status'=> '0']
                );

            }else{
                DB::table('gl_entry')->insert(
                    ['transaction_id' => $transaction_id,  'gl_account_head' => $request->account_head_id[$i],
                    'transaction_head' =>$request['transaction_code'.$i],
                    'transaction_type' => $request['account_tool'.$i],
                    'voucher_no' => $request['voucher_no'], 'amount' => $request['payable_amt'.$i],
                    'gl_date' => date("Y-m-d"), 'voucher_date' => "",
                     'payment_release_date' => date("Y-m-d"), 'payment_rcv_date' => date("Y-m-d"),'status'=> '0']
                );
            }

            // }






    }
    Session::flash('message','Information Successfully Added.');
    return redirect('accountreceivable/list');
        


    }
  public function billPaylisting(Request $request)
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

         $data['payablelisting'] = DB::table('payment_rcvd_dtl')
         ->leftJoin('received_voucher_entry', 'payment_rcvd_dtl.voucher_no', '=', 'received_voucher_entry.voucher_no')
         ->where('received_voucher_entry.voucher_type','!=','salary_voucher')
         //->where('voucher_entry.bill_status','=','Release')
         ->where('received_voucher_entry.bill_status','=','Paid')
         ->groupBy('received_voucher_entry.voucher_no')
         ->get();

     }catch(Exception $e){

         return $e->getMessage();
     }

     return view('accountreceivable/paybilllisting',$data);
    }
    public function paymentViewrecieve()
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
        ->where('voucher_type','!=','salary_voucher')
        ->where('bill_status','=','Received')

        ->groupBy('voucher_no')
        ->get();



        $data['journalhead']=DB::table('coa_master')->get();
        $data['employeelist']=DB::table('employee')->where('status','=','active')->orderBy('emp_fname', 'asc')->get();
        $data['supplierlist']=DB::table('supplier')->get();
        $data['accounthead']=DB::table('account_master')    ->where('account_type','=','income')
        ->where('account_code','not like','%S%')
        ->orderBy('account_name', 'asc')->get();

        $data['banklist'] = DB::table('company_bank')
            ->leftJoin('bank_masters', 'company_bank.bank_name', '=', 'bank_masters.master_bank_name')
            ->groupBy('company_bank.bank_name')
            ->get();

        return view('accountreceivable/vw-payment',$data);
    }



    public function getPaymentbookingById($voucher_id){

        $email = Auth::user()->email;
        $data['Roledata']=DB::table('role_authorization')
        ->join('module', 'role_authorization.module_name', '=', 'module.id')
        ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
        ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
        ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
        ->where('member_id','=',$email)
        ->get();

        try{

            $payment_details= DB::table('received_voucher_entry')
            ->where('voucher_no', $voucher_id)
            ->get();


            $data['payments']= DB::table('received_voucher_entry')
            ->where('voucher_no', $voucher_id)
            ->first();


             $ptax=0;
             $data['result']='';
            foreach($payment_details as $val){

                $acc_head= DB::table('account_master')
                ->where('account_code', $val->account_head_id)
             ->first();
             $acc_subhead= DB::table('coa_master')
             ->where('id', $val->sub_act_head_id)
          ->first();
          $company_bank= DB::table('company_bank')

          ->get();

          $data['result'].='
          <div class="brdr"  >
            <div class="row form-group">
            <div class="col-md-4">
                <label for="email-input" class="form-control-label">Account Head</label>
                <select name="account_head_id[]" class="form-control" id="account_head_id'. $ptax.'">


                            <option value="'.$val->account_head_id.'">'.$acc_head->account_name.'</option>

                </select>
              </div>
          <div class="col-md-4">
            <label for="text-input" class="form-control-label">Account Sub Head</label>
            <select name="sub_account_id'. $ptax.'" id="sub_account_id'. $ptax.'" class="form-control">

                <option value="'.$val->id.'">'.$acc_subhead->head_name.'</option>

            </select>
          </div>

          <div class="col-md-4">
            <label for="text-input" class="form-control-label">Transaction Code </label>

            <input type="text" name="transaction_code'. $ptax.'" id="transaction_code'. $ptax.'" class="form-control" value="'.$val->transaction_code.'" readonly>

          </div>


          </div>


        <div class="row form-group">

            <div class="col-md-4">
                <label for="text-input" class="form-control-label">Type </label>

                <input type="text" class="form-control" name="account_type'. $ptax.'" id="account_type'. $ptax.'" value="'.$val->account_tool.'" readonly />
              </div>

          <div class="col-md-4">
            <label for="text-input" class="form-control-label">Final Bill Amount</label>
            <input type="text" class="form-control" name="final_bill_amt'. $ptax.'" id="final_bill_amt'. $ptax.'" value="'.$val->received_amount.'" readonly />
          </div>
          <div class="col-md-4">
            <label>Bill GST Amount</label>
            <input type="text" class="form-control" name="bill_gst_amt'. $ptax.'"
            id="bill_gst_amt'. $ptax.'" value="'.$val->gst_amt.'" readonly />
        </div>
        </div>


          <div class="row form-group">



            <div class="col-md-4">
                <label>Net Amount</label>
                <input type="text" class="form-control" name="net_amt'. $ptax.'" id="net_amt'. $ptax.'" value="'.$val->total_amt.'" readonly />
            </div>



            <div class="col-md-4">
                <label>Payment Amount</label>
                <input type="text" class="form-control" name="payment_amount'. $ptax.'" id="payment_amount'. $ptax.'" value="'.$val->total_amt.'" readonly />
            </div>


            <div class="col-md-4">
                <label>Narration</label>
                <textarea rows="3" class="form-control" name="remarks'. $ptax.'" id="remarks'. $ptax.'" readonly>'.$val->remarks.'</textarea>
        </div>




        </div>

        ';
        if($val->account_tool=='credit'){
            $data['result'].='
        <div class="row form-group">


        <div class="col-md-4">
        <label>Payment Mode</label>
        <select name="payment_mode'. $ptax.'" id="payment_mode'. $ptax.'" class="form-control" onchange="getPaymentMode('. $ptax.')" required>
            <option value="">Select Payment Mode</option>
            <option value="cash">Cash</option>
            <option value="neft">NEFT/RTGS</option>
            <option value="cheque">Cheque</option>
        </select>
    </div>

    <div class="col-md-4">
        <label>Cheque/Draft No./ Transfer No. </label>
        <input type="text" class="form-control" name="cheque_draft'. $ptax.'" id="cheque_draft'. $ptax.'" value="" required />
    </div>
    <div class="col-md-4" id="account_recive'. $ptax.'" >
    <label class=" form-control-label">Receive Account Head <span>(*)</span></label>
    <select name="receive_id'. $ptax.'" id="receive_id'. $ptax.'" class="form-control"  >
        <option value="">Select Receive Mode</option>
        <option value="07/003/004">Cash in Hand</option>
        <option value="07/003/005">Petty Cash</option>
    </select>

</div>

            <div class="col-md-4">
                <label>Cheque/Draft Transfer Date</label>
                <input type="date" class="form-control" name="cheque_date'. $ptax.'" id="cheque_date'. $ptax.'" value="" required />

            </div>


            <div class="col-md-4">
                <label>Select Bank</label>
                <select name="payment_bank_id'. $ptax.'" id="payment_bank_id'. $ptax.'" class="form-control" required onchange="populateBranch('. $ptax.')">
                    <option value="">Select Bank name</option>  ';
                    foreach($company_bank as $value){
                        $data['result'].='   <option value="'.$value->bank_name.'" >
                        '.$value->bank_name.'</option>  ';
                      }
                      $data['result'].='   </select>
            </div>


            <div class="col-md-4">
                <label>Branch <span>(*)</span></label>
                <select class="form-control" name="bank_branch_id'. $ptax.'" id="bank_branch_id'. $ptax.'" required>

                </select>
            </div>

        </div>





            '
            ;
                    }
                    $data['result'].='</div>';
            $ptax++;
            }

        }catch(Exception $e){
            return $e->getMessage();
        }
        return $data;
    }

    public function addPayment(Request $request){

        $tot_item=count($request->account_head_id);


      for($i=0;$i<$tot_item;$i++)
      {

  if( $request['account_type'.$i]=='credit'){
    if($request['payment_mode'.$i]=='cash'){

        $check_bank_balance = DB::table('cash_balance')

        ->orderBy('id', 'desc')
        ->first();

    }else{
        $check_bank_balance = DB::table('bank_balance')
        //->where('bank_id', $request['payment_bank_id'])
     ->where('bank_branch_id',$request['bank_branch_id'.$i])
     ->orderBy('id', 'desc')
     ->first();
    }

  //echo "<pre>"; print_r($check_bank_balance); exit;
  if(!empty($check_bank_balance)){

   $opening_balance = $check_bank_balance->balance_amt;

  }else{

    if($request['payment_mode'.$i]=='cash'){
        $company_bank_dtl= DB::table('cash_opening')

        ->first();
        $opening_balance = $company_bank_dtl->opening_balance;
    }else{
        $company_bank_dtl= DB::table('company_bank')
        ->where('id', $request['bank_branch_id'.$i])
        ->first();
    $opening_balance = $company_bank_dtl->opening_balance;
    }
  }

  $current_balance = $opening_balance -$request['payment_amount'.$i];



  if($request['payment_mode'.$i]!='cash'){
    $company_bank= DB::table('company_bank')
    ->where('id', $request['bank_branch_id'.$i])
    ->first();

      }

  if($current_balance>=0){


  }else{

    DB::rollback();
    Session::flash('message','You have insufficient Fund.');
    return redirect('billrecieve/list');

}

    }
  }

  for($i=0;$i<$tot_item;$i++)
    {

        if( $request['account_type'.$i]=='credit'){
            if($request['payment_mode'.$i]=='cash'){
                $check_bank_balance = DB::table('cash_balance')

                ->orderBy('id', 'desc')
                ->first();
            }else{
                $check_bank_balance = DB::table('bank_balance')

                ->where('bank_branch_id', $request['bank_branch_id'.$i])
                ->orderBy('id', 'desc')
                ->first();
            }

//echo "<pre>"; print_r($check_bank_balance); exit;
if(!empty($check_bank_balance)){

 $opening_balance = $check_bank_balance->balance_amt;

}else{
    if($request['payment_mode'.$i]=='cash'){
        $company_bank_dtl= DB::table('cash_opening')

        ->first();
        $opening_balance = $company_bank_dtl->opening_balance;
    }else{
        $company_bank_dtl= DB::table('company_bank')
        ->where('id', $request['bank_branch_id'.$i])
        ->first();
    $opening_balance = $company_bank_dtl->opening_balance;
    }

}

$current_balance = $opening_balance +$request['payment_amount'.$i];

  if($request['payment_mode'.$i]!='cash'){
$company_bank= DB::table('company_bank')
->where('id', $request['bank_branch_id'.$i])
->first();

  }

if($current_balance>=0){


    $payment_entry = DB::table('payment_rcvd_dtl')->insert(
    ['payment_code' => $request['payment_code'],
    'voucher_no' => $request['voucher_no'],
    'voucher_type' => $request['voucher_type'],
    'payment_mode' =>$request['payment_mode'.$i],
     'cheque_draft' => $request['cheque_draft'.$i],
     'cheque_date' =>$request['cheque_date'.$i],
     'bank_id' => $request['payment_bank_id'.$i],
     'bank_branch_id' => $request['bank_branch_id'.$i],
     'net_amt' =>$request['payment_amount'.$i],
     'final_bill_amt' =>$request['final_bill_amt'.$i],
     'final_bill_amt' =>$request['bill_gst_amt'.$i],
     'payment_rcv_date' => $request['payment_booking_date'],
     'release_date' => $request['release_date'],
     'remarks' => $request['remarks'.$i],
     'payment_status' =>'Paid',
     'created_at' => date('Y-m-d H:i:s')]
    );
    if($request['payment_mode'.$i]=='cash'){
        DB::table('cash_balance')->insert(
            ['opening_balance' => $opening_balance,
            'voucher_no' => $request['voucher_no'],

            'income' => $request['payment_amount'.$i],
            'expense' =>'0' , 'balance_amt' => $current_balance,
            'created_at' => date('Y-m-d H:i:s')]
            );

    }else{
        DB::table('bank_balance')->insert(
            ['opening_balance' => $opening_balance,
            'voucher_no' => $request['voucher_no'],
            'bank_id' =>$request['payment_bank_id'.$i],'bank_branch_id' =>$request['bank_branch_id'.$i],
            'income' => $request['payment_amount'.$i],
            'expense' =>'0' , 'balance_amt' => $current_balance,
            'created_at' => date('Y-m-d H:i:s')]
            );
    }


    DB::table('received_voucher_entry')
        ->where('voucher_no', $request['voucher_no'])
        ->update(['bill_status' => 'Paid']);

       $transaction_id="GL".date("d/m/Y")."/".time()."";


        $gl_account= $request['bank_id'];


if($request['payment_mode'.$i]=='cash'){
    DB::table('gl_entry')->insert(
        ['transaction_id' => $transaction_id,
        'gl_account_head' => $request->account_head_id[$i],
        'transaction_head' => $request['transaction_code'.$i],
        'transaction_type' => 'debit' ,
        'voucher_no' => $request['voucher_no'],
        'amount' =>$request['payment_amount'.$i],
        'gl_date' => date("Y-m-d"),
        'voucher_date' => "", 'payment_release_date' => date("Y-m-d"),
        'payment_rcv_date' => $request['payment_booking_date'],
        'status' => "0"]
        );
        DB::table('gl_entry')->insert(
            ['transaction_id' => $transaction_id,
            'gl_account_head' => '07/003',
            'transaction_head' => $request['receive_id'.$i],
            'transaction_type' => 'credit' ,
            'voucher_no' => $request['voucher_no'],
            'amount' =>$request['payment_amount'.$i],
            'gl_date' => date("Y-m-d"),
            'voucher_date' => "", 'payment_release_date' => date("Y-m-d"),'payment_rcv_date' => $request['payment_booking_date'],
            'status' => "0"]
            );
}
else{

    DB::table('gl_entry')->insert(
        ['transaction_id' => $transaction_id,
        'gl_account_head' => $request->account_head_id[$i],
        'transaction_head' => $request['transaction_code'.$i],
        'transaction_type' => 'debit' ,
        'voucher_no' => $request['voucher_no'],
        'amount' =>$request['payment_amount'.$i],
        'gl_date' => date("Y-m-d"),
        'voucher_date' => "", 'payment_release_date' => date("Y-m-d"),
        'payment_rcv_date' => $request['payment_booking_date'],
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
            'voucher_date' => "", 'payment_release_date' => date("Y-m-d"),'payment_rcv_date' => $request['payment_booking_date'],
            'status' => "0"]
            );
}







}



}

    }



    DB::commit();
    Session::flash('message','Record Add Successfully.');
    return redirect('billrecieve/list');


    }

    public function balancePaylisting(){

        $bank= DB::table('gl_entry')
        ->where('status','!=','1')
        ->where('voucher_no','like','%R%')
        ->groupBy('gl_date')
            ->get();
            $arr =array();

            foreach($bank as $val)
            {
                $arr[]=date('m/Y', strtotime($val->gl_date));


            }

            $data['banklist'] = array_unique($arr);


        return view('accountreceivable/bank-balance',$data);
    }
    public function SavePayrollAll(Request $request)
    {
        $payrolldate = explode('/', $request['month_yr']);
         $payroll_date = $payrolldate[1].'-'.$payrolldate[0];

         $data['result']='';


        $emplist= DB::table('gl_entry')
        ->where('status','!=','1')
        ->where('gl_date','like',$payroll_date.'%')
        ->where('voucher_no','like','%R%')
        ->groupBy('transaction_head')
        ->get();

$tax=1;

        foreach($emplist as $emcode)
        {



$amount=DB::table('balance_posting')
->where('transaction_code','=',$emcode->transaction_head)
->orderBy('id', 'DESC')
->first();

 if(empty($amount)){

    $opamount=DB::table('account_opening_balance')
    ->where('account_code','=', $emcode->transaction_head)
    ->where('month_yr','=',  $request['month_yr'])


    ->first();

    if(empty($opamount)){
$opening_bal='0';
  }else{
    $opening_bal=$opamount->closing_balance;
  }
 }else{
    $opening_bal=$amount->closing_balance;
 }

    $process_attendance=DB::table('gl_entry')

    ->where('status','!=','1')
    ->where('gl_date','like',$payroll_date.'%')
    ->where('voucher_no','like','%R%')
    ->where('transaction_head','=',$emcode->transaction_head)
    ->get();


    $dr_amonut=0;
    $cr_amonut=0;
    foreach($process_attendance as $val)
    {
        if($val->transaction_type=='debit'){
            $dr_amonut+=$val->amount;
        }else{
            $cr_amonut+=$val->amount;
        }

    }




$closing_bal= $opening_bal+ $dr_amonut+ $cr_amonut;




 $data['result'].='<tr id="'.$tax.'">
                            <td>'.$tax.'<input type="hidden" readonly class="form-control"
                            name="value[]" style="width:100px;" value="'.$tax.'">
                            </td>
                            <td><input type="text" readonly class="form-control"
                            name="month'.$tax.'" style="width:100px;" value="'.$request['month_yr'].'"></td>

                            <td><input type="text" readonly class="form-control" name="group_code'.$tax.'"
                             style="width:100px;"
                            value="'.$emcode->gl_account_head.'"></td>

                            <td><input type="text" readonly class="form-control"
                            name="transaction_code'.$tax.'" style="width:100px;"
                            value="'.$emcode->transaction_head.'"></td>

                            <td><input type="text" readonly class="form-control"
                            name="opening_balance'.$tax.'" style="width:100px;"
                            value="'.$opening_bal.'"></td>
                            <td><input type="text" readonly class="form-control"
                            name="cr_amount'.$tax.'" style="width:100px;"
                            value="'.$cr_amonut.'"></td>
                            <td><input type="text" readonly class="form-control"
                            name="dr_amount'.$tax.'" style="width:70px;"
                             value="'.$dr_amonut.'"></td>

                            <td><input type="text" readonly class="form-control"
                             name="closing_balance'.$tax.'"
                              style="width:100px;" value="'.$closing_bal.'"
                                ></td>

                </tr> ';
                $tax ++;

        }
        $bank= DB::table('gl_entry')
        ->where('status','!=','1')
        ->where('voucher_no','like','%R%')
        ->groupBy('gl_date')
            ->get();
            $arr =array();

            foreach($bank as $val)
            {
                $arr[]=date('m/Y', strtotime($val->gl_date));


            }

            $data['banklist'] = array_unique($arr);

            $data['month_yr'] =$request['month_yr'];
      return view('accountreceivable/bank-balance',$data);
    }
      public function listPayrollAll(Request $request)
      {
          $payrolldate='';
          $payroll_date='';
          foreach($request->value as $key=>$val)
          {


      $process_attendance=DB::table('balance_posting')


      ->where('month','=',$request['month'.$val])
      ->where('transaction_code','=',$request['transaction_code'.$val])
      ->first();

              $payrolldate = explode('/', $request['month'.$val]);
              $payroll_date = $payrolldate[1].'-'.$payrolldate[0];

              $data['group_code']=$request['group_code'.$val];
              $data['transaction_code']=$request['transaction_code'.$val];
              $data['opening_balance']=$request['opening_balance'.$val];
              $data['dr_amount']=$request['dr_amount'.$val];

              $data['cr_amount']=$request['cr_amount'.$val];
              $data['month']=$request['month'.$val];
              $data['closing_balance']=$request['closing_balance'.$val];

              $data['created_date']=date('Y-m-d');



  if(empty($process_attendance)){
              DB::table('balance_posting')->insert($data);
  }else{
      $dataUpdatebal=DB::table('balance_posting')
      ->where('month','=',$request['month'.$val])
      ->where('transaction_code','=',$request['transaction_code'.$val])

          ->update(['dr_amount' => $request['dr_amount'.$val],'cr_amount' => $request['cr_amount'.$val],
          'closing_balance' => $request['closing_balance'.$val], 'opening_balance' => $request['opening_balance'.$val]]);
  }
              $dataUpdate=DB::table('gl_entry')
              ->where('status','!=','1')
              ->where('gl_date','like',$payroll_date.'%')
              ->where('transaction_head','=',$request['transaction_code'.$val])
              ->where('voucher_no','like','%R%')
                  ->update(['status' => '1']);


          }
          Session::flash('message','Balance Information Successfully Saved.');
          return redirect('accountreceivable/balance');
      }

}
