<?php

namespace App\Http\Controllers\Payroll;

use App\Http\Controllers\Controller;
use App\Company;
use App\Grade;
use App\Department;
use App\PayrollDetails;
use App\EmployeePayStructure;
use App\EmployeeGradeWiseAllowance;
use Illuminate\Http\Request;
use View;
use Validator;
use Illuminate\Support\Facades\DB;
use Session;
use App\ProcessAttendance;
use App\Rate;

class PayrollGenerationController extends Controller
{
	public function viewPayroll()
	{

		$data['Employee']=DB::table('employee')->where('status','=','active') ->orderBy('emp_fname', 'asc')->get();

		//return view('pis/add-payroll-generation',$data);
		return view('pis/single-payroll-generation',$data);
	}

	public function getPayrollDetail(Request $request)
	{
		$basic_pay=0;
		$no_of_working_days=30;
		$validator=Validator::make($request->all(),
		[
			'company_id'=>'required',
			'grade_id'=>'required',
			'department_id'=>'required'
		],
		[
			'company_id.required'=>'Company Name Required',
			'grade_id.required'=>'Grade Name Required',
			'department_id.required'=>'Department Name Required',
		]);

		if($validator->fails())
		{
			return redirect('pis/payroll-generation')->withErrors($validator)->withInput();
		}

		$company_id=$request->company_id;
		$grade_id=$request->grade_id;
		$department_id=$request->department_id;
		$employee_type_id=$request->employee_type_id;
		$month=$request->month;

		$company_rs=Company::where('company_status','=','active')->get();
		$department_rs=Department::where('department_status','=','active')->get();

		DB::enableQueryLog();

		$employee_rs_detail=DB::Table('employee')
		->leftJoin('company','employee.company_id','=','company.id')
		->leftJoin('grade','employee.grade_id','=','grade.id')
		->leftJoin('employee_type','employee.employee_type_id','=','employee_type.id')
		->leftJoin('department','employee.department_id','=','department.id')
		->leftJoin('designation','employee.designation_id','=','designation.id')
		->where('employee.company_id', '=',  $company_id)
		->where('employee.grade_id', '=',  $grade_id)
		->where('employee.employee_type_id', '=',  $employee_type_id)
		->where('employee.department_id', '=',  $department_id)
		->select('employee.*','designation.designation_name','company.company_name','grade.grade_name')->get();
		//dd(DB::getQueryLog());

		$result='';
		$k=1;
		//dd($employee_rs_detail);
		foreach($employee_rs_detail as $employee)
		{
			$employee_id=$employee->employee_id;
			$emp_name=$employee->first_name." ".$employee->middle_name." ".$employee->last_name;
			$emp_designation=$employee->designation_name;
			$basic_pay=$employee->basic_salary;
			$employee_code='';

			$process_attendance_rs=DB::Table('process_attendance')->where('process_attendance.company_id', '=',  $company_id)
			->where('process_attendance.grade_id', '=',  $grade_id)
			->where('process_attendance.employee_code', '=',  $employee_id)->get()->first();
			//dd(DB::getQueryLog());
			//dd($process_attendance_rs);

			if($process_attendance_rs)
			{
				if($process_attendance_rs->no_of_days_salary > 0 & $process_attendance_rs->no_of_days_salary <> '')
				{
					$per_day_salary=$basic_pay/$no_of_working_days;
					//$per_day_salary=$basic_pay-$per_day_salary;
					$basic_pay=round($per_day_salary * $process_attendance_rs->no_of_days_salary);
				}

			}
			else
			{
				$basic_pay=0;
			}


			//$employee_pay_structure_rs=EmployeePayStructure::where('employee_code','=',$employee_id)->get();
			$emp_grade_wise_allowance_rs_detail=DB::Table('emp_grade_wise_allowance')
									->leftJoin('company','emp_grade_wise_allowance.company_id','=','company.id')
									->leftJoin('grade','emp_grade_wise_allowance.grade_id','=','grade.id')
									->where('min_basic', '<=',  $basic_pay)
									->where('max_basic', '>=',  $basic_pay)
									->get();

			//dd($emp_grade_wise_allowance_rs_detail);

			$table_head_name='';
			$DA=$PF=$ITAX=$PTAX=$HRA=$AA=$PT=0;
			$basic_AA=$basic_ITAX=$basic_PF=$basic_PTAX=$basic_SPA=$basic_TA=$basic_HRA=$basic_DA=$basic_CA=0;
			$basic_WA=$basic_BA=$basic_MA=$basic_TA=$basic_PA=$basic_FA=$basic_OTA=$basic_OA=$basic_MFA=$basic_ITAX_CESS=0;
			$basic_FR=$basic_ESI=$basic_OD=$basic_PROF_TAX=$basic_FC=$basic_TC=$basic_MC=$basic_OTH_ADJ=0;

			$deduction_basic=$basic_CESS=$basic_PF=$basic_ITAX_CESS=$basic_ESI=$basic_PTAX=$basic_ITAX=$basic_OTHDED=$basic_CD_EMP=$basic_CD_BANK=$basic_ADVANCE=$basic_LATE_AMT=$basic_INT_ADVANCE=$basic_FOODCHG=$basic_TRANCHG=$basic_MANTCHG=$basic_OTHADJ=$basic_SALADV=0;
			$additional_basic=$basic_TA=$basic_SPA=$basic_TELEPHONE=$basic_EVENGSEAL=$basic_EVENGBEL=$basic_OFFDAYCLASS=$basic_DOUBTCLEAR=$basic_SPLCLASS=$basic_BRALLOW=$basic_HRA=$basic_WASH=$basic_CONV=$basic_OT=$basic_BASIC=$basic_DA=$basic_XTRADUTY=$basic_GRADEPAY=$basic_MEDICAL=$basic_PERFORM=$basic_FOOD=$basic_OTHALLOW=$basic_FIXALLOW=0;

			foreach($emp_grade_wise_allowance_rs_detail as $emp_grade_wise_allowance_rs)
			{
				$employee_code=$employee_id;
				//$basic_pay=$emp_grade_wise_allowance->basic_pay;
				$head_name=$emp_grade_wise_allowance_rs->head_name;
				$head_type=$emp_grade_wise_allowance_rs->head_type;

				$head_alias_rs='';

				if($head_type == 'Deduction')
				{
					$head_ded_rs=DB::Table('deduction_head')
					->where('deduction_head_status','=','active')
					->select('id','head_name')
					->get();

					$len_ded_head=count($head_ded_rs);

					$head_alias_rs=DB::Table('deduction_head')
					->where('head_name','=',$head_name)
					->where('deduction_head_status','=','active')
					->select('id','alias_name','head_name')
					->get()
					->first();
				}

				if($head_type == 'Additional')
				{
					$head_add_rs=DB::Table('addition_head')
					->where('addition_head_status','=','active')
					->select('id','head_name')
					->get();

					$len_addt_head=count($head_add_rs);

					$head_alias_rs=DB::Table('addition_head')
					->where('head_name','=',$head_name)
					->where('addition_head_status','=','active')
					->select('id','alias_name','head_name')
					->get()
					->first();
				}

				$table_head_name.='<td style="padding: 0 50px;vertical-align: middle;">Additional</td>';
			//echo $head_name."-".$head_type;
			if($emp_grade_wise_allowance_rs->head_type == 'Additional')
			{
				$employee_pay_structure=EmployeePayStructure::where('employee_code','=',$employee_id)->where('employee_code','=',$employee_id)->get()->first();
				//dd($employee_pay_structure);
				if($employee_pay_structure->head_name_val == 1)
				{
					/*
					//echo $head_name."-".$head_type; die;
					$emp_grade_wise_allowance_rs=DB::Table('emp_grade_wise_allowance')
					->where('head_name','=',$head_name)
					->where('min_basic', '<=',  $basic_pay)
					->where('max_basic', '>=',  $basic_pay)
					->select('id','in_per','in_rs','head_name')
					->get()
					->first();
					*/

					/*

					if($head_name=='Attendance Allowan')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_AA=($basic_pay*$in_per)/100;
							$AA=$rs_AA;
						}
						else
						{
							$rs_AA=$emp_grade_wise_allowance_rs->in_rs;
							$AA=$rs_AA;
						}

						$basic_AA=$AA;
					}



					if($head_name=='Travel Alllow')
					{
						dd($emp_grade_wise_allowance_rs);
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_TA=($basic_pay*$in_per)/100;
							$TA=$rs_TA;
						}
						else
						{
							$rs_TA=$emp_grade_wise_allowance_rs->in_rs;
							$TA=$rs_TA;
						}

						$basic_TA=$TA;
					}
					*/

					if($head_name=='SPECIAL')
					{
						$in_per='';

						$in_per=$emp_grade_wise_allowance_rs->in_per;


						if($in_per <> 0)
						{
							echo "SPECIAL-".$in_per;
							$rs_SPA=($basic_pay*$in_per)/100;
							$SPA=$rs_SPA;
						}
						else
						{
							$rs_SPA=$emp_grade_wise_allowance_rs->in_rs;
							echo "SPECIAL-".$rs_SPA;
							$SPA=$rs_SPA;
						}

						$basic_SPA=$SPA;

					}

						//dd($emp_grade_wise_allowance_rs);

					if($head_name=='TELEPHONE')
					{
						$in_per='';
						echo "TELEPHONE-".$in_per;
						//dd($emp_grade_wise_allowance_rs);
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_telephone=($basic_pay*$in_per)/100;
							$TELEPHONE=$rs_telephone;
						}
						else
						{
							$rs_telephone=$emp_grade_wise_allowance_rs->in_rs;
							$TELEPHONE=$rs_telephone;
						}

						$basic_TELEPHONE=$TELEPHONE;
					}

					if($head_name=='EVENGSEAL')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_evening_class_sealdeah=($basic_pay*$in_per)/100;
							$EVENGSEAL=$rs_evening_class_sealdeah;
						}
						else
						{
							$rs_evening_class_sealdeah=$emp_grade_wise_allowance_rs->in_rs;
							$EVENGSEAL=$rs_evening_class_sealdeah;
						}

						$basic_EVENGSEAL=$EVENGSEAL;
					}

					if($head_name=='EVENGBEL')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_evening_class_belghoria=($basic_pay*$in_per)/100;
							$EVENGBEL=$rs_evening_class_belghoria;
						}
						else
						{
							$rs_evening_class_belghoria=$emp_grade_wise_allowance_rs->in_rs;
							$EVENGBEL=$rs_evening_class_belghoria;
						}

						$basic_EVENGBEL=$EVENGBEL;
					}

					if($head_name=='OFFDAYCLASS')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_off_day_class_allowance=($basic_pay*$in_per)/100;
							$OFFDAYCLASS=$rs_off_day_class_allowance;
						}
						else
						{
							$rs_off_day_class_allowance=$emp_grade_wise_allowance_rs->in_rs;
							$OFFDAYCLASS=$rs_off_day_class_allowance;
						}

						$basic_OFFDAYCLASS=$OFFDAYCLASS;
					}

					if($head_name=='DOUBTCLEAR')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_doubt_clear_class=($basic_pay*$in_per)/100;
							$DOUBTCLEAR=$rs_doubt_clear_class;
						}
						else
						{
							$rs_doubt_clear_class=$emp_grade_wise_allowance_rs->in_rs;
							$DOUBTCLEAR=$rs_doubt_clear_class;
						}

						$basic_DOUBTCLEAR=$DOUBTCLEAR;
					}

					if($head_name=='SPLCLASS')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_resenditial_special_class=($basic_pay*$in_per)/100;
							$SPLCLASS=$rs_resenditial_special_class;
						}
						else
						{
							$rs_resenditial_special_class=$emp_grade_wise_allowance_rs->in_rs;
							$SPLCLASS=$rs_resenditial_special_class;
						}

						$basic_SPLCLASS=$SPLCLASS;
					}


					if($head_name=='BRALLOW')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_branch_allowance=($basic_pay*$in_per)/100;
							$BRALLOW=$rs_branch_allowance;
						}
						else
						{
							$rs_branch_allowance=$emp_grade_wise_allowance_rs->in_rs;
							$BRALLOW=$rs_branch_allowance;
						}

						$basic_BRALLOW=$BRALLOW;
					}


					if($head_name=='HRA')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_hra=($basic_pay*$in_per)/100;
							$HRA=$rs_hra;
						}
						else
						{
							$rs_hra=$emp_grade_wise_allowance_rs->in_rs;
							$HRA=$rs_hra;
						}

						$basic_HRA=$HRA;
					}


					if($head_name=='WASH')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_washing_allowance=($basic_pay*$in_per)/100;
							$WASH=$rs_washing_allowance;
						}
						else
						{
							$rs_washing_allowance=$emp_grade_wise_allowance_rs->in_rs;
							$WASH=$rs_washing_allowance;
						}

						$basic_WASH=$WASH;
					}


					if($head_name=='CONV')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_conveyance=($basic_pay*$in_per)/100;
							$CONV=$rs_conveyance;
						}
						else
						{
							$rs_conveyance=$emp_grade_wise_allowance_rs->in_rs;
							$CONV=$rs_conveyance;
						}

						$basic_CONV=$CONV;
					}


					if($head_name=='OT')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_over_time=($basic_pay*$in_per)/100;
							$OT=$rs_over_time;
						}
						else
						{
							$rs_over_time=$emp_grade_wise_allowance_rs->in_rs;
							$OT=$rs_over_time;
						}

						$basic_OT=$OT;
					}
					//echo $basic_OT; die;
					if($head_name=='BASIC')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_basic=($basic_pay*$in_per)/100;
							$BASIC=$rs_basic;
						}
						else
						{
							$rs_basic=$emp_grade_wise_allowance_rs->in_rs;
							$BASIC=$rs_basic;
						}

						$basic_BASIC=$BASIC;
					}


					if($head_name=='DA')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_da=($basic_pay*$in_per)/100;
							$DA=$rs_da;
						}
						else
						{
							$rs_da=$emp_grade_wise_allowance_rs->in_rs;
							$DA=$rs_da;
						}

						$basic_DA=$DA;
					}

					if($head_name=='XTRADUTY')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_XTRADUTY=($basic_pay*$in_per)/100;
							$XTRADUTY=$rs_XTRADUTY;
						}
						else
						{
							$rs_XTRADUTY=$emp_grade_wise_allowance_rs->in_rs;
							$XTRADUTY=$rs_XTRADUTY;
						}

						$basic_XTRADUTY=$XTRADUTY;
					}


					if($head_name=='GRADEPAY')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_GRADEPAY=($basic_pay*$in_per)/100;
							$GRADEPAY=$rs_GRADEPAY;
						}
						else
						{
							$rs_GRADEPAY=$emp_grade_wise_allowance_rs->in_rs;
							$GRADEPAY=$rs_GRADEPAY;
						}

						$basic_GRADEPAY=$GRADEPAY;
					}


					if($head_name=='MEDICAL')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_MEDICAL=($basic_pay*$in_per)/100;
							$MEDICAL=$rs_MEDICAL;
						}
						else
						{
							$rs_MEDICAL=$emp_grade_wise_allowance_rs->in_rs;
							$MEDICAL=$rs_MEDICAL;
						}

						$basic_MEDICAL=$MEDICAL;
					}


					if($head_name=='PERFORM')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_PERFORM=($basic_pay*$in_per)/100;
							$PERFORM=$rs_PERFORM;
						}
						else
						{
							$rs_PERFORM=$emp_grade_wise_allowance_rs->in_rs;
							$PERFORM=$rs_PERFORM;
						}

						$basic_PERFORM=$PERFORM;
					}

					if($head_name=='FOOD')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_FOOD=($basic_pay*$in_per)/100;
							$FOOD=$rs_FOOD;
						}
						else
						{
							$rs_FOOD=$emp_grade_wise_allowance_rs->in_rs;
							$FOOD=$rs_FOOD;
						}

						$basic_FOOD=$FOOD;
					}

					if($head_name=='OTHALLOW')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_OTHALLOW=($basic_pay*$in_per)/100;
							$OTHALLOW=$rs_OTHALLOW;
						}
						else
						{
							$rs_OTHALLOW=$emp_grade_wise_allowance_rs->in_rs;
							$OTHALLOW=$rs_OTHALLOW;
						}

						$basic_OTHALLOW=$OTHALLOW;
					}


					if($head_name=='FIXALLOW')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_FIXALLOW=($basic_pay*$in_per)/100;
							$FIXALLOW=$rs_FIXALLOW;
						}
						else
						{
							$rs_FIXALLOW=$emp_grade_wise_allowance_rs->in_rs;
							$FIXALLOW=$rs_FIXALLOW;
						}

						$basic_FIXALLOW=$FIXALLOW;
					}


					$additional_basic=$basic_SPA+$basic_TELEPHONE+$basic_EVENGSEAL+$basic_EVENGBEL+$basic_OFFDAYCLASS+$basic_DOUBTCLEAR+$basic_SPLCLASS+$basic_BRALLOW+$basic_HRA+$basic_WASH+$basic_CONV+$basic_OT+$basic_BASIC+$basic_DA+$basic_XTRADUTY+$basic_GRADEPAY+$basic_MEDICAL+$basic_PERFORM+$basic_FOOD+$basic_OTHALLOW+$basic_FIXALLOW;

					//dd($emp_grade_wise_allowance_rs);
					//$hra=$basic_pay*
					//leave_deduction
				}
			}


			if($emp_grade_wise_allowance_rs->head_type == 'Deduction')
			{
				$employee_pay_structure=EmployeePayStructure::where('employee_code','=',$employee_id)->where('employee_code','=',$employee_id)->get()->first();
				//dd($employee_pay_structure);
				if($employee_pay_structure->head_name_val == 1)
				{

					if($head_name=='CESS')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$basic_CESS=($basic_pay*$in_per)/100;
							$CESS=$basic_CESS;
						}
						else
						{
							$basic_CESS=$emp_grade_wise_allowance_rs->in_rs;
							$CESS=$basic_CESS;
						}

						$basic_CESS=$CESS;
					}


					if($head_name=='PF')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_PF=($basic_pay*$in_per)/100;
							$PF=$rs_PF;
						}
						else
						{
							$rs_PF=$emp_grade_wise_allowance_rs->in_rs;
							$PF=$rs_PF;
						}

						$basic_PF=$PF;
					}


					if($head_name=='ESI')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_ESI=($basic_pay*$in_per)/100;
							$ESI=$rs_ESI;
						}
						else
						{
							$rs_ESI=$emp_grade_wise_allowance_rs->in_rs;
							$ESI=$rs_ESI;
						}

						$basic_ESI=$ESI;
					}

					if($head_name=='PTAX')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_PTAX=($basic_pay*$in_per)/100;
							$PTAX=$rs_PTAX;
						}
						else
						{
							$rs_PTAX=$emp_grade_wise_allowance_rs->in_rs;
							$PTAX=$rs_PTAX;
						}

						$basic_PTAX=$PTAX;
					}

					if($head_name=='ITAX')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_ITAX=($basic_pay*$in_per)/100;
							$ITAX=$rs_ITAX;
						}
						else
						{
							$rs_ITAX=$emp_grade_wise_allowance_rs->in_rs;
							$ITAX=$rs_ITAX;
						}

						$basic_ITAX=$ITAX;
					}

					if($head_name=='OTHDED')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_OTHDED=($basic_pay*$in_per)/100;
							$OTHDED=$rs_OTHDED;
						}
						else
						{
							$rs_OTHDED=$emp_grade_wise_allowance_rs->in_rs;
							$OTHDED=$rs_OTHDED;
						}

						$basic_OTHDED=$OTHDED;
					}

					if($head_name=='CD-EMP')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_CD_EMP=($basic_pay*$in_per)/100;
							$CD_EMP=$rs_CD_EMP;
						}
						else
						{
							$rs_CD_EMP=$emp_grade_wise_allowance_rs->in_rs;
							$CD_EMP=$rs_CD_EMP;
						}

						$basic_CD_EMP=$CD_EMP;
					}

					if($head_name=='CD-BANK')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_CD_BANK=($basic_pay*$in_per)/100;
							$CD_BANK=$rs_CD_BANK;
						}
						else
						{
							$rs_CD_BANK=$emp_grade_wise_allowance_rs->in_rs;
							$CD_BANK=$rs_CD_BANK;
						}

						$basic_CD_BANK=$CD_BANK;
					}

					if($head_name=='ADVANCE')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_ADVANCE=($basic_pay*$in_per)/100;
							$ADVANCE=$rs_ADVANCE;
						}
						else
						{
							$rs_ADVANCE=$emp_grade_wise_allowance_rs->in_rs;
							$ADVANCE=$rs_ADVANCE;
						}

						$basic_ADVANCE=$ADVANCE;
					}

					if($head_name=='LATE AMOUNT')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_LATE_AMT=($basic_pay*$in_per)/100;
							$LATE_AMT=$rs_LATE_AMT;
						}
						else
						{
							$rs_LATE_AMT=$emp_grade_wise_allowance_rs->in_rs;
							$LATE_AMT=$rs_LATE_AMT;
						}

						$basic_LATE_AMT=$LATE_AMT;
					}

					if($head_name=='INT_ADVANCE')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_INT_ADVANCE=($basic_pay*$in_per)/100;
							$INT_ADVANCE=$rs_INT_ADVANCE;
						}
						else
						{
							$rs_INT_ADVANCE=$emp_grade_wise_allowance_rs->in_rs;
							$INT_ADVANCE=$rs_INT_ADVANCE;
						}

						$basic_INT_ADVANCE=$INT_ADVANCE;
					}

					if($head_name=='FOODCHG')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_FOODCHG=($basic_pay*$in_per)/100;
							$FOODCHG=$rs_FOODCHG;
						}
						else
						{
							$rs_FOODCHG=$emp_grade_wise_allowance_rs->in_rs;
							$FOODCHG=$rs_FOODCHG;
						}

						$basic_FOODCHG=$FOODCHG;
					}

					if($head_name=='TRANCHG')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_TRANCHG=($basic_pay*$in_per)/100;
							$TRANCHG=$rs_TRANCHG;
						}
						else
						{
							$rs_TRANCHG=$emp_grade_wise_allowance_rs->in_rs;
							$TRANCHG=$rs_TRANCHG;
						}

						$basic_TRANCHG=$TRANCHG;
					}

					if($head_name=='MANTCHG')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_MANTCHG=($basic_pay*$in_per)/100;
							$MANTCHG=$rs_MANTCHG;
						}
						else
						{
							$rs_MANTCHG=$emp_grade_wise_allowance_rs->in_rs;
							$MANTCHG=$rs_MANTCHG;
						}

						$basic_MANTCHG=$MANTCHG;
					}

					if($head_name=='OTHADJ')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_OTHADJ=($basic_pay*$in_per)/100;
							$OTHADJ=$rs_OTHADJ;
						}
						else
						{
							$rs_OTHADJ=$emp_grade_wise_allowance_rs->in_rs;
							$OTHADJ=$rs_OTHADJ;
						}

						$basic_OTHADJ=$OTHADJ;
					}

					if($head_name=='SALADV')
					{
						$in_per='';
						$in_per=$emp_grade_wise_allowance_rs->in_per;

						if($in_per <> 0)
						{
							$rs_SALADV=($basic_pay*$in_per)/100;
							$SALADV=$rs_SALADV;
						}
						else
						{
							$rs_SALADV=$emp_grade_wise_allowance_rs->in_rs;
							$SALADV=$rs_SALADV;
						}

						$basic_SALADV=$SALADV;
					}

					$deduction_basic=$basic_CESS+$basic_PF+$basic_ITAX_CESS+$basic_ESI+$basic_PTAX+$basic_ITAX+$basic_OTHDED+$basic_CD_EMP+$basic_CD_BANK+$basic_ADVANCE+$basic_LATE_AMT+$basic_INT_ADVANCE+$basic_FOODCHG+$basic_TRANCHG+$basic_MANTCHG+$basic_OTHADJ+$basic_SALADV;
				}
			}

			}

			$gross_salary=$basic_pay+$additional_basic;
			$net_salary=$gross_salary-$deduction_basic;



		$result .= '<tr><input type="hidden" class="form-control" readonly="" name="company_id" value="'.$company_id.'">
						<input type="hidden" class="form-control" readonly="" name="grade_id" value="'.$grade_id.'">
						<input type="hidden" class="form-control" readonly="" name="department_id" value="'.$department_id.'">
						<input type="hidden" class="form-control" readonly="" name="employee_type_id" value="'.$employee_type_id.'">
						<input type="hidden" class="form-control" readonly="" name="month" value="'.$month.'">						
						<input type="hidden" class="form-control" readonly="" name="emp_name[]" value="'.$emp_name.'">
						<input type="hidden" class="form-control" readonly="" name="designation[]" value="'.$emp_designation.'">
						<input type="hidden" class="form-control" readonly="" name="gross_salary[]" value="'.$gross_salary.'">
						<input type="hidden" class="form-control" readonly="" name="total_deduction[]" value="'.$deduction_basic.'">
						<input type="hidden" class="form-control" readonly="" name="net_salary[]" value="'.$net_salary.'">
						<td><div class="checkbox"><label><input class="checkboxclass" id="check" type="checkbox" name="emp_code[]" value="'.$employee_code.'" ></label></div></td>
						<td>'.$employee_code.'</td>
						<td>'.$emp_name.'</td>
						<td>'.$emp_designation.'</td>
						<td><input type="text" class="form-control" readonly="" value="'.$basic_pay.'" name="basic_sal[]"></td>
						<td><input type="text" class="form-control" value="'.$basic_SPA.'" name="spa[]"></td>
						<td><input type="text" class="form-control" value="'.$basic_TELEPHONE.'" name="telephone[]"></td>
						<td><input type="text" class="form-control" value="'.$basic_EVENGSEAL.'" name="evengseal[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_EVENGBEL.'" name="evengbel[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_OFFDAYCLASS.'" name="offdayclass[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_DOUBTCLEAR.'" name="doubtclear[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_SPLCLASS.'" name="splclass[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_BRALLOW.'" name="brallow[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_HRA.'" name="hra[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_WASH.'" name="wash[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_CONV.'" name="conv[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_OT.'" name="ot[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_BASIC.'" name="basic[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_DA.'" name="da[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_XTRADUTY.'" name="xtraduty[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_GRADEPAY.'" name="gradepay[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_MEDICAL.'" name="medical[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_PERFORM.'" name="perform[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_FOOD.'" name="food[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_OTHALLOW.'" name="othallow[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_FIXALLOW.'" name="fixallow[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_CESS.'" name="cess[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_PF.'" name="pf[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_ESI.'" name="esi[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_PTAX.'" name="ptax[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_ITAX_CESS.'" name="itax[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_OTHDED.'" name="othded[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_CD_EMP.'" name="cd_emp[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_CD_BANK.'" name="cd_bank[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_ADVANCE.'" name="advance[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_LATE_AMT.'" name="late_amt[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_INT_ADVANCE.'" name="int_advance[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_FOODCHG.'" name="foodchg[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_TRANCHG.'" name="tranchg[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_MANTCHG.'" name="mantchg[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_OTHADJ.'" name="othadj[]" ></td>
						<td><input type="text" class="form-control" value="'.$basic_SALADV.'" name="saladv[]" ></td>
						
						<td>'.$gross_salary.'</td>
						<td>'.$deduction_basic.'</td>
						<td>'.$net_salary.'</td>
					 </tr> 
					
					  <tr></tr>';
						$k++;
		}

		$result .= '<tfoot>
						<tr>
							<td colspan="9" style="border:none;"><button type="button"  class="btn btn-danger btn-sm">Check All</button></td>
							<td colspan="8" style="text-align:right;border:none;"><button type="submit" class="btn btn-danger btn-sm">Save</button>
							<button type="reset" class="btn btn-danger btn-sm"> Reset</button></td>
						</tr>
					</tfoot>';

		return view('pis/payroll-generation', compact('len_ded_head', 'len_addt_head', 'result','company_rs','department_rs','table_head_name'));

	}


	public function npsMonthlyEnty($data){
		//echo "<pre>"; print_r($data); exit;
	    $get_current_month_nps = DB::table('nps_details')
	    ->where('emp_code', '=', $data['employee_id'])
	    ->where('month_year', '=', $data['month_yr'])
	    ->first();

	    if(empty($get_current_month_nps)){

	    	$get_last_month_nps = DB::table('nps_details')
		    ->where('emp_code', '=', $data['employee_id'])
		    ->orderBy('id', 'desc')
		    ->first();

	        if(empty($get_last_month_nps)){
	        	$opening_balance=0;
	        }else{
	        	$opening_balance=$get_last_month_nps->closing_balance;
	        }

		    $closing_balance = $opening_balance + $data['emp_nps'] + $data['emp_nps'];

	    	DB::table('nps_details')->insert(['emp_code' => $data['employee_id'], 'month_year' => $data['month_yr'] ,'opening_balance' => $opening_balance, 'own_share' => $data['emp_nps'] , 'company_share' => $data['emp_nps'] ,'closing_balance' => $closing_balance ,'updated_at' => date("Y-m-d H:i:s"),'created_at' => date("Y-m-d H:i:s")]
			);
	    }  
	}

	public function checkGpfEligibility($employee_id){

		$check_gpf_status =	DB::table('employee_pay_structure')->where('employee_code','=', $employee_id)->first();

		return $check_gpf_status;
	}


	public function gpfMonthlyEnty($data){

		$current_date=date('Y-m-d');
		$get_current_month_gpf = DB::table('gpf_details')
	    ->where('emp_code', '=', $data['employee_id'])
	    ->where('month_year', '=', $data['month_yr'])
	    ->first();

$current_month='';
$current_year='';
$previous_year='';
$next_year ='';
$year='';
$current_day='';
$current_month1='';

$current_month=date('d',strtotime('02/'.$data['month_yr']));
	    $current_year=date('Y',strtotime('02/'.$data['month_yr']));
	     $previous_year =  $current_year-1;
	    $next_year =  $current_year+1;

	    if(date('m')<='3'){
	    	$year=$previous_year.'-'.$current_year;
	    }elseif (date('m')>'3') {
	    	$year=$previous_year.'-'.$current_year;
	    }

	   $current_day=$current_year.'-';
        $current_day.='01';
        $current_day.='-'.$current_month;
         
	       $current_month1=date('Y-m-d',strtotime($current_day));
	    $rate_of_interest = DB::table('gpf_rate_master')
	    ->where('from_date', '<=',$current_month1)
	   ->where('to_date', '>=', $current_month1)
	    ->first();
	   
	   
	    if(empty($get_current_month_gpf)){

	    	$get_last_month_gpf = DB::table('gpf_details')
			->where('emp_code', $data['employee_id'])
			->orderBy('id', 'desc')
			->first();

	        if(empty($get_last_month_gpf)){
	    			$get_open_bal_gpf = DB::table('gpf_opening_balance')
			->where('employee_id', $data['employee_id'])
			->where('month_yr', '=', $year)
			
			->orderBy('id', 'desc')
			->first();
			
	    		$gpf_opening_balance=$get_open_bal_gpf->opening_balance;


	        }else{
	        	$gpf_opening_balance=$get_last_month_gpf->closing_balance;
	        }

 if(!empty($rate_of_interest)){

$date1=date_create($rate_of_interest->from_date);
$date2=date_create($rate_of_interest->to_date);
$diff=date_diff($date1,$date2);

  $diff->format("%R%a")/30;


  	$rte_in=($rate_of_interest->rate_of_interest)/($diff->format("%R%a")/30);



              $int=$gpf_opening_balance + $data['emp_gpf'];

	         $interest_amt = (($int*$rte_in)/100);
	      
}else{
	$rte_in=0;
	$interest_amt=0;
}

 if(!empty($get_last_month_gpf)){
$get_close_bal_gpf = DB::table('gpf_loan_apply')
			->where('employee_code', $data['employee_id'])
			->where('updated_at', '>', $get_last_month_gpf->updated_at)
			
			->orderBy('id', 'desc')
			->first();

$close=$get_close_bal_gpf->loan_amount;


}else{
	$close=0;
}

	       

        	 $gpf_closing_balance = $gpf_opening_balance + $data['emp_gpf']-$close; 

			DB::table('gpf_details')->insert(['emp_code' => $data['employee_id'], 'month_year' => $data['month_yr'] ,'opening_balance' => $gpf_opening_balance, 'own_share' => $data['emp_gpf'] , 'company_share' => $data['emp_gpf'],'rate_of_interest' => $rte_in,'interest_amount' => $interest_amt ,'closing_balance' => $gpf_closing_balance ,'updated_at' => date("Y-m-d H:i:s"),'created_at' => date("Y-m-d H:i:s"),'loan_amount' => $close]);
	    }	
	}


	public function savePayrollDetails(Request $request)
    {

	        if(empty($request->emp_gross_salary)){
	        	Session::flash('message','Gross Salary Cannot Blank.');
				return redirect('pis/vw-payroll-generation');
	        }

	        if(empty($request->emp_total_deduction)){

	        	Session::flash('message','Total Salary Cannot Blank.');
				return redirect('pis/vw-payroll-generation');
	        }

	        if(empty($request->emp_net_salary)){

	        	Session::flash('message','Net Salary Cannot Blank.');
				return redirect('pis/vw-payroll-generation');
	        }


	        $monthyr=$request->month_yr;
	        $mnt_yr=date('m/Y', strtotime("$monthyr"));
	        //print_r($mnt_yr); exit;

	        $data['employee_id']=$request->empname;
	        $data['emp_name']=$request->emp_name;
	        $data['emp_designation']=$request->emp_designation;
	        $data['emp_basic_pay']=$request->emp_basic_pay;
	        $data['month_yr']=$mnt_yr;
	        $data['emp_present_days']=$request->emp_present_days;
	        $data['emp_cl']=$request->emp_cl;
	        $data['emp_el']=$request->emp_el;
	        $data['emp_hpl']=$request->emp_hpl;
	        $data['emp_absent_days']=$request->emp_absent_days;
	        $data['emp_rh']=$request->emp_rh;
	        $data['emp_cml']=$request->emp_cml;
	        $data['emp_eol']=$request->emp_eol;
	        $data['emp_lnd']=$request->emp_lnd;
	        $data['emp_maternity_leave']=$request->emp_maternity_leave;
	        $data['emp_paternity_leave']=$request->emp_paternity_leave;
	        $data['emp_ccl']=$request->emp_ccl;
	        $data['emp_el']=$request->emp_el;
	        $data['emp_da']=$request->emp_da;
	        $data['emp_hra']=$request->emp_hra;
	        $data['emp_transport_allowance']=$request->emp_transport_allowance;
	        $data['emp_da_on_ta']=$request->emp_da_on_ta;
	        $data['emp_ltc']=$request->emp_ltc;
	        $data['emp_cea']=$request->emp_cea;
	        $data['emp_travelling_allowance']=$request->emp_travelling_allowance;
	        $data['emp_daily_allowance']=$request->emp_daily_allowance;
	        $data['emp_advance']=$request->emp_advance;
	        $data['emp_adjustment']=$request->emp_adjustment;
	        $data['emp_medical']=$request->emp_medical;
	        $data['emp_spcl']=$request->emp_spcl_allowance;
	        $data['emp_cash_handle']=$request->cash_handling_allowance;
	        $data['other_addition']=$request->emp_others_addition;
	        $data['emp_gpf']=$request->emp_gpf;
	        $data['emp_nps']=$request->emp_nps;
	        $data['emp_cpf']=$request->emp_cpf;
	        $data['emp_gslt']=$request->emp_gslt;
	        $data['emp_cess']=$request->emp_cess;
	        $data['emp_income_tax']=$request->emp_income_tax;
	        $data['emp_pro_tax']=$request->emp_pro_tax;
	        $data['emp_absent_deduction']=$request->emp_absent_deduction;
	        $data['other_deduction']=$request->emp_others_deduction;
	        $data['emp_gross_salary']=$request->emp_gross_salary;
	        $data['emp_total_deduction']=$request->emp_total_deduction;
	        $data['emp_net_salary']=$request->emp_net_salary;
	        $data['proces_status']='process';
            $data['created_at']=date('Y-m-d');

	        $employee_pay_structure = DB::table('payroll_details')
                 ->where('employee_id', '=', $request->empname)
                 ->where('month_yr', '=', $mnt_yr)
                 ->first();

	        if(!empty($employee_pay_structure)){
	        	Session::flash('message','Payroll for this employee already generated for the month of "'.date('m-Y').'". ');
	        }else{

	            DB::table('payroll_details')->insert($data);
	            $check_gpf = $this->checkGpfEligibility($data['employee_id']);

	            if($check_gpf->gpf=='1'){
	            	$this->npsMonthlyEnty($data);
	           		$this->gpfMonthlyEnty($data);
	            }
	           	
		        Session::flash('message','Payroll Information Successfully Saved.');
	        }

	    return redirect('pis/vw-payroll-generation');
    }

	public function savePayroll(Request $request)
	{
		//dd($request->all());
		/*
		$validator=Validator::make($request->all(),[
		'company_id' => 'required|max:100',
		'designation_name'=>'required|max:100'
		],
		[
		'company_id.required'=>'Company Name Required',
		'designation_name.required'=>'Designation Name Required'
		]);

		if($validator->fails())
		{
			return redirect('pis/designation')->withErrors($validator)->withInput();
		}
		*/

		//$data=request()->except(['_token','in_per','in_rs','min_basic','max_basic','bootstrap-data-table_length','all']);

		$payrollDetails=new PayrollDetails();

		//$company_id=$request->company_id;
		//$grade->id=$request->grade_id;
		//$checked_arr=$request->check;

		$i=0;

		foreach($request->emp_code as $checked)
		{
			$data['company_id']=$request->company_id;
			$data['grade_id']=$request->grade_id;
			$data['department_id']=$request->department_id;
			$data['employee_type_id']=$request->employee_type_id;
			$data['month']=$request->month;
			$data['emp_name']=$request->emp_name[$i];
			$data['designation']=$request->designation[$i];
			$data['gross_salary']=$request->gross_salary[$i];
			$data['total_deduction']=$request->total_deduction[$i];
			$data['net_salary']=$request->net_salary[$i];
			$data['emp_code']=$request->emp_code[$i];
			$data['basic_sal']=$request->basic_sal[$i];
			$data['spa']=$request->spa[$i];
			$data['telephone']=$request->telephone[$i];
			$data['evengseal']=$request->evengseal[$i];
			$data['evengbel']=$request->evengbel[$i];
			$data['offdayclass']=$request->offdayclass[$i];
			$data['doubtclear']=$request->doubtclear[$i];
			$data['splclass']=$request->splclass[$i];
			$data['brallow']=$request->brallow[$i];
			$data['hra']=$request->hra[$i];
			$data['wash']=$request->wash[$i];
			$data['conv']=$request->conv[$i];
			$data['ot']=$request->ot[$i];
			$data['basic']=$request->basic[$i];
			$data['da']=$request->da[$i];
			$data['xtraduty']=$request->xtraduty[$i];
			$data['gradepay']=$request->gradepay[$i];
			$data['medical']=$request->medical[$i];
			$data['perform']=$request->perform[$i];
			$data['food']=$request->food[$i];
			$data['othallow']=$request->othallow[$i];
			$data['fixallow']=$request->fixallow[$i];
			$data['cess']=$request->cess[$i];
			$data['pf']=$request->pf[$i];
			$data['esi']=$request->esi[$i];
			$data['ptax']=$request->ptax[$i];
			$data['itax']=$request->itax[$i];
			$data['othded']=$request->othded[$i];
			$data['cd_emp']=$request->cd_emp[$i];
			$data['cd_bank']=$request->cd_bank[$i];
			$data['advance']=$request->advance[$i];
			$data['late_amt']=$request->late_amt[$i];
			$data['int_advance']=$request->int_advance[$i];
			$data['foodchg']=$request->foodchg[$i];
			$data['tranchg']=$request->tranchg[$i];
			$data['mantchg']=$request->mantchg[$i];
			$data['othadj']=$request->othadj[$i];
			$data['saladv']=$request->saladv[$i];
			//dd($data);
			$payrollDetails->create($data);
			$i++;
		}
		//die;
		Session::flash('message','Payroll Information Successfully Saved.');
		return redirect('pis/vw-payroll-generation');
	}

	public function getPayroll()
	{

		$data['payroll_rs']=DB::table('payroll_details')->get();
		return view('pis/view-payroll-generation',$data);
	}

	public function getPayrollallemployee(){

        $Payroll_rs=DB::table('payroll_details')->get();
		return view('pis/payroll-generation-all-employee',compact('Payroll_rs'));
	}

	public function addPayrollallemployee()
    {
        $result='';
		return view('pis/generate-payroll-all',compact('result'));
	}

	public function listPayrollallemployee(Request $request)
    {
      	$payrolldate = explode('/', $request['month_yr']);
	    $payroll_date = "0".($payrolldate[0]-2);
	    $origDate= $payroll_date."/".$payrolldate[1];
	    $current_month_days = cal_days_in_month(CAL_GREGORIAN, $payrolldate[0], $payrolldate[1]);

	    $tomonthyr=$payrolldate[1]."-".$payroll_date."-".$current_month_days;
	    $formatmonthyr=$payrolldate[1]."-".$payroll_date."-01";

      $rate_rs=DB::table('rate_master')
                ->join('rate_details','rate_details.rate_id','=','rate_master.id')
                ->select('rate_details.*','rate_master.head_name')
                ->get();
        $result='';
        //$empl_code= DB::table('process_attendance')->where('month_yr','=',$origDate)->select('*')->get();

        $emplist= DB::table('employee')
        ->where('status','=','active')
        ->where('emp_status','!=','TEMPORARY')
		->where('employee.emp_status', '!=', 'EX-EMPLOYEE')
        ->orderBy('emp_fname', 'asc')
        ->get();


        foreach($emplist as $mainkey=>$emcode)
        {
            $process_attendance=DB::table('process_attendance')
	        ->where('process_attendance.employee_code', '=',$emcode->emp_code)
	        ->where('process_attendance.month_yr','=',$origDate)
	        ->first();

            $employee_rs=DB::table('employee')
	        ->join('employee_pay_structure','employee_pay_structure.employee_code','=','employee.emp_code')
	        ->where('employee.emp_code', '=',  $emcode->emp_code)
	        ->select('employee.*','employee_pay_structure.*')
	        ->first();

           $leave_rs=DB::table('leave_apply')
           ->join('leave_type','leave_type.id','=','leave_apply.leave_type')
           ->where('leave_apply.employee_id','=',$emcode->emp_code)
           ->where('leave_apply.status','=','APPROVED')
           ->whereBetween('leave_apply.from_date', array($formatmonthyr, $tomonthyr))
           ->orwhereBetween('leave_apply.to_date', array($formatmonthyr, $tomonthyr))
           ->select('leave_apply.*','leave_type.leave_type_name')
           ->get();

           $previous_payroll=DB::table('payroll_details')
           ->where('employee_id', '=',$emcode->emp_code)
           //->where('month_yr','<',$request['month_yr'])
           ->orderBy('month_yr', 'desc')
           ->first();
	       

		   
            $tot_cl=$tot_el=$tot_hpl=$tot_rh=$tot_cml=$tot_eol=$tot_ml=$tot_pl=$tot_ccl=$tot_tl=0;
            foreach($leave_rs as $ky => $val){
                if($val->employee_id==$emcode->emp_code)
                {

                    if($val->leave_type_name=='CASUAL LEAVE'){


                          $frommonth = date("m",strtotime($val->from_date));
                          $tomonth = date("m",strtotime($val->to_date));
                          if($frommonth==$tomonth){
                            $tot_cl=$val->no_of_leave;
                          }else{

                            $to = \Carbon\Carbon::createFromFormat('Y-m-d', $tomonthyr);
	                $from = \Carbon\Carbon::createFromFormat('Y-m-d', $val->to_date);
	                $diff_in_days = $to->diffInDays($val->from_date);
	                $tot_cl= ($diff_in_days)+1;

                          }
                      }

                    if($val->leave_type_name=='EARNED LEAVE')
                        {
                           $frommonth = date("m",strtotime($val->from_date));
                          $tomonth = date("m",strtotime($val->to_date));
                          if($frommonth==$tomonth){
                            $tot_el=$val->no_of_leave;
                          }else{
                            $to = \Carbon\Carbon::createFromFormat('Y-m-d', $tomonthyr);
	                $from = \Carbon\Carbon::createFromFormat('Y-m-d', $val->to_date);
	                $diff_in_days = $to->diffInDays($val->from_date);
	                $tot_el= ($diff_in_days)+1;

                          }
                        }

                    if($val->leave_type_name=='HALF PAY LEAVE')
                        {

                          $frommonth = date("m",strtotime($val->from_date));
                          $tomonth = date("m",strtotime($val->to_date));
                          if($frommonth==$tomonth){
                            $tot_hpl=$val->no_of_leave;
                          }else{
                            $to = \Carbon\Carbon::createFromFormat('Y-m-d', $tomonthyr);
	                $from = \Carbon\Carbon::createFromFormat('Y-m-d', $val->to_date);
	                $diff_in_days = $to->diffInDays($val->from_date);
	                $tot_hpl= ($diff_in_days)+1;

                          }
                        }

                        if($val->leave_type_name=='MEDICAL LEAVE')
                        {
                           $frommonth = date("m",strtotime($val->from_date));
                           $tomonth = date("m",strtotime($val->to_date));
                          if($frommonth==$tomonth){
                            $tot_ml=$val->no_of_leave;
                          }else{
                            $to = \Carbon\Carbon::createFromFormat('Y-m-d', $tomonthyr);
	                $from = \Carbon\Carbon::createFromFormat('Y-m-d', $val->to_date);
	                $diff_in_days = $to->diffInDays($val->from_date);
	                $tot_ml= ($diff_in_days)+1;

                          }
                        }


                        if($val->leave_type_name=='TOUR LEAVE')
                        {
                           $frommonth = date("m",strtotime($val->from_date));
                           $tomonth = date("m",strtotime($val->to_date));
                          if($frommonth==$tomonth){
                            $tot_tl=$val->no_of_leave;
                          }else{
                            $to = \Carbon\Carbon::createFromFormat('Y-m-d', $tomonthyr);
	                $from = \Carbon\Carbon::createFromFormat('Y-m-d', $val->to_date);
	                $diff_in_days = $to->diffInDays($val->from_date);
	                $tot_tl= ($diff_in_days)+1;

                          }
                        }

                    }
                }


                if(empty($process_attendance)){

                  $calculate_basic_salary=$employee_rs->basic_pay;
                  $no_of_working_days=0;
                  $no_of_present=0;
                  $no_of_days_absent=0;
                  $no_of_days_salary=0;


                }else{

                  $calculate_basic_salary=round(($employee_rs->basic_pay / $current_month_days) * ($process_attendance->no_of_working_days-$process_attendance->no_of_days_absent));

                  $no_of_working_days=$process_attendance->no_of_working_days;
                  $no_of_present=$process_attendance->no_of_present;
                  $no_of_days_absent=$process_attendance->no_of_days_absent;
                  $no_of_days_salary=$process_attendance->no_of_days_salary;

                }

                $ta_rate=0;
            	$da_on_ta=0;


            //$ta_value = DB::select(DB::raw("SELECT *FROM rate_details WHERE ('".$calculate_basic_salary."' between min_basic AND max_basic) AND rate_id = 3 order by id desc LIMIT 1"));

           	$ta_value = DB::table('rate_details')
           	->where('rate_id','=',3)
           	->where(function ($query) use ($calculate_basic_salary) {
			      $query->where('min_basic', '<=', $calculate_basic_salary);
			      $query->where('max_basic', '>=', $calculate_basic_salary);
			})
           ->first();

            $da_value = DB::table('rate_details')->where('rate_id','=','2')->first();

            if($emcode->emp_code=='6678'){

              $ta_rate=3600;
              $da_on_ta=612;

            }else{

            	if($ta_value){
	                if($no_of_days_absent>0){

	                $absent_deduction=round(($ta_value->inrupees / $current_month_days) * $no_of_days_absent);

		                if($emcode->emp_physical_status=='yes'){
		                    $ta_rate = round(($ta_value->inrupees-$absent_deduction)*2);
		              	}else{
		                    $ta_rate = round(($ta_value->inrupees-$absent_deduction));
		                }

	                }else{

			            if($emcode->emp_physical_status=='yes'){
			                    $ta_rate = round($ta_value->inrupees*2);
			            }else{

			                  $ta_rate=$ta_value->inrupees;
			            }
			        }

			        $da_on_ta=round($ta_rate*$da_value->inpercentage/100);
			    }
            }






              foreach($rate_rs as $ratekey => $rateval){


                  if($rateval->head_name=='HRA'){
                    if($employee_rs->hra=='1'){
                      $actual_hra=$calculate_basic_salary*$rateval->inpercentage/100;
                      if($actual_hra<=5400){
                    $hra='5400';

                  }else{
                    $hra=$actual_hra;
                  }
                    }else{
                      $hra=0;
                    }
                  }


                  if($rateval->head_name=='DA'){

                    if($employee_rs->da=='1')
                      {
                        $da=round($calculate_basic_salary*$rateval->inpercentage/100);
                      }else{

                        $da=0;
                      }
                  }

                  if($rateval->head_name=='LTC'){
                    if($employee_rs->ltc=='1'){
                       $ltc=$rateval->inpercentage;
                    }else{
                      $ltc=0;
                    }
                  }

                  if($rateval->head_name=='CEA'){
                    if($employee_rs->cea=='1'){
                      $cea=$rateval->inpercentage;

                    }else{
                      $cea=0;
                    }
                  }

                  if($rateval->head_name=='TR_A'){
                    if($employee_rs->travelling_allowance=='1'){
                       $tr_a=$rateval->inpercentage;
                    }else{
                      $tr_a=0;
                    }
                  }

                  if($rateval->head_name=='DLA'){
                    if($employee_rs->daily_allowance=='1'){
                       $dla=$rateval->inpercentage;
                    }else{
                      $dla=0;
                    }
                  }

                  if($rateval->head_name=='ADV'){
                    if($employee_rs->advance=='1'){
                       $adv=$rateval->inpercentage;
                    }else{
                      $adv=0;
                    }
                  }

                  if($rateval->head_name=='ADJ_ADV'){
                    if($employee_rs->adjustment_advance=='1'){
                       $adjadv=$rateval->inpercentage;
                    }else{
                      $adjadv=0;
                    }
                  }

                  if($rateval->head_name=='MR'){
                    if($employee_rs->medical_reimbursement=='1'){
                       $mr=$rateval->inpercentage;
                    }else{
                      $mr=0;
                    }
                  }

                  if($rateval->head_name=='SA'){
                    if($employee_rs->spcl_allowance=='1'){

                       //$sa=$rateval->inpercentage;
                      if(!empty($previous_payroll->emp_spcl)){
                        $sa= $previous_payroll->emp_spcl;

                      }else{
                        $sa= 0;
                      }
                    }else{
                      $sa=0;
                    }
                  }

                  if($rateval->head_name=='CHA'){
                    if($employee_rs->cash_handling_allowance=='1'){
                       if(!empty($previous_payroll->emp_cash_handle)){
                        $cha= $previous_payroll->emp_cash_handle;

                      }else{
                        $cha=0;
                      }
                    }else{
                      $cha=0;
                    }
                  }


                  if($rateval->head_name=='NPS'){

                    if($employee_rs->nps=='1'){
                       $nps=$calculate_basic_salary + $da;
                         $tot_nps=round($nps*$rateval->inpercentage/100);

                    }else{

                      $tot_nps=0;
                    }
                  }


                  if($rateval->head_name=='GSLI'){

                    if($employee_rs->gsli=='1'){
                      //$gsli=$rateval->inrupees;
                      if(!empty($previous_payroll->emp_gslt)){
                        $gsli= $previous_payroll->emp_gslt;
                      }else{
                        $gsli=0;
                      }

                    }else{
                      $gsli=0;
                    }
                  }


                  if($rateval->head_name=='GPF'){

                    if($employee_rs->gpf=='1'){

                      if(!empty($previous_payroll->emp_gpf)){
                        $gpf= $previous_payroll->emp_gpf;
                      }else{
                        $gpf= 0;
                      }

                    }else{
                      $gpf=0;
                    }
                  }




                    if($employee_rs->income_tax=='1'){

                      if(!empty($previous_payroll->emp_income_tax)){
                        $income_tax= $previous_payroll->emp_income_tax;
                      }else{
                        $income_tax= 0;
                      }

                    }else{
                      $income_tax=0;
                    }

                    if($employee_rs->cess=='1'){
                      //$cess=$rateval->inpercentage;
                      if(!empty($previous_payroll->emp_cess)){
                        $cess= $previous_payroll->emp_cess;
                      }else{
                        $cess= 0;
                      }
                    }else{
                      $cess=0;
                    }



                    if($employee_rs->other_deduction=='1'){

                      if(!empty($previous_payroll->other_deduction)){
                        $other2= $previous_payroll->other_deduction;
                      }else{
                        $other2= 0;
                      }
                    }else{
                      $other2=0;
                    }

              }

              $total_gross=round($calculate_basic_salary+$da+$hra+$da_on_ta+$ta_rate+$ltc+$cea+$tr_a+$dla+$adv+$adjadv+$mr+$sa+$cha);

               foreach($rate_rs as $ratekey => $rateval){
                  if($rateval->head_name=='PTAX'){
                    if($employee_rs->professional_tax=='1'){

                        if(($total_gross>=$rateval->min_basic) && ($total_gross<=$rateval->max_basic))
                {
                    $ptax=$rateval->inrupees;

                }

                    }else{
                        $ptax=0;
                    }
                  }
            }

        $total_deduction=round($tot_nps+$gsli+$ptax+$gpf+$income_tax+$cess+$other2);
              $netsalary=round($total_gross-$total_deduction);
              $result.='<tr id="'.$emcode->emp_code.'">
                            <td><div class="checkbox"><label><input type="checkbox" name="empcode_check[]" value="'.$emcode->emp_code.'" class="checkhour"></label></div></td>
                            <td><input type="text" readonly class="form-control" name="emp_code'.$emcode->emp_code.'" style="width:100px;" value="'.$employee_rs->emp_code.'"></td>
                            <td><input type="text" readonly class="form-control" name="emp_name'.$emcode->emp_code.'" style="width:100px;" value="'.$employee_rs->emp_fname.' '.$employee_rs->emp_mname.' '.$employee_rs->emp_lname.'"></td>
                            <td><input type="text" readonly class="form-control" name="emp_designation'.$emcode->emp_code.'" style="width:100px;" value="'.$employee_rs->emp_designation.'"></td>
                            <td><input type="text" readonly class="form-control" name="month_yr'.$emcode->emp_code.'" style="width:70px;" value="'.$request['month_yr'].'"></td>
                            <td><input type="text" readonly class="form-control" name="emp_basic_pay'.$emcode->emp_code.'" style="width:100px;" value="'.$calculate_basic_salary.'"  id="emp_basic_pay_'.$emcode->emp_code.'" ></td>
                            <td><input type="text" readonly class="form-control" name="emp_no_of_working'.$emcode->emp_code.'" value="'.$no_of_working_days.'"></td>
                            <td><input type="text" readonly class="form-control" name="emp_no_of_present'.$emcode->emp_code.'" value="'.$no_of_present.'"></td>
                            <td><input type="text" readonly class="form-control" name="emp_no_of_days_absent'.$emcode->emp_code.'" value="'.$no_of_days_absent.'"></td>
              <td><input type="text" readonly class="form-control" name="emp_no_of_days_salary'.$emcode->emp_code.'" value="'.$no_of_days_salary.'"></td>
                            <td><input type="text" readonly class="form-control" name="emp_tot_cl'.$emcode->emp_code.'" style="width:50px;" value="'.$tot_cl.'"></td>
                            <td><input type="text" readonly class="form-control" name="emp_tot_el'.$emcode->emp_code.'" style="width:50px;" value="'.$tot_el.'"></td>
                            <td><input type="text" readonly class="form-control" name="emp_tot_hpl'.$emcode->emp_code.'" style="width:50px;" value="'.$tot_hpl.'"></td>
                            <td><input type="text" readonly class="form-control" name="emp_tot_rh'.$emcode->emp_code.'" style="width:50px;" value="'.$tot_rh.'"></td>
                            <td><input type="text" readonly class="form-control" name="emp_tot_cml'.$emcode->emp_code.'" style="width:50px;" value="'.$tot_cml.'"></td>
                            <td><input type="text" readonly class="form-control" name="emp_tot_eol'.$emcode->emp_code.'" style="width:50px;" value="'.$tot_eol.'"></td>
                            <td><input type="text" readonly class="form-control" name="emp_lnd'.$emcode->emp_code.'" value="0"></td>
                            <td><input type="text" readonly class="form-control" name="emp_tot_ml'.$emcode->emp_code.'" style="width:50px;" value="'.$tot_ml.'"></td>
                            <td><input type="text" readonly class="form-control" name="emp_tot_pl'.$emcode->emp_code.'" style="width:50px;" value="'.$tot_pl.'"></td>
                            <td><input type="text" readonly class="form-control" name="emp_totccl'.$emcode->emp_code.'" style="width:50px;" value="'.$tot_ccl.'"></td>
                            <td><input type="text" readonly class="form-control" name="emp_tour_leave'.$emcode->emp_code.'" style="width:50px;" value="'.$tot_tl.'"></td>
                            <td><input type="text" class="form-control" name="emp_da'.$emcode->emp_code.'" value="'.$da.'" readonly ></td>
                            <td><input type="text" class="form-control" name="emp_hra'.$emcode->emp_code.'" value="'.$hra.'" readonly></td>
                            <td><input type="text" class="form-control" name="emp_ta'.$emcode->emp_code.'" value="'.$ta_rate.'" readonly></td>
                            <td><input type="text" class="form-control" name="emp_daonta'.$emcode->emp_code.'" value="'.$da_on_ta.'" readonly></td>
                            <td><input type="text" class="form-control" id="ltc_'.$emcode->emp_code.'" name="emp_ltc'.$emcode->emp_code.'" value="'.$ltc.'"></td>
                            <td><input type="text" class="form-control" name="emp_cha'.$emcode->emp_code.'" value="'.$cha.'" id="cha_'.$emcode->emp_code.'" ></td>
                            <td><input type="text" class="form-control" name="emp_tra'.$emcode->emp_code.'" value="'.$tr_a.'" id="tra_'.$emcode->emp_code.'"></td>
                            <td><input type="text" class="form-control" name="emp_dla'.$emcode->emp_code.'" value="'.$dla.'" id="dla_'.$emcode->emp_code.'" ></td>
                            <td><input type="text" class="form-control" name="emp_spcl_allowance'.$emcode->emp_code.'" value="'.$sa.'" id="spcl_allowance_'.$emcode->emp_code.'"></td>
                            <td><input type="text" class="form-control" name="emp_adv'.$emcode->emp_code.'" value="'.$adv.'" id="adv_'.$emcode->emp_code.'"></td>
                            <td><input type="text" class="form-control" name="emp_adjadv'.$emcode->emp_code.'" value="'.$adjadv.'" id="adjadv_'.$emcode->emp_code.'" ></td>
                            <td><input type="text" class="form-control" name="emp_mr'.$emcode->emp_code.'" value="'.$mr.'" id="mr_'.$emcode->emp_code.'" ></td>
                            <td><input type="text" class="form-control" name="emp_other1'.$emcode->emp_code.'" value="0" style="width:50px;" id="other1_'.$emcode->emp_code.'"></td>
                            <td><input type="text" class="form-control" name="emp_gpf'.$emcode->emp_code.'" style="width:50px;" value="'.$gpf.'" readonly ></td>
                            <td><input type="text" class="form-control" name="emp_nps'.$emcode->emp_code.'" style="width:50px;" value="'.$tot_nps.'" readonly id="nps_'.$emcode->emp_code.'" ></td>
                            <td><input type="text" class="form-control" name="emp_cpf'.$emcode->emp_code.'" style="width:50px;" value="0" readonly id="cpf_'.$emcode->emp_code.'"></td>
                            <td><input type="text" class="form-control" name="emp_gsli'.$emcode->emp_code.'" style="width:50px;" value="'.$gsli.'" id="gsli_'.$emcode->emp_code.'" readonly></td>
                            <td><input type="text" class="form-control" name="emp_income_tax'.$emcode->emp_code.'" style="width:50px;" value="'.$income_tax.'" id="income_tax_'.$emcode->emp_code.'" readonly></td>
                            <td><input type="text" class="form-control" name="emp_cess'.$emcode->emp_code.'" value="'.$cess.'" id="cess_'.$emcode->emp_code.'" readonly></td>
                            <td><input type="text" class="form-control" name="emp_ptax'.$emcode->emp_code.'" value="'.$ptax.'" id="tax_'.$emcode->emp_code.'" readonly></td>
                            <td><input type="text" class="form-control" name="emp_other2'.$emcode->emp_code.'" style="width:50px;" value="'.$other2.'" id="other2_'.$emcode->emp_code.'"></td>
                            <td><input type="text" class="form-control" name="emp_total_gross'.$emcode->emp_code.'" style="width:120px;" value="'.$total_gross.'" id="emp_total_gross_'.$emcode->emp_code.'" readonly ></td>
                            <td><input type="text" class="form-control" name="emp_total_deduction'.$emcode->emp_code.'" style="width:120px;" value="'.$total_deduction.'" id="emp_total_deduction_'.$emcode->emp_code.'" readonly></td>
                            <td><input type="text" class="form-control" name="emp_net_salary'.$emcode->emp_code.'" style="width:120px;" value="'.$netsalary.'" id="emp_net_salary_'.$emcode->emp_code.'" readonly></td>
                </tr> ';

        }

      return view('pis/generate-payroll-all',compact('result'));
  	}

    public function SavePayrollAll(Request $request)
    {
	      foreach($request->empcode_check as $key=>$value)
	      {
	           $data['employee_id']=$value;
            $data['emp_name']=$request['emp_name'.$value];
            $data['emp_designation']=$request['emp_designation'.$value];
            $data['emp_basic_pay']=$request['emp_basic_pay'.$value];
            $data['month_yr']=$request['month_yr'.$value];

            $data['emp_present_days']=$request['emp_no_of_present'.$value];
            $data['emp_cl']=$request['emp_tot_cl'.$value];
            $data['emp_el']=$request['emp_tot_el'.$value];
            $data['emp_hpl']=$request['emp_tot_hpl'.$value];
            $data['emp_absent_days']=$request['emp_no_of_days_absent'.$value];
            $data['emp_rh']=$request['emp_tot_rh'.$value];
            $data['emp_cml']=$request['emp_tot_cml'.$value];
            $data['emp_eol']=$request['emp_tot_eol'.$value];
            $data['emp_lnd']=$request['emp_lnd'.$value];
            $data['emp_maternity_leave']=$request['emp_tot_ml'.$value];
            $data['emp_paternity_leave']=$request['emp_tot_pl'.$value];
            $data['emp_ccl']=$request['emp_totccl'.$value];
            $data['emp_da']=$request['emp_da'.$value];
            $data['emp_hra']=$request['emp_hra'.$value];
            $data['emp_transport_allowance']=$request['emp_ta'.$value];
            $data['emp_da_on_ta']=$request['emp_daonta'.$value];
            $data['emp_ltc']=$request['emp_ltc'.$value];
            $data['emp_cash_handle']=$request['emp_cha'.$value];
            $data['emp_travelling_allowance']=$request['emp_tra'.$value];
            $data['emp_spcl']=$request['emp_spcl_allowance'.$value];
            $data['emp_daily_allowance']=$request['emp_dla'.$value];
            $data['emp_advance']=$request['emp_adv'.$value];
            $data['emp_adjustment']=$request['emp_adjadv'.$value];
            $data['emp_medical']=$request['emp_mr'.$value];
            $data['emp_gpf']=$request['emp_gpf'.$value];
            $data['emp_nps']=$request['emp_nps'.$value];
            $data['emp_cpf']=$request['emp_cpf'.$value];
            $data['emp_gslt']=$request['emp_gsli'.$value];
            $data['emp_income_tax']=$request['emp_income_tax'.$value];
            $data['emp_cess']=$request['emp_cess'.$value];
            $data['emp_pro_tax']=$request['emp_ptax'.$value];
            $data['other_deduction']=$request['emp_other2'.$value];
            $data['emp_gross_salary']=$request['emp_total_gross'.$value];
            $data['emp_total_deduction']=$request['emp_total_deduction'.$value];
            $data['emp_net_salary']=$request['emp_net_salary'.$value];
            $data['proces_status']='process';
            $data['created_at']=date('Y-m-d');

            $employee_pay_structure = DB::table('payroll_details')
            ->where('employee_id', '=', $value)
            ->where('month_yr', '=', $request['month_yr'.$value])
            ->first();

	            if(!empty($employee_pay_structure)){
	              Session::flash('message','Already Entry in Table');
	            }else{

	              	DB::table('payroll_details')->insert($data);
	              	$check_gpf = $this->checkGpfEligibility($data['employee_id']);
		            if($check_gpf->gpf=='1'){
		            $this->npsMonthlyEnty($data);
		           		$this->gpfMonthlyEnty($data);
		            }
	             Session::flash('message','Payroll Information Successfully Saved.');
	            }
	      }

        return redirect('pis/vw-payroll-generation-all-employee');

  }


	public function getProcessPayroll()
	{
		$data['monthlist']=DB::table('payroll_details')->select('month_yr')->distinct('month_yr')->get();
		$data['process_payroll']="";
		return view('pis/vw-process-payroll',$data);
	}

	public function vwProcessPayroll(Request $request)
	{
        $data['process_payroll']= DB::table('payroll_details')
        ->where('month_yr','=',$request['month_yr'])
        ->where('proces_status','=','process')
        ->get();
		$data['monthlist']=DB::table('payroll_details')->select('month_yr')->distinct('month_yr')->get();
		return view('pis/vw-process-payroll',$data);
    }

    public function updateProcessPayroll(Request $request)
	{

		foreach($request['payroll_id'] as $payroll){
			$dataUpdate=DB::table('payroll_details')
                ->where('id','=',$payroll)
                ->update(['proces_status' => 'completed']);
		}

		Session::flash('message','Pay Detail Save Successfully.');
		return redirect('pis/vw-process-payroll');
	}

	public function deleteNps($month,$emp_code)
	{
		$result= DB::table('nps_details')
		->where('month_year', $month)
		->where('emp_code', $emp_code)
		->delete();
		
	}

	public function deleteGpf($month,$emp_code)
	{
		$result= DB::table('gpf_details')
		->where('month_year', $month)
		->where('emp_code', $emp_code)
		->delete();
		
	}

	public function deletePayroll($payroll_id)
	{
		$emp_dtl=DB::table('payroll_details')->where('id', $payroll_id)->first();
		$this->deleteNps($emp_dtl->month_yr,$emp_dtl->employee_id);
		$this->deleteGpf($emp_dtl->month_yr,$emp_dtl->employee_id);
		$result= DB::table('payroll_details')->where('id', $payroll_id)->delete();
		Session::flash('message','Pay Detail Deleted Successfully.');
		return redirect('pis/vw-process-payroll');
	}

	public function getArrearPayrollForSingle()
    {
        $data['payroll_rs']=DB::table('payroll_for_arrear')->get();
        return view('pis/view-single-payroll-for-arrear', $data);
    }

    public function viewPayrollForArrear()
    {
        $data['Employee']=DB::table('employee')->where('status','=','active') ->orderBy('emp_fname', 'asc')->get();
        return view('pis/single-payroll-for-arrear', $data);
    }

    public function savePayrollForArrear(Request $request)
    {

        if(empty($request->emp_gross_salary)){
            Session::flash('message','Gross Salary Cannot Blank.');
            return redirect('pis/vw-payroll-generation');
        }

        if(empty($request->emp_total_deduction)){

            Session::flash('message','Total Salary Cannot Blank.');
            return redirect('pis/vw-payroll-generation');
        }

        if(empty($request->emp_net_salary)){

            Session::flash('message','Net Salary Cannot Blank.');
            return redirect('pis/vw-payroll-generation');
        }


        $monthyr=$request->month_yr;
        $mnt_yr=date('m/Y', strtotime("$monthyr"));
        //print_r($mnt_yr); exit;

        $data['employee_id']=$request->empname;
        $data['emp_name']=$request->emp_name;
        $data['emp_designation']=$request->emp_designation;
        $data['emp_basic_pay']=$request->emp_basic_pay;
        $data['month_yr']=$mnt_yr;
        $data['emp_present_days']=$request->emp_present_days;
        $data['emp_cl']=$request->emp_cl;
        $data['emp_el']=$request->emp_el;
        $data['emp_hpl']=$request->emp_hpl;
        $data['emp_absent_days']=$request->emp_absent_days;
        $data['emp_rh']=$request->emp_rh;
        $data['emp_cml']=$request->emp_cml;
        $data['emp_eol']=$request->emp_eol;
        $data['emp_lnd']=$request->emp_lnd;
        $data['emp_maternity_leave']=$request->emp_maternity_leave;
        $data['emp_paternity_leave']=$request->emp_paternity_leave;
        $data['emp_ccl']=$request->emp_ccl;
        $data['emp_el']=$request->emp_el;
        $data['emp_da']=$request->emp_da;
        $data['emp_hra']=$request->emp_hra;
        $data['emp_transport_allowance']=$request->emp_transport_allowance;
        $data['emp_da_on_ta']=$request->emp_da_on_ta;
        $data['emp_ltc']=$request->emp_ltc;
        $data['emp_cea']=$request->emp_cea;
        $data['emp_travelling_allowance']=$request->emp_travelling_allowance;
        $data['emp_daily_allowance']=$request->emp_daily_allowance;
        $data['emp_advance']=$request->emp_advance;
        $data['emp_adjustment']=$request->emp_adjustment;
        $data['emp_medical']=$request->emp_medical;
        $data['emp_spcl']=$request->emp_spcl_allowance;
        $data['emp_cash_handle']=$request->cash_handling_allowance;
        $data['other_addition']=$request->emp_others_addition;
        $data['emp_gpf']=$request->emp_gpf;
        $data['emp_nps']=$request->emp_nps;
        $data['emp_cpf']=$request->emp_cpf;
        $data['emp_gslt']=$request->emp_gslt;
        $data['emp_cess']=$request->emp_cess;
        $data['emp_income_tax']=$request->emp_income_tax;
        $data['emp_pro_tax']=$request->emp_pro_tax;
        $data['emp_absent_deduction']=$request->emp_absent_deduction;
        $data['other_deduction']=$request->emp_others_deduction;
        $data['emp_gross_salary']=$request->emp_gross_salary;
        $data['emp_total_deduction']=$request->emp_total_deduction;
        $data['emp_net_salary']=$request->emp_net_salary;
        $data['proces_status']='process';
        $data['created_at']=date('Y-m-d');

        $date_array=explode("/",$mnt_yr);
        $prevmonth = $date_array[0]-1;
        $previous_month="0".$prevmonth."/".$date_array[1];

        $emplyee_prev_balance = DB::table('nps_details_arrear')
            ->where('emp_code', '=', $request->empname)
            ->where('month_year', '=', $previous_month)
            ->first();

        if(empty($emplyee_prev_balance)){
            $opening_balance=0;
        }else{
            $opening_balance=$emplyee_prev_balance->closing_balance;
        }

        $closing_balance = $opening_balance + $request->emp_nps + $request->emp_nps;

        $employee_pay_structure = DB::table('payroll_for_arrear')
            ->where('employee_id', '=', $request->empname)
            ->where('month_yr', '=', $mnt_yr)
            ->first();

        if(!empty($employee_pay_structure)){
            Session::flash('message','Payroll for this employee already generated for the month of "'.date('m-Y').'". ');
        }else{
            DB::table('payroll_for_arrear')->insert($data);
            DB::table('nps_details_arrear')->insert(
                ['emp_code' => $request->empname, 'month_year' => $mnt_yr ,'opening_balance' => $opening_balance, 'own_share' => $request->emp_nps , 'company_share' => $request->emp_nps ,'closing_balance' => $closing_balance ,'updated_at' => date("Y-m-d H:i:s"),'created_at' => date("Y-m-d H:i:s")]
            );
            Session::flash('message','Payroll Information Successfully Saved.');
        }

        return redirect('pis/vw-payroll-generation-for-arrear');
    }

    public function getArrearPayrollForAll()
    {
        $Payroll_rs=DB::table('payroll_for_arrear')->get();
        return view('pis/payroll-all-for-arrear',compact('Payroll_rs'));
    }

    public function addPayrollallemployeeArrear()
    {
        $result='';
        return view('pis/generate-payroll-all-arrear',compact('result'));
    }

    public function listArearPayrollallemployee(Request $request)
    {
        $payrolldate = explode('/', $request['month_yr']);
        $payroll_date = "0".($payrolldate[0]-2);
        $origDate= $payroll_date."/".$payrolldate[1];
        $current_month_days = cal_days_in_month(CAL_GREGORIAN, $payrolldate[0], $payrolldate[1]);

        $tomonthyr=$payrolldate[1]."-".$payroll_date."-".$current_month_days;
        $formatmonthyr=$payrolldate[1]."-".$payroll_date."-01";

        $rate_rs=DB::table('rate_master')
            ->join('rate_details','rate_details.rate_id','=','rate_master.id')
            ->select('rate_details.*','rate_master.head_name')
            ->get();
        $result='';
        //$empl_code= DB::table('process_attendance')->where('month_yr','=',$origDate)->select('*')->get();

        $emplist= DB::table('employee')
            ->where('status','=','active')
            ->where('emp_status','!=','TEMPORARY')
            ->orderBy('emp_fname', 'asc')
            ->get();


        foreach($emplist as $mainkey=>$emcode)
        {
            $process_attendance=DB::table('process_attendance')
                ->where('process_attendance.employee_code', '=',$emcode->emp_code)
                ->where('process_attendance.month_yr','=',$origDate)
                ->first();

            $employee_rs=DB::table('employee')
                ->join('employee_pay_structure','employee_pay_structure.employee_code','=','employee.emp_code')
                ->where('employee.emp_code', '=',  $emcode->emp_code)
                ->select('employee.*','employee_pay_structure.*')
                ->first();

            $leave_rs=DB::table('leave_apply')
                ->join('leave_type','leave_type.id','=','leave_apply.leave_type')
                ->where('leave_apply.employee_id','=',$emcode->emp_code)
                ->where('leave_apply.status','=','APPROVED')
                ->whereBetween('leave_apply.from_date', array($formatmonthyr, $tomonthyr))
                ->orwhereBetween('leave_apply.to_date', array($formatmonthyr, $tomonthyr))
                ->select('leave_apply.*','leave_type.leave_type_name')
                ->get();

            $previous_payroll=DB::table('payroll_for_arrear')
                ->where('employee_id', '=',$emcode->emp_code)
                ->where('month_yr','<',$request['month_yr'])
                ->orderBy('id', 'desc')
                ->first();

            $tot_cl=$tot_el=$tot_hpl=$tot_rh=$tot_cml=$tot_eol=$tot_ml=$tot_pl=$tot_ccl=$tot_tl=0;
            foreach($leave_rs as $ky => $val){
                if($val->employee_id==$emcode->emp_code)
                {

                    if($val->leave_type_name=='CASUAL LEAVE'){


                        $frommonth = date("m",strtotime($val->from_date));
                        $tomonth = date("m",strtotime($val->to_date));
                        if($frommonth==$tomonth){
                            $tot_cl=$val->no_of_leave;
                        }else{

                            $to = \Carbon\Carbon::createFromFormat('Y-m-d', $tomonthyr);
                            $from = \Carbon\Carbon::createFromFormat('Y-m-d', $val->to_date);
                            $diff_in_days = $to->diffInDays($val->from_date);
                            $tot_cl= ($diff_in_days)+1;

                        }
                    }

                    if($val->leave_type_name=='EARNED LEAVE')
                    {
                        $frommonth = date("m",strtotime($val->from_date));
                        $tomonth = date("m",strtotime($val->to_date));
                        if($frommonth==$tomonth){
                            $tot_el=$val->no_of_leave;
                        }else{
                            $to = \Carbon\Carbon::createFromFormat('Y-m-d', $tomonthyr);
                            $from = \Carbon\Carbon::createFromFormat('Y-m-d', $val->to_date);
                            $diff_in_days = $to->diffInDays($val->from_date);
                            $tot_el= ($diff_in_days)+1;

                        }
                    }

                    if($val->leave_type_name=='HALF PAY LEAVE')
                    {

                        $frommonth = date("m",strtotime($val->from_date));
                        $tomonth = date("m",strtotime($val->to_date));
                        if($frommonth==$tomonth){
                            $tot_hpl=$val->no_of_leave;
                        }else{
                            $to = \Carbon\Carbon::createFromFormat('Y-m-d', $tomonthyr);
                            $from = \Carbon\Carbon::createFromFormat('Y-m-d', $val->to_date);
                            $diff_in_days = $to->diffInDays($val->from_date);
                            $tot_hpl= ($diff_in_days)+1;

                        }
                    }

                    if($val->leave_type_name=='MEDICAL LEAVE')
                    {
                        $frommonth = date("m",strtotime($val->from_date));
                        $tomonth = date("m",strtotime($val->to_date));
                        if($frommonth==$tomonth){
                            $tot_ml=$val->no_of_leave;
                        }else{
                            $to = \Carbon\Carbon::createFromFormat('Y-m-d', $tomonthyr);
                            $from = \Carbon\Carbon::createFromFormat('Y-m-d', $val->to_date);
                            $diff_in_days = $to->diffInDays($val->from_date);
                            $tot_ml= ($diff_in_days)+1;

                        }
                    }


                    if($val->leave_type_name=='TOUR LEAVE')
                    {
                        $frommonth = date("m",strtotime($val->from_date));
                        $tomonth = date("m",strtotime($val->to_date));
                        if($frommonth==$tomonth){
                            $tot_tl=$val->no_of_leave;
                        }else{
                            $to = \Carbon\Carbon::createFromFormat('Y-m-d', $tomonthyr);
                            $from = \Carbon\Carbon::createFromFormat('Y-m-d', $val->to_date);
                            $diff_in_days = $to->diffInDays($val->from_date);
                            $tot_tl= ($diff_in_days)+1;

                        }
                    }

                }
            }


            if(empty($process_attendance)){

                $calculate_basic_salary=$employee_rs->basic_pay;
                $no_of_working_days=0;
                $no_of_present=0;
                $no_of_days_absent=0;
                $no_of_days_salary=0;


            }else{

                $calculate_basic_salary=round(($employee_rs->basic_pay / $current_month_days) * ($process_attendance->no_of_working_days-$process_attendance->no_of_days_absent));

                $no_of_working_days=$process_attendance->no_of_working_days;
                $no_of_present=$process_attendance->no_of_present;
                $no_of_days_absent=$process_attendance->no_of_days_absent;
                $no_of_days_salary=$process_attendance->no_of_days_salary;

            }

            $ta_rate=0;
            $da_on_ta=0;


            //$ta_value = DB::select(DB::raw("SELECT *FROM rate_details WHERE ('".$calculate_basic_salary."' between min_basic AND max_basic) AND rate_id = 3 order by id desc LIMIT 1"));

            $ta_value = DB::table('rate_details')
                ->where('rate_id','=',3)
                ->where(function ($query) use ($calculate_basic_salary) {
                    $query->where('min_basic', '<=', $calculate_basic_salary);
                    $query->where('max_basic', '>=', $calculate_basic_salary);
                })
                ->first();

            $da_value = DB::table('rate_details')->where('rate_id','=','2')->first();

            if($emcode->emp_code=='6678'){

                $ta_rate=3600;
                $da_on_ta=432;

            }else{

                if($ta_value){
                    if($no_of_days_absent>0){

                        $absent_deduction=round(($ta_value->inrupees / $current_month_days) * $no_of_days_absent);

                        if($emcode->emp_physical_status=='yes'){
                            $ta_rate = ($ta_value->inrupees-$absent_deduction)*2;
                        }else{
                            $ta_rate = ($ta_value->inrupees-$absent_deduction);
                        }

                    }else{

                        if($emcode->emp_physical_status=='yes'){
                            $ta_rate = $ta_value->inrupees*2;
                        }else{

                            $ta_rate=$ta_value->inrupees;
                        }
                    }

                    $da_on_ta=$ta_rate*$da_value->inpercentage/100;
                }
            }






            foreach($rate_rs as $ratekey => $rateval){


                if($rateval->head_name=='HRA'){
                    if($employee_rs->hra=='1'){
                        $actual_hra=$calculate_basic_salary*$rateval->inpercentage/100;
                        if($actual_hra<=5400){
                            $hra='5400';

                        }else{
                            $hra=$actual_hra;
                        }
                    }else{
                        $hra=0;
                    }
                }


                if($rateval->head_name=='DA'){

                    if($employee_rs->da=='1')
                    {
                        $da=round($calculate_basic_salary*$rateval->inpercentage/100);
                    }else{

                        $da=0;
                    }
                }

                if($rateval->head_name=='LTC'){
                    if($employee_rs->ltc=='1'){
                        $ltc=$rateval->inpercentage;
                    }else{
                        $ltc=0;
                    }
                }

                if($rateval->head_name=='CEA'){
                    if($employee_rs->cea=='1'){
                        $cea=$rateval->inpercentage;

                    }else{
                        $cea=0;
                    }
                }

                if($rateval->head_name=='TR_A'){
                    if($employee_rs->travelling_allowance=='1'){
                        $tr_a=$rateval->inpercentage;
                    }else{
                        $tr_a=0;
                    }
                }

                if($rateval->head_name=='DLA'){
                    if($employee_rs->daily_allowance=='1'){
                        $dla=$rateval->inpercentage;
                    }else{
                        $dla=0;
                    }
                }

                if($rateval->head_name=='ADV'){
                    if($employee_rs->advance=='1'){
                        $adv=$rateval->inpercentage;
                    }else{
                        $adv=0;
                    }
                }

                if($rateval->head_name=='ADJ_ADV'){
                    if($employee_rs->adjustment_advance=='1'){
                        $adjadv=$rateval->inpercentage;
                    }else{
                        $adjadv=0;
                    }
                }

                if($rateval->head_name=='MR'){
                    if($employee_rs->medical_reimbursement=='1'){
                        $mr=$rateval->inpercentage;
                    }else{
                        $mr=0;
                    }
                }

                if($rateval->head_name=='SA'){
                    if($employee_rs->spcl_allowance=='1'){

                        //$sa=$rateval->inpercentage;
                        if(!empty($previous_payroll->emp_spcl)){
                            $sa= $previous_payroll->emp_spcl;

                        }else{
                            $sa= 0;
                        }
                    }else{
                        $sa=0;
                    }
                }

                if($rateval->head_name=='CHA'){
                    if($employee_rs->cash_handling_allowance=='1'){
                        if(!empty($previous_payroll->emp_cash_handle)){
                            $cha= $previous_payroll->emp_cash_handle;

                        }else{
                            $cha=0;
                        }
                    }else{
                        $cha=0;
                    }
                }


                if($rateval->head_name=='NPS'){

                    if($employee_rs->nps=='1'){
                        $nps=$calculate_basic_salary + $da;
                        $tot_nps=round($nps*$rateval->inpercentage/100);

                    }else{

                        $tot_nps=0;
                    }
                }


                if($rateval->head_name=='GSLI'){

                    if($employee_rs->gsli=='1'){
                        //$gsli=$rateval->inrupees;
                        if(!empty($previous_payroll->emp_gslt)){
                            $gsli= $previous_payroll->emp_gslt;
                        }else{
                            $gsli=0;
                        }

                    }else{
                        $gsli=0;
                    }
                }


                if($rateval->head_name=='GPF'){

                    if($employee_rs->gpf=='1'){

                        if(!empty($previous_payroll->emp_gpf)){
                            $gpf= $previous_payroll->emp_gpf;
                        }else{
                            $gpf= 0;
                        }

                    }else{
                        $gpf=0;
                    }
                }




                if($employee_rs->income_tax=='1'){

                    if(!empty($previous_payroll->emp_income_tax)){
                        $income_tax= $previous_payroll->emp_income_tax;
                    }else{
                        $income_tax= 0;
                    }

                }else{
                    $income_tax=0;
                }

                if($employee_rs->cess=='1'){
                    //$cess=$rateval->inpercentage;
                    if(!empty($previous_payroll->emp_cess)){
                        $cess= $previous_payroll->emp_cess;
                    }else{
                        $cess= 0;
                    }
                }else{
                    $cess=0;
                }



                if($employee_rs->other_deduction=='1'){

                    if(!empty($previous_payroll->other_deduction)){
                        $other2= $previous_payroll->other_deduction;
                    }else{
                        $other2= 0;
                    }
                }else{
                    $other2=0;
                }

            }

            $total_gross=round($calculate_basic_salary+$da+$hra+$da_on_ta+$ta_rate+$ltc+$cea+$tr_a+$dla+$adv+$adjadv+$mr+$sa+$cha);

            foreach($rate_rs as $ratekey => $rateval){
                if($rateval->head_name=='PTAX'){
                    if($employee_rs->professional_tax=='1'){

                        if(($total_gross>=$rateval->min_basic) && ($total_gross<=$rateval->max_basic))
                        {
                            $ptax=$rateval->inrupees;

                        }

                    }else{
                        $ptax=0;
                    }
                }
            }

            $total_deduction=round($tot_nps+$gsli+$ptax+$gpf+$income_tax+$cess+$other2);
            $netsalary=round($total_gross-$total_deduction);
            $result.='<tr id="'.$emcode->emp_code.'">
                            <td><div class="checkbox"><label><input type="checkbox" name="empcode_check" value="'.$emcode->emp_code.'" class="checkhour"></label></div></td>
                            <td><input type="text" readonly class="form-control" name="emp_code[]" style="width:100px;" value="'.$employee_rs->emp_code.'"></td>
                            <td><input type="text" readonly class="form-control" name="emp_name[]" style="width:100px;" value="'.$employee_rs->emp_fname.' '.$employee_rs->emp_mname.' '.$employee_rs->emp_lname.'"></td>
                            <td><input type="text" readonly class="form-control" name="emp_designation[]" style="width:100px;" value="'.$employee_rs->emp_designation.'"></td>
                            <td><input type="text" readonly class="form-control" name="month_yr[]" style="width:70px;" value="'.$request['month_yr'].'"></td>
                            <td><input type="text" readonly class="form-control" name="emp_basic_pay[]" style="width:100px;" value="'.$calculate_basic_salary.'"  id="emp_basic_pay_'.$emcode->emp_code.'" ></td>
                            <td><input type="text" readonly class="form-control" name="emp_no_of_working[]" value="'.$no_of_working_days.'"></td>
                            <td><input type="text" readonly class="form-control" name="emp_no_of_present[]" value="'.$no_of_present.'"></td>
                            <td><input type="text" readonly class="form-control" name="emp_no_of_days_absent[]" value="'.$no_of_days_absent.'"></td>
              <td><input type="text" readonly class="form-control" name="emp_no_of_days_salary[]" value="'.$no_of_days_salary.'"></td>
                            <td><input type="text" readonly class="form-control" name="emp_tot_cl[]" style="width:50px;" value="'.$tot_cl.'"></td>  
                            <td><input type="text" readonly class="form-control" name="emp_tot_el[]" style="width:50px;" value="'.$tot_el.'"></td>            
                            <td><input type="text" readonly class="form-control" name="emp_tot_hpl[]" style="width:50px;" value="'.$tot_hpl.'"></td>
                            <td><input type="text" readonly class="form-control" name="emp_tot_rh[]" style="width:50px;" value="'.$tot_rh.'"></td>  
                            <td><input type="text" readonly class="form-control" name="emp_tot_cml[]" style="width:50px;" value="'.$tot_cml.'"></td>  
                            <td><input type="text" readonly class="form-control" name="emp_tot_eol[]" style="width:50px;" value="'.$tot_eol.'"></td>
                            <td><input type="text" readonly class="form-control" name="emp_lnd[]" value="0"></td>
                            <td><input type="text" readonly class="form-control" name="emp_tot_ml[]" style="width:50px;" value="'.$tot_ml.'"></td>  
                            <td><input type="text" readonly class="form-control" name="emp_tot_pl[]" style="width:50px;" value="'.$tot_pl.'"></td>   
                            <td><input type="text" readonly class="form-control" name="emp_totccl[]" style="width:50px;" value="'.$tot_ccl.'"></td>
                            <td><input type="text" readonly class="form-control" name="emp_tour_leave[]" style="width:50px;" value="'.$tot_tl.'"></td>
                            <td><input type="text" class="form-control" name="emp_da[]" value="'.$da.'" readonly ></td>
                            <td><input type="text" class="form-control" name="emp_hra[]" value="'.$hra.'" readonly></td>
                            <td><input type="text" class="form-control" name="emp_ta[]" value="'.$ta_rate.'" readonly></td>
                            <td><input type="text" class="form-control" name="emp_daonta[]" value="'.$da_on_ta.'" readonly></td>
                            <td><input type="text" class="form-control" id="ltc_'.$emcode->emp_code.'" name="emp_ltc[]" value="'.$ltc.'"></td>
                            <td><input type="text" class="form-control" name="emp_cha[]" value="'.$cha.'" id="cha_'.$emcode->emp_code.'" ></td>
                            <td><input type="text" class="form-control" name="emp_tra[]" value="'.$tr_a.'" id="tra_'.$emcode->emp_code.'"></td>
                            <td><input type="text" class="form-control" name="emp_dla[]" value="'.$dla.'" id="dla_'.$emcode->emp_code.'" ></td>
                            <td><input type="text" class="form-control" name="emp_spcl_allowance[]" value="'.$sa.'" id="spcl_allowance_'.$emcode->emp_code.'"></td>
                            <td><input type="text" class="form-control" name="emp_adv[]" value="'.$adv.'" id="adv_'.$emcode->emp_code.'"></td>
                            <td><input type="text" class="form-control" name="emp_adjadv[]" value="'.$adjadv.'" id="adjadv_'.$emcode->emp_code.'" ></td>
                            <td><input type="text" class="form-control" name="emp_mr[]" value="'.$mr.'" id="mr_'.$emcode->emp_code.'" ></td> 
                            <td><input type="text" class="form-control" name="emp_other1[]" value="0" style="width:50px;" id="other1_'.$emcode->emp_code.'"></td>
                            <td><input type="text" class="form-control" name="emp_gpf[]" style="width:50px;" value="'.$gpf.'" readonly ></td>
                            <td><input type="text" class="form-control" name="emp_nps[]" style="width:50px;" value="'.$tot_nps.'" readonly id="nps_'.$emcode->emp_code.'" ></td>
                            <td><input type="text" class="form-control" name="emp_cpf[]" style="width:50px;" value="0" readonly id="cpf_'.$emcode->emp_code.'"></td>
                            <td><input type="text" class="form-control" name="emp_gsli[]" style="width:50px;" value="'.$gsli.'" id="gsli_'.$emcode->emp_code.'" readonly></td>
                            <td><input type="text" class="form-control" name="emp_income_tax[]" style="width:50px;" value="'.$income_tax.'" id="income_tax_'.$emcode->emp_code.'" readonly></td>
                            <td><input type="text" class="form-control" name="emp_cess[]" value="'.$cess.'" id="cess_'.$emcode->emp_code.'" readonly></td>
                            <td><input type="text" class="form-control" name="emp_ptax[]" value="'.$ptax.'" id="tax_'.$emcode->emp_code.'" readonly></td>
                            <td><input type="text" class="form-control" name="emp_other2[]" style="width:50px;" value="'.$other2.'" id="other2_'.$emcode->emp_code.'"></td>
                            <td><input type="text" class="form-control" name="emp_total_gross[]" style="width:120px;" value="'.$total_gross.'" id="emp_total_gross_'.$emcode->emp_code.'" readonly ></td>
                            <td><input type="text" class="form-control" name="emp_total_deduction[]" style="width:120px;" value="'.$total_deduction.'" id="emp_total_deduction_'.$emcode->emp_code.'" readonly></td>
                            <td><input type="text" class="form-control" name="emp_net_salary[]" style="width:120px;" value="'.$netsalary.'" id="emp_net_salary_'.$emcode->emp_code.'" readonly></td>
                </tr> ';

        }

        return view('pis/generate-payroll-all-arrear',compact('result'));
    }

    public function SaveArrearPayrollAll(Request $request)
    {
        foreach($request->emp_code as $key=>$value)
        {
            $data['employee_id']=$value;
            $data['emp_name']=$request->emp_name[$key];
            $data['emp_designation']=$request->emp_designation[$key];
            $data['emp_basic_pay']=$request->emp_basic_pay[$key];
            $data['month_yr']=$request->month_yr[$key];
            $data['emp_present_days']=$request->emp_no_of_present[$key];
            $data['emp_cl']=$request->emp_tot_cl[$key];
            $data['emp_el']=$request->emp_tot_el[$key];
            $data['emp_hpl']=$request->emp_tot_hpl[$key];
            $data['emp_absent_days']=$request->emp_no_of_days_absent[$key];
            $data['emp_rh']=$request->emp_tot_rh[$key];
            $data['emp_cml']=$request->emp_tot_cml[$key];
            $data['emp_eol']=$request->emp_tot_eol[$key];
            $data['emp_lnd']=$request->emp_lnd[$key];
            $data['emp_maternity_leave']=$request->emp_tot_ml[$key];
            $data['emp_paternity_leave']=$request->emp_tot_pl[$key];
            $data['emp_ccl']=$request->emp_totccl[$key];
            $data['emp_da']=$request->emp_da[$key];
            $data['emp_hra']=$request->emp_hra[$key];
            $data['emp_transport_allowance']=$request->emp_ta[$key];
            $data['emp_da_on_ta']=$request->emp_daonta[$key];
            $data['emp_ltc']=$request->emp_ltc[$key];
            $data['emp_cash_handle']=$request->emp_cha[$key];
            $data['emp_travelling_allowance']=$request->emp_tra[$key];
            $data['emp_spcl']=$request->emp_spcl_allowance[$key];
            $data['emp_daily_allowance']=$request->emp_dla[$key];
            $data['emp_advance']=$request->emp_adv[$key];
            $data['emp_adjustment']=$request->emp_adjadv[$key];
            $data['emp_medical']=$request->emp_mr[$key];
            $data['emp_gpf']=$request->emp_gpf[$key];
            $data['emp_nps']=$request->emp_nps[$key];
            $data['emp_cpf']=$request->emp_cpf[$key];
            $data['emp_gslt']=$request->emp_gsli[$key];
            $data['emp_income_tax']=$request->emp_income_tax[$key];
            $data['emp_cess']=$request->emp_cess[$key];
            $data['emp_pro_tax']=$request->emp_ptax[$key];
            $data['other_deduction']=$request->emp_other2[$key];
            $data['emp_gross_salary']=$request->emp_total_gross[$key];
            $data['emp_total_deduction']=$request->emp_total_deduction[$key];
            $data['emp_net_salary']=$request->emp_net_salary[$key];
            $data['proces_status']='process';
            $data['created_at']=date('Y-m-d');

            $date_array=explode("/",$request->month_yr[$key]);
            $prevmonth = $date_array[0]-1;
            $previous_month="0".$prevmonth."/".$date_array[1];

            $emplyee_prev_balance = DB::table('nps_details_arrear')
                ->where('emp_code', '=', $value)
                ->where('month_year', '=', $previous_month)
                ->first();

            if(empty($emplyee_prev_balance)){
                $opening_balance=0;
            }else{
                $opening_balance=$emplyee_prev_balance->closing_balance;
            }

            $closing_balance = $opening_balance + $request->emp_nps[$key] + $request->emp_nps[$key];

            $employee_pay_structure = DB::table('payroll_for_arrear')
                ->where('employee_id', '=', $value)
                ->where('month_yr', '=', $request->month_yr[$key])
                ->first();

            if(!empty($employee_pay_structure)){
                Session::flash('message','Already Entry in Table');
            }else{
                DB::table('payroll_for_arrear')->insert($data);
                DB::table('nps_details_arrear')->insert(
                    ['emp_code' => $value, 'month_year' => $request->month_yr[$key] ,'opening_balance' => $opening_balance,'own_share' => $request->emp_nps[$key] , 'company_share' => $request->emp_nps[$key] ,'closing_balance' => $closing_balance ,'updated_at' => date("Y-m-d H:i:s"),'created_at' => date("Y-m-d H:i:s")]
                );
            }


        }
        Session::flash('message','Payroll Information Successfully Saved.');
        return redirect('pis/vw-payroll-generation-all-employee-for-arrear');

    }

    public function viewArearBill()
    {
        $data['arears'] = DB::table('rate_master_history')->where('arear_app_status', 'NO')->get();
        return view('pis/arear-dashboard', $data);
    }

    public function getArrearBill()
    {

        $data['rate_rs']=DB::table('rate_master')->where('head_type','=','A')
            ->get();

        // dd($data);
        return view('pis/arear', $data);
    }

	public function editArrearBill($id)
	{
		// echo $id; exit;
		$data['rate_rs']=DB::table('rate_master')->where('head_type','=','A')
			->get();
		$data['arear_details']=DB::table('rate_master_history')->where('id','=',$id)->first();

			//print_r($data['arear_details']->head_id); exit;
		return view('pis/arear', $data);
	}

	public function saveArearBill(Request $request)
	{
//		 dd($request);
		$updateTime = new \DateTime();
        $updated_at = $updateTime->format("Y-m-d H:i:s");

     	$curTime = new \DateTime();
        $created_at = $curTime->format("Y-m-d");

        $head_name = Rate::where('id', $request->head_name)->first();


        $request->validate([
        	'head_name' => 'required',
        	'prev_rate' => 'required',
        	'rate_diff' => 'required',
        	'from_date' => 'required',
        	'to_date' => 'required',
        ]);

        if(empty($request->id))
        {
        	$data=array(
        		'head_id' => $request->head_name,
        		'head_name' => $head_name->head_name,
        		'old_rate' => $request->prev_rate,
        		'new_rate' => $request->new_rate,
        		'rate_diff' => $request->rate_diff,
        		'from_date' => $request->from_date,
        		'to_date' => $request->to_date,
        		'day_diff' => $request->days,
        		'arear_app_status' => 'NO',
        		'created_at' => $created_at,

        	);
        }
        else {
        	$data2=array(
        		'head_id' => $request->head_name,
        		'head_name' => $head_name->head_name,
        		'old_rate' => $request->prev_rate,
        		'new_rate' => $request->new_rate,
        		'rate_diff' => $request->rate_diff,
        		'from_date' => $request->from_date,
        		'to_date' => $request->to_date,
        		'day_diff' => $request->days,
        		'arear_app_status' => 'NO',
        		'updated_at' => $updated_at,

        	);
        }

        if(empty($request->id))
        {
             DB::table('rate_master_history')->insert($data);

             if($request->head_name == 2)
             {
                 DB::table('rate_details')
                     ->where('rate_id', $request->head_name)
                     ->update(['inpercentage' => $request->new_rate]);

                 DB::table('rate_details')
                     ->where('rate_id', 4)
                     ->update(['inpercentage' => $request->new_rate]);
             }
             else
             {
                 DB::table('rate_details')
                     ->where('rate_id', $request->head_name)
                     ->update(['inpercentage' => $request->new_rate]);
             }

	   	}else {
        	DB::table('rate_master_history')
        	->where('id', $request->id)
        	->update($data2);
        	DB::table('rate_details')
        	->where('rate_id', $request->head_name)
        	->update(['inpercentage' => $request->new_rate]);
	   	}

	   	return redirect('pis/arear-dashboard');


	}

	public function getArearCalcDashboard()
	{

		$data['result'] = '';
//		$data['arears'] = DB::table('rate_master')->select('*')->where('head_type', 'A')->get();
		 $data['arears'] = DB::table('rate_master_history')->get();
		$data['employeeslist']=DB::table('employee')->where('emp_status', 'REGULAR')->orWhere('emp_status', 'PROBATIONARY EMPLOYEE')->get();
//		 print_r($data['arears']); exit;
		return view('pis/arear-calculation', $data);
	}

	public function saveArearCalcDashboard(Request $request)
	{
//		 echo "<pre>"; print_r($request->all()); exit;

		$data['result'] = '';
		$arrear = DB::table('rate_master_history')
						->where('id', $request->head_name)
                        ->where('arear_app_status', 'NO')
						->orderBy('id', 'DESC')
						->first();

		$from_date = $arrear->from_date;
		$to_date = $arrear->to_date;

        $data['arears'] = DB::table('rate_master_history')->get();
		$data['head_id']= $arrear->head_id;
		$data['employeeslist']=DB::table('employee')->get();




		if($request->emp_code == '0')
		{
			$employee_details = DB::table('employee')
								->join('employee_pay_structure', 'employee.emp_code', '=', 'employee_pay_structure.employee_code')
								->select('employee.emp_code', 'employee.emp_fname', 'employee.emp_mname', 'employee.emp_lname', 'employee.emp_designation', 'employee_pay_structure.basic_pay')
								->where('emp_status', 'REGULAR')->orWhere('emp_status', 'PROBATIONARY EMPLOYEE')
								->get();

            $i = 1;
            foreach($employee_details as $key=>$value){
                $da_difference=0;
                $previous_da=0;
                $current_da=0;
                $previous_da_on_ta = 0;
                $current_da_on_ta = 0;
                $da_on_ta_diff = 0;
                $total_arrear = 0;
                $previous_nps = 0;
                $current_nps = 0;
                $nps_amt = 0;
                $previous_p_tax = 0;
                $current_p_tax = 0;
                $p_tax_amt = 0;
                $payroll_details = DB::table('payroll_details')
                    ->leftJoin('employee', 'payroll_details.employee_id', '=', 'employee.emp_code' )
                    ->select('payroll_details.emp_da', 'payroll_details.employee_id', 'payroll_details.emp_da_on_ta', 'payroll_details.emp_nps', 'payroll_details.emp_pro_tax')
                    ->where('payroll_details.employee_id', $value->emp_code)
                    ->whereBetween('payroll_details.created_at', [$from_date, $to_date])
                    ->get();
//                    print_r($payroll_details);
                $payroll_for_arrear = DB::table('payroll_for_arrear')
                    ->leftJoin('employee', 'payroll_for_arrear.employee_id', '=', 'employee.emp_code' )
                    ->select('payroll_for_arrear.emp_da', 'payroll_for_arrear.employee_id', 'payroll_for_arrear.emp_da_on_ta', 'payroll_for_arrear.emp_nps', 'payroll_for_arrear.emp_pro_tax')
                    ->where('payroll_for_arrear.employee_id', $value->emp_code)
                    ->whereBetween('payroll_for_arrear.created_at', [$from_date, $to_date])
                    ->get();

                foreach ($payroll_details as $payrollkey=>$payrollvalue) {

                    $previous_da += round($payrollvalue->emp_da);
                    $previous_da_on_ta += round($payrollvalue->emp_da_on_ta);
                    $previous_nps += round($payrollvalue->emp_nps);
                    $previous_p_tax += round($payrollvalue->emp_pro_tax);
                }

                foreach($payroll_for_arrear as $payrollarrerkey=>$payrollarrervalue){

                    $current_da += round($payrollarrervalue->emp_da);
                    $current_da_on_ta += round($payrollarrervalue->emp_da_on_ta);
                    $current_nps += round($payrollarrervalue->emp_nps);
                    $current_p_tax += round($payrollarrervalue->emp_pro_tax);
                }

                $da_difference = ($current_da - $previous_da);
                $da_on_ta_diff = ($current_da_on_ta - $previous_da_on_ta);
                $nps_amt = ($current_nps - $previous_nps);
                $p_tax_amt = ($current_p_tax - $previous_p_tax);

                $total_arrear = (($da_difference + $da_on_ta_diff) - ($nps_amt + $p_tax_amt));


                $data['result'].='<tr style="text-align:center;">
                        <td>'.$i.'<input type="hidden" name="emp_id[]" value="'.$arrear->id.'" /></td>
                        <td>'.$value->emp_code.'<input type="hidden" name="empcode[]" value="'.$value->emp_code.'" /><input type="hidden" name="empnps[]" value="'.$nps_amt.'" /><input type="hidden" name="empprotax[]" value="'.$p_tax_amt.'" /><input type="hidden" name="recvda[]" value="'.$previous_da.'" /><input type="hidden" name="enhncda[]" value="'.$current_da.'" /></td>
                        <td>'.$value->emp_fname." ".$value->emp_mname." ".$value->emp_lname.'<input type="hidden" name="empname[]" value="'.$value->emp_fname." ".$value->emp_mname." ".$value->emp_lname.'" /></td>
                        <td>'.$value->emp_designation.'<input type="hidden" name="empdesg[]" value="'.$value->emp_designation.'" /></td>
                        <td>'.$arrear->old_rate.'<input type="hidden" name="oldrate[]" value="'.$arrear->old_rate.'" /></td>
                        <td>'.$arrear->new_rate.'<input type="hidden" name="newrate[]" value="'.$arrear->new_rate.'" /><input type="hidden" name="recvta[]" value="'.$previous_da_on_ta.'" /><input type="hidden" name="enhncta[]" value="'.$current_da_on_ta.'" /></td>
                        <td>'.$da_difference.'<input type="hidden" name="daarrear[]" value="'.$da_difference.'" /></td>
                        <td>'.$arrear->old_rate.'<input type="hidden" name="oldtarate[]" value="'.$arrear->old_rate.'" /><input type="hidden" name="recvnps[]" value="'.$previous_nps.'" /><input type="hidden" name="enhncnps[]" value="'.$current_nps.'" /></td>
                        <td>'.$arrear->new_rate.'<input type="hidden" name="newtarate[]" value="'.$arrear->new_rate.'" /></td>
                        <td>'.$da_on_ta_diff.'<input type="hidden" name="taondaarear[]" value="'.$da_on_ta_diff.'" /><input type="hidden" name="recvptax[]" value="'.$previous_p_tax.'" /><input type="hidden" name="enhncptax[]" value="'.$current_p_tax.'" /></td>
                        <td>'.$total_arrear.'<input type="hidden" name="totalarrear[]" value="'.$total_arrear.'" /></td>
                        <td>'.$arrear->from_date.'<input type="hidden" name="fromDate[]" value="'.$arrear->from_date.'" /></td>
                        <td>'.$arrear->to_date.'<input type="hidden" name="toDate[]" value="'.$arrear->to_date.'" /></td>
                    </tr>';
                $i++;
            }


		}else{

            $payroll_details = DB::table('payroll_details')
                ->leftJoin('employee', 'payroll_details.employee_id', '=', 'employee.emp_code' )
                ->select('payroll_details.*', 'employee.emp_fname', 'employee.emp_mname', 'employee.emp_lname', 'employee.emp_designation', 'employee.emp_code')
                ->where('payroll_details.employee_id', $request->emp_code)
                ->whereBetween('payroll_details.created_at', [$from_date, $to_date])
                ->get();

            $payroll_for_arrear = DB::table('payroll_for_arrear')
                ->leftJoin('employee', 'payroll_for_arrear.employee_id', '=', 'employee.emp_code' )
                //->select('payroll_for_arrear.emp_da', 'payroll_for_arrear.employee_id')
                ->where('payroll_for_arrear.employee_id', $request->emp_code)
                ->whereBetween('payroll_for_arrear.created_at', [$from_date, $to_date])
                ->get();

            $previous_da = 0;
            $current_da = 0;
            $previous_da_on_ta = 0;
            $current_da_on_ta = 0;
            $da_difference = 0;
            $da_on_ta_diff = 0;
            $total_arrear = 0;
            $previous_nps = 0;
            $current_nps = 0;
            $nps_amt = 0;
            $previous_p_tax = 0;
            $current_p_tax = 0;
            $p_tax_amt = 0;

            $i = 1;
            foreach ($payroll_details as $payrollkey=>$payrollvalue) {

                $previous_da += round($payrollvalue->emp_da);
                $previous_da_on_ta += round($payrollvalue->emp_da_on_ta);
                $previous_nps += round($payrollvalue->emp_nps);
                $previous_p_tax += round($payrollvalue->emp_pro_tax);
            }


            foreach($payroll_for_arrear as $payrollarrerkey=>$payrollarrervalue){

                $current_da += round($payrollarrervalue->emp_da);
                $current_da_on_ta += round($payrollarrervalue->emp_da_on_ta);
                $current_nps += round($payrollarrervalue->emp_nps);
                $current_p_tax += round($payrollarrervalue->emp_pro_tax);

            }

            $da_difference = ($current_da - $previous_da);
            $da_on_ta_diff = ($current_da_on_ta - $previous_da_on_ta);
            $nps_amt = ($current_nps - $previous_nps);
            $p_tax_amt = ($current_p_tax - $previous_p_tax);

            $total_arrear = (($da_difference + $da_on_ta_diff) - ($nps_amt + $p_tax_amt));

            //echo $da_difference =$current_da - $previous_da; exit;

            $data['result'].='<tr style="text-align:center;">
                        <td>'.$i.'<input type="hidden" name="emp_id[]" value="'.$arrear->id.'" /></td>
                        <td>'.$payrollvalue->emp_code.'<input type="hidden" name="empcode[]" value="'.$payrollvalue->emp_code.'" /><input type="hidden" name="empnps[]" value="'.$nps_amt.'" /><input type="hidden" name="empprotax[]" value="'.$p_tax_amt.'" /><input type="hidden" name="recvda[]" value="'.$previous_da.'" /><input type="hidden" name="enhncda[]" value="'.$current_da.'" /></td>
                        <td>'.$payrollvalue->emp_fname." ".$payrollvalue->emp_mname." ".$payrollvalue->emp_lname.'<input type="hidden" name="empname[]" value="'.$payrollvalue->emp_fname." ".$payrollvalue->emp_mname." ".$payrollvalue->emp_lname.'" /></td>
                        <td>'.$payrollvalue->emp_designation.'<input type="hidden" name="empdesg[]" value="'.$payrollvalue->emp_designation.'" /></td>
                        <td>'.$arrear->old_rate.'<input type="hidden" name="oldrate[]" value="'.$arrear->old_rate.'" /></td>
                        <td>'.$arrear->new_rate.'<input type="hidden" name="newrate[]" value="'.$arrear->new_rate.'" /><input type="hidden" name="recvta[]" value="'.$previous_da_on_ta.'" /><input type="hidden" name="enhncta[]" value="'.$current_da_on_ta.'" /></td>
                        <td>'.$da_difference.'<input type="hidden" name="daarrear[]" value="'.$da_difference.'" /></td>
                        <td>'.$arrear->old_rate.'<input type="hidden" name="oldtarate[]" value="'.$arrear->old_rate.'" /><input type="hidden" name="recvnps[]" value="'.$previous_nps.'" /><input type="hidden" name="enhncnps[]" value="'.$current_nps.'" /></td>
                        <td>'.$arrear->new_rate.'<input type="hidden" name="newtarate[]" value="'.$arrear->new_rate.'" /></td>
                        <td>'.$da_on_ta_diff.'<input type="hidden" name="taondaarear[]" value="'.$da_on_ta_diff.'" /><input type="hidden" name="recvptax[]" value="'.$previous_p_tax.'" /><input type="hidden" name="enhncptax[]" value="'.$current_p_tax.'" /></td>
                        <td>'.$total_arrear.'<input type="hidden" name="totalarrear[]" value="'.$total_arrear.'" /></td>
                        <td>'.$arrear->from_date.'<input type="hidden" name="fromDate[]" value="'.$arrear->from_date.'" /></td>
                        <td>'.$arrear->to_date.'<input type="hidden" name="toDate[]" value="'.$arrear->to_date.'" /></td>
                    </tr>';
            $i++;

		}








		return view('pis/arear-calculation',$data);
	}

	public function saveArearCalcMaster(Request $request)
	{

//	    echo "<pre>"; print_r($request->all()); exit;
		$updateTime = new \DateTime();
        $updated_at = $updateTime->format("Y-m-d H:i:s");

     	$curTime = new \DateTime();
        $created_at = $curTime->format("Y-m-d");

//        $nps_rate = DB::table('rate_details')->select('*')->where('rate_id', '14')->first();

        if($request->head_id == '2')
        {
        	foreach($request['empcode'] as $key=>$value){

        	// print_r($key); print_r($value); exit;
//	        	$recv_amount=(($request['empbasic'][$key] * $request['oldrate'][$key])/100);
//	        	$enhnc_amount = (($request['empbasic'][$key] * $request['newrate'][$key])/100);
//	        	$rcv_nps_amount = round((((($request['empbasic'][$key] + $recv_amount) * ($nps_rate->inpercentage))/100)/30) * $request['day_diff'][$key]);
//	        	$enhnc_nps_amount = round((((($request['empbasic'][$key] + $enhnc_amount) * ($nps_rate->inpercentage))/100)/30) * $request['day_diff'][$key]);
//	        	$nps_amount = round($enhnc_nps_amount - $rcv_nps_amount);
////	        	print_r($request['empbasic'][$key]); echo "--"; print_r($recv_amount); echo "=="; print_r($nps_rate->inpercentage); echo "++"; print_r($request['day_diff'][$key]); echo "end"; exit;
//
//                $recv_ta_amount=(($request['empta'][$key] * $request['oldrate'][$key])/100);
//                $enhnc_ta_amount = (($request['empta'][$key] * $request['newrate'][$key])/100);
//
//                $da_on_ta_amt = round($enhnc_ta_amount - $recv_ta_amount);
//                print_r($da_on_ta_amt); echo "<br><br>";

	        	DB::table('arear_calc_master')->insert(
				    [
				    	'head_id' => $request->head_id,
				    	'emp_code' => $value,
				    	'emp_name' => $request['empname'][$key],
				    	'emp_desig' => $request['empdesg'][$key],
				    	'emp_basic' => 0,
				    	'old_rate' => $request['oldrate'][$key],
				    	'new_rate' => $request['newrate'][$key],
                        'old_ta_rate' => $request['oldtarate'][$key],
                        'new_ta_rate' => $request['newtarate'][$key],
				    	'recv_amt' => $request['recvda'][$key],
				    	'enhanced_amt' => $request['enhncda'][$key],
                        'da_arrerar' => $request['daarrear'][$key],
				    	'rcv_nps_amount' => $request['recvnps'][$key],
				    	'enhnc_nps_amount' => $request['enhncnps'][$key],
				    	'nps_amount' => $request['empnps'][$key],
                        'rcv_ta_on_da_amount' => $request['recvta'][$key],
                        'enhnc_ta_on_da_amount' => $request['enhncta'][$key],
                        'ta_on_da_arrear' => $request['taondaarear'][$key],
                        'left_ta_on_da_amt' => 0,
				    	'recv_p_tax' => $request['recvptax'][$key],
                        'enhnc_p_tax' => $request['enhncptax'][$key],
                        'p_tax_amt' => $request['empprotax'][$key],
				    	'total_arrear' => $request['totalarrear'][$key],
				    	'from_date' => $request['fromDate'][$key],
				    	'to_date' => $request['toDate'][$key],
				    	'created_at' => $created_at
				    ]
				);

	        	DB::table('rate_master_history')->where('id', $request->head_id)->update(['arear_app_status' => 'bill_generated']);
        	}
//        	exit();
        }
        else
        {
        	foreach($request['empcode'] as $key=>$value){

        	// print_r($key); print_r($value); exit;

//	        	$recv_amount=(($request['empbasic'][$key] * $request['oldrate'][$key])/100);
//	        	$enhnc_amount = (($request['empbasic'][$key] * $request['newrate'][$key])/100);
//
//                $recv_ta_amount=(($request['empta'][$key] * $request['oldrate'][$key])/100);
//                $enhnc_ta_amount = (($request['empta'][$key] * $request['newrate'][$key])/100);
//
//                $da_on_ta_amt = round($enhnc_ta_amount - $recv_ta_amount);

	        	DB::table('arear_calc_master')->insert(
				    ['head_id' => $request->head_id,'emp_code' => $value, 'emp_name' => $request['empname'][$key],'emp_desig' => $request['empdesg'][$key], 'emp_basic' => 0,'old_rate' => $request['oldrate'][$key], 'new_rate' => $request['newrate'][$key], 'old_ta_rate' => '0', 'new_ta_rate' => '0', 'recv_amt' => $request['recvda'][$key], 'enhanced_amt' => $request['enhncda'][$key], 'da_arrerar' => $request['daarrear'][$key], 'rcv_ta_on_da_amount' => 0, 'enhnc_ta_on_da_amount' => 0, 'ta_on_da_arrear' => 0, 'left_ta_on_da_amt' => 0, 'nps_amount' => '0', 'total_arrear' => $request['totalarrear'][$key],  'from_date' => $request['fromDate'][$key], 'to_date' => $request['toDate'][$key], 'created_at' => $created_at]
				);

	        	DB::table('rate_master_history')->where('id', $request->rate_master_history_id[$key])->update(['arear_app_status' => 'bill_generated']);
        	}
        }




        Session::flash('message','Arrear Detail Save Successfully.');
			return redirect('pis/arear-calculation-dashboard');
	}

	public function viewArearReport()
	{
		$data['dated_list']=DB::table('rate_master_history')->select('from_date', 'to_date')->get();
		$data['arears'] = DB::table('rate_master')->select('*')->where('head_type', 'A')->get();
        $data['employeeslist']=DB::table('employee')->where('emp_status', 'REGULAR')->orWhere('emp_status', 'PROBATIONARY EMPLOYEE')->get();
        // dd($data);
		return view('pis/arrear-report-view', $data);
	}

	public function showArearReport(Request $request)
	{
		 //print_r($request->all()); exit;
		$data['head_name'] = DB::table('rate_master')->where('id', $request->head_id)->first();
		if($request->emp_code == '0')
		{
			$data['arears'] = DB::table('arear_calc_master')
                                ->leftJoin('employee_pay_structure', 'arear_calc_master.emp_code', '=', 'employee_pay_structure.employee_code')
								->where('head_id', '=', $request->head_id)
								->where('from_date', '>=', $request->start_date)
								->where('to_date', '<=', $request->to_date)
                                ->select('arear_calc_master.*', 'employee_pay_structure.basic_pay')
								->get();
								// ->toSql();
//		echo "<pre>"; print_r($data['arears']); exit;
			$data['arrear_name']=$request->head_id;
			return view('pis/view-arrear-report-all', $data);
		}else{
			$data['arear'] = DB::table('arear_calc_master')
                                ->leftJoin('employee_pay_structure', 'arear_calc_master.emp_code', '=', 'employee_pay_structure.employee_code')
								->where('head_id', '=', $request->head_id)
								->where('from_date', '>=', $request->start_date)
								->where('to_date', '<=', $request->to_date)
								->where('emp_code', '=', $request->emp_code)
                                ->select('arear_calc_master.*', 'employee_pay_structure.basic_pay')
								->first();
//			dd($data['arear']);
								//->toSql();
			$data['arrear_name']=$request->head_id;
			// echo "<pre>"; print_r($data['arear']); exit;
			return view('pis/view-arrear-report', $data);
		}

			// dd($data);

	}
	
	public function viewArearStatement()
    {
        $data['dated_list']=DB::table('rate_master_history')->select('from_date', 'to_date')->get();
        $data['arears'] = DB::table('rate_master')->select('*')->where('head_type', 'A')->get();
        $data['employeeslist']=DB::table('employee')->where('emp_status', 'REGULAR')->orWhere('emp_status', 'PROBATIONARY EMPLOYEE')->get();
        // dd($data);
        return view('pis/arrear-statement-view', $data);
    }

    public function showArearStatement(Request $request)
    {
//        dd($request->all());

        $data['head_name'] = DB::table('rate_master')->where('id', $request->head_id)->first();
        if($request->head_id == '2')
        {
            $data['arears'] = DB::table('arear_calc_master')
                ->leftJoin('employee_pay_structure', 'arear_calc_master.emp_code', '=', 'employee_pay_structure.employee_code')
                ->where('head_id', '=', $request->head_id)
                ->where('from_date', '>=', $request->start_date)
                ->where('to_date', '<=', $request->to_date)
                ->select('employee_pay_structure.basic_pay',DB::raw("SUM(arear_calc_master.da_arrerar) as total_da"), DB::raw("SUM(arear_calc_master.ta_on_da_arrear) as total_ta"),DB::raw("SUM(arear_calc_master.nps_amount) as total_nps"),DB::raw("SUM(arear_calc_master.p_tax_amt) as total_ptax"))
                ->get();
            // ->toSql();
//		echo "<pre>"; print_r($data['arears']); exit;
            $data['arrear_name']=$request->head_id;
            $data['from_date'] = $request->start_date;
            $data['to_date'] = $request->to_date;

            $data['total_earnings'] = $data['arears'][0]->total_da + $data['arears'][0]->total_ta;
            $data['total_deductions'] = $data['arears'][0]->total_nps + $data['arears'][0]->total_ptax;
            $data['net_earnings'] = $data['total_earnings'] - $data['total_deductions'];
//            dd($data['net_earnings']);
            return view('pis/arrear-statement', $data);
        }else {
            $data['arear'] = DB::table('arear_calc_master')
                ->leftJoin('employee_pay_structure', 'arear_calc_master.emp_code', '=', 'employee_pay_structure.employee_code')
                ->where('head_id', '=', $request->head_id)
                ->where('from_date', '>=', $request->start_date)
                ->where('to_date', '<=', $request->to_date)
                ->where('emp_code', '=', $request->emp_code)
                ->select('arear_calc_master.*', 'employee_pay_structure.basic_pay')
                ->first();
//			dd($data['arear']);
            //->toSql();
            $data['arrear_name'] = $request->head_id;
            $data['from_date'] = $request->start_date;
            $data['to_date'] = $request->to_date;
            // echo "<pre>"; print_r($data['arear']); exit;
            return view('pis/view-arrear-report', $data);
        }
    }




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


        return view('pis/generate-gpf-bal-all',$data);
    }

public function listPayrollbalgpfemployee(Request $request){
	DB::table('gpf_opening_balance')
->where('month_yr','=',$request['month_yr'])
->delete();
foreach($request->emp_code as $key=>$value)
	    {
          
         
		    if(!empty($value)){
                  
		    	$data['employee_id']=$value;
	            $data['emp_name']=$request->emp_name[$key];
	            $data['emp_designation']=$request->emp_designation[$key];
	            $data['month_yr']=$request['month_yr'];
	            $data['crated_time']=date('Y-m-d');
	            $data['opening_balance']=$request->open_bal[$key];
	            DB::table('gpf_opening_balance')->insert($data);
		    	}
		    	  
		    }
Session::flash('message','GPF Opening Balance Successfully Saved.');
 $employeelist= DB::table('employee')
        ->where('status','=','active')
        ->where('emp_status','!=','TEMPORARY')
        ->where('emp_status','!=','EX-EMPLOYEE')
        ->where('emp_pf_type', '=', 'gpf')
        ->orderBy('emp_fname', 'asc')
        

        ->get();

        foreach($employeelist as $employee){
         $data['month_yr']=$request['month_yr'];
 $employeegpf= DB::table('gpf_opening_balance')
         ->where('month_yr','=',$request['month_yr'])
         ->where('employee_id','=',$employee->emp_code)
        ->get();

            if(!empty($employeegpf)){
            	$opening_balance=$employeegpf[0]->opening_balance;
            }else{
            		$opening_balance='0';
            }
         $emp_name = $employee->emp_fname.' '.$employee->emp_mname.' '.$employee->emp_lname;
                

                $data['employee_gpf'][]=array('emp_name'=>$emp_name,'emp_designation'=>$employee->emp_designation,'emp_code'=>$employee->emp_code,'opening_balance'=>$opening_balance);
            
}


        return view('pis/generate-gpf-bal-all',$data);
}

public function addbalgpfemployee(){
	return view('pis/opening-bal-generation');
}
public function listbalgpfemployee(Request $request){


  $employeelist= DB::table('employee')
        ->where('status','=','active')
        ->where('emp_status','!=','TEMPORARY')
        ->where('emp_status','!=','EX-EMPLOYEE')

       
        ->orderBy('emp_fname', 'asc')
        

        ->get();

$opening_balance=0;
        foreach($employeelist as $employee){

        	 $employeelistri= DB::table('employee_pay_structure')
         ->where('employee_code','=',$employee->emp_code)
        ->where('gpf','=','1')
        

       
        ->first();
        

      if( count($employeelistri)!=''){
          $data['month_yr']=$request['month_yr'];
      
 $employeegpf= DB::table('gpf_opening_balance')
         ->where('month_yr','=',$request['month_yr'])
         ->where('employee_id','=',$employee->emp_code)
        ->get();


            if(count($employeegpf)!='0'){

            	$opening_balance=$employeegpf[0]->opening_balance;
            }else{
            		$opening_balance='0';
            }

            

         $emp_name = $employee->emp_fname.' '.$employee->emp_mname.' '.$employee->emp_lname;
                

                $data['employee_gpf'][]=array('emp_name'=>$emp_name,'emp_designation'=>$employee->emp_designation,'emp_code'=>$employee->emp_code,'opening_balance'=>$opening_balance);
            
}
}
             
        return view('pis/generate-gpf-bal-all',$data);

}
}
