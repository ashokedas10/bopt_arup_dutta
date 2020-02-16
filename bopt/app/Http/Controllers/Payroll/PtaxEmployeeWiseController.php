<?php
namespace App;
namespace App\Http\Controllers\Payroll;

use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\DB;
//use Illuminate\Contracts\Validation\Rule;

use App\Company;
use App\EmployeeType;
use App\Employee;
use App\Branch;
use App\Bank;
use App\Grade;
use App\Department;
use App\EmployeePayStructure;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Session;
use view;
use App\Designation;
use Auth;
use Illuminate\Support\Facades\Input;
class PtaxEmployeeWiseController extends Controller
{
    public function ViewPtaxEmpWise() 
    {

        $data['employeeslist']=DB::table('employee')->get();
        return view('pis/vw-p-tax-employee-wise',$data);
    }
    public function ShowReportPtaxEmpWise(Request $request) {


      $monthyr=$request->month_yr;
      $payroll_rs=DB::table('payroll_details')
               ->where('month_yr','=',$monthyr)
               ->where('employee_id','=',$request->emp_code)
               ->select('*')
               ->get();
      if(count($payroll_rs)>0){
        //  dd($payroll_rs);
         $company_rs=DB::table('company')->first();
          return view('pis/ptax-employee-wise-report',compact('payroll_rs','company_rs'));
      }else{
            Session::flash('message','Error In Selection');
            return redirect('pis/vw-p-tax-employee-wise');
      }
    
    }


    public function ViewPtaxDeptWise()
    {
        $data['monthlist']=DB::table('payroll_details')->select('month_yr')->distinct('month_yr')->get();
        return view('pis/vw-p-tax-department-wise',$data);
    }

    public function ShowReportPtaxDeptWise(Request $request)
    {
        $data['month_yr']=$request->month_yr;
        $data['monthlist']=DB::table('payroll_details')->select('month_yr')->distinct('month_yr')->get();
        $data['employee_ptax']= DB::table('payroll_details')      
        ->select('payroll_details.employee_id','payroll_details.emp_name','payroll_details.emp_pro_tax','payroll_details.emp_designation')
        ->where('payroll_details.month_yr','=',$request->month_yr)
        ->orderBy('payroll_details.emp_pro_tax', 'desc')
        ->get();
        //$data['company_rs']=DB::table('company')->first(); 
        return view('pis/ptax-department-wise-report',$data);
    }

    public function ViewSalaryStatement()
    {
        return view('pis/vw-salary-statement');
    }

    public function ShowSalaryStatementReport(Request $request)
    {
        $data['payroll_rs']=DB::table('payroll_details')
               ->where('month_yr','=',$request->month_yr)
               ->select('*')
               ->get();
        //$data['month_yr']=$request->month_yr;
        
        return view('pis/summery-salary-statement',$data);
    }



    public function ViewGpfMonthlyWise()
    {
        $data['monthlist']=DB::table('payroll_details')->select('month_yr')->distinct('month_yr')->get();
        return view('pis/vw-gpf',$data);
    }

    public function ShowReportGpfMonthlyWise(Request $request)
    {
        $data['month_yr']=$request->month_yr;
        $data['monthlist']=DB::table('payroll_details')->select('month_yr')->distinct('month_yr')->get();

        $data['employee_ptax']= DB::table('payroll_details')
        ->leftJoin('employee','payroll_details.employee_id','=','employee.emp_code')      
        ->select('payroll_details.employee_id','payroll_details.emp_name','payroll_details.emp_gpf','payroll_details.emp_designation','employee.emp_pf_no')
        ->where('payroll_details.month_yr','=',$request->month_yr)
        ->where('payroll_details.emp_gpf','>','0')
        ->orderBy('payroll_details.emp_gpf', 'desc')
        ->get();
       
        return view('pis/gpf-report',$data);
    }

    public function ViewGpfEmployeewise()
    {
        $data['monthlist']=DB::table('payroll_details')->select('month_yr')->distinct('month_yr')->get();
        $data['employeeslist']=DB::table('employee')->get();
        return view('pis/vw-gpf-employeewise',$data);
    }


    public function ShowReportGpfEmployeewise(Request $request)
    {
        
        $data['employee_ptax']= DB::table('payroll_details')
        ->leftJoin('employee','payroll_details.employee_id','=','employee.emp_code')      
        ->select('payroll_details.employee_id','payroll_details.emp_name','payroll_details.emp_gpf','payroll_details.emp_designation','employee.emp_pf_no','payroll_details.month_yr')
        ->whereBetween('payroll_details.month_yr',[$request['from_month'], $request['to_month']])
        ->where('payroll_details.employee_id','=',$request['emp_code'])
        ->where('payroll_details.emp_gpf','>','0')
        ->orderBy('payroll_details.month_yr', 'desc')
        ->get();
        $data['from_month']=$request['from_month'];
        $data['to_month']= $request['to_month'];
        return view('pis/gpf-reoprt-employeewise',$data);
    }


    public function ViewNpsAll()
    {
        $data['monthlist']=DB::table('payroll_details')->select('month_yr')->distinct('month_yr')->get();
        return view('pis/vw-nps-all',$data);
    }


    public function ShowReportNpsAll(Request $request)
    {
       
        /*$data['employee_ptax']=DB::table('payroll_details')
        ->leftJoin('employee','payroll_details.employee_id','=','employee.emp_code')      
        ->select('payroll_details.employee_id','payroll_details.emp_name','payroll_details.emp_nps','payroll_details.emp_designation','employee.emp_pf_no')
        ->whereBetween('payroll_details.month_yr',[$request['from_month'], $request['to_month']])
        ->where('payroll_details.emp_nps','>','0')
        ->orderBy('payroll_details.emp_name', 'desc')
        ->get();*/

        $data['employee_ptax']=array();
        $employeeslist=DB::table('payroll_details')
        ->whereBetween('payroll_details.month_yr',[$request['from_month'], $request['to_month']])
        ->where('payroll_details.emp_nps','>','0')
        ->groupBy('employee_id')
        ->get();

        foreach($employeeslist as $employee){
            $employee_pf_no = DB::table('employee')
            ->where('emp_code','=', $employee->employee_id)
            ->first();
            //echo $employee->employee_id;echo "====";
            $employee_payroll=DB::select("SELECT sum(emp_nps) as nps ,`payroll_details`.* FROM `payroll_details` where employee_id='".$employee->employee_id."' and month_yr between '".$request['from_month']."' and '".$request['to_month']."'")[0];

            $data['employee_ptax'][]=array('emp_code'=>$employee->employee_id,'emp_name'=>$employee->emp_name, 'emp_designation'=>$employee->emp_designation, 'emp_pf_no'=> $employee->employee_id,'employee_payroll'=>$employee_payroll,'emp_ppf_no'=>$employee_pf_no->emp_pf_no, 'emp_nps'=>$employee_payroll->nps);

        }
        
        //echo "<pre>"; print_r($data['employee_ptax']); exit;

        $data['from_month']=$request['from_month'];
        $data['to_month']= $request['to_month'];
        return view('pis/nps-all-report',$data);
    }


    public function ViewNpsEmployeewise()
    {
        $data['monthlist']=DB::table('payroll_details')->select('month_yr')->distinct('month_yr')->get();
        $data['employeeslist']=DB::table('employee')->get();
        return view('pis/vw-nps-employeewise',$data);
    }


    public function ShowReportNpsEmployeewise(Request $request)
    {
        
        $data['employee_ptax']= DB::table('payroll_details')
        ->leftJoin('employee','payroll_details.employee_id','=','employee.emp_code')      
        ->select('payroll_details.employee_id','payroll_details.emp_name','payroll_details.emp_nps','payroll_details.emp_designation','employee.emp_pf_no','payroll_details.month_yr')
        ->whereBetween('payroll_details.month_yr',[$request['from_month'], $request['to_month']])
        ->where('payroll_details.employee_id','=',$request['emp_code'])
        ->where('payroll_details.emp_nps','>','0')
        ->orderBy('payroll_details.month_yr', 'desc')
        ->get();
        $data['from_month']=$request['from_month'];
        $data['to_month']= $request['to_month'];
        return view('pis/nps-reoprt-employeewise',$data);
    }


    public function ViewIncometaxAll()
    {
        $data['monthlist']=DB::table('payroll_details')->select('month_yr')->distinct('month_yr')->get();
        return view('pis/vw-imcome-all',$data);
    }


    public function ShowReportIncomeAll(Request $request)
    {
        // $data['employee_ptax']= DB::table('payroll_details')
        // ->leftJoin('employee','payroll_details.employee_id','=','employee.emp_code')      
        // ->select('payroll_details.employee_id','payroll_details.emp_name','payroll_details.emp_income_tax','payroll_details.emp_cess','payroll_details.emp_designation','employee.emp_pan_no','payroll_details.month_yr')
        // ->whereBetween('payroll_details.month_yr',[$request['from_month'], $request['to_month']])
        // //->orderBy('payroll_details.emp_nps', 'desc')
        // ->where('payroll_details.emp_income_tax','>','0')
        // ->orderBy('payroll_details.month_yr', 'desc')
        // ->get();

        $data['employee_ptax']=array();
        $employeeslist=DB::table('payroll_details')
        ->whereBetween('payroll_details.month_yr',[$request['from_month'], $request['to_month']])
        ->where('payroll_details.emp_income_tax','>','0')
        ->groupBy('employee_id')
        ->get();
        foreach($employeeslist as $employee){
            $employee_pan_no = DB::table('employee')
            ->where('emp_code','=', $employee->employee_id)
            ->first();
            // dd($employee_pf_no->emp_pan_no);
            $employee_payroll=DB::select("SELECT sum(emp_income_tax) as income_tax , sum(emp_cess) as cess , `payroll_details`.* FROM `payroll_details` where employee_id='".$employee->employee_id."' and month_yr between '".$request['from_month']."' and '".$request['to_month']."'")[0];

            $data['employee_ptax'][]=array('emp_code'=>$employee->employee_id,'emp_name'=>$employee->emp_name, 'emp_designation'=>$employee->emp_designation, 'emp_pf_no'=> $employee->employee_id,'employee_payroll'=>$employee_payroll,'emp_pan_no'=>$employee_pan_no->emp_pan_no, 'emp_income_tax'=>$employee_payroll->income_tax, 'emp_cess'=>$employee_payroll->cess);

        }
         // echo "<pre>"; print_r($data['employee_ptax']); exit;
        $data['from_month']=$request['from_month'];
        $data['to_month']= $request['to_month'];
        return view('pis/income-all-report',$data);
    }



    public function ViewIncomEmployeewise()
    {
        $data['monthlist']=DB::table('payroll_details')->select('month_yr')->distinct('month_yr')->get();
        $data['employeeslist']=DB::table('employee')->get();
        return view('pis/vw-incometax-employeewise',$data);
    }


    public function ShowReportIncomeEmployeewise(Request $request)
    {
        $data['employee_ptax']= DB::table('payroll_details')
        ->leftJoin('employee','payroll_details.employee_id','=','employee.emp_code')      
        ->select('payroll_details.employee_id','payroll_details.emp_name','payroll_details.emp_income_tax','payroll_details.emp_cess','payroll_details.emp_designation','employee.emp_pan_no','payroll_details.month_yr')
        ->whereBetween('payroll_details.month_yr',[$request['from_month'], $request['to_month']])
        ->where('payroll_details.employee_id','=',$request['emp_code'])
        //->where('payroll_details.emp_income_tax','>',0)
        ->orderBy('payroll_details.month_yr', 'desc')
        ->get();
        $data['from_month']=$request['from_month'];
        $data['to_month']= $request['to_month'];
        return view('pis/incometax-reoprt-employeewise',$data);
    }


    public function ViewGlsiAll()
    {
        $data['monthlist']=DB::table('payroll_details')->select('month_yr')->distinct('month_yr')->get();
        return view('pis/vw-glsi-all',$data);
    }


    public function ShowReportGlsiAll(Request $request)
    {
        // $data['employee_ptax']= DB::table('payroll_details')
        // ->leftJoin('employee','payroll_details.employee_id','=','employee.emp_code')      
        // ->select('payroll_details.employee_id','payroll_details.emp_name','payroll_details.emp_gslt','payroll_details.emp_designation','employee.emp_pan_no','payroll_details.month_yr')
        // ->whereBetween('payroll_details.month_yr',[$request['from_month'], $request['to_month']])
        // //->orderBy('payroll_details.emp_nps', 'desc')
        // ->where('payroll_details.emp_gslt','>','0')
        // ->orderBy('payroll_details.month_yr', 'desc')
        // ->get();

        $data['employee_ptax']=array();
        $employeeslist=DB::table('payroll_details')
        ->whereBetween('payroll_details.month_yr',[$request['from_month'], $request['to_month']])
        ->where('payroll_details.emp_gslt','>','0')
        ->groupBy('employee_id')
        ->get();
        foreach($employeeslist as $employee){
            $employee_gslt_no = DB::table('employee')
            ->where('emp_code','=', $employee->employee_id)
            ->first();
            // dd($employee_pf_no->emp_pan_no);
            $employee_payroll=DB::select("SELECT sum(emp_gslt) as gslt , `payroll_details`.* FROM `payroll_details` where employee_id='".$employee->employee_id."' and month_yr between '".$request['from_month']."' and '".$request['to_month']."'")[0];

            $data['employee_ptax'][]=array('emp_code'=>$employee->employee_id,'emp_name'=>$employee->emp_name, 'emp_designation'=>$employee->emp_designation, 'emp_pf_no'=> $employee->employee_id,'employee_payroll'=>$employee_payroll, 'emp_gslt'=>$employee_payroll->gslt, );

        }
        $data['from_month']=$request['from_month'];
        $data['to_month']= $request['to_month'];
        return view('pis/glsi-all-report',$data);
    }

    public function ViewGlsiEmployeewise()
    {
        $data['monthlist']=DB::table('payroll_details')->select('month_yr')->distinct('month_yr')->get();
        $data['employeeslist']=DB::table('employee')->get();
        return view('pis/vw-glsi-employeewise',$data);
    }


    public function ShowReportGlsiEmployeewise(Request $request)
    {
        $data['employee_ptax']= DB::table('payroll_details')
        ->leftJoin('employee','payroll_details.employee_id','=','employee.emp_code')      
        ->select('payroll_details.employee_id','payroll_details.emp_name','payroll_details.emp_gslt','payroll_details.emp_designation','employee.emp_pan_no','payroll_details.month_yr')
        ->whereBetween('payroll_details.month_yr',[$request['from_month'], $request['to_month']])
        ->where('payroll_details.employee_id','=',$request['emp_code'])
        //->where('payroll_details.emp_gslt','>',0)
        ->orderBy('payroll_details.month_yr', 'desc')
        ->get();
        $data['from_month']=$request['from_month'];
        $data['to_month']= $request['to_month'];
        return view('pis/glsi-reoprt-employeewise',$data);
    }
		
}
