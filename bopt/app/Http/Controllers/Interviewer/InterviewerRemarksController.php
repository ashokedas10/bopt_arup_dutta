<?php
namespace App;
namespace App\Http\Controllers\Interviewer;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\JobModel;
use App\JobRequisitionModel;
use App\Company;
use App\Branch;
use App\Department;
use App\JobApplication;
use App\JobApplyStatus;
use App\InterviewerRemarks;
use Validator;
use Session;
use View;

class InterviewerRemarksController extends Controller
{
    //
	public function getInterviewerRemarks()
	{
		/*
		$jobappplication_rs=DB::Table('job_application')
							->select('job_application.*','company.company_name','department.department_name','interviewer_remarks_stat.status','interviewer_remarks_stat.remarks')
							->leftJoin('company','job_application.company_id','=','company.id')
							->leftJoin('department','job_application.department_id','=','department.id')
							->join(DB::raw('(SELECT remarks,status,job_apply_id from `interviewer_remarks` where id IN(select max(id) from  interviewer_remarks group by job_apply_id order by id desc))  interviewer_remarks_stat'),
							function($join)
							{
							   $join->on('job_application.id', '=', 'interviewer_remarks_stat.job_apply_id');
							})
							->get();
							*/
		$jobappplication_rs=DB::Table('job_application')
							->select('job_application.*','company.company_name','department.department_name')
							->leftJoin('company','job_application.company_id','=','company.id')
							->leftJoin('department','job_application.department_id','=','department.id')							
							->get();
		
		foreach($jobappplication_rs as $key => $jobapplication)
		{
			$job_apply_status_rs='';
			$job_id=$jobapplication->id;
			
			//DB::enableQueryLog();
			
			/*			
				$job_apply_status_rs=DB::Table('job_apply_status')
								->whereRaw('id = (select max(`id`) from job_apply_status)')
								->where('job_apply_status.job_apply_id','=',$job_id)
								->groupBy('job_apply_status.job_apply_id')
								->select('status','remarks','job_apply_id')
								->first();
		
			*/
			
			 $interviewer_remarks_status_rs=InterviewerRemarks::whereRaw('id = (select max(`id`) from interviewer_remarks where interviewer_remarks.job_apply_id = '.$job_id.')')			
							->groupBy('interviewer_remarks.job_apply_id')
							->select('status','remarks','job_apply_id')
							->first();
			$status=$interviewer_remarks_status_rs['status'];
			$remarks=$interviewer_remarks_status_rs['remarks'];		

			//$status=$job_apply_status_rs->status;
			//$remarks=$job_apply_status_rs->remarks;		
			
			$jobapplication->status=$status;
			$jobapplication->remarks=$remarks;
		}
		
		return View('interview/interviewer-remarks', compact('jobappplication_rs'));
	}
	
	public function viewEditInterviewerRemarks($id=null)
	{
		//dd($id);
		return view('interview/update-remarks', compact('id'));
	}
	
	public function editInterviewerRemarks(Request $request)
	{ 
		$validator=Validator::make($request->all(),[
		'date'=>'required',
		'status'=>'required'
		],
		[
		'date.required'=>'Date is Required',
		'status.required'=>'Status is Required'
		]);
		
		if($validator->fails())
		{
			return redirect('interview/update-remarks')->withErrors($validator)->withInput();
			
		}
		$data = request()->except(['_token']);
		//dd($data);
		$interviewerremarkstatus = new InterviewerRemarks();
		$interviewerremarkstatus->create($data);
		Session::flash('message','Successfully updated');
		return redirect('interview/interviewer-remarks');
	}
	public function getRemarksHistory($id)
	{
		$jobappplication_rs = JobApplication::where('id','=',$id)->get()->first();
		
		$interviewer_remarks_status_rs = DB::Table('job_application')
						->leftJoin('interviewer_remarks','job_application.id','=','interviewer_remarks.job_apply_id')
						->where('interviewer_remarks.job_apply_id','=',$id)
						->select('job_application.*','interviewer_remarks.status','interviewer_remarks.remarks','interviewer_remarks.date')->get()->first();
		if(!empty($interviewer_remarks_status_rs))
		{
		return view('interview/remarks-history', compact('jobappplication_rs','interviewer_remarks_status_rs'));
		}
		else
		{
		return view('interview/remarks-history', compact('jobappplication_rs'));	
		}
	}
	
}
