<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\OpenBalance;
use view;
use Validator;
use Session;
use Illuminate\Support\Facades\Input;

class OpenBalanceGenerationController extends Controller
{
    public function addPayrollbalgpfemployee()
    {

        $data['employeelist']= DB::table('employee')
        ->where('status','=','active')
        ->where('emp_status','!=','TEMPORARY')
        ->where('emp_status','!=','EX-EMPLOYEE')
        ->where('emp_pf_type', '=', 'gpf')
        ->orderBy('emp_fname', 'asc')


        ->get();
 $data['employeegpf']= DB::table('gpf_opening_balance')

        ->get();


        return view('masters/generate-gpf-bal-all',$data);
    }

public function listPayrollbalgpfemployee(Request $request){

    DB::table('account_opening_balance')
    ->where('group_code','=',$request->acc_code1)
->where('financial_year','=',$request['mainmonth_yr'])

->delete();


foreach($request->group_code as $key=>$value)
	    {


		    if(!empty($value)){

		    	$data['group_code']=$value;
	            $data['group_name']=$request->group_name[$key];
                $data['account_code']=$request->account_code[$key];
                $data['account_name']=$request->account_name[$key];

                $data['financial_year']=$request->financial_year[$key];
                $data['month_yr']=$request->month_yr[$key];
                $data['cr_amount']='0';
                $data['dr_amount']='0';
                $data['opening_balance']=$request->open_bal[$key];
	            $data['closing_balance']=$request->open_bal[$key];
	            DB::table('account_opening_balance')->insert($data);
		    	}

		    }
Session::flash('message','Opening Balance Successfully Saved.');


 $employeelist= DB::table('coa_master')

 ->where('coa_code','LIKE',$request['acc_code1'].'%')
 ->get();

        foreach($employeelist as $employee){
            $data['month_yr']=$request['mainmonth_yr'];
            $data['acc_code']=$request['acc_code1'];
   $employeegpf= DB::table('account_opening_balance')
           ->where('financial_year','=',$request['mainmonth_yr'])
           ->where('account_code','=',$employee->coa_code)

          ->get();





              if(count($employeegpf)!='0'){

                  $opening_balance=$employeegpf[0]->opening_balance;




  $yr=$employeegpf[0]->month_yr;


              }else{
                      $opening_balance='0';


                      $yr=date('m/Y');


              }







                  $data['employee_gpf'][]=array('group_code'=>$request['acc_code1'],
                  'group_name'=>$employee->account_name,'account_code'=>$employee->coa_code,
                  'account_name'=>$employee->head_name,
                  'opening_balance'=>$opening_balance,'month_yr'=>$yr,
                  'financial_year'=>$request['mainmonth_yr']);
}



        return view('masters/generate-gpf-bal-all',$data);
}

public function addbalgpfemployee(){
    $employeelist= DB::table('account_master')
    ->distinct()->get(['account_code']);

    foreach($employeelist as $employee){

        $employeegpf= DB::table('account_master')

        ->where('account_code','=',$employee->account_code)

       ->get();

       $data['employee'][]=array(
       'account_code'=>$employee->account_code,'account_name'=>$employeegpf[0]->account_name);

    }

	return view('masters/opening-bal-generation' ,$data);
}
public function listbalgpfemployee(Request $request){


  $employeelist= DB::table('coa_master')

  ->where('coa_code','LIKE',$request['acc_code'].'%')
  ->get();




$opening_balance=0;
        foreach($employeelist as $employee){
          $data['month_yr']=$request['month_yr'];
          $data['acc_code']=$request['acc_code'];
 $employeegpf= DB::table('account_opening_balance')
         ->where('financial_year','=',$request['month_yr'])
         ->where('account_code','=',$employee->coa_code)
        ->get();





            if(count($employeegpf)!='0'){

                $opening_balance=$employeegpf[0]->opening_balance;




$yr=$employeegpf[0]->month_yr;


            }else{
                    $opening_balance='0';



                    $yr=date('m/Y');


            }







                $data['employee_gpf'][]=array('group_code'=>$request['acc_code'],
                'group_name'=>$employee->account_name,'account_code'=>$employee->coa_code,
                'account_name'=>$employee->head_name,
                'opening_balance'=>$opening_balance,'month_yr'=>$yr,
                'financial_year'=>$request['month_yr']);

}

        return view('masters/generate-gpf-bal-all',$data);

}
}
