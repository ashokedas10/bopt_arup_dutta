<?php

namespace App\Http\Controllers\SMS\ResultManagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Result\MarksAllocation;
use Session;
use Validator;
use App\Model\Masters\Institute;
use Illuminate\Support\Facades\DB;
use App\Model\Masters\Classes;
use App\Model\Masters\Faculty;
use App\Model\Masters\Course;
use App\Model\Routine\Semester;
use App\Model\Masters\Subject;
use App\Model\Masters\InstituteWiseConfig;
use App\Model\Exam\ExamType;


class MarksAllocationController extends Controller
{
	public function getMarksAllocation()
	{
		$marks_allocation_rs=MarksAllocation::get();
		return view('sms/result-management/view-marks-allocation', compact('marks_allocation_rs'));
	}
	
	public function formMarksAllocationInstitute()
	{	
		$institute_rs=Institute::where('institute_status','=','active')->get();
		return view('sms/result-management/institute-marks-allocation', compact('institute_rs'));
	}
	
	public function saveMarksAllocationInstitute(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'institute_code'=>'required'		
		],
		[
		'institute_code.required'=>'Institute Name Required'		
		]);
		
		if($validator->fails())
		{
			return redirect('sms/result-management/institute-marks-allocation')->withErrors($validator)->withInput();			
		}		
		
		$institute_code=$request->institute_code;
		$institute_name=$request->institute_name;
		
		//echo $institute_code."-".$institute_name; die;
		$institute_name_arr=array('University','university','UNIVERSITY');
		$contains_university = str_contains($institute_name, $institute_name_arr);
		
		$rice_institute_name_arr=array('Rice','rice','RICE');
		$contains_rice = str_contains($institute_name, $rice_institute_name_arr);
		
		$school_name_arr=array('School','school','SCHOOL');
		$contains_school = str_contains($institute_name, $school_name_arr);
		
		$faculty_rs=DB::Table('institute_wise_configuration')
			->leftJoin('faculty','institute_wise_configuration.faculty_id','=','faculty.faculty_id')
			->where('institute_wise_configuration.status','=','active')
			->where('institute_wise_configuration.institute_code','=',$institute_code)
			->where('institute_wise_configuration.faculty_id','<>','')
			->groupBy('institute_wise_configuration.faculty_id')->get();
		
		//$batch_rs=$this->batch->where('institute_name','=',$institute_name)->where('status','=','active')->get();
		
		$class_rs=DB::Table('institute_wise_configuration')
				->leftJoin('class','institute_wise_configuration.class_code','=','class.class_code')
				->where('institute_wise_configuration.status','=','active')
				->where('institute_wise_configuration.institute_code','=',$institute_code)->get();
				
		$branch_rs=DB::Table('institute_wise_configuration')
			->leftJoin('branch','institute_wise_configuration.rice_branch_code','=','branch.branch_code')
			->where('institute_wise_configuration.status','=','active')
			->where('institute_wise_configuration.institute_code','=',$institute_code)
			->get();
			
		$semester_rs=Semester::where('semester_status','=','active')->get();		
		//dd($class_rs);		
		if($contains_university)
		{
			return view('sms/result-management/marks-allocation-institute',compact('institute_code','faculty_rs','semester_rs'));
		}

		if($contains_rice)
		{
			return view('sms/result-management/marks-allocation-rice',compact('institute_code','branch_rs'));
		}
				
		if($contains_school)
		{
			return view('sms/result-management/marks-allocation-school',compact('institute_code','class_rs'));
		}
	}
	
	public function saveMarksAllocateInstituteConfig(Request $request)
	{
		$institute_code=$request->institute_code;
		$faculty_code=$request->faculty_id;
		$course_code=$request->course_code;
		$semester_code=$request->semester_code;
		
		$result_rs=DB::Table('subject_configuration')
				->leftJoin('faculty','subject_configuration.faculty_id','=','faculty.faculty_id')
				->where('subject_configuration.status','=','active')
				->where('subject_configuration.institute_code','=',$institute_code)
				->where('subject_configuration.faculty_id','=',$faculty_code)
				->where('subject_configuration.course_code','=',$course_code)
				->get();
		
		//dd($result_rs);
		
		$exam_type_rs=ExamType::where('exam_type_status','=','active')->get();
		//dd($exam_type_rs);
		$exam_type_data=$data_rs='';
		
		foreach($exam_type_rs as $exam_type)
		{
			$exam_type_data.='<option value="'.$exam_type->exam_type_code.'" >'.$exam_type->exam_type_name.'</option>';
		}
		
		foreach($result_rs as $result)
		{
			
			$data_rs.='<tr>
						<input type="hidden" class="form-control" name="institute_code" value="'.$request->institute_code.'" >
						<input type="hidden" class="form-control" name="faculty_code" value="'.$request->faculty_id.'" >
						<input type="hidden" class="form-control" name="course_code" value="'.$request->course_code.'" >
						<input type="hidden" class="form-control" name="semester_code" value="'.$request->semester_code.'" >
						
						<td width="50"><label class="checkbox-inline"><input type="checkbox" name="subject_code[]" value="'.$result->subject_code.'"></label></td>
						<td>'.$result->subject_name.'</td>
						<td><input type="text" class="form-control" name="tot_marks[]" ></td>
						<td><input type="text" class="form-control" name="pass_marks[]" ></td>
						<td>
							<select class="form-control" name="exam_type_code[]" >
								<option value="" selected disabled >Select</option>'.$exam_type_data.'
								
							</select>
						</td>
					</tr>';
		}
		
		$data_rs.=' <tfoot>
						<tr>						
							<td colspan="3" style="border-bottom:none;"><label class="checkbox-inline"><input type="checkbox"  name="all" id="all" width="30px;" height="30px;">Check All</label></td>
							<td colspan="2" style="border-bottom:none;text-align:right;"><button type="submit" class="btn btn-danger btn-sm">Save</button></td>						
						</tr>
					</tfoot>';
		
		return view('sms/result-management/institute-config-marks',compact('institute_code','data_rs'));
	}
	
	public function saveMarksAllocateInstituteConfigData(Request $request)
	{
		//$data=request()->except(['_token']);
		//dd($data);
		$marksAllocation=new MarksAllocation();
		
		$data_result['institute_code']=$request->institute_code;
		$data_result['faculty_code']=$request->faculty_code;
		$data_result['course_code']=$request->course_code;
		$data_result['semester_code']=$request->semester_code;
		$i=0;
		foreach($request->subject_code as $subject_code)
		{
			$data_result['subject_code']=$request->subject_code[$i];
			$data_result['tot_marks']=$request->tot_marks[$i];
			$data_result['pass_marks']=$request->pass_marks[$i];
			$data_result['exam_type_code']=$request->exam_type_code[$i];
			
			$marksAllocation->create($data_result);
			$i++;
		}
		
		Session::flash('message','Marks Allocation Information Successfully Saved.');
		return redirect('sms/result-management/vw-marks-allocation');
	}
	
	public function saveMarksAllocateSchoolConfig(Request $request)
	{
		$institute_code=$request->institute_code;
		$class_code=$request->class_code;
		$semester_code=$request->semester_code;
		
		$result_rs=DB::Table('subject_configuration')
				->leftJoin('class','subject_configuration.class_code','=','class.class_code')
				->where('subject_configuration.status','=','active')
				->where('subject_configuration.institute_code','=',$institute_code)
				->where('subject_configuration.class_code','=',$class_code)
				->get();
		
		//dd($result_rs);
		
		$exam_type_rs=ExamType::where('exam_type_status','=','active')->get();
		//dd($exam_type_rs);
		$exam_type_data=$data_rs='';
		
		foreach($exam_type_rs as $exam_type)
		{
			$exam_type_data.='<option value="'.$exam_type->exam_type_code.'" >'.$exam_type->exam_type_name.'</option>';
		}
		
		foreach($result_rs as $result)
		{
			
			$data_rs.='<tr>
						<input type="hidden" class="form-control" name="institute_code" value="'.$request->institute_code.'" >
						<input type="hidden" class="form-control" name="faculty_code" value="'.$request->faculty_id.'" >
						<input type="hidden" class="form-control" name="course_code" value="'.$request->course_code.'" >
						<input type="hidden" class="form-control" name="semester_code" value="'.$request->semester_code.'" >
						
						<td width="50"><label class="checkbox-inline"><input type="checkbox" name="subject_code[]" value="'.$result->subject_code.'"></label></td>
						<td>'.$result->subject_name.'</td>
						<td><input type="text" class="form-control" name="tot_marks[]" ></td>
						<td><input type="text" class="form-control" name="pass_marks[]" ></td>
						<td>
							<select class="form-control" name="exam_type_code[]" >
								<option value="" selected disabled >Select</option>'.$exam_type_data.'
								
							</select>
						</td>
					</tr>';
		}
		
		$data_rs.=' <tfoot>
						<tr>						
							<td colspan="3" style="border-bottom:none;"><label class="checkbox-inline"><input type="checkbox"  name="all" id="all" width="30px;" height="30px;">Check All</label></td>
							<td colspan="2" style="border-bottom:none;text-align:right;"><button type="submit" class="btn btn-danger btn-sm">Save</button></td>						
						</tr>
					</tfoot>';
		
		return view('sms/result-management/institute-config-marks',compact('institute_code','data_rs'));
	}
	
	
	
	
	
}
