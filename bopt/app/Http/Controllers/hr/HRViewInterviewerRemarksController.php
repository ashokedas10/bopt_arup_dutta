<?php
namespace App;
namespace App\Http\Controllers\hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\JobApplication;
use App\InterviewerRemarks;
use App\AssignInterviewer;
use Validator;
use Session;
use View;

class HRViewInterviewerRemarksController extends Controller
{
    //
	public function viewInterviewerRemarks()
	{
		
		$remarks_rs=DB::Table('interviewer_remarks')
							->select('interviewer_remarks.*','job_application.name','job_application.post','assign_interviewer.interviewer_name')
							->leftJoin('job_application','interviewer_remarks.job_apply_id','=','job_application.id')
							->leftJoin('assign_interviewer','interviewer_remarks.job_apply_id','=','assign_interviewer.job_apply_id')
							->get();
		
				
			
		return view('hr/view_interviewer_remarks',compact('remarks_rs'));
	}
	
	
}
