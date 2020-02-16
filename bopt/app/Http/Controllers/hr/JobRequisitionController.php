<?php
namespace App;
namespace App\Http\Controllers\hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Company;
use App\Department;
use App\JobModel;
use App\JobRequisitionModel;
use App\Branch;
use Validator;
use Session;
use View;

class JobRequisitionController extends Controller
{
    //
	public function getJobRequisition()
	{
		//$job_requisition_rs=JobRequisitionModel::where('vacancy_status','=','active')->get();
		$job_requisition_rs=DB::Table('job_requisition')
						->leftJoin('company','job_requisition.company_id','=','company.id')
						->leftJoin('department','job_requisition.department_id','=','department.id')
						->where('job_requisition.vacancy_status','=','active')->get();
		return view('hr/job-requisition', compact('job_requisition_rs'));
	}
	
	public function viewAddRequisition()
	{
		$company_rs=Company::where('company_status','=','active')->get();
		$department_rs=Department::where('department_status','=','active')->get();
		$job_rs=JobModel::all();
		$branch_rs=Branch::all();
		return view('hr/add-new-job-requisition', compact('job_rs','branch_rs','company_rs','department_rs'));
	}
	
	public function saveAddJobRequisition(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'company_id'=>'required',
		'department_id'=>'required',
		'job_title'=>'required',
		'no_of_vacancy'=>'required',
		'date'=>'required',
		'vacancy_status'=>'required'
		],
		[
		'company_id.required'=>'Company is Required',
		'department_id.required'=>'Department is Required',
		'job_title.required'=>'Job Title is Required',
		'no_of_vacancy.required'=>'No Of Vacancy is Required',
		'date.required'=>'Date is Required',
		'vacancy_status.required'=>'Vacancy Status is Required'
		]);
		
		if($validator->fails())
		{
			return redirect('hr/add-new-job-requisition')->withErrors($validator)->withInput();
			
		}
		$data = $request->all();
		$data=request()->except(['_token']);
		
		//dd($data);
		$jobrequisition=new JobRequisitionModel();
		$jobrequisition->create($data);
		Session::flash('message','Job Requisition Information Successfully Saved.');
		return redirect('hr/vw-job-requisition');
	}
}
