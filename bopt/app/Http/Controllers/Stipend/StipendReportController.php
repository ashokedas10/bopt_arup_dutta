<?php
namespace App\Http\Controllers\Stipend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

class StipendReportController extends Controller
{
    public function viewBalanceSheetReport()
    {

        $email = Auth::user()->email;
        $data['Roledata']=DB::table('role_authorization')
     ->join('module', 'role_authorization.module_name', '=', 'module.id')
     ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
     ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
     ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
     ->where('member_id','=',$email)
     ->get();
        return view('stipend/get-balance-sheet',$data);
    }

    public function balanceSheetReport(Request $request)
    {

        $financial_year =$request['financial_year'];
        $year=explode('-',$financial_year);
         $year1=$year['0'].'-04-01';
          $year2=$year['1'].'-03-31';

  $data['financial_year']=DB::table('payment_rcvd_dtl')

  ->whereBetween('payment_rcv_date',array($year1,$year2))
  ->where('account_code','like','%4s%')

  ->get();
;


    $data['balance6s_year']=DB::table('payment_rcvd_dtl')

    ->whereBetween('payment_rcv_date',array($year1,$year2))
    ->where('account_code','LIKE','%6s%')
    ->get();
    ;
    $data['balance8s_year']=DB::table('payment_rcvd_dtl')

            ->whereBetween('payment_rcv_date',array($year1,$year2))
            ->where('account_code','LIKE','%8s%')
            ->get();
    ;
    $data['balance9s_year']=DB::table('stipend')

    ->whereBetween('voucher_date',array($year1,$year2))

    ->get();
    ;
    $data['balance7s_year']=DB::table('payment_rcvd_dtl')

    ->whereBetween('payment_rcv_date',array($year1,$year2))
    ->where('account_code','LIKE','%7s%')
    ->get();
;
$data['balance5s_year']=DB::table('payment_rcvd_dtl')

->whereBetween('payment_rcv_date',array($year1,$year2))
->where('account_code','LIKE','%5s%')
->get();
;


        return view('stipend/balance-sheet',$data);
    }


    public function viewSchedule1s()
    {
        $email = Auth::user()->email;
        $data['Roledata']=DB::table('role_authorization')
     ->join('module', 'role_authorization.module_name', '=', 'module.id')
     ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
     ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
     ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
     ->where('member_id','=',$email)
     ->get();

        return view('stipend/get-schedule-1s',$data);
    }


    public function Schedule1s(Request $request)
    {


        return view('stipend/schedule-1s');
    }

    public function viewSchedule2s()
    {
        $email = Auth::user()->email;
        $data['Roledata']=DB::table('role_authorization')
     ->join('module', 'role_authorization.module_name', '=', 'module.id')
     ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
     ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
     ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
     ->where('member_id','=',$email)
     ->get();

        return view('stipend/get-schedule-2s',$data);
    }


    public function Schedule2s(Request $request)
    {

        $financial_year =$request['financial_year'];
        $year=explode('-',$financial_year);
         $year1=$year['0'].'-04-01';
          $year2=$year['1'].'-03-31';

  $data['financial_year']=DB::table('payment_rcvd_dtl')

  ->whereBetween('payment_rcv_date',array($year1,$year2))
  ->where('account_code','like','%4s%')

  ->get();
;


    $data['balance6s_year']=DB::table('payment_rcvd_dtl')

    ->whereBetween('payment_rcv_date',array($year1,$year2))
    ->where('account_code','LIKE','%6s%')
    ->get();
    ;
    $data['balance8s_year']=DB::table('payment_rcvd_dtl')

            ->whereBetween('payment_rcv_date',array($year1,$year2))
            ->where('account_code','LIKE','%8s%')
            ->get();
    ;
    $data['balance9s_year']=DB::table('stipend')

    ->whereBetween('voucher_date',array($year1,$year2))

    ->get();
    ;
    $data['balance7s_year']=DB::table('payment_rcvd_dtl')

    ->whereBetween('payment_rcv_date',array($year1,$year2))
    ->where('account_code','LIKE','%7s%')
    ->get();
;
$data['balance5s_year']=DB::table('payment_rcvd_dtl')

->whereBetween('payment_rcv_date',array($year1,$year2))
->where('account_code','LIKE','%5s%')
->get();
;
        return view('stipend/schedule-2s',  $data);
    }

    public function viewSchedule3s()
    {
        $email = Auth::user()->email;
        $data['Roledata']=DB::table('role_authorization')
     ->join('module', 'role_authorization.module_name', '=', 'module.id')
     ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
     ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
     ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
     ->where('member_id','=',$email)
     ->get();

        return view('stipend/get-schedule-3s',$data);
    }

    public function Schedule3s(Request $request)
    {
        $financial_year =$request['financial_year'];
        $year=explode('-',$financial_year);
         $year1=$year['0'].'-04-01';
          $year2=$year['1'].'-03-31';

  $data['financial_year']=DB::table('payment_rcvd_dtl')

  ->whereBetween('payment_rcv_date',array($year1,$year2))
  ->where('account_code','like','%4s%')

  ->get();
;


    $data['balance6s_year']=DB::table('payment_rcvd_dtl')

    ->whereBetween('payment_rcv_date',array($year1,$year2))
    ->where('account_code','LIKE','%6s%')
    ->get();
    ;
    $data['balance8s_year']=DB::table('payment_rcvd_dtl')

            ->whereBetween('payment_rcv_date',array($year1,$year2))
            ->where('account_code','LIKE','%8s%')
            ->get();
    ;
    $data['balance9s_year']=DB::table('stipend')

    ->whereBetween('voucher_date',array($year1,$year2))

    ->get();
    ;
    $data['balance7s_year']=DB::table('payment_rcvd_dtl')

    ->whereBetween('payment_rcv_date',array($year1,$year2))
    ->where('account_code','LIKE','%7s%')
    ->get();
;
$data['balance5s_year']=DB::table('payment_rcvd_dtl')

->whereBetween('payment_rcv_date',array($year1,$year2))
->where('account_code','LIKE','%5s%')
->get();
;
        return view('stipend/schedule-3s',$data);
    }

    public function viewIncomeExpenditureReport()
    {
        $email = Auth::user()->email;
        $data['Roledata']=DB::table('role_authorization')
     ->join('module', 'role_authorization.module_name', '=', 'module.id')
     ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
     ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
     ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
     ->where('member_id','=',$email)
     ->get();

     return view('stipend/get-income-expenditure-report',$data);

    }
    public function IncomeExpenditureReport(Request $request)
    {
        $financial_year =$request['financial_year'];
        $year=explode('-',$financial_year);
         $year1=$year['0'].'-04-01';
          $year2=$year['1'].'-03-31';

  $data['financial_year']=DB::table('payment_rcvd_dtl')

  ->whereBetween('payment_rcv_date',array($year1,$year2))
  ->where('account_code','like','%s%')

  ->get();
;

$data['expendsese_year']=DB::table('stipend')

        ->whereBetween('voucher_date',array($year1,$year2))

        ->get();
   ;
        return view('stipend/income-expenditure-report',$data);
    }
    public function viewSchedule4s()
    {
        $email = Auth::user()->email;
        $data['Roledata']=DB::table('role_authorization')
     ->join('module', 'role_authorization.module_name', '=', 'module.id')
     ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
     ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
     ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
     ->where('member_id','=',$email)
     ->get();

        return view('stipend/get-schedule-4s',$data);
    }
    public function Schedule4s(Request $request)
    {
        $financial_year =$request['financial_year'];
        $year=explode('-',$financial_year);
         $year1=$year['0'].'-04-01';
          $year2=$year['1'].'-03-31';

  $data['financial_year']=DB::table('payment_rcvd_dtl')

  ->whereBetween('payment_rcv_date',array($year1,$year2))
  ->where('account_code','like','%4s%')

  ->get();
;


    $data['balance6s_year']=DB::table('payment_rcvd_dtl')

    ->whereBetween('payment_rcv_date',array($year1,$year2))
    ->where('account_code','LIKE','%6s%')
    ->get();
    ;
    $data['balance8s_year']=DB::table('payment_rcvd_dtl')

            ->whereBetween('payment_rcv_date',array($year1,$year2))
            ->where('account_code','LIKE','%8s%')
            ->get();
    ;
    $data['balance7s_year']=DB::table('payment_rcvd_dtl')

    ->whereBetween('payment_rcv_date',array($year1,$year2))
    ->where('account_code','LIKE','%7s%')
    ->get();
;
$data['balance5s_year']=DB::table('payment_rcvd_dtl')

->whereBetween('payment_rcv_date',array($year1,$year2))
->where('account_code','LIKE','%5s%')
->get();
;
    $data['balance9s_year']=DB::table('stipend')

    ->whereBetween('voucher_date',array($year1,$year2))

    ->get();
    ;
        return view('stipend/schedule-4s',$data);
    }
    public function viewSchedule5s()
    {
        $email = Auth::user()->email;
        $data['Roledata']=DB::table('role_authorization')
     ->join('module', 'role_authorization.module_name', '=', 'module.id')
     ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
     ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
     ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
     ->where('member_id','=',$email)
     ->get();

        return view('stipend/get-schedule-5s',$data);
    }

    public function Schedule5s(Request $request)
    {


        $financial_year =$request['financial_year'];
              $year=explode('-',$financial_year);
               $year1=$year['0'].'-04-01';
                $year2=$year['1'].'-03-31';

        $data['financial_year']=DB::table('payment_rcvd_dtl')

        ->whereBetween('payment_rcv_date',array($year1,$year2))
        ->where('account_code','LIKE','%5s%')
        ->get();
   ;

        return view('stipend/schedule-5s', $data);
    }

    public function viewSchedule7s()
    {
        $email = Auth::user()->email;
        $data['Roledata']=DB::table('role_authorization')
     ->join('module', 'role_authorization.module_name', '=', 'module.id')
     ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
     ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
     ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
     ->where('member_id','=',$email)
     ->get();

        return view('stipend/get-schedule-7s',$data);
    }

    public function Schedule7s(Request $request)
    {

        $financial_year =$request['financial_year'];
              $year=explode('-',$financial_year);
               $year1=$year['0'].'-04-01';
                $year2=$year['1'].'-03-31';

        $data['financial_year']=DB::table('payment_rcvd_dtl')

        ->whereBetween('payment_rcv_date',array($year1,$year2))
        ->where('account_code','LIKE','%7s%')
        ->get();
   ;
        return view('stipend/schedule-7s',$data);
    }


    public function viewSchedule6s()
    {
        $email = Auth::user()->email;
        $data['Roledata']=DB::table('role_authorization')
     ->join('module', 'role_authorization.module_name', '=', 'module.id')
     ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
     ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
     ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
     ->where('member_id','=',$email)
     ->get();

        return view('stipend/get-schedule-6s',$data);
    }

    public function Schedule6s(Request $request)
    {


        $financial_year =$request['financial_year'];
              $year=explode('-',$financial_year);
               $year1=$year['0'].'-04-01';
                $year2=$year['1'].'-03-31';

        $data['financial_year']=DB::table('payment_rcvd_dtl')

        ->whereBetween('payment_rcv_date',array($year1,$year2))
        ->where('account_code','LIKE','%6s%')
        ->get();
   ;

        return view('stipend/schedule-6s', $data);
    }
    public function viewSchedule8s()
    {
        $email = Auth::user()->email;
        $data['Roledata']=DB::table('role_authorization')
     ->join('module', 'role_authorization.module_name', '=', 'module.id')
     ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
     ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
     ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
     ->where('member_id','=',$email)
     ->get();

        return view('stipend/get-schedule-8s',$data);
    }

    public function Schedule8s(Request $request)
    {


        $financial_year =$request['financial_year'];
              $year=explode('-',$financial_year);
               $year1=$year['0'].'-04-01';
                $year2=$year['1'].'-03-31';

        $data['financial_year']=DB::table('payment_rcvd_dtl')

        ->whereBetween('payment_rcv_date',array($year1,$year2))
        ->where('account_code','LIKE','%8s%')
        ->get();
   ;

        return view('stipend/schedule-8s', $data);
    }


    public function viewSchedule9s()
    {
        $email = Auth::user()->email;
        $data['Roledata']=DB::table('role_authorization')
     ->join('module', 'role_authorization.module_name', '=', 'module.id')
     ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
     ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
     ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
     ->where('member_id','=',$email)
     ->get();

        return view('stipend/get-schedule-9s',$data);
    }

    public function Schedule9s(Request $request)
    {


        $financial_year =$request['financial_year'];
              $year=explode('-',$financial_year);
               $year1=$year['0'].'-04-01';
                $year2=$year['1'].'-03-31';

        $data['financial_year']=DB::table('stipend')

        ->whereBetween('voucher_date',array($year1,$year2))

        ->get();
   ;

        return view('stipend/schedule-9s', $data);
    }



    public function viewSchedulereceipt()
    {
        $email = Auth::user()->email;
        $data['Roledata']=DB::table('role_authorization')
     ->join('module', 'role_authorization.module_name', '=', 'module.id')
     ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
     ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
     ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
     ->where('member_id','=',$email)
     ->get();

     return view('stipend/get-receipt-payment-report',$data);

    }
    public function Schedulereceipt(Request $request)
    {
        $financial_year =$request['financial_year'];
        $year=explode('-',$financial_year);
         $year1=$year['0'].'-04-01';
          $year2=$year['1'].'-03-31';

  $data['financial_year']=DB::table('payment_rcvd_dtl')

  ->whereBetween('payment_rcv_date',array($year1,$year2))
  ->where('account_code','like','%s%')

  ->get();
;

$data['expendsese_year']=DB::table('stipend')

        ->whereBetween('voucher_date',array($year1,$year2))

        ->get();
   ;

   $data['company_bank_dtl']= DB::table('bank_stipend_balance')
                          ->orderBy('id','DESC')
                        ->first();

;
        return view('stipend/receipt-payment-account-stipend-account',$data);
    }
}
