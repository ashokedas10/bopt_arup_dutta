<?php
namespace App\Http\Controllers\Stipend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use App\UploadAttendenceModel;
use Rap2hpoutre\FastExcel\FastExcel;
//use App\Employee;
use Validator;
use Session;
use View;
use Excel;
use League\Csv\Reader;
use Auth;

use DateTime;


class StipendController extends Controller
{

	public function viewUploadStipend()
	{
		$email = Auth::user()->email;
        $data['Roledata']=DB::table('role_authorization')
        ->join('module', 'role_authorization.module_name', '=', 'module.id')
        ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
        ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
        ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
        ->where('member_id','=',$email)
        ->get();

        return view('stipend/upload-data',$data);
	}

	/*public function importExcel(Request $request)
    {

        DB::beginTransaction();
        $request->validate([
            'upload_csv' => 'required|mimes:csv,txt'
        ],
		['upload_csv.required'=>'File Must Be required!',
		'upload_csv.mimes'=>'File Must Be CSV format!']);

        $path = $request->file('upload_csv');

		$reader = Reader::createFromPath($path->getRealPath());
        //echo "<pre>";print_r($reader); exit;

        foreach ($reader as $key => $value)
        {
        	if($key>0){

                //$attdate=$value[6];
                //$date = str_replace('/', '-', $attdate);
				$payment_date=date("Y-m-d", strtotime($value[8]));

                $data=array(
                'transaction_code'=>$value[1],
                'transaction_head'=>$value[2],
                'on_account'=>$value[3],
                'dv_number'=>$value[4],
                'bill_no'=>$value[5],
                'voucher_no'=>$value[6],
                'stipend_amount'=>$value[7],
                'date_of_payment'=>$payment_date,
                'name_of_establishment'=>$value[9],
                'created_at'=>date('Y-m-d'),
                );

                DB::table('stipend')->insert($data);

        	}

        }

        DB::commit();
        Session::flash('message','Stipend Data Successfully saved.');
		return redirect('stipend/upload');
    }*/

    public function getTransctionByTransactionCode($transction_id)
    {
        $check_transaction= DB::table('stipend')
        ->where('transaction_id', '=',$transction_id)
        ->first();
        return $check_transaction;
    }

    public function importExcel(Request $request)
    {

        DB::beginTransaction();
        $path = $request->file('upload_csv');
        $reader = Reader::createFromPath($path->getRealPath());

        $totalamout=0;
        foreach ($reader as $key => $value)
        {
           $count_csv_stipend_value=  count($value);
            if($count_csv_stipend_value!=11){
                 Session::flash('message','Your CSV column count is mismatch.');
                 return redirect('stipend/upload');
                 }
             if($key>0){
                if(is_numeric($value[8])!=1 || is_numeric($value[9])!=1){
                    Session::flash('message','CSV data format does not match.');
                    return redirect('stipend/upload');

                }
                $payment_date=date("Y-m-d", strtotime($value[7]));
                $cheque_neft_date=date("Y-m-d", strtotime($value[10]));
                $data=array(
                'account_head_id'=>$value[0],
                'account_name'=>$value[1],
                'transaction_id'=>$value[2],
                'bill_no'=>$value[3],
                'establishment_name'=>$value[4],
                'establishment_id'=>$value[5],
                'voucher_no'=>$value[6],
                'voucher_date'=>$payment_date,
                'graduate'=>$value[8],
                'diploma'=>$value[9],
                'cheque_neft_date'=>$cheque_neft_date,
                'created_at'=>date('Y-m-d'),
                );
                $totalamout+=($value[8]+$value[9]);

                $check_transction=$this->getTransctionByTransactionCode($value[2]);
                if(empty($check_transction)){
                    DB::table('stipend')->insert($data);
                    DB::commit();
                    Session::flash('message','Stipend Data Successfully saved.');


                }


             }

        }

        $company_bank_dtl= DB::table('bank_stipend_balance')
                          ->orderBy('id','DESC')
                        ->first();
                        if(!empty($company_bank_dtl))
                        {
                          $opening_balance = $company_bank_dtl->balance_amt;  
                      }else{
                          $stipend_bank_dtl= DB::table('stipend_bank')
                          ->orderBy('id','DESC')
                        ->first();
                        $opening_balance =$stipend_bank_dtl->opening_balance;  
                      }

    

    $current_balance = $opening_balance - $totalamout;
    DB::table('bank_stipend_balance')->insert(
        ['opening_balance' => $opening_balance, 'voucher_no' => '12345689', 'bank_id' => 'State Bank of India', 'bank_branch_id' =>'1', 'income' => '0', 'expense' => $totalamout, 'balance_amt' => $current_balance, 'created_at' => date('Y-m-d H:i:s')]
    );
        return redirect('stipend/upload');

    }

    public function viewStipendData()
    {
        $email = Auth::user()->email;
        $data['Roledata']=DB::table('role_authorization')
        ->join('module', 'role_authorization.module_name', '=', 'module.id')
        ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
        ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
        ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
        ->where('member_id','=',$email)
        ->get();

        $data['stipend_datas'] = DB::table('stipend')->get();

        return view('stipend/stipendlisting', $data);
    }


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
            $data['receivablelisting']  = DB::table('received_voucher_entry')->where('voucher_no','like','%S%')->groupBy('voucher_no')->orderBy('id', 'desc')->get();

        }catch(Exception $e){

            return $e->getMessage();
        }
        $data['accounthead']=DB::table('account_master')->get();
        $data['journalhead']=DB::table('coa_master')->get();

        return view('stipend/receivablelisting',$data);
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

            ->where('account_code','like','%S%')
            ->orderBy('account_name', 'asc')
            ->get();

        $data['banklist'] = DB::table('stipend_bank')
            ->leftJoin('bank_masters', 'stipend_bank.bank_name', '=', 'bank_masters.id')
            ->groupBy('stipend_bank.bank_name')
            ->get();

        return view('stipend/vw-receivable',$data);
    }

    public function savePaymentbooking(Request $request)
    {


        $transaction_id="GL".date("d/m/Y")."/".time()."";
        $payment_code = time();


            $check_bank_balance = DB::table('bank_stipend_balance')

            ->where('bank_branch_id', $request['bank_branch_id'])
            ->orderBy('id', 'desc')
            ->first();



if(!empty($check_bank_balance)){

$opening_balance = $check_bank_balance->balance_amt;

}else{



    $company_bank_dtl= DB::table('stipend_bank')
    ->where('id', $request['bank_branch_id'])
    ->first();
$opening_balance = $company_bank_dtl->opening_balance;


}

$current_balance = $opening_balance +$request['payable_amt'];


$company_bank= DB::table('stipend_bank')
->where('id', $request['bank_branch_id'])
->first();


if($current_balance>=0){

            // echo "hi"; exit;





            $schedule_no = explode("/",  $request->account_head_id);

            $voucher_entry = DB::table('received_voucher_entry')->insert(
                ['voucher_no' => $request['voucher_no'],
                 'account_head_id' => $request->account_head_id,
                  'sub_act_head_id' =>$request['sub_account_id'],
                  'transaction_code' => $request['transaction_code'],
                  'account_tool' => $request['account_tool'],
                  'voucher_type' => $request['voucher_type'],
                   'payment_mode' => $request['payment_mode'],
                   'bank_name' => $request['payment_bank_id'],
                   'bank_branch_id' => $request['bank_branch_id'],
                     'received_amount' =>  $request['bill_amt'],
                     'gst_amt' => $request['bill_gst_amt'],
                     'total_amt' => $request['payable_amt'],
                     'remarks' => $request['entry_remark'],
                     'bill_status' => 'Paid',
                      'created_at' => date("Y-m-d")]
            );

            $payment_entry = DB::table('payment_rcvd_dtl')->insert(
                ['payment_code' => $payment_code,
                'voucher_no' => $request['voucher_no'],
                'voucher_type' => $request['voucher_type'],
                'payment_mode' =>$request['payment_mode'],
                 'cheque_draft' => $request['cheque_draft'],
                 'cheque_date' =>$request['cheque_date'],
                 'bank_id' => $request['payment_bank_id'],
                 'bank_branch_id' => $request['bank_branch_id'],
                 'net_amt' =>$request['payable_amt'],
                 'final_bill_amt' =>$request['bill_amt'],
                 'bill_gst_amt' =>$request['bill_gst_amt'],
                 'payment_rcv_date' => $request['payment_booking_date'],
                 'release_date' => $request['release_date'],
                 'remarks' => $request['remarks'],
                 'payment_status' =>'Paid',
                 'created_at' => date('Y-m-d H:i:s')]
                );



                DB::table('gl_entry')->insert(
                    ['transaction_id' => $transaction_id,  'gl_account_head' => $request->account_head_id,
                    'transaction_head' =>$request['transaction_code'],
                    'transaction_type' => $request['account_tool'],
                    'voucher_no' => $request['voucher_no'], 'amount' => $request['payable_amt'],
                    'gl_date' => date("Y-m-d"), 'voucher_date' => "",
                     'payment_release_date' => date("Y-m-d"), 'payment_rcv_date' => date("Y-m-d"),'status'=> '0']
                );


                DB::table('gl_entry')->insert(
                    ['transaction_id' => $transaction_id,   'gl_account_head' => '07/003',
                    'transaction_head' => $company_bank->account_code,
                    'transaction_type' =>'debit',
                    'voucher_no' => $request['voucher_no'], 'amount' => $request['payable_amt'],
                    'gl_date' => date("Y-m-d"), 'voucher_date' => "",
                     'payment_release_date' => date("Y-m-d"), 'payment_rcv_date' => date("Y-m-d"),'status'=> '0']
                );

            // }

                DB::table('bank_stipend_balance')->insert(
                    ['opening_balance' => $opening_balance,
                    'voucher_no' => $request['voucher_no'],
                    'bank_id' =>$request['payment_bank_id'],'bank_branch_id' =>$request['bank_branch_id'],
                    'income' => $request['payable_amt'],
                    'expense' =>'0' , 'balance_amt' => $current_balance,
                    'created_at' => date('Y-m-d H:i:s')]
                    );





        }

    Session::flash('message','Information Successfully Added.');
    return redirect('stipend/listreceived');
    }
}
