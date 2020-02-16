<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
		$job_requisition_rs=JobRequisitionModel::where('vacancy_status','=','active')->get();
		return view('hr/job-requisition', compact('job_requisition_rs'));
	}
	
	public function viewAddRequisition()
	{
		$job_rs=JobModel::all();
		$branch_rs=Branch::all();
		return view('hr/add-new-job-requisition', compact('job_rs','branch_rs'));
	}
	
	public function saveAddJobRequisition(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'job_title'=>'required',
		'location'=>'required',
		'no_of_vacancy'=>'required',
		'date'=>'required',
		'vacancy_status'=>'required'
		
		],
		[
		'job_title.required'=>'Job Title is Required',
		'location.required'=>'location is Required',
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
