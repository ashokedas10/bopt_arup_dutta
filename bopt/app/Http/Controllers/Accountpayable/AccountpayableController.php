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

class AccountpayableController extends Controller
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
			$voucher  = Voucherentry::where('voucher_type','!=','salary_voucher')
            ->where('voucher_type','!=','contra')->groupBy('voucher_no')->get();
            foreach($voucher as $voucheritem){


                $data['payablelisting'][] = DB::table('voucher_entry')
                        ->where('voucher_type','!=','salary_voucher')

                        ->where('voucher_no','=',$voucheritem->voucher_no)
                        ->orderBy('id', 'desc')
                        ->first();
                    }
			
		}catch(Exception $e){
			
			return $e->getMessage();
		}
		$data['employeelist']=DB::table('employee')->where('status','=','active')->orderBy('emp_fname', 'asc')->get();

		$data['supplierlist']=DB::table('supplier')->get();
	    $data['accounthead']=DB::table('account_master')->get();
	    $data['journalhead']=DB::table('coa_master')->get();

        $data['voucher']  = Voucherentry::where('voucher_type','!=','salary_voucher')
        ->where('voucher_type','!=','contra')->groupBy('voucher_no')->get();
		return view('accountpayable/payablelisting',$data);
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

		$data['employeelist']=DB::table('employee')->where('status','=','active')->orderBy('emp_fname', 'asc')->get();
		$data['tdslist']=DB::table('tds_master')->get();
		
		$data['purchaselist']=DB::table('purchase_item')->where('status','=','GRN Completed')->groupby('purchase_order_no')->get();
		$data['supplierlist']=DB::table('supplier')->get();

	    $data['accounthead']=DB::table('account_master')
	    ->where('account_type','=','assets')
	    ->orWhere('account_type','=','liabilities')
	    ->orWhere('account_type','=','expenses')
	    ->orderBy('account_name', 'asc')
	    ->get();

	    $data['banklist'] = DB::table('company_bank')
            ->leftJoin('bank_masters', 'company_bank.bank_name', '=', 'bank_masters.master_bank_name')
            ->groupBy('company_bank.bank_name')
            ->get();
	    
		return view('accountpayable/vw-payable',$data);
	}

public function savePaymentbooking(Request $request){



        $tot_item=count($request->account_head_id);
        $transaction_id="GL".date("d/m/Y")."/".time()."";

    for($i=0;$i<$tot_item;$i++)
    {

        $request['transaction_code'.$i];

        $voucher_entry = DB::table('voucher_entry')->insert(
            ['voucher_no' => $request['voucher_no'],
             'account_head_id' => $request->account_head_id[$i],
             'sub_account_id' => $request['sub_account_id'.$i],
             'transaction_code' =>  $request['transaction_code'.$i],
             'account_tool' =>  $request['account_tool'.$i],
             'voucher_type' => $request['voucher_type'],
             'vendor_id' => $request['vendor_name'],
             'employee_id' => $request['employee_id'],

             'billno' => $request['billno'],
             'billdate' => $request['billdate'],
             'bill_booking_date' => $request['bill_booking_date'],
             'bill_amt' =>  $request['bill_amt'.$i],
             'tds_id' =>  $request['tds_id'.$i],
             'tds_percentage' =>  $request['tds_percentage'.$i],
             'bill_gst_amt' =>  $request['bill_gst_amt'.$i],
             'deduction_amt' =>  $request['deduction_amt'.$i],
             'final_bill_amt' =>  $request['final_bill_amt'.$i],
             'payable_amt' =>  $request['payable_amt'.$i],
             'entry_remark' =>  $request['entry_remark'.$i],
             'bill_status' => 'NP','approve_status' => 'Not Approve']
        );


        if(!empty($request['bank_id'])){

            $gl_account= $request['bank_id'];

        } elseif (!empty($request['employee_id'])) {

            $gl_account= $request['employee_id'];

        } else {

            $gl_account= $request['vendor_name'];
            DB::table('purchase_item')
            ->where('purchase_order_no', $request['purchase_code'])
            ->update(['status' => 'Bill Generated']);
        }

	    if($request->account_tool[$i]=='debit'){

	    	DB::table('gl_entry')->insert(
            ['transaction_id' => $transaction_id,
            'gl_account_head' => $request->account_head_id[$i],
            'transaction_head' =>$request['transaction_code'.$i],
            'transaction_type' => $request['account_tool'.$i],'voucher_no' => $request['voucher_no'],
            'voucher_date'=> $request['bill_booking_date'],
            'amount' => $request['payable_amt'.$i],
            'gl_date' => date("Y-m-d"),
            'voucher_date' => $request['billdate'],
             'payment_release_date' => "",
             'status' => "0"]
		    );


	    }else{

	    	DB::table('gl_entry')->insert(
            ['transaction_id' => $transaction_id,
            'gl_account_head' => $request->account_head_id[$i],
            'transaction_head' =>  $request['transaction_code'.$i],
            'transaction_type' => $request['account_tool'.$i],
             'voucher_no' => $request['voucher_no'],
              'voucher_date'=> $request['bill_booking_date'],
              'amount' =>  $request['payable_amt'.$i],
              'gl_date' => date("Y-m-d"),
              'voucher_date' => $request['billdate'],
              'payment_release_date' => "",
              'status' => "0"]
		    );

	    }




    }
    if(!empty($request['bank_id'])){

        $gl_account= $request['bank_id'];

    } elseif (!empty($request['employee_id'])) {

        $gl_account= $request['employee_id'];

    } else {

        $gl_account= $request['vendor_name'];
        DB::table('purchase_item')
        ->where('purchase_order_no', $request['purchase_code'])
        ->update(['status' => 'Bill Generated']);
    }

    DB::table('sundae_debtors')->insert(
        ['voucherno' => $request['voucher_no'],
        'party_name' =>$gl_account,
        'amt' => ($request['totcredit']+$request['totdebit']),'status' => "NP",
        'payment_booking_date' => $request['billdate'],
        'payment_release_date' => ""]
    );




    Session::flash('message','Information Successfully Added.');
    return redirect('accountpayable/list');



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
			
		$payment_details= DB::table('voucher_entry')
           	->where('voucher_no', $voucher_id)
            ->get();


			$data['payments']= DB::table('voucher_entry')
           	->where('voucher_no', $voucher_id)
            ->first();


             $ptax=0;
             $data['result']='';
            foreach($payment_details as $val){

                $acc_head= DB::table('account_master')
                ->where('account_code', $val->account_head_id)
             ->first();
             $acc_subhead= DB::table('coa_master')
             ->where('id', $val->sub_account_id)
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
            <input type="text" class="form-control" name="final_bill_amt'. $ptax.'" id="final_bill_amt'. $ptax.'" value="'.$val->final_bill_amt.'" readonly />
          </div>
          <div class="col-md-4">
            <label>Bill GST Amount</label>
            <input type="text" class="form-control" name="bill_gst_amt'. $ptax.'"
            id="bill_gst_amt'. $ptax.'" value="'.$val->bill_gst_amt.'" readonly />
        </div>
        </div>


          <div class="row form-group">



            <div class="col-md-4">
                <label>Net Amount</label>
                <input type="text" class="form-control" name="net_amt'. $ptax.'" id="net_amt'. $ptax.'" value="'.$val->payable_amt.'" readonly />
            </div>



            <div class="col-md-4">
                <label>Payment Amount</label>
                <input type="text" class="form-control" name="payment_amount'. $ptax.'" id="payment_amount'. $ptax.'" value="'.$val->payable_amt.'" readonly />
            </div>


            <div class="col-md-4">
                <label>Narration</label>
                <textarea rows="3" class="form-control" name="remarks'. $ptax.'" id="remarks'. $ptax.'" readonly>'.$val->entry_remark.'</textarea>
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


	public function updateStatus(Request $request){
		DB::table('voucher_entry')
                ->where('voucher_no', $request['voucher_no'])
                ->update(['approve_status' => $request['approve_status']]);
        return redirect('nonapprove/list');
	}



	public function contraListing()
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


			$data['payablelisting'] = DB::table('payment_dtl')
            ->leftJoin('voucher_entry', 'payment_dtl.voucher_id', '=', 'voucher_entry.voucher_no')
            ->where('voucher_entry.voucher_type','=','contra')
            ->where('voucher_entry.bill_status','=','Paid')
            ->get();			
			
		}catch(Exception $e){
			
			return $e->getMessage();
		}
		
		return view('accountpayable/contralisting',$data);
	}



	public function addContra()
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

	    $data['banklist'] = DB::table('company_bank')
        ->leftJoin('bank_masters', 'company_bank.bank_name', '=', 'bank_masters.master_bank_name')
        ->groupBy('company_bank.bank_name')
        ->get();

        $data['accounthead']=DB::table('account_master')
	    ->where('account_code','=','07/003')
	    ->orderBy('account_name', 'asc')
	    ->get();

	    $data['subaccounthead']=DB::table('coa_master')
	    ->where('account_name','=','Cash in hand')
	    ->orderBy('head_name', 'asc')
	    ->get();
	    
		return view('accountpayable/vw-contra',$data);
	}

	/*public function contraReport($request){

		DB::table('contra_report')->insert(['transaction_date' => date("Y-m-d"), 'debit_account' => '','credit_account' => '','narration' => '','debit_amt' => '','credit_amt' => '']);

	}*/

	public function saveBankContra(Request $request){

		if($request->account_tool=='debit'){

			$reciver_account = $request['from_bank_branch_id'];
			$reciver_name = $request['from_bank_id'];
            $giver_name =  $request['to_bank_id'];
            $giver_account =  $request['to_bank_branch_id'];

        }else{

        	$reciver_account = $request['to_bank_branch_id'];
        	$reciver_name = $request['to_bank_id'];
            $giver_account =  $request['from_bank_branch_id'];
            $giver_name =  $request['from_bank_id'];

        }

		$check_bank_balance = DB::table('bank_balance')
        ->where('bank_branch_id', $giver_account)
        ->orderBy('id', 'desc')
        ->first();

        if(!empty($check_bank_balance)){
    	
    		$opening_balance = $check_bank_balance->balance_amt;

        }else{
        	
        	$company_bank_dtl= DB::table('company_bank')
            ->where('id', $giver_account)
            ->first();
            $opening_balance = $company_bank_dtl->opening_balance; 	
        }

	    $current_balance = $opening_balance - $request['payable_amt'];

	    $check_add_bank_balance = DB::table('bank_balance')
        ->where('bank_branch_id', $reciver_account)
        ->orderBy('id', 'desc')
        ->first();


        if(!empty($check_add_bank_balance)){
        	
        	$current_add_bank_balance = $check_add_bank_balance->balance_amt;

	    }else{
	        	
        	$company_bank_balance= DB::table('company_bank')
            ->where('id', $reciver_account)
            ->first();
	        $current_add_bank_balance = $company_bank_balance->opening_balance; 	
	    }

	    $current_add_balance = $current_add_bank_balance + $request['payable_amt'];

	   
	    if($opening_balance>=$request['payable_amt']){
		
		    $voucher_entry = DB::table('voucher_entry')->insert(
	    		['voucher_no' => $request['voucher_no'], 'account_head_id' => '','sub_account_id' => '','transaction_code' => '','account_tool' => $request['account_tool'],'voucher_type' => $request['voucher_type'],'vendor_id' => '','employee_id' => '', 'bank_name' => $giver_name,'bank_branch_id' => $giver_account,'billno' => '','billdate' => '','bill_booking_date' => $request['bill_booking_date'],'bill_amt' => $request['payable_amt'],'tds_id' => '','tds_percentage' => "",'bill_gst_amt' => '','deduction_amt' => '','final_bill_amt' => $request['payable_amt'],'payable_amt' => $request['payable_amt'],'entry_remark' => $request['entry_remark'],'bill_status' => 'Paid','approve_status' => 'Approve']
			);


	    	$transaction_id="GL".date("d/m/Y")."/".time()."";

			    DB::table('gl_entry')->insert(
	    		['transaction_id' => $transaction_id, 'gl_account_head' => '','dr_account' => $reciver_name,'cr_account' => $giver_account,'voucher_no' => $request['voucher_no'],'amount' => $request['payable_amt'],'gl_date' => date("Y-m-d"),'voucher_date' => $request['billdate'], 'payment_release_date' => ""]
			    );

			    /*DB::table('gl_entry')->insert(
	    		['transaction_id' => $transaction_id, 'gl_account_head' => '','dr_account' => $giver_account ,'cr_account' => $reciver_name,'voucher_no' => $request['voucher_no'],'amount' => $request['payable_amt'],'gl_date' => date("Y-m-d"),'voucher_date' => date("Y-m-d"), 'payment_release_date' => $request['bill_booking_date']]
				);*/


			$payment_entry = DB::table('payment_dtl')->insert(
	    		['payment_code' => time(),'voucher_id' => $request['voucher_no'],'vouchertype' => $request['voucher_type'],'payment_mode' => $request['payment_mode'],'cheque_draft_date' => date('Y-m-d H:i:s'),'bank_id' => $giver_name,'bank_branch_id' => $giver_account,'payment_amount' => $request['payable_amt'],'due_amount' => '','payment_booking_date' => $request['bill_booking_date'],'payment_release_date' => $request['bill_booking_date'],'encloser_dtl' => '','narration' => $request['entry_remark'],'payment_status' =>'Paid','created_at' => date('Y-m-d H:i:s')]
			);

			DB::table('bank_balance')->insert(
    		['opening_balance' => $opening_balance,'voucher_no' => $request['voucher_no'],'bank_id' => $giver_name,'bank_branch_id' => $giver_account,'income' => '0','expense' => $request['payable_amt'], 'balance_amt' => $current_balance,'created_at' => date('Y-m-d H:i:s')]
			);


			DB::table('bank_balance')->insert(
    		['opening_balance' => $current_add_bank_balance,'voucher_no' => $request['voucher_no'],'bank_id' => $reciver_name,'bank_branch_id' => $reciver_account,'income' => $request['payable_amt'] ,'expense' => '0', 'balance_amt' => $current_add_balance,'created_at' => date('Y-m-d H:i:s')]
			);
		}

	}

	public function savePettyCashContra(Request $request)
    {
       
		$reciver_name = $request['sub_account_name'];
        $reciver_account = $request['sub_account_code'];
        $giver_name =  $request['to_bank_id'];
        $giver_account =  $request['to_bank_branch_id'];

        $check_bank_balance = DB::table('bank_balance')
            ->where('bank_branch_id', $request['to_bank_branch_id'])
            ->orderBy('id', 'desc')
            ->first();

        if (!empty($check_bank_balance)) {

            $opening_balance = $check_bank_balance->balance_amt;

        }
        else
        {
            $company_bank_dtl = DB::table('company_bank')
                ->where('id', $request['to_bank_branch_id'])
                ->first();
            $opening_balance = $company_bank_dtl->opening_balance;
        }

	        $check_petty_balance = DB::table('petty_balance')
	        ->orderBy('id', 'desc')
	        ->first();

            if(!empty($check_petty_balance)) {

                $opening_petty_balance = $check_petty_balance->balance_amt;

            }
            else
            {
                $company_petty_dtl = DB::table('company_petty')->find(1);
                // dd($company_cash_dtl);
                $opening_petty_balance = $company_petty_dtl->opening_balance;
            }
            $current_petty_balance = $opening_petty_balance + $request['payable_amt'];


        if($opening_balance >= $request['payable_amt'])
        {
            $current_balance = $opening_balance - $request['payable_amt'];

            $voucher_entry = DB::table('voucher_entry')->insert(
    		['voucher_no' => $request['voucher_no'], 'account_head_id' => $request['account_head_id'],'sub_account_id' => $request['sub_account_id'],'transaction_code' => $request['sub_account_code'],'account_tool' => $request['account_tool'],'voucher_type' => $request['voucher_type'],'vendor_id' => '','employee_id' => '', 'bank_name' => '','bank_branch_id' => '','billno' => '','billdate' => $request['bill_booking_date'],'bill_booking_date' => $request['bill_booking_date'],'bill_amt' => $request['payable_amt'],'tds_id' => '','tds_percentage' => '','bill_gst_amt' => '','deduction_amt' => '','final_bill_amt' => $request['payable_amt'],'payable_amt' => $request['payable_amt'],'entry_remark' => $request['entry_remark'],'bill_status' => 'Paid','approve_status' => 'Approve']
			);

    		$transaction_id="GL".date("d/m/Y")."/".time()."";



			$payment_entry = DB::table('payment_dtl')->insert(
	    		['payment_code' => time(),'voucher_id' => $request['voucher_no'],'vouchertype' => $request['voucher_type'],'payment_mode' => $request['payment_mode'], 'payment_mode_no' => '','cheque_draft_date' => date('Y-m-d H:i:s'),'bank_id' => $request['sub_account_name'],'bank_branch_id' => '','payment_amount' => $request['payable_amt'],'due_amount' => '','payment_booking_date' => $request['bill_booking_date'],'payment_release_date' => $request['bill_booking_date'],'encloser_dtl' => '','narration' => $request['entry_remark'],'payment_status' =>'Paid','created_at' => date('Y-m-d H:i:s')]
			);

			DB::table('bank_balance')->insert(
    		['opening_balance' => $opening_balance,'voucher_no' => $request['voucher_no'],'bank_id' => $giver_name,'bank_branch_id' => $giver_account,'income' => 0 ,'expense' => $request['payable_amt'], 'balance_amt' => $current_balance,'created_at' => date('Y-m-d H:i:s')]
			);

			DB::table('petty_balance')->insert(
                ['opening_balance' => $opening_petty_balance, 'voucher_no' => $request['voucher_no'], 'income' => $request['payable_amt'] , 'expense' => 0, 'balance_amt' => $current_petty_balance, 'created_at' => date('Y-m-d H:i:s')]
            );

			DB::table('gl_entry')->insert(['transaction_id' => $transaction_id, 'gl_account_head' => $request['account_head_id'],'dr_account' =>$reciver_name,'cr_account' => $giver_account,'voucher_no' => $request['voucher_no'],'amount' => $request['payable_amt'],'gl_date' => date("Y-m-d"),'voucher_date' => $request['billdate'], 'payment_release_date' => ""]
	    	);

			/*DB::table('gl_entry')->insert(['transaction_id' => $transaction_id, 'gl_account_head' => $request['account_head_id'],'dr_account' => $giver_account,'cr_account' => $reciver_name,'voucher_no' => $request['voucher_no'],'amount' => $request['payable_amt'],'gl_date' => date("Y-m-d"),'voucher_date' => date("Y-m-d"), 'payment_release_date' => $request['bill_booking_date']]
			);*/
        } 
    }
	
	
	public function saveCashInHandContra(Request $request){

		//echo $request->account_tool; exit;
		if($request->account_tool=='debit'){

			$reciver_name = $request['sub_account_name'];
            $reciver_account = $request['sub_account_code'];
            $giver_name =  $request['to_bank_id'];
            $giver_account =  $request['to_bank_branch_id'];

            $check_bank_balance = DB::table('bank_balance')
                ->where('bank_branch_id', $request['to_bank_branch_id'])
                ->orderBy('id', 'desc')
                ->first();

            if (!empty($check_bank_balance)) {

                $opening_balance = $check_bank_balance->balance_amt;

            }
            else
            {
                $company_bank_dtl = DB::table('company_bank')
                ->where('id', $request['to_bank_branch_id'])
                ->first();
                $opening_balance = $company_bank_dtl->opening_balance;
            }

            $current_balance = $opening_balance - $request['payable_amt'];

            $check_cash_balance = DB::table('cash_balance')
            ->orderBy('id', 'desc')
            ->first();

            if(!empty($check_cash_balance)) {

                $opening_cash_balance = $check_cash_balance->balance_amt;

            }
            else
            {
                $company_cash_dtl = DB::table('company_cash')->find(1);
                // dd($company_cash_dtl);
                $opening_cash_balance = $company_cash_dtl->opening_balance;
            }

            
            $current_cash_balance = $opening_balance + $request['payable_amt'];
            

            if($current_balance >= $request['payable_amt'])
            {
                
            	$voucher_entry = DB::table('voucher_entry')->insert(['voucher_no' => $request['voucher_no'], 'account_head_id' => $request['account_head_id'],'sub_account_id' => $request['sub_account_id'],'transaction_code' => $request['sub_account_code'],'account_tool' => $request['account_tool'],'voucher_type' => $request['voucher_type'],'vendor_id' => '','employee_id' => '', 'bank_name' => '','bank_branch_id' => '','billno' => '','billdate' => $request['bill_booking_date'],'bill_booking_date' => $request['bill_booking_date'],'bill_amt' => $request['payable_amt'],'tds_id' => '','tds_percentage' => '','bill_gst_amt' => '','deduction_amt' => '','final_bill_amt' => $request['payable_amt'],'payable_amt' => $request['payable_amt'],'entry_remark' => $request['entry_remark'],'bill_status' => 'Paid','approve_status' => 'Approve']
				);

		    	$transaction_id="GL".date("d/m/Y")."/".time()."";

		    	
				$payment_entry = DB::table('payment_dtl')->insert(
		    		['payment_code' => time(),'voucher_id' => $request['voucher_no'],'vouchertype' => $request['voucher_type'],'payment_mode' => $request['payment_mode'], 'payment_mode_no' => '','cheque_draft_date' => date('Y-m-d H:i:s'),'bank_id' => $request['sub_account_name'],'bank_branch_id' => '','payment_amount' => $request['payable_amt'],'due_amount' => '','payment_booking_date' => $request['bill_booking_date'],'payment_release_date' => $request['bill_booking_date'],'encloser_dtl' => '','narration' => $request['entry_remark'],'payment_status' =>'Paid','created_at' => date('Y-m-d H:i:s')]
				);
                 
                DB::table('bank_balance')->insert(
	    		['opening_balance' => $opening_balance,'voucher_no' => $request['voucher_no'],'bank_id' => $giver_name,'bank_branch_id' => $giver_account,'income' => 0 ,'expense' => $request['payable_amt'], 'balance_amt' => $current_balance,'created_at' => date('Y-m-d H:i:s')]
				);

				DB::table('cash_balance')->insert(
	                ['opening_balance' => $opening_cash_balance, 'voucher_no' => $request['voucher_no'], 'income' => $request['payable_amt'] , 'expense' => 0 , 'balance_amt' => $current_cash_balance, 'created_at' => date('Y-m-d H:i:s')]
	            );

	            DB::table('gl_entry')->insert(['transaction_id' => $transaction_id, 'gl_account_head' => $request['account_head_id'],'dr_account' =>$reciver_name,'cr_account' => $giver_account,'voucher_no' => $request['voucher_no'],'amount' => $request['payable_amt'],'gl_date' => date("Y-m-d"),'voucher_date' => $request['billdate'], 'payment_release_date' => ""]
		    	);

				/*DB::table('gl_entry')->insert(['transaction_id' => $transaction_id, 'gl_account_head' => $request['account_head_id'],'dr_account' => $giver_account,'cr_account' => $reciver_name,'voucher_no' => $request['voucher_no'],'amount' => $request['payable_amt'],'gl_date' => date("Y-m-d"),'voucher_date' => date("Y-m-d"), 'payment_release_date' => $request['bill_booking_date']]
				);*/
            }


        }else{

        	$reciver_name = $request['to_bank_id'];
            $reciver_account = $request['to_bank_branch_id'];
            $giver_name =  $request['sub_account_name'];
            $giver_account =  $request['sub_account_code'];

            $check_cash_balance = DB::table('cash_balance')
            ->orderBy('id', 'desc')
            ->first();

            if (!empty($check_cash_balance)) {

                $opening_cash_balance = $check_cash_balance->balance_amt;

            }
            else
            {
                $company_cash_dtl = DB::table('company_cash')->find(1);
                // dd($company_cash_dtl);
                $opening_cash_balance = $company_cash_dtl->opening_balance;
            }

            $current_cash_balance = $opening_cash_balance - $request['payable_amt'];

            $check_bank_balance = DB::table('bank_balance')
            ->orderBy('id', 'desc')
            ->first();

            if(!empty($check_bank_balance)) {

                $opening_bank_balance = $check_bank_balance->balance_amt;

            }
            else
            {
                $opening_bank_balance = DB::table('company_cash')->find(1);
                $opening_bank_balance = $opening_bank_balance->opening_balance;
            }

            
            $current_bank_balance = $opening_bank_balance + $request['payable_amt'];



            if($current_cash_balance >= $request['payable_amt'])
            {
                $voucher_entry = DB::table('voucher_entry')->insert(
		    		['voucher_no' => $request['voucher_no'], 'account_head_id' => $request['account_head_id'],'sub_account_id' => $request['sub_account_id'],'transaction_code' => $request['sub_account_code'],'account_tool' => $request['account_tool'],'voucher_type' => $request['voucher_type'],'vendor_id' => '','employee_id' => '', 'bank_name' => '','bank_branch_id' => '','billno' => '','billdate' => $request['bill_booking_date'],'bill_booking_date' => $request['bill_booking_date'],'bill_amt' => $request['payable_amt'],'tds_id' => '','tds_percentage' => '','bill_gst_amt' => '','deduction_amt' => '','final_bill_amt' => $request['payable_amt'],'payable_amt' => $request['payable_amt'],'entry_remark' => $request['entry_remark'],'bill_status' => 'Paid','approve_status' => 'Approve']
				);

		    	$transaction_id="GL".date("d/m/Y")."/".time()."";

		    	
				$payment_entry = DB::table('payment_dtl')->insert(
		    		['payment_code' => time(),'voucher_id' => $request['voucher_no'],'vouchertype' => $request['voucher_type'],'payment_mode' => $request['payment_mode'], 'payment_mode_no' => '','cheque_draft_date' => date('Y-m-d H:i:s'),'bank_id' => $request['sub_account_name'],'bank_branch_id' => '','payment_amount' => $request['payable_amt'],'due_amount' => '','payment_booking_date' => $request['bill_booking_date'],'payment_release_date' => $request['bill_booking_date'],'encloser_dtl' => '','narration' => $request['entry_remark'],'payment_status' =>'Paid','created_at' => date('Y-m-d H:i:s')]
				);

                DB::table('cash_balance')->insert(['opening_balance' => $opening_cash_balance, 'voucher_no' => $request['voucher_no'], 'income' =>'0' , 'expense' => $request['payable_amt'], 'balance_amt' => $current_cash_balance, 'created_at' => date('Y-m-d H:i:s')]
	            );

	            DB::table('bank_balance')->insert(['opening_balance' => $opening_bank_balance,'voucher_no' => $request['voucher_no'],'bank_id' => $reciver_name,'bank_branch_id' => $reciver_account,'income' => $request['payable_amt'] ,'expense' => '0', 'balance_amt' => $current_bank_balance,'created_at' => date('Y-m-d H:i:s')]
				);

				DB::table('gl_entry')->insert(['transaction_id' => $transaction_id, 'gl_account_head' => $request['account_head_id'],'dr_account' => $reciver_name,'cr_account' => $giver_account,'voucher_no' => $request['voucher_no'],'amount' => $request['payable_amt'],'gl_date' => date("Y-m-d"),'voucher_date' => $request['billdate'], 'payment_release_date' => ""]
		    	);

				/*DB::table('gl_entry')->insert(['transaction_id' => $transaction_id, 'gl_account_head' => $request['account_head_id'],'dr_account' => $giver_name,'cr_account' => $reciver_name,'voucher_no' => $request['voucher_no'],'amount' => $request['payable_amt'],'gl_date' => date("Y-m-d"),'voucher_date' => date("Y-m-d"), 'payment_release_date' => $request['bill_booking_date']]
				);*/

	        }
            
        }			

    }
	
	
	
	
	
	
	public function saveCashContra(Request $request){


		if($request->sub_account_name=='Cash In hand'){

			$this->saveCashInHandContra($request);
		}else{
			$this->savePettyCashContra($request);

		}
	}

	public function saveContra(Request $request){
	 	
		if($request->payment_mode=='cash'){

			$this->saveCashContra($request);
		}else{
			$this->saveBankContra($request);

		}
	}

	
	
	public function bankReconcillationView()
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

		return view('accountpayable/vw-bank-reconcillation',$data);
	}

	public function bankReconcillationData(Request $request){

		$bank_entry = DB::table('bank_balance')
			->leftJoin('gl_entry', 'bank_balance.voucher_no', '=', 'gl_entry.voucher_no')
			->select('bank_balance.*', 'gl_entry.dr_account', 'gl_entry.cr_account')
            ->where('bank_balance.bank_branch_id','=',$request->bank_branch_id)
            ->whereDate('bank_balance.created_at','>=',$request->from_date)
            ->whereDate('bank_balance.created_at','<=',$request->to_date)
            ->get();
            
            foreach($bank_entry as $bankkey=>$bank){

     
            	$credit_account_name = DB::table('company_bank')->where('id','=',$bank->cr_account)->first();
            	if(!empty($credit_account_name)){

            		$cr_account= $credit_account_name->bank_name;
            	}else{
            		$credit_account_name = DB::table('coa_master')->where('coa_code','=',$bank->cr_account)->first();
            		$cr_account= $credit_account_name->head_name;
            	} 
           		$data['bank_reconcillation'][]=array('id'=>$bank->id ,'transaction_date'=>$bank->created_at,'dr_account'=>$bank->dr_account,'cr_account'=>$cr_account,'debit_amt'=>$bank->income,'credit_amt'=>$bank->expense);
        
            	$voucher_entry = DB::table('voucher_entry')->where('voucher_no','=',$bank->voucher_no)->first();
            	
            	if(!empty($voucher_entry)){

            		$data['bank_reconcillation'][$bankkey]['perticulars']=$voucher_entry->entry_remark;
            		$data['bank_reconcillation'][$bankkey]['vouchertype']=$voucher_entry->voucher_type;
            	}

            	$received_voucher_entry = DB::table('received_voucher_entry')->where('voucher_no','=',$bank->voucher_no)->first();

            	if(!empty($received_voucher_entry)){

            		$data['bank_reconcillation'][$bankkey]['perticulars']=$received_voucher_entry->remarks;
            		$data['bank_reconcillation'][$bankkey]['vouchertype']=$received_voucher_entry->voucher_type;

            	}
            	
            }

            //echo "<pre>"; print_r($data['bank_reconcillation']); exit;
            $result="";
            $total_debit_account=0;
            $total_credit_account=0;
            foreach($data['bank_reconcillation'] as $payment){
            	$total_debit_account+=$payment['debit_amt'];
            	$total_credit_account+=$payment['credit_amt'];
            	$result.='<tr>
            				  <td>'.date("d-m-Y", strtotime($payment['transaction_date'])).'</td>
            				  <td>'.$payment['dr_account'].'</br>'.$payment['cr_account'].'</br>'.$payment['perticulars'].'</td>
            				  <td>'.$payment['vouchertype'].'</td>
            				  <td>'.$payment['debit_amt'].'</td>
            				  <td>'.$payment['credit_amt'].'</td>
            				  <td><input type="hidden" name="bank_id[]" id="bank_id" class="form-control" value="'.$payment['id'].'"/><input type="date" name="bank_clearance_date[]" id="bank_clearance_date" class="form-control" value=""/></td>
            			</tr>';
            }
            $result.='<tr>
            				<td></td>
            				<td></td>
            				<td></td>
            				<td>'.$total_debit_account.'</td>
            				<td>'.$total_credit_account.'</td>
            			</tr>';



        echo $result;    
	}


	public function bankReconcillationSave(Request $request){


		//echo "<pre>";print_r($request['bank_clearance_date']); exit;

		if(empty($request['bank_clearance_date'])){

			Session::flash('message','Please put the proper Dataset.');
			return redirect('bank-reconcillation');
		}
		
		try{

			foreach($request['bank_id'] as $key=>$value){
 
				DB::table('bank_balance')->where('id', $value)->update(['bank_clearance_date' => $request['bank_clearance_date'][$key]]);
			}
			
		}catch(Exception $e){
			return $e->getMessage();
		}

     	Session::flash('message','Bank Data Successfully Updated.');
		return redirect('bank-reconcillation');
	}



    public function balancePaylisting(){

        $bank= DB::table('gl_entry')
        ->where('status','!=','1')
        ->groupBy('gl_date')
            ->get();
            $arr =array();

            foreach($bank as $val)
            {
                $arr[]=date('m/Y', strtotime($val->gl_date));


            }

            $data['banklist'] = array_unique($arr);


        return view('accountpayable/bank-balance',$data);
    }
    public function SavePayrollAll(Request $request)
    {
      	$payrolldate = explode('/', $request['month_yr']);
	     $payroll_date = $payrolldate[1].'-'.$payrolldate[0];

         $data['result']='';


        $emplist= DB::table('gl_entry')
        ->where('status','!=','1')
        ->where('gl_date','like',$payroll_date.'%')
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
    ->where('month_yr','=',	 $request['month_yr'])


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
        ->groupBy('gl_date')
            ->get();
            $arr =array();

            foreach($bank as $val)
            {
                $arr[]=date('m/Y', strtotime($val->gl_date));


            }

            $data['banklist'] = array_unique($arr);

            $data['month_yr'] =$request['month_yr'];
      return view('accountpayable/bank-balance',$data);
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
                ->update(['status' => '1']);


        }
        Session::flash('message','Balance Information Successfully Saved.');
        return redirect('accountpayable/balance');
    }


}
