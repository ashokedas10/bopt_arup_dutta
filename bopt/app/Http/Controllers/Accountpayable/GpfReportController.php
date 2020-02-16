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

class GpfReportController extends Controller
{

	public function viewMonthwiseGpfSummary()
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


        return view('gpf/vw-monthwise-gpf',$data);
    }



	public function monthwiseGpfSummaryReport(Request $request){
        //echo "<pre>";print_r($request->financial_year); exit;
        $getyear_range = explode("-",$request->financial_year);
        $start_year=date("$getyear_range[0]-04-01");
        $end_year=date("$getyear_range[1]-03-31");

        try{

            $employee_list= DB::table('employee')
            ->where('status','=','active')
            ->where('emp_status','!=','TEMPORARY')
            ->orderBy('emp_fname', 'asc')
            ->get();
            $data['month_wise_data']=array();

            foreach($employee_list as $empkey=>$employee){

                $gpf_total = DB::table('gpf_details')
                    ->where('emp_code','=',$employee->emp_code)
                    ->whereDate('created_at','>=',$start_year)
                    ->whereDate('created_at','<=',$end_year)
                    ->orderBy('id', 'ASC')
                    ->get();

                $data_array=array();

                foreach($gpf_total as $gpfkey=>$gpf){

                    if($gpf->emp_code==$employee->emp_code)
                    {
                        $data_array[]=array('month_year'=>$gpf->month_year,'own_share'=>$gpf->own_share,'company_share'=>$gpf->company_share);
                    }

                }

                
                //$data['month_wise_data'][]=array('monthlydata'=> $month_wise_array);
                $emp_name = $employee->emp_fname.' '.$employee->emp_mname.' '.$employee->emp_lname;
                $data['employee_gpf'][]=array('emp_name'=>$emp_name,'emp_ac_no'=>$employee->emp_pf_no,'lf_no'=>0, 'data_array'=>$data_array);

                //echo "<pre>"; print_r($data['month_wise_data']); 
            }
          
           //exit;
        }catch(Exception $e){
            return $e->getMessage();
        }
        //echo "<pre>"; print_r($data['total_array']); exit;
        $data['start_year']=$getyear_range[0]; 
        $data['end_year']=$getyear_range[1];

		return view('gpf/report-monthwise-gpf',$data);
    }



	public function viewYearendGpfSummary()
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

        return view('gpf/vw-yearend-gpf',$data);
    }


    public function yearendGpfSummaryReport(Request $request)
    {

        $getyear_range = explode("-",$request->financial_year);
        $start_year=date("$getyear_range[0]-04-01");
        $end_year=date("$getyear_range[1]-03-31");

        try{

            $employee_list= DB::table('employee')
                ->where('status','=','active')
                ->where('emp_status','!=','TEMPORARY')
                ->where('emp_pf_type', '=', 'gpf')
                ->orderBy('emp_fname', 'desc')
                ->get();
 $employeegpf= DB::table('gpf_opening_balance')
               ->where('month_yr','=',$request['financial_year'])
               ->get();
            foreach($employee_list as $employee){

                $gpf_total = DB::table('gpf_details')
                    ->select(DB::raw('sum(own_share) as own_share'),DB::raw('sum(company_share) as company_share'),DB::raw('sum(closing_balance) as closing_balance'),DB::raw('sum(interest_amount) as interest_amount'))
                    ->where('emp_code','=',$employee->emp_code)
                    ->whereBetween('created_at',[$start_year,$end_year])
                    ->get();

                $gpf_loan =  DB::table('gpf_loan_apply')
         ->select(DB::raw('sum(loan_amount) as loan_amount'))
        ->where('employee_code','=',$employee->emp_code)
        
        ->where('loan_status','=','APPROVED')
          ->whereBetween('updated_at',[$start_year,$end_year])
           
        ->get(); 

                             if(!empty($employeegpf)){
                                        $count=0;
                                       $count= count($employeegpf)  ;
                                       if($count!=0){
                                     foreach ($employeegpf as $value){
                                     
                                     if($employee->emp_code==$value->employee_id){
                                    
                                      $opening_balance=$value->opening_balance; 
                                       }
                                    
                                    }
                                         
                                   }
                                  }
              
                /*$closing_balance = DB::select( DB::raw("SELECT closing_balance FROM gpf_details WHERE emp_code = '$employee->emp_code' and `created_at` between '$start_year' and '$end_year' order by `id` desc LIMIT 1") );*/
                        // echo "<pre>"; var_dump($closing_balance); exit;
                $emp_name = $employee->emp_fname.' '.$employee->emp_mname.' '.$employee->emp_lname;
                $own_company_share=$gpf_total[0]->company_share;

                $data['employee_gpf'][]=array('emp_name'=>$emp_name,'emp_designation'=>$employee->emp_designation,'pf_no'=>$employee->emp_pf_no,'lf_no'=>0,'single_contribution_year'=>$gpf_total[0]->own_share,'contribution_during_year'=>$own_company_share,'with_drawal'=>$gpf_loan[0]->loan_amount, 'closing_balance'=>$gpf_total[0]->closing_balance,'opening_balance'=>$opening_balance,'interest_amount'=>$gpf_total[0]->interest_amount);
            }

        }catch(Exception $e){
            return $e->getMessage();
        }

        $data['start_year']=$getyear_range[0];
        $data['end_year']=$getyear_range[1];
        //echo "<pre>"; print_r($data['employee_gpf']); exit;
        return view('gpf/report-yearend-gpf',$data);
    }



    public function viewEmployeewiseGpfSummary()
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


        $data['employeelist']= DB::table('employee')
        ->where('status','=','active')
        ->where('emp_status','!=','TEMPORARY')
        ->where('emp_status','!=','EX-EMPLOYEE')
        ->where('emp_pf_type', '=', 'gpf')
        ->orderBy('emp_fname', 'asc')
        ->get();

        return view('gpf/vw-employeewise-gpf',$data);
    }

    public function employeewiseGpfSummaryReport(Request $request)
    {

        $getyear_range = explode("-",$request->financial_year);
        $start_financial_year = date("$getyear_range[0]-04-01");
        $to_financial_year = date("$getyear_range[1]-03-31");


        try{
            $data['employee_gpf'] = DB::table('gpf_details')
            ->leftJoin('employee', 'gpf_details.emp_code', '=', 'employee.emp_code')
            ->where('gpf_details.emp_code','=',$request->employee_id)
            ->whereDate('gpf_details.created_at','>=',$start_financial_year)
            ->whereDate('gpf_details.created_at','<=',$to_financial_year)
            //->whereBetween('gpf_details.created_at',[$start_financial_year,$to_financial_year])
            ->get();

            //echo "<pre>";print_r($data['employee_gpf']); exit;
            $data['employee_gpf_loan'] = DB::table('gpf_loan_apply_dtl')
             ->select(DB::raw('sum(apply_amt) as apply_amt'))
            ->where('emp_code','=',$request->employee_id)
            ->whereDate('created_at','>=',$start_financial_year)
            ->whereDate('created_at','<=',$to_financial_year)
            //->whereBetween('gpf_details.created_at',[$start_financial_year,$to_financial_year])
            ->get();



$data['employee_gpf_last']= DB::table('gpf_opening_balance')
        
        ->where('employee_id','=',$request->employee_id)
         ->where('month_yr','=',$request->financial_year)
        ->first();

       $data['employee_withdrawl']= DB::table('gpf_loan_apply')
        ->where('employee_code','=',$request->employee_id)
        
        ->where('loan_status','=','APPROVED')
          ->whereDate('updated_at','>=',$start_financial_year)
            ->whereDate('updated_at','<=',$to_financial_year)
        ->get();

        

        }catch(Exception $e){
            return $e->getMessage();
        }
        $data['start_year']=$getyear_range[0];
        $data['end_year']=$getyear_range[1];
        $data['previous_year']=$getyear_range[0]-1;
        return view('gpf/report-employeewise-gpf',$data);
    }


	
	
	public function viewProvidentGpfSummary()
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


        return view('gpf/vw-providentfund-gpf',$data);
    }


    public function providentGpfSummaryReport(Request $request){
        //echo "<pre>";print_r($request->financial_year); exit;
        $getyear_range = explode("-",$request->financial_year);
        $data['start_year']=date("$getyear_range[0]");
        $data['end_year']=date("$getyear_range[1]");


        $start_financial_year = date("$getyear_range[0]-04-01");
        $to_financial_year = date("$getyear_range[1]-03-31");
    $start_year='04/'.$getyear_range[0];
      $end_year='03/'.$getyear_range[1];

        $data['provident_fund_list']= DB::table('term_deposit')
        ->select(DB::raw('sum(invested_amt) as invested_amt'))
        ->where('deposit_status','=','Closed')
        ->where('bank_name','=','State Bank Of India')
         ->whereBetween('date_of_invesment',[$start_financial_year,$to_financial_year])
        ->first();


       $data['provident_investment_list']= DB::table('term_deposit')
        ->select(DB::raw('sum(invested_amt) as invested_amt'))
        ->where('bank_name','=','State Bank Of India')
        ->where('deposit_status','=','Open')
         ->whereBetween('date_of_invesment',[$start_financial_year,$to_financial_year])
        ->first();
 $data['provident_tds_list']= DB::table('term_deposit')
        ->select(DB::raw('sum(tds_amt) as tds_amt'))
        ->where('bank_name','=','State Bank Of India')
         ->where('date_of_maturity','<=',$to_financial_year)
        ->first();
 $data['provident_tds_listmain']= DB::table('term_deposit')
        ->select(DB::raw('sum(tds_amt) as tds_amt'))
        ->where('bank_name','=','State Bank Of India')
         ->where('date_of_maturity','>=',$start_financial_year)
        ->first();

        $data['opening_balance']= DB::table('gpf_bank')
        ->select(DB::raw('sum(opening_balance) as opening_amt'))
        ->where('financial_year', '=',$request->financial_year)
        ->get();

        $data['closing_balance']= DB::table('gpf_bank_balance')
        ->select(DB::raw('sum(income) as closing_amt'))
        ->whereBetween('created_at',[$start_financial_year,$to_financial_year])
        ->get();


 $data['gpf_subcription']= DB::table('gpf_details')
        
        ->get();


           
        $data['withdrawal_amt']= DB::table('gpf_loan_apply')
        ->select(DB::raw('sum(loan_amount) as withdrawl_amt'))

        ->where('loan_status','=','APPROVED')
          ->whereBetween('updated_at',[$start_financial_year,$to_financial_year])
        
        ->get();
        //print_r($data['closing_balance']); exit;

        return view('gpf/report-providentfund-gpf',$data);
    }


    public function viewIncomeExpenditureProvidentSummary()
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

        return view('gpf/vw-provident-imcome-expenditure',$data);
    }


    public function providentIncomeExpenditureReport(Request $request){
    
       
        $getyear_range = explode("-",$request->financial_year);
        $data['previous_year']=date("$getyear_range[0]");
        $data['current_year']=date("$getyear_range[1]");

        $start_financial_year = date("$getyear_range[0]-04-01");
        $to_financial_year = date("$getyear_range[1]-03-31");


        $current_gpf_data = DB::table('gpf_details')
        ->select(DB::raw('sum(interest_amount) as gpf_own_share'))
        ->whereBetween('created_at',[$start_financial_year,$to_financial_year])
        ->get();

        $current_nps_data = DB::table('nps_details')
        ->select(DB::raw('sum(own_share) as nps_own_share'),DB::raw('sum(company_share) as nps_company_share'))
        ->whereBetween('created_at',[$start_financial_year,$to_financial_year])
        ->get();



        $data['Interest_earned_on_investment']= DB::table('received_voucher_entry_gpf')
        ->select(DB::raw('sum(received_amount) as received_amount'))
        ->where('sub_act_head_id','=','2')
        ->whereBetween('created_at',[$start_financial_year,$to_financial_year])
        ->get();



        $data['Interest_accrued']= DB::table('received_voucher_entry_gpf')
        ->select(DB::raw('sum(received_amount) as received_amount'))
        ->where('sub_act_head_id','=','3')
        ->whereBetween('created_at',[$start_financial_year,$to_financial_year])
        ->get();

        $data['Tax_recovered_on_interest']= DB::table('received_voucher_entry_gpf')
        ->select(DB::raw('sum(received_amount) as received_amount'))
        ->where('sub_act_head_id','=','4')
        ->whereBetween('created_at',[$start_financial_year,$to_financial_year])
        ->get();
        $data['Bank_charges']= DB::table('voucher_entry_gpf')
        ->select(DB::raw('sum(bill_amt) as bill_amt'))
        ->where('sub_account_id','=','6')
        ->whereBetween('created_at',[$start_financial_year,$to_financial_year])
        ->get();
        $data['current_gpf_total']= $current_gpf_data[0]->gpf_own_share;
        $data['current_nps_total']= $current_nps_data[0]->nps_own_share + $current_nps_data[0]->nps_company_share;

        return view('gpf/report-providentfund-income-expenditure',$data);
    }


    public function viewEstablistmentAccount()
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

        return view('gpf/vw-establishment-account',$data);
    }


    public function establistmentAccountReport(Request $request)
    {
         $getyear_range = explode("-",$request->financial_year);
        $data['previous_year']=date("$getyear_range[0]");
        $data['current_year']=date("$getyear_range[1]");

        $start_financial_year = date("$getyear_range[0]-04-01");
        $to_financial_year = date("$getyear_range[1]-03-31");


        $data['opening_balance']= DB::table('gpf_bank')
        ->whereYear('created_at', $getyear_range[0])
        ->first();

        $data['gpf_total_loan_amt'] = DB::table('gpf_loan_apply_dtl')
        ->select(DB::raw('sum(apply_amt) as gpf_loan_amt'))
        ->whereBetween('created_at',[$start_financial_year,$to_financial_year])
        ->get();

        $data['closing_balance']= DB::table('gpf_bank_balance')
        ->where('created_at', '<=', $to_financial_year)
        ->orderBy('id', 'desc')
        ->first();

        return view('gpf/report-establishment-account',$data);
    }

}
