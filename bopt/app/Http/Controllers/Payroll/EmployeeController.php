<?php
namespace App;
namespace App\Http\Controllers\Payroll;

use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\DB;
//use Illuminate\Contracts\Validation\Rule;
use Hash;
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
class EmployeeController extends Controller
{
    //
public function viewAddEmployee()
{


    $email = Auth::user()->email;
    $data['Roledata'] = DB::table('role_authorization')      
    ->join('module', 'role_authorization.module_name', '=', 'module.id')
    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name')
    ->where('member_id','=',$email) 
    ->get();

    $id=Input::get('q');
    if($id){
                    
            function my_simple_crypt( $string, $action = 'encrypt' ) {
            // you may change these values to your own
                $secret_key = 'bopt_saltlake_kolkata_secret_key';
                $secret_iv = 'bopt_saltlake_kolkata_secret_iv';
             
                $output = false;
                $encrypt_method = "AES-256-CBC";
                $key = hash( 'sha256', $secret_key );
                $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
             
                if( $action == 'encrypt' ) {
                    $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
                }
                else if( $action == 'decrypt' ){
                    $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
                }
             
                return $output;
            }
         /// 
    //$encrypted = my_simple_crypt( 'Hello World!', 'encrypt' );
        $decrypted_id = my_simple_crypt( $id, 'decrypt' );    

        $data['employee_rs'] = DB::table('employee')
                ->join('employee_pay_structure', 'employee.emp_code', '=', 'employee_pay_structure.employee_code')
                ->where('employee.emp_code','=',$decrypted_id)
                ->select('employee.*', 'employee_pay_structure.*')
                ->get();
                // dd($data['employee_rs']);
      
    $data['department']=DB::table('department')->where('department_status','=','active')->get();
    $data['designation']=DB::table('designation')->where('designation_status','=','active')->get();
    $data['cast']=DB::table('cast')->where('cast_status','=','active')->get();
    $data['sub_cast']=DB::table('sub_cast')->where('sub_cast_status','=','active')->get();
    $data['religion']=DB::table('religion')->get();
    $data['employee_type']=DB::table('employee_type')->where('employee_type_status','=','active')->get();
    $data['grade']=DB::table('grade')->where('grade_status','=','active')->get();
    $data['bank'] = DB::table('bank_masters')->get();
    $data['payscale_master']=DB::table('pay_scale_master')->get();
    $data['states']=DB::table('state_master')->get();
    $data['employeelists'] = DB::table('employee')->where('emp_status', 'REGULAR')->orWhere('emp_status', 'PROBATIONARY EMPLOYEE')->get();
    return view('pis/employee-master',$data);

    }else{
    $data['employee_code'] = rand(1000,10000);
   
    $data['department']=DB::table('department')->where('department_status','=','active')->get();
    $data['designation']=DB::table('designation')->where('designation_status','=','active')->get();
    $data['cast']=DB::table('cast')->where('cast_status','=','active')->get();
    $data['sub_cast']=DB::table('sub_cast')->where('sub_cast_status','=','active')->get();
    $data['religion']=DB::table('religion')->get();
    $data['employee_type']=DB::table('employee_type')->where('employee_type_status','=','active')->get();
    $data['grade']=DB::table('grade')->where('grade_status','=','active')->get();
    $data['bank'] = DB::table('bank_masters')->get();
    $data['payscale_master']=DB::table('pay_scale_master')->get();
    $data['states']=DB::table('state_master')->get();
    $data['employeelists'] = DB::table('employee')->where('emp_status', 'REGULAR')->orWhere('emp_status', 'PROBATIONARY EMPLOYEE')->get();
    //echo "<pre>";print_r($data['states']);exit;
        return view('pis/employee-master',$data);     
    }           
                
                
		//return view('pis/employee-master')->with(['company'=>$company,'employee'=>$employee_type]);
}
public function saveEmployee(Request $request)
{  



date_default_timezone_set('Asia/Kolkata');
  function my_simple_crypt( $string, $action = 'encrypt' ) {
    // you may change these values to your own
    $secret_key = 'bopt_saltlake_kolkata_secret_key';
    $secret_iv = 'bopt_saltlake_kolkata_secret_iv';
 
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
 
    if( $action == 'encrypt' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'decrypt' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
 
    return $output;
}


     //print_r($request->hasFile('emp_image')); print_r($request->edit_emp_image); exit;
        if(!empty($request->edit_emp_image) && $request->hasFile('emp_image')==1){   
            $files = $request->file('emp_image');       
            $filename = $files->store('emp_pic');
        }else if(empty($request->edit_emp_image) && $request->hasFile('emp_image')==1) {
            $files = $request->file('emp_image');       
            $filename = $files->store('emp_pic');

        }else if(!empty($request->edit_emp_image) && $request->hasFile('emp_image')!=1){

            $filename = $request->edit_emp_image;
        }else{

            $filename = ""; 
        }
        

$id=Input::get('q');
if($id){
   $decrypted_empid = my_simple_crypt( $id, 'decrypt' ); 
    $retiredate=$request->emp_retirement_date;
    $date = str_replace('/', '-', $retiredate);
    $retirementdate = date_create($date);
    $retire_date= date_format($retirementdate, 'Y-m-d');    

   $payupdate=array(
            'employee_code'=>$request->emp_code,
            'basic_pay'=>$request->emp_basic_pay,
            'da'=>$request->da, 
            'hra'=>$request->hra, 
            'trans_allowance'=>$request->trans_allowance,
            'da_on_ta'=>$request->da_on_ta, 
            'ltc'=>$request->ltc,
            'cea'=>$request->cea,
            'travelling_allowance'=>$request->travelling_allowance, 
            'daily_allowance'=>$request->daily_allowance, 
            'advance'=>$request->advance, 
            'adjustment_advance'=>$request->adjustment_advance,
            'cash_handling_allowance'=>$request->cash_handling_allowance,
            'medical_reimbursement'=>$request->medical_reimbursement,
            'gpf'=>$request->gpf,
            'nps'=>$request->nps,
            'cpf'=>$request->cpf,
            'gsli'=>$request->gsli,
            'income_tax'=>$request->income_tax,
            'cess'=>$request->cess,
            'spcl_allowance'=>$request->spcl_allowance,
            'professional_tax'=>$request->professional_tax,
            'others'=>$request->others, 
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s'),
       );
   
    $dataupdate=array(
            'emp_code'=>$request->emp_code,
            'emp_fname'=>strtoupper($request->emp_fname), 
            'emp_mname'=>strtoupper($request->emp_mid_name), 
            'emp_lname'=>strtoupper($request->emp_lname), 
            'emp_father_name'=>strtoupper($request->emp_father_name),
            'emp_aadhar_no'=>$request->emp_aadhar_no, 
            'emp_present_city_class'=>$request->emp_present_city,
            'emp_residential_distance'=>$request->emp_resdential_distance,
            'emp_home_town'=>$request->emp_home_town,
            'emp_nearest_railway'=>$request->emp_nearest_railway, 
            'emp_caste'=>$request->emp_caste, 
            'emp_sub_caste'=>$request->emp_sub_caste,
            'emp_religion'=> $request->emp_religion, 
            'emp_spouse_working_status'=>$request->emp_spouse_working,
            'emp_image'=> $filename,
            'emp_government'=> $request->emp_government, 
            'emp_spouse_quarter'=> $request->emp_spouse_quarter,
            'emp_branch'=>$request->emp_branch, 
            'emp_department'=> $request->emp_department,
            'emp_designation'=> $request->emp_designation,
            'emp_reporting_auth' => $request->emp_reporting_auth,
            'emp_lv_sanc_auth' => $request->emp_lv_sanc_auth,
            'emp_eligible_promotion'=> $request->emp_eligible_promotion,
            'emp_dob'=> $request->emp_dob,  
            'emp_doj'=> $request->emp_doj, 
            'emp_retirement_date'=>$retire_date,
            'emp_next_increament_date'=>date("Y-m-d", strtotime($request->emp_next_increment_date)), 
            'emp_status'=>$request->emp_status,
            'emp_shift_group'=>$request->emp_sift_grp, 
            'emp_from_date'=>$request->emp_from_date, 
            'emp_till_date'=>$request->emp_till_date,
            'emp_x_qualification'=>$request->emp_x_qualification,
            'emp_x_dicipline'=>$request->emp_x_dicipline,
            'emp_x_institute_name'=>$request->emp_x_inst_name,
            'emp_x_board_name'=>$request->emp_x_board_name, 
            'emp_x_pass_year'=>$request->emp_x_pass_year, 
            'emp_x_percentage'=>$request->emp_x_percentage,
            'emp_x_rank'=>$request->emp_x_rank,
            'emp_xii_qualification'=>$request->emp_xii_qualification,
            'emp_xii_dicipline'=>$request->emp_xii_dicipline, 
            'emp_xii_institute_name'=>$request->emp_xii_inst_name,
            'emp_xii_board_name'=>$request->emp_xii_board_name, 
            'emp_xii_pass_year'=>$request->emp_xii_pass_year, 
            'emp_xii_percentage'=>$request->emp_xii_percentage, 
            'emp_xii_rank'=>$request->emp_xii_rank, 
            'emp_graduate_qualification'=>$request->emp_graduate_qualification,
            'emp_graduate_dicipline'=>$request->emp_graduate_dicipline,
            'emp_graduate_institute_name'=>$request->emp_graduate_inst_name,
            'emp_graduate_board_name'=>$request->emp_graduate_board_name, 
            'emp_graduate_pass_year'=>$request->emp_graduate_pass_year, 
            'emp_graduate_percentage'=>$request->emp_graduate_percentage,
            'emp_graduate_rank'=>$request->emp_graduate_rank, 
            'emp_pgraduate_qualification'=>$request->emp_pgraduate_qualification, 
            'emp_pgraduate_dicipline'=>$request->emp_pgraduate_dicipline, 
            'emp_pgraduate_institute_name'=>$request->emp_pgraduate_inst_name,
            'emp_pgraduate_board_name'=>$request->emp_pgraduate_board_name,
            'emp_pgraduate_pass_year'=>$request->emp_pgraduate_pass_year, 
            'emp_pgraduate_percentage'=>$request->emp_pgraduate_percentage, 
            'emp_pgraduate_rank'=>$request->emp_pgraduate_rank,
            'nominee_name_one'=>$request->emp_nomination_name_one, 
            'nominee_relationship_one'=>$request->emp_nomination_relation_one, 
            'nominee_dob_one'=>$request->emp_nomination_dob_one, 
            'nominee_name_two'=>$request->emp_nomination_name_two,
            'emp_nomination_name_three'=>$request->emp_nomination_name_three,   
            'emp_nomination_name_four'=>$request->emp_nomination_name_four, 
            'nominee_dob_two'=>$request->emp_nomination_dob_two,
            'emp_nomination_dob_three'=>$request->emp_nomination_dob_three,
            'emp_nomination_dob_four'=>$request->emp_nomination_dob_four,
            'emp_nomination_relation_three'=>$request->emp_nomination_relation_three, 
            'emp_nomination_relation_four'=>$request->emp_nomination_relation_four, 
            'emp_nomination_share_one'=>$request->emp_nomination_share_one,
            'emp_nomination_share_two'=>$request->emp_nomination_share_two,
            'emp_nomination_share_three'=>$request->emp_nomination_share_three,
            'emp_nomination_share_four'=>$request->emp_nomination_share_four,
            'emp_blood_group'=>$request->emp_blood_grp, 
            'emp_eye_sight_left'=>$request->emp_eye_sight_left,
            'emp_eye_sight_right'=>$request->emp_eye_sight_right, 
            'emp_family_plan_status'=>$request->emp_family_plan_status,
            'emp_family_plan_date'=>$request->emp_family_plan_date,
            'emp_height'=> $request->emp_height,
            'emp_weight'=> $request->emp_weight, 
            'emp_identification_mark_one'=> $request->emp_identification_mark_one, 
            'emp_identification_mark_two'=>$request->emp_identification_mark_two,
            'emp_physical_status'=>$request->emp_physical_status, 
            'emp_pr_street_no'=>$request->emp_pr_street_no, 
            'emp_pr_city'=>$request->emp_pr_city, 
            'emp_pr_state'=>$request->emp_pr_state, 
            'emp_pr_country'=>$request->emp_pr_country,
            'emp_pr_pincode'=>$request->emp_pr_pincode, 
            'emp_pr_mobile'=>$request->emp_pr_mobile, 
            'emp_ps_street_no'=>$request->emp_ps_street_no, 
            'emp_ps_city'=>$request->emp_ps_city, 
            'emp_ps_state'=>$request->emp_ps_state,
            'emp_ps_country'=>$request->emp_ps_country, 
            'emp_ps_pincode'=>$request->emp_ps_pincode, 
            'emp_ps_phone'=>$request->emp_ps_phone, 
            'emp_ps_mobile'=>$request->emp_ps_mobile, 
            'emp_ps_email'=>$request->emp_ps_email,
            'emp_grade'=>$request->emp_grade, 
            'emp_group_name'=>$request->emp_group,
            'emp_pay_scale'=>$request->emp_payscale,
            'emp_pension_no'=>$request->emp_pension_no,
            'emp_pf_type'=>$request->emp_pf_type, 
            'emp_passport_no'=>$request->emp_passport_no,
            'emp_time_office_code'=>$request->emp_time_office_code,
            'emp_pf_no'=>$request->emp_pf_no, 
            'emp_pan_no'=> $request->emp_pan_no, 
            'emp_payment_type'=> $request->emp_payment_type,
            'emp_bank_name'=>$request->emp_bank_name,
            'bank_branch_id'=>$request->bank_branch_id,
            'emp_ifsc_code'=>$request->emp_ifsc_code, 
            'emp_account_no'=>$request->emp_account_no,
            );

   DB::table('employee')
            ->where('emp_code', $decrypted_empid)
            ->update($dataupdate);
   DB::table('employee_pay_structure')
     ->where('employee_code', $decrypted_empid)
            ->update($payupdate);
    Session::flash('message','Record has been successfully updated');
            return redirect('employees');
}else{

    $retiredate=$request->emp_retirement_date;
    $date = str_replace('/', '-', $retiredate);
    $retirementdate = date_create($date);
    $retire_date= date_format($retirementdate, 'Y-m-d'); 
   $pay=array(
            'employee_code'=>$request->emp_code,
            'basic_pay'=>$request->emp_basic_pay,
            'da'=>$request->da, 
            'hra'=>$request->hra, 
            'trans_allowance'=>$request->trans_allowance,
            'da_on_ta'=>$request->da_on_ta, 
            'ltc'=>$request->ltc,
            'cea'=>$request->cea,
            'travelling_allowance'=>$request->travelling_allowance, 
            'daily_allowance'=>$request->daily_allowance, 
            'advance'=>$request->advance, 
            'adjustment_advance'=>$request->adjustment_advance,
            'cash_handling_allowance'=>$request->cash_handling_allowance,
            'medical_reimbursement'=>$request->medical_reimbursement,
            'gpf'=>$request->gpf,
            'nps'=>$request->nps,
            'cpf'=>$request->cpf,
            'gsli'=>$request->gsli,
            'cess'=>$request->cess,
            'spcl_allowance'=>$request->spcl_allowance,
            'income_tax'=>$request->income_tax,
            'professional_tax'=>$request->professional_tax,
            'others'=>$request->others, 
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s'),
       );
   
        $data=array(
            'emp_code'=>$request->emp_code,
            'emp_fname'=>strtoupper($request->emp_fname), 
            'emp_mname'=>strtoupper($request->emp_mid_name), 
            'emp_lname'=>strtoupper($request->emp_lname), 
            'emp_father_name'=>strtoupper($request->emp_father_name),
            'emp_aadhar_no'=>$request->emp_aadhar_no, 
            'emp_present_city_class'=>$request->emp_present_city,
            'emp_residential_distance'=>$request->emp_resdential_distance,
            'emp_home_town'=>$request->emp_home_town,
            'emp_nearest_railway'=>$request->emp_nearest_railway, 
            'emp_caste'=>$request->emp_caste, 
            'emp_sub_caste'=>$request->emp_sub_caste,
            'emp_religion'=> $request->emp_religion,
            'emp_image'=> $filename, 
            'emp_spouse_working_status'=>$request->emp_spouse_working, 
            'emp_government'=> $request->emp_government, 
            'emp_spouse_quarter'=> $request->emp_spouse_quarter,
            'emp_branch'=>$request->emp_branch, 
            'emp_department'=> $request->emp_department,
            'emp_designation'=> $request->emp_designation,
            'emp_reporting_auth' => $request->emp_reporting_auth,
            'emp_lv_sanc_auth' => $request->emp_lv_sanc_auth,
            'emp_eligible_promotion'=> $request->emp_eligible_promotion,
            'emp_dob'=> $request->emp_dob, 
            'emp_doj'=> $request->emp_doj, 
            'emp_retirement_date'=>$retire_date,
            'emp_next_increament_date'=>date("Y-m-d", strtotime($request->emp_next_increment_date)), 
            'emp_status'=>$request->emp_status,
            'emp_shift_group'=>$request->emp_sift_grp, 
            'emp_from_date'=>$request->emp_from_date, 
            'emp_till_date'=>$request->emp_till_date,
            'emp_x_qualification'=>$request->emp_x_qualification,
            'emp_x_dicipline'=>$request->emp_x_dicipline,
            'emp_x_institute_name'=>$request->emp_x_inst_name,
            'emp_x_board_name'=>$request->emp_x_board_name, 
            'emp_x_pass_year'=>$request->emp_x_pass_year, 
            'emp_x_percentage'=>$request->emp_x_percentage,
            'emp_x_rank'=>$request->emp_x_rank,
            'emp_xii_qualification'=>$request->emp_xii_qualification,
            'emp_xii_dicipline'=>$request->emp_xii_dicipline, 
            'emp_xii_institute_name'=>$request->emp_xii_inst_name,
            'emp_xii_board_name'=>$request->emp_xii_board_name, 
            'emp_xii_pass_year'=>$request->emp_xii_pass_year, 
            'emp_xii_percentage'=>$request->emp_xii_percentage, 
            'emp_xii_rank'=>$request->emp_xii_rank, 
            'emp_graduate_qualification'=>$request->emp_graduate_qualification,
            'emp_graduate_dicipline'=>$request->emp_graduate_dicipline,
            'emp_graduate_institute_name'=>$request->emp_graduate_inst_name,
            'emp_graduate_board_name'=>$request->emp_graduate_board_name, 
            'emp_graduate_pass_year'=>$request->emp_graduate_pass_year, 
            'emp_graduate_percentage'=>$request->emp_graduate_percentage,
            'emp_graduate_rank'=>$request->emp_graduate_rank, 
            'emp_pgraduate_qualification'=>$request->emp_pgraduate_qualification, 
            'emp_pgraduate_dicipline'=>$request->emp_pgraduate_dicipline, 
            'emp_pgraduate_institute_name'=>$request->emp_pgraduate_inst_name,
            'emp_pgraduate_board_name'=>$request->emp_pgraduate_board_name,
            'emp_pgraduate_pass_year'=>$request->emp_pgraduate_pass_year, 
            'emp_pgraduate_percentage'=>$request->emp_pgraduate_percentage, 
            'emp_pgraduate_rank'=>$request->emp_pgraduate_rank,
            'nominee_name_one'=>$request->emp_nomination_name_one, 
            'nominee_relationship_one'=>$request->emp_nomination_relation_one, 
            'nominee_dob_one'=>$request->emp_nomination_dob_one, 
            'nominee_name_two'=>$request->emp_nomination_name_two,
            'emp_nomination_name_three'=>$request->emp_nomination_name_three,   
            'emp_nomination_name_four'=>$request->emp_nomination_name_four, 
            'nominee_relationship_two'=>$request->emp_nomination_relation_two,
            'emp_nomination_relation_three'=>$request->emp_nomination_relation_three, 
            'emp_nomination_relation_four'=>$request->emp_nomination_relation_four,  
            'nominee_dob_two'=>$request->emp_nomination_dob_two,
            'emp_nomination_dob_three'=>$request->emp_nomination_dob_three,
            'emp_nomination_dob_four'=>$request->emp_nomination_dob_four,
            'emp_nomination_share_one'=>$request->emp_nomination_share_one,
            'emp_nomination_share_two'=>$request->emp_nomination_share_two,
            'emp_nomination_share_three'=>$request->emp_nomination_share_three,
            'emp_nomination_share_four'=>$request->emp_nomination_share_four,
            'emp_blood_group'=>$request->emp_blood_grp, 
            'emp_eye_sight_left'=>$request->emp_eye_sight_left,
            'emp_eye_sight_right'=>$request->emp_eye_sight_right, 
            'emp_family_plan_status'=>$request->emp_family_plan_status,
            'emp_family_plan_date'=>$request->emp_family_plan_date,
            'emp_height'=> $request->emp_height,
            'emp_weight'=> $request->emp_weight, 
            'emp_identification_mark_one'=> $request->emp_identification_mark_one, 
            'emp_identification_mark_two'=>$request->emp_identification_mark_two,
            'emp_physical_status'=>$request->emp_physical_status, 
            'emp_pr_street_no'=>$request->emp_pr_street_no, 
            'emp_pr_city'=>$request->emp_pr_city, 
            'emp_pr_state'=>$request->emp_pr_state, 
            'emp_pr_country'=>$request->emp_pr_country,
            'emp_pr_pincode'=>$request->emp_pr_pincode, 
            'emp_pr_mobile'=>$request->emp_pr_mobile, 
            'emp_ps_street_no'=>$request->emp_ps_street_no, 
            'emp_ps_city'=>$request->emp_ps_city, 
            'emp_ps_state'=>$request->emp_ps_state,
            'emp_ps_country'=>$request->emp_ps_country, 
            'emp_ps_pincode'=>$request->emp_ps_pincode, 
            'emp_ps_phone'=>$request->emp_ps_phone, 
            'emp_ps_mobile'=>$request->emp_ps_mobile, 
            'emp_ps_email'=>$request->emp_ps_email,
            'emp_grade'=>$request->emp_grade, 
            'emp_group_name'=>$request->emp_group,
            'emp_pay_scale'=>$request->emp_payscale,
            'emp_pension_no'=>$request->emp_pension_no,
            'emp_pf_type'=>$request->emp_pf_type, 
            'emp_passport_no'=>$request->emp_passport_no,
            'emp_time_office_code'=>$request->emp_time_office_code,
            'emp_pf_no'=>$request->emp_pf_no, 
            'emp_pan_no'=> $request->emp_pan_no, 
            'emp_payment_type'=> $request->emp_payment_type,
            'emp_bank_name'=>$request->emp_bank_name,
            'bank_branch_id'=>$request->bank_branch_id,
            'emp_ifsc_code'=>$request->emp_ifsc_code, 
            'emp_account_no'=>$request->emp_account_no,
            );


            DB::table('employee_pay_structure')->insert($pay);
            DB::table('employee')->insert($data); 
            Session::flash('message','Record has been successfully saved');
            return redirect('employees');
               // return redirect('pis/employee');
        }       
    }
	public function saveEmployeeOLD(Request $request)
	{
		$data=request()->except(['_token','addition_names','deduction_names']);
		
		$companyid=$company_id=$request->company_id;
		$gradeid=$request->grade_id;		
		$branch_id=$request->branch_id;
		$employee_id=$request->employee_id;
		
		$validator = Validator::make($request->all(), [
		'company_id' => [	'required',
							Rule::unique('employee')->where(function ($query) use($company_id,$branch_id,$employee_id) {
							return $query->where('company_id', $company_id)
							->where('branch_id', $branch_id)
							->where('employee_id', $employee_id);
						}),
					],
		'grade_id' => 'required',
		'branch_id' => 'required',
		'employee_id' => 'required|unique:employee|max:255',
		'first_name'=>'required|max:255',
		'middle_name'=>'max:255',
		'last_name'=>'required|max:255',
		'reporting_person'=>'required|max:255',
		'employee_type_id' => 'required',
		'confirmation_date' => 'required',
		'department_id' => 'required',
		'designation_id' => 'required',
		'ccr' => 'required',
		'dob' => 'required',
		'mobile' => 'required|max:30',
		'father_name' => 'required|max:255',
		'experience' => 'required|max:50',
		'home_ph' => 'required|max:50',
		'qualification' => 'required',
		'sex' => 'required',
		'marital_status' => 'required',
		'joining_date' => 'required',
		'pan_no' => 'required',
		'adhar_no' => 'required',
		'basic_salary'=>'required',
		'bank_id'=>'required',
		'account_number'=>'required',
		'transcation_mode'=>'required'
        ],
		[
		 'company_id.required'=>'Company Name Required',
		 'company_id.unique'=>'Company, Branch and Employee ID name already exists',
		 'grade_id.required'=>'Grade Name Required',
		 'branch_id.required'=>'Branch Name is Required',
		 'employee_id.required'=>'Employee ID is Required',
		 'first_name.required'=>'First Name is Required',
		 'last_name.required'=>'Last Name is Required',
		 'reporting_person.required'=>'Reporting Person Required',
		 'employee_type_id.required'=>'Employee Type Required',
		 'designation_id.required'=>'Designation Name Required',
		 'dob.required'=>'Date Of Birth Required',
		 'bank_id.required'=>'Bank Name Required',
		 'marital_status.required'=>'Marital Status is Required'
		]);
		
		if ($validator->fails()) {
            return redirect('pis/employee')
                        ->withErrors($validator)
                        ->withInput();
        }
		
		
		$additional_rs=DB::Table('emp_grade_wise_allowance')
		->select('head_name')
		->where('company_id','=',$companyid)
		->where('grade_id','=',$gradeid)
		->where('head_type','=','Additional')
		->groupBy('head_name')
		->get();
		
		//dd($additional_rs);
		$additional_len=$deductional_len=$addition_name_arr_val=$deductione_rs_arr_val='';
		$deduction_name_arr=$addition_name_arr=array();
		
		$addition_names_arr=$request->addition_names;	
		
		$deduction_names_arr=$request->deduction_names;

		$employeePayStructure=new EmployeePayStructure();
		//dd($addition_names_arr);
		
		if($addition_names_arr)
		{
			$additional_len=count($addition_names_arr);
		}
		
		if($deduction_names_arr)
		{
			$deductional_len=count($deduction_names_arr);
		}
		
		foreach($additional_rs as $additional)
		{
			$addition_name_arr[]=$additional->head_name;
		}
		
		if($addition_name_arr)
		{
			$addition_name_arr_val = array_values($addition_name_arr);
			//dd($addition_name_arr_val);
		}
		
		$i=0;
		foreach($additional_rs as $additional)
		{
			$addition['employee_code']=$request->employee_id;
			$addition['basic_pay']=$request->basic_salary;
			$addition_name='';
			
			if($additional_len > 0)
			{			
				if($i < $additional_len)
				{
					$addition_name=$addition_names_arr[$i];
				}
							
				if(in_array($addition_name, $addition_name_arr_val))
				{
					$addition['head_name']=$additional->head_name;
					$addition['head_name_val']=1;
				}
				else
				{
					$addition['head_name']=$additional->head_name;
					$addition['head_name_val']=0;
				}
			}
			
			$addition['head_type']='Additional';
			$employeePayStructure->create($addition);
			$i++;
		}
				
		$deductione_rs=DB::Table('emp_grade_wise_allowance')
		->select('head_name')
		->where('company_id','=',$companyid)
		->where('grade_id','=',$gradeid)
		->where('head_type','=','Deduction')
		->groupBy('head_name')
		->get();
		
		foreach($deductione_rs as $deductional)
		{
			$deduction_name_arr[]=$deductional->head_name;
		}
		
		if($deduction_name_arr)
		{
			$deductione_rs_arr_val = array_values($deduction_name_arr);
		}
		
		$j=0;	
		
		foreach($deductione_rs as $deductional)
		{
			$deduction['employee_code']=$request->employee_id;
			$deduction['basic_pay']=$request->basic_salary;
			$deduction_name='';
			
			if($deductional_len > 0)
			{
			
				if($j < $deductional_len)
				{
					$deduction_name=$deduction_names_arr[$j];
				}
			
						
				if(in_array($deduction_name, $deductione_rs_arr_val))
				{
					$deduction['head_name']=$deductional->head_name;
					$deduction['head_name_val']=1;
				}
				else
				{
					$deduction['head_name']=$deductional->head_name;
					$deduction['head_name_val']=0;
				}
			}
			
			$deduction['head_type']='Deduction';
			$employeePayStructure->create($deduction);
			$j++;			
		}
		
		//dd($data);
		$employee=new Employee();
		$employee->create($data);
		
		Session::flash('message','Employee Information Added Successfully');  
		return redirect('employees');
	}
	
	public function getEmployees()
	{

        $email = Auth::user()->email;
        $data['Roledata'] = DB::table('role_authorization')      
        ->join('module', 'role_authorization.module_name', '=', 'module.id')
        ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
        ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name')
        ->where('member_id','=',$email) 
        ->get();

        $data['employee_rs']=DB::table('employee')->get();	

        // dd($data['employee_rs']);	
		return view('pis/view-employee',$data);
	}
	
	
	public function viewEmployee($empid)
	{
		$emp_id=$employee_id=$empid;
	   // echo $emp_id;
		
		$employee_rs=DB::Table('employee')
		->leftJoin('grade','employee.grade_id','=','grade.id')
		->select('employee.*','grade.grade_name')
		->where('employee_id','=',trim($emp_id))->first();	
		
		$comp_id=$companyid=$employee_rs->company_id;
		$reporting_person=$employee_rs->reporting_person;
		$gradeid=$employee_rs->grade_id;
		//echo $reporting_person;
		//dd($comp_id);
        $company_rs=Company::where('company_status','=','active')->get();
		$branch_rs=Branch::where('branch_status','=','active')->get();
		$department_rs=Department::where('department_status','=','active')->get();
		$bank_rs=Bank::where('bank_status','=','active')->get();
		$grade_rs=Grade::where('grade_status','=','ACTIVE')->get();
		$employee_type_rs =EmployeeType::where('employee_type_status','=','active')->groupby('employee_type_name')->get();
				
		DB::enableQueryLog();
		$designation_rs=DB::Table('designation')->where('company_id','=',$comp_id)->get();
		$reporting_person_rs=DB::Table('employee')
							->select('first_name','middle_name','last_name','employee_id')
							->where('employee_id','=',trim($reporting_person))->first();
		//dd(DB::getQueryLog());
		//dd($reporting_person_rs);
		
		// Head
		$additional_rs=DB::Table('emp_grade_wise_allowance')
		->select('head_name')
		->where('company_id','=',$companyid)
		->where('grade_id','=',$gradeid)
		->where('head_type','=','Additional')
		->groupBy('head_name')
		->get();
		
		$result='<legend>Addition</legend><div class="row form-group" style="padding:1.5% 0 1%;margin: 0 0 15px 0;border: 1px solid #e6e4e4;" id="addition_names" >';
		foreach($additional_rs as $additional)
		{
			$employee_pay_structure_rs_set=EmployeePayStructure::where('employee_code','=',$employee_id)->where('head_name','=',$additional->head_name)->get()->first();
			
			//dd($employee_pay_structure_rs_set);
			
			if($employee_pay_structure_rs_set)
			{
				if($employee_pay_structure_rs_set->head_name_val == 1)
				{						
					$result .= '<label class="col-md-3 checkbox-inline"><input type="checkbox" value="'.$additional->head_name.'" checked="checked" name="addition_names[]" >'.$additional->head_name.'</label>';
				}
			}
			else
			{
				$result .= '<label class="col-md-3 checkbox-inline"><input type="checkbox" value="'.$additional->head_name.'"  name="addition_names[]" >'.$additional->head_name.'</label>';
			}		
		}	
		$result .= '</div>';
		//dd($result);
		$deductione_rs=DB::Table('emp_grade_wise_allowance')
		->select('head_name')
		->where('company_id','=',$companyid)
		->where('grade_id','=',$gradeid)
		->where('head_type','=','Deduction')
		->groupBy('head_name')
		->get();
		
		$result	.='<legend>Deduction</legend><div class="row form-group" style="border: 1px solid #e6e4e4;padding:1.5% 0 1%;    margin: 0 0 15px 0;">';	
		
		foreach($deductione_rs as $deduction)
		{
			$employee_pay_structure_ded_rs_set=EmployeePayStructure::where('employee_code','=',$employee_id)->where('head_name','=',$deduction->head_name)->get()->first();
			//dd($employee_pay_structure);
			if($employee_pay_structure_ded_rs_set)
			{
				if($employee_pay_structure_ded_rs_set->head_name_val == 1)
				{
					$result .= '<label class="col-md-3 checkbox-inline"><input type="checkbox" value="'.$deduction->head_name.'" checked="checked" name="deduction_names[]" >'.$deduction->head_name.'</label>';
				}
			}
			else
			{
				$result .= '<label class="col-md-3 checkbox-inline"><input type="checkbox" value="'.$deduction->head_name.'" name="deduction_names[]" >'.$deduction->head_name.'</label>';
			}
		}
		$result .='</div>';
		
		
		
		return view('pis/edit-employee', compact('company_rs','branch_rs','bank_rs','department_rs','employee_rs','grade_rs','employee_type_rs','designation_rs','reporting_person_rs','result'));     

		//return view('pis/employee-master')->with(['company'=>$company,'employee'=>$employee_type]);
	}
	
	
	public function updateEmployee(Request $request)
	{
		$data=request()->except(['_token','addition_names','deduction_names','reporting_person']);
				
		$companyid=$company_id=$request->company_id;
		$gradeid=$request->grade_id;		
		$branch_id=$request->branch_id;
		$employee_id=$request->employee_id;
		
		/*
		$validator = Validator::make($request->all(), [
		'company_id' => 'required',
		'grade_id' => 'required',
		'branch_id' => 'required',
		'employee_id' => 'required',
		'first_name'=>'required|max:255',
		'middle_name'=>'max:255',
		'last_name'=>'required|max:255',
		'reporting_person'=>'required|max:255',
		'employee_type_id' => 'required',
		'confirmation_date' => 'required',
		'department_id' => 'required',
		'designation_id' => 'required',
		'ccr' => 'required',
		'dob' => 'required',
		'mobile' => 'required|max:30',
		'father_name' => 'required|max:255',
		'experience' => 'required|max:50',
		'home_ph' => 'required|max:50',
		'qualification' => 'required',
		'sex' => 'required',
		'marital_status' => 'required',
		'joining_date' => 'required',
		'pan_no' => 'required',
		'adhar_no' => 'required',
		'basic_salary'=>'required',
		'bank_id'=>'required',
		'account_number'=>'required',
		'transcation_mode'=>'required'
        ],
		[
		 'company_id.required'=>'Company Name Required',
		 'grade_id.required'=>'Grade Name Required',
		 'branch_id.required'=>'Branch Name is Required',
		 'employee_id.required'=>'Employee ID is Required',
		 'first_name.required'=>'First Name is Required',
		 'last_name.required'=>'Last Name is Required',
		 'reporting_person.required'=>'Reporting Person Required',
		 'employee_type_id.required'=>'Employee Type Required',
		 'designation_id.required'=>'Designation Name Required',
		 'dob.required'=>'Date Of Birth Required',
		 'bank_id.required'=>'Bank Name Required',
		 'marital_status.required'=>'Marital Status is Required'
		]);
		
		if ($validator->fails()) {
            return redirect('pis/edit-employee/')
                        ->withErrors($validator)
                        ->withInput();
        }
		*/
		
		$additional_rs=DB::Table('emp_grade_wise_allowance')
		->select('head_name')
		->where('company_id','=',$companyid)
		->where('grade_id','=',$gradeid)
		->where('head_type','=','Additional')
		->groupBy('head_name')
		->get();
		
		//dd($additional_rs);
		$additional_len=$deductional_len=$addition_name_arr_val=$deductione_rs_arr_val='';
		$deduction_name_arr=$addition_name_arr=array();
		
		DB::beginTransaction();
		
		try
		{
			$employee=Employee::find($request->id);
			
			//dd($employee);
			$addition_names_arr=$request->addition_names;	
			
			$deduction_names_arr=$request->deduction_names;
			
			$employeePayStructure=new EmployeePayStructure();			
			
			EmployeePayStructure::where('employee_code','=',$employee_id)->delete();
			//dd($addition_names_arr);
			
			if($addition_names_arr)
			{
				$additional_len=count($addition_names_arr);
			}

			if($deduction_names_arr)
			{
				$deductional_len=count($deduction_names_arr);
			}
			
			foreach($additional_rs as $additional)
			{
				$addition_name_arr[]=$additional->head_name;
			}
			
			if($addition_name_arr)
			{
				$addition_name_arr_val = array_values($addition_name_arr);
				//dd($addition_name_arr_val);
			}
			
			$i=0;
			foreach($additional_rs as $additional)
			{
				$addition['employee_code']=$request->employee_id;
				$addition['basic_pay']=$request->basic_salary;
				$addition_name='';
				
				if($additional_len > 0)
				{			
					if($i < $additional_len)
					{
						$addition_name=$addition_names_arr[$i];
					}
							
					if(in_array($addition_name, $addition_name_arr_val))
					{
						$addition['head_name']=$additional->head_name;
						$addition['head_name_val']=1;
					}
					else
					{
						$addition['head_name']=$additional->head_name;
						$addition['head_name_val']=0;
					}
				}
				
				$addition['head_type']='Additional';
				$employeePayStructure->create($addition);
				$i++;
			}
				
			$deductione_rs=DB::Table('emp_grade_wise_allowance')
			->select('head_name')
			->where('company_id','=',$companyid)
			->where('grade_id','=',$gradeid)
			->where('head_type','=','Deduction')
			->groupBy('head_name')
			->get();
			
			foreach($deductione_rs as $deductional)
			{
				$deduction_name_arr[]=$deductional->head_name;
			}
			
			if($deduction_name_arr)
			{
				$deductione_rs_arr_val = array_values($deduction_name_arr);
			}
			
			$j=0;	
			
			foreach($deductione_rs as $deductional)
			{
				$deduction['employee_code']=$request->employee_id;
				$deduction['basic_pay']=$request->basic_salary;
				$deduction_name='';
				
				if($deductional_len > 0)
				{
				
					if($j < $deductional_len)
					{
						$deduction_name=$deduction_names_arr[$j];
					}
				
							
					if(in_array($deduction_name, $deductione_rs_arr_val))
					{
						$deduction['head_name']=$deductional->head_name;
						$deduction['head_name_val']=1;
					}
					else
					{
						$deduction['head_name']=$deductional->head_name;
						$deduction['head_name_val']=0;
					}
				}
				
				$deduction['head_type']='Deduction';
				$employeePayStructure->create($deduction);
				$j++;			
			}
			
			//dd($data);
			
			//$employee->create($data);
			
			$employee->fill($data);
			$employee->save();
		
			DB::commit();
			Session::flash('message','Employee Information Updated Successfully');  
		}
		catch(\Exception $e)
		{
			DB::rollback();
			Session::flash('message','Employee Information Not Updated '. $e->getMessage());  
		}
		return redirect('employees');
	}
	
  public function viewEditEmployee($id) 
  {
      function my_simple_crypt( $string, $action = 'encrypt' ) {
    // you may change these values to your own
    $secret_key = 'bopt_saltlake_kolkata_secret_key';
    $secret_iv = 'bopt_saltlake_kolkata_secret_iv';
 
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
 
    if( $action == 'encrypt' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'decrypt' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
 
    return $output;
}
     /// 
//$encrypted = my_simple_crypt( 'Hello World!', 'encrypt' );
$decrypted_id = my_simple_crypt( $id, 'decrypt' );
    // dd($decrypted);
            $data['employee_rs'] = DB::table('employee')
            ->join('employee_pay_structure', 'employee.emp_code', '=', 'employee_pay_structure.employee_code')
            ->where('employee.emp_code','=',$decrypted_id)
            ->select('employee.*', 'employee_pay_structure.*')
            ->get();
      
    $data['department']=DB::table('department')->where('department_status','=','active')->get();
    $data['designation']=DB::table('designation')->where('designation_status','=','active')->get();
    $data['cast']=DB::table('cast')->where('cast_status','=','active')->get();
    $data['sub_cast']=DB::table('sub_cast')->where('sub_cast_status','=','active')->get();
    $data['religion']=DB::table('religion')->get();
    $data['employee_type']=DB::table('employee_type')->where('employee_type_status','=','active')->get();
    $data['grade']=DB::table('grade')->where('grade_status','=','active')->get();
    $data['bank'] = DB::table('bank')->distinct()->get(['bank_name','ifsc_code']);
      
     // dd($data);
      return view('pis/employee-master',$data);
    //  dd($employee_rs);
   }


    public function getEmployeeById() 
    {
        $user_id = Auth::user()->employee_id;
        $data['employee']=DB::table('employee')->where('emp_code','=',$user_id)->first();
        $data['employee_pay_structure']=DB::table('employee_pay_structure')->where('employee_code','=',$user_id)->first();
        $data['bank_name']=DB::table('bank_masters')->where('id','=',$data['employee']->emp_bank_name)->first();

        $email = Auth::user()->email;
        $roledata = DB::table('role_authorization')      
        ->join('module', 'role_authorization.module_name', '=', 'module.id')
        ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
        ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name')
        ->where('member_id','=',$email) 
        ->get();
        $module_name=array();
        foreach($roledata as $rdata){
            if(!in_array($rdata->sub_module_name, $module_name)){
                $module_name[]=$rdata->sub_module_name;
            }
        }
        $result = "" . implode ( ", ", $module_name ) . "";

        $data['module_name']=$result;
        return view('pis/user-profile',$data);
    }


    public function changePassword(Request $request) 
    {
        $user_id = Auth::User()->id;
        $current_password = Auth::User()->password; 

        if (!(Hash::check($request['old_password'], $current_password))) {
            // The passwords matches
            Session::flash('message','Your current password does not matches with the password you provided. Please try again.');
            return redirect()->back();
        }else if(strcmp($request['new_password'], $request['confirm_password']) == 1){
            Session::flash('message','New Password doesnot match with confirm password.');
            return redirect()->back();
        }else{

            $password = Hash::make($request['new_password']);
            DB::table('users')->where('id','=',$user_id)->update(['password' => $password]);
            Session::flash('message','Password changed successfully !');
            return redirect()->back();
        }
    }

	public function applyIncrement($emp_code) 
    {
       $empdtl= DB::Table('employee')->where('emp_code','=',$emp_code)->first();
       $emppaydtl= DB::Table('employee_pay_structure')->where('employee_code','=',$emp_code)->first();
       $next_incrementdate = date('Y-m-d', strtotime('+ 1 year', strtotime($empdtl->emp_next_increament_date)));
       $results = DB::select( DB::raw('select * from `pay_scale_basic_master` where id> (select id from `pay_scale_basic_master` where `pay_scale_master_id` = '.$empdtl->emp_pay_scale.' and `pay_scale_basic` = '.$emppaydtl->basic_pay.') limit 1') );

       DB::table('employee')->where('emp_code','=',$emp_code)->update(['emp_next_increament_date' => $next_incrementdate, 'emp_pay_scale' => $results[0]->pay_scale_master_id]);

       DB::table('employee_pay_structure')->where('employee_code','=',$emp_code)->update(['basic_pay' => $results[0]->pay_scale_basic]);

       DB::table('increment_history')->insert(
            array('emp_code' => $emp_code, 'approve_date' => date('Y-m-d'),'paylabel' => $results[0]->pay_scale_master_id,'new_basicpay' => $results[0]->pay_scale_basic,'old_basicpay' => $emppaydtl->basic_pay));
       
       return redirect('employee/dashboard');  
    }


    public function viewIncrement() 
    {
      $email = Auth::user()->email;
        $data['Roledata'] = DB::table('role_authorization')      
        ->join('module', 'role_authorization.module_name', '=', 'module.id')
        ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
        ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name')
        ->where('member_id','=',$email) 
        ->get();
       return view('pis/vw-increment',$data);
    }


    public function reportIncrement(Request $request) 
    {
        $data['allincrements'] = DB::table('increment_history')      
        ->join('employee', 'increment_history.emp_code', '=', 'employee.emp_code')
        ->select('increment_history.*', 'employee.emp_fname', 'employee.emp_mname','employee.emp_lname','employee.emp_designation','employee.emp_next_increament_date')
        //->where('DATE_FORMAT(increment_history.approve_date, "%d-%M-%Y")','=',$request->month_yr) 
        ->where(DB::raw("(DATE_FORMAT(increment_history.approve_date,'%Y'))"),$request->month_yr)
        ->get();
       // print_r($data['allincrements']); exit;
       return view('pis/increment-report',$data);
    }


    public function promotionView() 
    {
      $email = Auth::user()->email;
        $data['Roledata'] = DB::table('role_authorization')      
        ->join('module', 'role_authorization.module_name', '=', 'module.id')
        ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
        ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name')
        ->where('member_id','=',$email) 
        ->get();
        $data['employees']=DB::table('employee')->where('status','=','active') ->orderBy('emp_fname', 'asc')->get();
        $data['departments']=DB::table('department')->where('department_status','=','active') ->orderBy('department_name', 'asc')->get();

        $data['designations']=DB::table('designation')->where('designation_status','=','active') ->orderBy('designation_name', 'asc')->get();

        $data['payscale_master']=DB::table('pay_scale_master')->get();
       return view('pis/vw-promotion',$data);
    }


    public function savePromotion(Request $request) 
    {
     // echo "<pre>";print_r($request->all()); exit;
        if (empty($request->emp_code)) {
            // The passwords matches
            Session::flash('message','Please Select a Employee 1st');
            return redirect()->back();
        }

        DB::beginTransaction();
        DB::table('promotion_history')->insert(
            array('emp_code' => $request->emp_code, 'emp_name' => $request->emp_name,'current_emp_dept' => $request->current_emp_dept,'current_emp_designation' => $request->current_emp_designation,'current_emp_payscale' => $request->current_payscale,'current_emp_basic_pay' => $request->current_emp_basic_pay,'present_emp_dept' => $request->present_emp_dept,'present_emp_designation' => $request->present_emp_designation,'present_emp_payscale' => $request->present_emp_payscale,'present_emp_basic_pay' => $request->present_emp_basic_pay,'date_of_promotion' => $request->date_of_promotion,'created_at' => date('Y-m-d H:i:s')));

      DB::table('employee')->where('emp_code','=',$request->emp_code)->update(['emp_department' => $request->present_emp_dept, 'emp_designation' => $request->present_emp_designation,'emp_pay_scale' => $request->present_emp_payscale]);

      DB::table('employee_pay_structure')->where('employee_code','=',$request->emp_code)->update(['basic_pay' => $request->present_emp_basic_pay]);
      DB::commit();
       Session::flash('message','Promotion Save Successfully');
       return redirect('promotion');  
    }


    public function viewPromotionReport() 
    {
      $email = Auth::user()->email;
        $data['Roledata'] = DB::table('role_authorization')      
        ->join('module', 'role_authorization.module_name', '=', 'module.id')
        ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
        ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name')
        ->where('member_id','=',$email) 
        ->get();
       return view('pis/vw-promotion-report',$data);
    }


    public function reportPromotionReport(Request $request) 
    {
        $data['promotionreport'] = DB::table('promotion_history')
        //->where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),$request->month_yr)
        ->where('date_of_promotion','>=',$request->from_date)
        ->where('date_of_promotion','<=',$request->to_date)
        ->get();
        //echo "<pre>";print_r($data['promotionreport']); exit;
       return view('pis/promotion-report',$data);
    }


    public function macpView() 
    {
      $email = Auth::user()->email;
        $data['Roledata'] = DB::table('role_authorization')      
        ->join('module', 'role_authorization.module_name', '=', 'module.id')
        ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
        ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name')
        ->where('member_id','=',$email) 
        ->get();
        $data['employees']=DB::table('employee')->where('status','=','active') ->orderBy('emp_fname', 'asc')->get();
        $data['departments']=DB::table('department')->where('department_status','=','active') ->orderBy('department_name', 'asc')->get();

        $data['payscale_master']=DB::table('pay_scale_master')->get();
       return view('pis/vw-mcap',$data);
    }



    public function saveMacp(Request $request) 
    {
      //echo "<pre>";print_r($request->all()); exit;
        if (empty($request->emp_code)) {
            // The passwords matches
            Session::flash('message','Please Select a Employee 1st');
            return redirect()->back();
        }

        DB::beginTransaction();
        DB::table('macp_history')->insert(
            array('emp_code' => $request->emp_code, 'emp_name' => $request->emp_name,'current_emp_dept' => $request->current_emp_dept,'current_emp_designation' => $request->current_emp_designation,'current_emp_payscale' => $request->current_payscale,'current_emp_basic_pay' => $request->current_emp_basic_pay,'present_emp_payscale' => $request->present_emp_payscale,'present_emp_basic_pay' => $request->present_emp_basic_pay,'date_of_promotion' => $request->date_of_promotion,'created_at' => date('Y-m-d H:i:s')));

        DB::table('employee')->where('emp_code','=',$request->emp_code)->update(['emp_pay_scale' => $request->present_emp_payscale]);

        DB::table('employee_pay_structure')->where('employee_code','=',$request->emp_code)->update(['basic_pay' => $request->present_emp_basic_pay]);
        DB::commit();
       Session::flash('message','Promotion Save Successfully');
       return redirect('macp');
    }



    public function viewMcapReport() 
    {
      $email = Auth::user()->email;
        $data['Roledata'] = DB::table('role_authorization')      
        ->join('module', 'role_authorization.module_name', '=', 'module.id')
        ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
        ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name')
        ->where('member_id','=',$email) 
        ->get();
       return view('pis/vw-macp-report',$data);
    }


    public function reportMcapReport(Request $request) 
    {
        $data['macpreport'] = DB::table('macp_history')
        //->where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),$request->month_yr)
        ->where('date_of_promotion','>=',$request->from_date)
        ->where('date_of_promotion','<=',$request->to_date)
        ->get();
        //echo "<pre>";print_r($data['promotionreport']); exit;
       return view('pis/macp-report',$data);
    }
	
	public function getPfDetails()
    {
        $email = Auth::user()->email;
        $data['Roledata'] = DB::table('role_authorization')
        ->join('module', 'role_authorization.module_name', '=', 'module.id')
        ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
        ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name')
        ->where('member_id','=',$email)
        ->get();

        $empid = Auth::user()->employee_id;

        $data['gpf_details'] = DB::table('gpf_details')
                    ->leftjoin('employee', 'gpf_details.emp_code', '=', 'employee.emp_code')
                    ->where('gpf_details.emp_code', '=', $empid)
                    ->select('gpf_details.*', 'employee.emp_pf_no')
                    ->orderByDesc('gpf_details.id')
                    ->get();

        // dd($data['gpf_details']);

       return view('pis/vw-gpf-details',$data);
    }
}
