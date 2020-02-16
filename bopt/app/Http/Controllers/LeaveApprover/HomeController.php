<?php
namespace App;
namespace App\Http\Controllers\LeaveApprover;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Session\Store;
use App\LeaveType;
use App\HolidayModel;
use App\EmployeeMaster;
use App\LeaveAllocation;
use App\LeaveApplyModel;
use App\Designation;
use App\Grade;
use App\Employee;
use Validator;
use Session;
use View;
use Auth;
use Illuminate\Support\Facades\Input;
class HomeController extends Controller
{
    public function viewDashboard() {
      $email = Auth::user()->email;
    $data['Roledata']=DB::table('role_authorization')      
    ->join('module', 'role_authorization.module_name', '=', 'module.id')
    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
    ->where('member_id','=',$email) 
    ->get();


      return View('leave-approver/dashboard',$data);
    }


    public function viewLeaveApproved() 
    {
          
        $email = Auth::user()->email;
        $emp_code = Auth::user()->employee_id;
        // dd($emp_code);
        $data['Roledata']=DB::table('role_authorization')      
        ->join('module', 'role_authorization.module_name', '=', 'module.id')
        ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
        ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
        ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
        ->where('member_id','=',$email) 
        ->get();

          if(Auth::user()->user_type == 'user')
          {
            $data['LeaveApply']=DB::table('leave_apply')
                  ->join('leave_type','leave_apply.leave_type','=','leave_type.id')  
                  ->select('leave_apply.*','leave_type.leave_type_name','leave_type.alies')
				  ->whereNotIn('leave_apply.status', ['APPROVED', 'REJECTED'])
				  /*->where(function($query) {
                     $query->where('leave_apply.status','!=','APPROVED')
                        ->orWhere('leave_apply.status','!=','REJECTED');
                  })*/
                  //->where('leave_apply.status','!=','APPROVED')
				  //->orWhere('leave_apply.status','!=','REJECTED')
                  ->where(function($result) use ($emp_code) {
                    if($emp_code)
                    {
                      $result->where('leave_apply.emp_reporting_auth', $emp_code)
                            ->orWhere('leave_apply.emp_lv_sanc_auth', $emp_code);
                    }
                    })
                  // ->whereMonth('leave_apply.date_of_apply','=',date('m'))
                  // ->where('leave_apply.emp_reporting_auth', $emp_code)
                  // ->orWhere('leave_apply.emp_lv_sanc_auth', $emp_code)
                  ->orderBy('date_of_apply', 'DESC')
                  ->paginate(5);
                  //->toSql();
                  //echo $data['LeaveApply']; exit;
                  //echo "<pre>"; print_r($data['LeaveApply']); exit;
            $data['TourApply']=DB::table('tour_apply')
              ->join('employee','tour_apply.employee_code','=','employee.emp_code')
              ->select('tour_apply.*','employee.emp_fname','employee.emp_mname','employee.emp_lname')
              ->where('tour_apply.emp_reporting_auth', $emp_code)
              ->orWhere('tour_apply.emp_lv_sanc_auth', $emp_code)
              ->orderBy('apply_date', 'DESC')
              ->get();
			  
			  
			  
			  $data['ltcapply']=DB::table('ltc_apply')
              ->join('employee','ltc_apply.employee_code','=','employee.emp_code')
              ->select('ltc_apply.*','employee.emp_fname','employee.emp_mname','employee.emp_lname')
              ->where('ltc_apply.emp_reporting_auth', $emp_code)
              ->orWhere('ltc_apply.emp_lv_sanc_auth', $emp_code)
              ->orderBy('apply_date', 'DESC')
              ->get();
			  
			  $data['LoanApply'] = DB::table('gpf_loan_apply')
                ->join('employee','gpf_loan_apply.employee_code','=','employee.emp_code')
                ->select('gpf_loan_apply.*', 'employee.emp_fname','employee.emp_mname','employee.emp_lname')
                ->where('gpf_loan_apply.emp_reporting_auth',$emp_code)
                ->orWhere('gpf_loan_apply.emp_sanctioning_auth', $emp_code)
                ->orderBy('apply_date', 'DESC')
                ->paginate(5);

          }else{

            $data['LeaveApply']=DB::table('leave_apply')
                  ->join('leave_type','leave_apply.leave_type','=','leave_type.id')  
                  ->select('leave_apply.*','leave_type.leave_type_name','leave_type.alies')
                  ->orderBy('date_of_apply', 'DESC')
                  ->paginate(10);

            $data['TourApply']=DB::table('tour_apply')
              ->join('employee','tour_apply.employee_code','=','employee.emp_code')
              ->select('tour_apply.*','employee.emp_fname','employee.emp_mname','employee.emp_lname')
              ->orderBy('apply_date', 'DESC')
              ->get();
			  
			  $data['LoanApply']=DB::table('gpf_loan_apply')
                ->join('employee','gpf_loan_apply.employee_code','=','employee.emp_code')
                ->select('gpf_loan_apply.*','employee.emp_fname','employee.emp_mname','employee.emp_lname')
                ->orderBy('apply_date', 'DESC')
                ->get();
          }
          
          // dd($data['LeaveApply']);
          //$data['LeaveApply']=DB::table('leave_apply')->get();

        return view('leave-approver/leave-approved',$data);
    }

    public function ViewLeavePermission() 
    {

      $email = Auth::user()->email;
      $data['Roledata']=DB::table('role_authorization')      
      ->join('module', 'role_authorization.module_name', '=', 'module.id')
      ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
      ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
      ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
      ->where('member_id','=',$email) 
      ->get();

      
       $id= base64_decode(Input::get('id'));
       // dd($id);
        $data['LeaveApply']=DB::table('leave_apply')
        ->join('leave_type','leave_apply.leave_type','=','leave_type.id') 
        //->join('leave_allocation','leave_apply.leave_type','=','leave_type.id')  
        ->select('leave_apply.*','leave_type.leave_type_name','leave_type.alies')
        ->where('leave_apply.id','=',$id)
        ->get();

        // dd($data['LeaveApply']);

        $lv_aply = DB::table('leave_apply')
                  ->where('id', '=', $id)
                  ->pluck('employee_id');
                  // dd($lv_aply);

        $data['Prev_leave']=DB::table('leave_apply')
        ->join('leave_type','leave_apply.leave_type','=','leave_type.id') 
        //->join('leave_allocation','leave_apply.leave_type','=','leave_type.id')  
        ->select('leave_apply.*','leave_type.leave_type_name', 'leave_type.alies')
        ->where('leave_apply.employee_id', '=', $lv_aply)
        ->where('leave_apply.status','=', 'APPROVED')
        ->orderBy('created_at','desc')
        ->take(4)
        ->get();

        // dd($data['Prev_leave']);
        
        return view('leave-approver/leave-approved-right',$data);
    }


public function SaveLeavePermission(Request $request) 
{
   // dd($request);
    $Allocation=DB::table('leave_allocation')
        ->where('employee_code','=',$request->employee_id)
        ->where('leave_type_id','=',$request->leave_type)
          ->where('month_yr','like','%'.$request['month_yr'].'%') 
        ->get();

    $inhand=$Allocation[0]->leave_in_hand;

    $lv_sanc_auth = DB::table('employee')
                    ->where('emp_code', '=', $request->employee_id)
                    ->first();
    $lv_sanc_auth_name = $lv_sanc_auth->emp_lv_sanc_auth;

    if($request->leave_check=='APPROVED'){
        
        if($request->leave_type == '1' && $request->half_cl == 'half')
        {
          $no_of_leave = ($request->no_of_leave)/2;
          $lv_inhand=$inhand-$no_of_leave;

          // dd($lv_inhand);
        }
        else{
          $lv_inhand=$inhand-$request->no_of_leave;
        }
        
        // dd($lv_inhand);
        if($lv_inhand<0){

          Session::flash('message','Insufficient Leave Balance!');
          return redirect('leave-approver/leave-approved');

        }else{

        DB::table('leave_apply')
        ->where('id',  $request->apply_id)
        ->where('employee_id',$request->employee_id)    
        ->update(['status' => $request->leave_check]);
         
        DB::table('leave_allocation')
        ->where('leave_type_id',  $request->leave_type)
        ->where('employee_code',$request->employee_id)
          ->where('month_yr','like','%'.$request['month_yr'].'%')    
        ->update(['leave_in_hand' => $lv_inhand]);
        return redirect('leave-approver/leave-approved');
        }
       

    }else if($request->leave_check=='REJECTED'){
        DB::table('leave_apply')
        ->where('id',  $request->apply_id)
        ->where('employee_id',$request->employee_id)    
        ->update(['status' => $request->leave_check,'status_remarks' => $request->status_remarks]);
       Session::flash('message','Leave Rejected Successfully!');
			 return redirect('leave-approver/leave-approved');

    }else if($request->leave_check=='RECOMMENDED'){

      $lv_inhand=$inhand-$request->no_of_leave;
        // dd($lv_inhand);
        if($lv_inhand<0){

          Session::flash('message','Insufficient Leave Balance!');
          return redirect('leave-approver/leave-approved');

        }else{
      
          $emp_code = Auth::user()->employee_id;

          $sanc_auth = Employee::where('emp_code', $emp_code)->first();
          
          $sanc_auth_name = $sanc_auth->emp_reporting_auth;
          // dd($report_auth_name);
          // $sanc_auth = Employee::where('emp_code', $report_auth_name)->first();

          // $sanc_auth_name = $sanc_auth->emp_reporting_auth;

          DB::table('leave_apply')
              ->where('id',  $request->apply_id)
              ->where('employee_id',$request->employee_id)    
              ->update(['status' => $request->leave_check,'status_remarks' => $request->status_remarks, 'emp_lv_sanc_auth' => $lv_sanc_auth_name]);
           Session::flash('message','Leave Recommended Successfully!');
          return redirect('leave-approver/leave-approved');
        }

    }else{
      
      $current_status=DB::table('leave_apply')->where('id',$request->apply_id)->first();
      if($current_status->status=='APPROVED' && $request->leave_check=='CANCEL'){

        $lv_inhand=$inhand+$request->no_of_leave;
        DB::table('leave_apply')
        ->where('id',  $request->apply_id)
        ->where('employee_id',$request->employee_id)    
        ->update(['status' => $request->leave_check,'status_remarks' => $request->status_remarks]);

        DB::table('leave_allocation')
        ->where('leave_type_id',  $request->leave_type)
        ->where('employee_code',$request->employee_id)    
        ->update(['leave_in_hand' => $lv_inhand]);
      }else{
        DB::table('leave_apply')
        ->where('id',  $request->apply_id)
        ->where('employee_id',$request->employee_id)    
        ->update(['status' => $request->leave_check,'status_remarks' => $request->status_remarks]);
      }
      
      Session::flash('message','Leave Cancel Successfully!');
      return redirect('leave-approver/leave-approved');
    }
}



public function SaveLeaveApproved(Request $request) {
    
   $check=$request->leave_confirm;
    if($check=='Approved')
    {
       
        
       
        $i=0;
//                if($request->leave_id)
//		{
        	$checkbox = $request->leave_id;
//             
                dd($request->leave_type);
	for($i=0;$i<count($checkbox);$i++)
        {
            
	$id = $checkbox[$i]; 
             DB::table('leave_apply')
              ->where('id', $id)       
            ->update(['status' => 'APPROVED']);
	
                   $Allocation=DB::table('leave_allocation')
                                    ->where('employee_code','=',$request->employee_id[$i])
                                       ->where('leave_type_id','=',$request->leave_type[$i]) 
                                    ->get();
                            dd($Allocation[0]->leave_in_hand);
  
}
                    
                    
                    
//			foreach($request->leave_id as $leaveid)
//			{
//                            
//                            
//                            
//                            
//                            //dd($request->leave_id[$i]);
//                           $Allocation=DB::table('leave_allocation')
//                                    ->where('employee_code','=',$employee)
//                                       ->where('leave_type_id','=',$request->leave_type[$i]) 
//                                    ->get();
//  $Allocation[0]->leave_in_hand;
  
////                           //dd();
//                            $request->no_of_leave[$i];
//             DB::table('leave_apply')
//            ->where('employee_id', $request->employee_code[$i])
//              ->where('id', $request->leave_id[$i])       
//            ->update(['status' => 'APPROVED']);
//             
//
//                           $i++; 
//                        }
                      //dd($request->leave_type[$i]);
              //  }
                
        
    }
    else if($check=='Rejected')
    {
        
    }
                if($request->employee_code)
		{
			foreach($request->employee_code as $employee)
			{
				
				
//				$data['leave_type_id']=$request->leave_type_id;
//				$data['leave_rule_id']=$request->leave_rule_id[$i];
//				$data['employee_code']=$request->employee_code[$i];
//				$data['max_no']=$request->max_no[$i];
//				$data['opening_bal']=$request->opening_bal[$i];
//				$data['leave_in_hand']=$request->leave_in_hand[$i];
//				$data['month_yr']=$request->month_yr[$i];
//                               
//				$leave_allocation->create($data);
//				$i++;
			}
		}
    
}
public function ViewTourPermission()
{


   $email = Auth::user()->email;
    $data['Roledata']=DB::table('role_authorization')      
    ->join('module', 'role_authorization.module_name', '=', 'module.id')
    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
    ->where('member_id','=',$email) 
    ->get();


       $id= base64_decode(Input::get('id'));
       $data['TourApply']=DB::table('tour_apply')
       
           ->where('id','=',$id)
           ->get();

        $data['tour_dtl'] = DB::table('tour_dtl')->where('tour_apply_id','=', $id)->get();
   // dd($data);
    //$data['leave_apply']=DB::table('leave_apply')->where('id', $id)->get();      
    return view('leave-approver/tour-approved-right',$data);
    
}

		public function SaveTourPermission(Request $request)
		{
			$request->leave_check;
			
			$request->employee_id;
			if($request->leave_check=='APPROVED'){
		   DB::table('tour_apply')
					 ->where('employee_code',$request->employee_id)    
					->update(['tour_status' => 'APPROVED']);
		   Session::flash('message','Tour Approved Successfully!');
					return redirect('leave-approver/leave-approved');
			}

			else if($request->leave_check=='RECOMMENDED'){

			  $emp_code = Auth::user()->employee_id;

			  $sanc_auth = Employee::where('emp_code', $emp_code)->first();
			  
			  $sanc_auth_name = $sanc_auth->emp_reporting_auth;

			  DB::table('tour_apply')
				  ->where('employee_code',$request->employee_id)    
				  ->update(['tour_status' => 'RECOMMENDED', 'emp_sanctioning_auth' => $sanc_auth_name]);
		   Session::flash('message','Tour Recommended Successfully!');
			  return redirect('leave-approver/leave-approved');
			}
			   else if($request->leave_check=='NOT APPROVED')
			{
				DB::table('tour_apply')
					 ->where('employee_code',$request->employee_id)    
					->update(['tour_status' => 'REJECTED']);
		Session::flash('message','Tour Rejected Successfully!');
					return redirect('leave-approver/leave-approved');
			}
			
		}
		
	public function ViewLtcPermission()
    {
       $email = Auth::user()->email;
        $data['Roledata']=DB::table('role_authorization')      
        ->join('module', 'role_authorization.module_name', '=', 'module.id')
        ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
        ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
        ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
        ->where('member_id','=',$email) 
        ->get();
           $id= base64_decode(Input::get('id'));
           $empid= base64_decode(Input::get('empid'));
           $data['ltcapply']=DB::table('ltc_apply')
           
               ->where('employee_code','=',$empid)
               ->get();
       // dd($data);
        //$data['leave_apply']=DB::table('leave_apply')->where('id', $id)->get();      
        return view('leave-approver/ltc-approved',$data);
        
    }



    public function SaveLtcPermission(Request $request)
    {
        //$request->employee_id;
        if($request->leave_check=='APPROVED'){

          DB::table('ltc_apply')
                ->where('id',$request->apply_id)    
                ->update(['ltc_status' => 'APPROVED']);
          Session::flash('message','Ltc Approved Successfully!');
          return redirect('leave-approver/leave-approved');

        }else if($request->leave_check=='RECOMMENDED'){
           
          $emp_code = Auth::user()->employee_id;
          $sanc_auth = Employee::where('emp_code', $emp_code)->first();
          $sanc_auth_name = $sanc_auth->emp_lv_sanc_auth;

          DB::table('ltc_apply')
              ->where('employee_code',$request->employee_id)    
              ->update(['ltc_status' => 'RECOMMENDED', 'emp_sanctioning_auth' => $sanc_auth_name]);
          Session::flash('message','Ltc Recommended Successfully!');
          return redirect('leave-approver/leave-approved');

        }else if($request->leave_check=='NOT APPROVED'){
          
            DB::table('ltc_apply')
                ->where('employee_code',$request->employee_id)    
                ->update(['ltc_status' => 'REJECTED']);
            Session::flash('message','Ltc Rejected Successfully!');
          return redirect('leave-approver/leave-approved');
        }
        
    }
	
	 public function ViewLoanPermission()
    {


        $email = Auth::user()->email;
            $data['Roledata']=DB::table('role_authorization')
            ->join('module', 'role_authorization.module_name', '=', 'module.id')
            ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
            ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
            ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
            ->where('member_id','=',$email)
            ->get();
            $id= base64_decode(Input::get('id'));
            $empid= base64_decode(Input::get('empid'));
            $data['LoanApply']=DB::table('gpf_loan_apply')

                ->where('employee_code','=',$empid)
                ->get();
            // dd($data);
            //$data['leave_apply']=DB::table('leave_apply')->where('id', $id)->get();
        return view('leave-approver/loan-approved-right',$data);

    }

    public function SaveLoanPermission(Request $request)
    {
        $request->leave_check;

        $request->employee_id;
        if($request->leave_check=='APPROVED'){
            DB::table('gpf_loan_apply')
                    ->where('employee_code',$request->employee_id)
                    ->update(['loan_status' => 'APPROVED']);
            Session::flash('message','Loan Approved Successfully!');
                return redirect('leave-approver/leave-approved');
        }

        else if($request->leave_check=='RECOMMENDED'){

            $emp_code = Auth::user()->employee_id;

            $sanc_auth = Employee::where('emp_code', $emp_code)->first();

            $sanc_auth_name = $sanc_auth->emp_reporting_auth;

            DB::table('gpf_loan_apply')
                ->where('employee_code',$request->employee_id)
                ->update(['loan_status' => 'RECOMMENDED', 'emp_sanctioning_auth' => $sanc_auth_name]);
            Session::flash('message','Loan Recommended Successfully!');
            return redirect('leave-approver/leave-approved');
        }
        else if($request->leave_check=='NOT APPROVED')
        {
            DB::table('gpf_loan_apply')
                ->where('employee_code',$request->employee_id)
                ->update(['loan_status' => 'REJECTED']);
            Session::flash('message','Loan Rejected Successfully!');
                return redirect('leave-approver/leave-approved');
        }

    }
			
}
