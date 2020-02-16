<?php
namespace App\Http\Controllers\Leave;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\TourApplyModel;
use App\Employee;
use Validator;
use Session;
use View;
use Auth;
class TourApplyController extends Controller
{
    //
	public function viewtourapplication()
	{
		$tour_apply_rs = TourApplyModel::all();
		return view('leave/tour-application', compact('tour_apply_rs'));
    }


    public function tourapplicationListing()
	{
        $emp_id=Auth::user()->employee_id;
		$tour_apply_rs = TourApplyModel::where('employee_code', $emp_id)->orderBy('id', 'DESC')->get();
		return view('leave/userwise-tour-listing', compact('tour_apply_rs'));
    }



	public function viewTourApplicationById($tour_id)
	{
		$data['tour_apply'] = TourApplyModel::find($tour_id);

		return view('leave/apply-for-tour', $data);
	}

	public function viewApplytourapplication()
	{
		return view('leave/apply-for-tour');
	}

	public function saveApplytourapplication(Request $request)
	{
        //echo "<pre>"; print_r($request->all()); exit;

        $emp_id=Auth::user()->employee_id;

		$report_auth = Employee::where('emp_code', $emp_id)->first();

		$report_auth_name = $report_auth->emp_reporting_auth;

		$lv_sanc_auth = $report_auth->emp_lv_sanc_auth;

		$validator=Validator::make($request->all(),[
		'duration'=>'required',
		'from_date'=>'required',
		'to_date'=>'required',
		'purpose'=>'required'
		],
		[
		'duration.required'=>'Duration Of Leave Required',
		'from_date.required'=>'From Date Required',
		'to_date.required'=>'To Date Required',
		'purpose'=>'Purpose Of Leave Required'
		]);

		if($validator->fails())
		{
			return redirect('leave/apply-for-tour')->withErrors($validator)->withInput();
		}

		$data=array(
          'apply_date'=>$request->apply_date,
          'employee_code'=>$emp_id,
          'emp_reporting_auth'=> $report_auth_name,
		  'emp_sanctioning_auth'=> '',
		  'emp_lv_sanc_auth' => '',
          'from_date'=>$request->from_date,
          'to_date'=>$request->to_date,
          'duration'=>$request->duration,
          'purpose'=>$request->purpose,
          'tour_status'=>$request->holiday_descripion,
          'advance_release'=>$request->advance_release
        );
		$data['tour_status']= "NOT APPROVED";
		$data['employee_code']=$emp_id;


		if(!empty($request->id)){

			DB::table('tour_apply')
            ->where('id', $request->id)
            ->update($data);

		}else{
			$tour_apply=new TourApplyModel();
            $tour_dtl=$tour_apply->create($data);

            $data_dtl=$request->all();
            foreach($data_dtl['tour_date_dtl'] as $key=>$value){

                DB::table('tour_dtl')->insert(
                    ['tour_apply_id' => $tour_dtl->id, 'tour_date_dtl' => $value,'establishment_dtl' => $data_dtl['establishment_dtl'][$key], 'place_name' => $data_dtl['place_name'][$key], 'status' => $data_dtl['status'][$key]]
                );
            }

		}

		Session::flash('message','Tour Apply Successfully Saved.');
		return redirect('leave/tourlisting');
    }


    public function getTourdtlById($tour_id)
	{

        $tour_apply =  DB::table('tour_apply')->where('id','=', $tour_id)->first();
        $emp_dtl = DB::table('employee')->where('emp_code','=', $tour_apply->employee_code)->first();
        $tour_dtl = DB::table('tour_dtl')->where('tour_apply_id','=', $tour_id)->get();
        $emp_name=$emp_dtl->emp_fname." ".$emp_dtl->emp_mname." ".$emp_dtl->emp_lname;
        $data['tour_apply']=array('emp_name'=>$emp_name,'emp_code'=>$tour_apply->employee_code,'from_date'=>$tour_apply->from_date,'to_date'=>$tour_apply->to_date,'advanced'=>$tour_apply->advance_release,'tour_dtl'=>$tour_dtl);
        //echo "<pre>";print_r($data['tour_apply']); exit;

        return view('leave/tour-leave-print-view',$data);
	}
}
