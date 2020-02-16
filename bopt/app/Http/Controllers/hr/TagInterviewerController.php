<?php
namespace App;
namespace App\Http\Controllers\hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\JobModel;
use App\Company;
use App\Department;
use App\Employee;
use App\AssignInterviewer;
use Validator;
use Session;
use View;

class TagInterviewerController extends Controller
{
    //
	public function viewTagInterviewer()
	{
		$assign_interviewer_rs=DB::Table('assign_interviewer')
							  ->leftJoin('company','assign_interviewer.company_id','=','company.id')
							  ->leftJoin('department','assign_interviewer.department_id','=','department.id')
							  ->select('assign_interviewer.*','company.company_name','department.department_name')
							  ->get();
		return View('hr/tagg-interviewer', compact('assign_interviewer_rs'));
	}
	public function viewAddAssignInterviewer()
	{
		
		$company_rs=Company::where('company_status','=','active')->get();
		$department_rs=Department::where('department_status','=','active')->get();
		$employee_rs=Employee::where('employee_status','=','active')->get();
		$job_title_rs=JobModel::where('job_status','=','active')->get();
		return View('hr/assign-interviewer', compact('company_rs','department_rs','employee_rs','job_title_rs'));
	}
	public function saveAddAssignInterviewer(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'company_id'=>'required',
		'department_id'=>'required',
		'interviewer_name'=>'required',
		'job_title'=>'required',
		'applicant_name'=>'required',
		'date'=>'required'
		],
		[
		'company_id.required'=>'Company is Required',
		'department_id.required'=>'Department is Required',
		'interviewer_name.required'=>'Interviewer is Required',
		'job_title.required'=>'Job Title is Required',
		'applicant_name.required'=>'Applicant is Required',
		'date.required'=>'Date is Required'
		]);
		
		if($validator->fails())
		{
			return redirect('hr/assign-interviewer')->withErrors($validator)->withInput();
			
		}
		$data = $request->all();
		$data=request()->except(['_token']);
		
		
		$assigninterviewer=new AssignInterviewer();
		$assigninterviewer->create($data);
		Session::flash('message','Interviewer Assigned Successfully .');
		return redirect('hr/tagg-interviewer');
	}
}
