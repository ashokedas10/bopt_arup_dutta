<?php

namespace App;
namespace App\Http\Controllers\Payroll;

use App\Http\Controllers\Controller;
use App\Company;
use App\Grade;
use App\DeductionHead;
use App\AdditionHead;
use App\EmployeeGradeWiseAllowance;
use Illuminate\Http\Request;
use View;
use Validator;
use Illuminate\Support\Facades\DB;
use Session;



class EmployeeGradeWiseAllowanceController extends Controller
{
    //
	public function viewAddEmployeeGradeWiseAllowance()
	{
		$company_rs=Company::where('company_status','=','active')->get();
		$result='';
		return view('pis/employee-grade-wise-allowance', compact('company_rs','result'));
	}
	
	public function getEmployeeGradeWiseAllowanceDetail(Request $request)
	{
		$validator=Validator::make($request->all(),
		[
			'company_id'=>'required',
			'grade_id'=>'required',
			'type'=>'required'
		],
		[
			'company_id.required'=>'Company Name Required',
			'grade_id.required'=>'Grade Name Required',
			'type.required'=>'Type Required',
		]);
	
		if($validator->fails())
		{
			return redirect('pis/emp-grade-allowance')->withErrors($validator)->withInput();
		}
		
		$company_id=$request->company_id;
		$grade_id=$request->grade_id;
		$head_type=$request->type;
		
		$company_rs=Company::where('company_status','=','active')->get();
		
		if($head_type=='Additional')
		{
			$type_rs=AdditionHead::get();
		}
		
		if($head_type=='Deduction')
		{
			$type_rs=DeductionHead::get();
		}
		//dd($company_grade_rs);
		//return view('pis/employee-grade-wise-allowance', compact('type_rs','company_id','grade_id','company_rs'));
		$result='';
		
		$row=1;
		foreach($type_rs as $type)
		{			
			$result .= '<tr class="row'.$type->id.$row.'">
							<td><div class="checkbox">
								<label>
									<input type="checkbox" class="checkboxclass" name="head_name[]"  value="'.$type->head_name.'" id="check"  >
									<input type="hidden" id="company_id" name="company_id" value="'.$company_id.'" class="form-control">
									<input type="hidden" id="grade_id" name="grade_id"  value="'.$grade_id.'" class="form-control">
									<input type="hidden" id="head_type" name="head_type"  value="'.$head_type.'" class="form-control">
								</label>
							  </div>
							</td>
							<td>'.$type->head_name.'</td>
							<td><input type="text" id="in_per" name="in_per'.$type->id.'[]" 	value="0"	class="form-control"></td>
							<td><input type="text" id="in_rs" name="in_rs'.$type->id.'[]" 	value="0"	class="form-control"></td>
							<td><input type="text" id="min_basic" name="min_basic'.$type->id.'[]" value="0" class="form-control"></td>
							<td><input type="text" id="max_basic" name="max_basic'.$type->id.'[]" value="0" class="form-control"></td>
							<td>
							<input type="hidden" name="head_id[]"  value="'.$type->id.'" class="form-control">
							<button type="button" class="btn btn-danger" id="add'.$type->id.$row.'"  data-id="'.$type->id.'" data-head="'.$type->head_name.'" onclick="addnewrow('.$row.','.$type->id.');"  ><i class="fa fa-plus" aria-hidden="true"></i></button>&nbsp;
							<button type="button" class="btn btn-danger"  id="del'.$type->id.$row.'" data-did="'.$type->id.'"  data-dhead="'.$type->head_name.'" onclick="del('.$row.','.$type->id.');" disabled > <i class="fa fa-remove" aria-hidden="true" ></i></button>
						</td>
					</tr><tbody class="'.$type->id.'" id="'.$type->id.'"> </tbody>';						
		}
		
		$result .= '<tfoot>
						<!-- <td colspan="3" style="border:none;"><label><input type="checkbox"  name="all" id="all" width="30px;" height="30px;"> Select</label></td> -->
						<td colspan="3" ></td>
						<td colspan="3" style="text-align:right;border:none;"><button type="submit" class="btn btn-danger btn-sm">Save</button>
						<button type="reset" class="btn btn-danger btn-sm"> Reset</button></td>
					</tfoot>';
					
		return view('pis/employee-grade-wise-allowance', compact('result','company_rs'));
		
	}
	
	public function saveEmployeeGradeWiseAllowance(Request $request)
	{
		//print_r($request->head_id); 
		//print_r($request->head_name); 
		
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
		
		//$data=request()->except(['_token','head_name','head_id','in_per','in_rs','min_basic','max_basic','bootstrap-data-table_length','all']);
		//dd($data);
		$employeeGradeWiseAllowance=new EmployeeGradeWiseAllowance();
		
		
		$company_id=$request->company_id;
		$grade_id=$request->grade_id;
		$head_type=$request->head_type;
		
		$data_result['company_id']=$company_id;
		$data_result['grade_id']=$grade_id;
		$data_result['head_type']=$head_type;
		
		$i=0;
		$k=1;
		
		$per=0;
		
		foreach($request->head_name as $checked)
		{
			$data_result['head_id']=$head_id=$request->head_id[$i];
			$len_in_per=count($request->input('in_per'.$head_id));
			$in_per=$in_rs=$min_basic=$max_basic='';
			
			if($per < $len_in_per)
			{
				$in_per_arr=$request->input('in_per'.$head_id);
				$in_per=$in_per_arr[$per];
				
				$in_rs_arr=$request->input('in_rs'.$head_id);
				$in_rs=$in_rs_arr[$per];
				
				$min_basic_arr=$request->input('min_basic'.$head_id);
				$min_basic=$min_basic_arr[$per];
				
				$max_basic_arr=$request->input('max_basic'.$head_id);
				$max_basic=$max_basic_arr[$per];
				
				$per++;
			}
			else
			{
				$in_per=0;
			}
						
			if($k==$len_in_per)
			{
				$per=0;
				$k=0;
			}
			
			
			$data_result['head_name']=$request->head_name[$i];
			$data_result['in_per']=$in_per;
			$data_result['in_rs']=$in_rs;
			$data_result['min_basic']=$min_basic;
			$data_result['max_basic']=$max_basic;	
			$employeeGradeWiseAllowance->create($data_result);
			$i++;
			$k++;
		}
	
		Session::flash('message','Employee Grade Wise Information Successfully saved.');
		return redirect('pis/vw-emp-grade-allowance');
	}
	
	public function getEmployeeGradeWiseAllowance()
	{
		$employeeGradeWiseAllowance_rs=DB::Table('emp_grade_wise_allowance')
		->leftJoin('company','emp_grade_wise_allowance.company_id','=','company.id')
		->leftJoin('grade','emp_grade_wise_allowance.grade_id','=','grade.id')
		->select('emp_grade_wise_allowance.*','company.company_name','grade.grade_name')->get();
		
		return view('pis/view-employee-grade-wise-allowance', compact('employeeGradeWiseAllowance_rs'));
	}
}
