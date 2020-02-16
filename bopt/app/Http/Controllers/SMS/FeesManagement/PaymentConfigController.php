<?php

namespace App\Http\Controllers\SMS\FeesManagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Validator;
use App\Model\Masters\Institute;
use App\Model\Fees\FeesHeadConfig;
use App\Model\Masters\Classes;
use App\Model\Fees\FeesHead;
use App\Model\Masters\Faculty;
use App\Model\Masters\Course;
use Illuminate\Support\Facades\DB;
use App\Model\Fees\Fees;

class PaymentConfigController extends Controller
{
	public function getPaymentConfig()
	{
		//$feesHead_rs=FeesHeadConfig::all();
		$result_rs=DB::Table('fees')
		->leftJoin('institute','fees.institute_code','=','institute.institute_code')
		->leftJoin('faculty','fees.faculty_code','=','faculty.faculty_id')
		->leftJoin('course','fees.course_code','=','course.course_code')
		->leftJoin('class','fees.class_code','=','class.class_code')
		->leftJoin('fees_head','fees.fees_head_code','=','fees_head.fees_head_code')
		->get();
		
		return view('sms/fees-management/view-payment-config',compact('result_rs'));
	}
	
	public function formPaymentConfig()
	{
		$institute_rs=Institute::where('institute_status','=','active')->get();
		return view('sms/fees-management/payment-config',compact('institute_rs'));
	}
	
	public function savePaymentConfig(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'institute_code'=>'required'		
		],
		[
		'institute_code.required'=>'Institute Name Required'		
		]);
		
		if($validator->fails())
		{
			return redirect('sms/fees-management/payment-config')->withErrors($validator)->withInput();			
		}		
		
		$institute_code=$request->institute_code;
		$institute_name=$request->institute_name;
		
		$institute_name_arr=array('University','university','UNIVERSITY','Rice','rice','RICE');
		$contains = str_contains($institute_name, $institute_name_arr);
		
		$faculty_rs=Faculty::where('faculty_status','=','active')->get();
		$course_rs=Course::where('course_status','=','active')->get();
		$class_rs=Classes::where('class_status','=','active')->get();
		$fees_head_rs=FeesHead::where('fees_head_status','=','Active')->get();
		
		if($contains)
		{
			return view('sms/fees-management/payment-university-config',compact('institute_code','faculty_rs','course_rs','fees_head_rs'));
		}
		else
		{
			return view('sms/fees-management/payment-school-config',compact('institute_code','class_rs','fees_head_rs'));
		}		
	}
	
	public function formPaymentSchoolConfig()
	{
		$class_rs=$institute_code=$fees_head_rs='';
		$class_rs=Classes::where('class_status','=','active')->get();
		$fees_head_rs=FeesHead::where('fees_head_status','=','Active')->get();
		return view('sms/fees-management/payment-school-config',compact('institute_code','class_rs','fees_head_rs'));
	}
	
	
	
	public function savePaymentSchoolConfig(Request $request)
	{
		/*
		$validator=Validator::make($request->all(),[
		'institute_code'=>'',
		'fees_head_code'=>'required',
		'class_code'=>'required',
		'category'=>'required',
		'amount'=>'required'		
		],
		[
		'fees_head_code.required'=>'Fees Name Required',
		'class_code.required'=>'Class Name Required',
		'category.required'=>'Category Required'
			
		]);
		
		if($validator->fails())
		{
			return redirect('sms/fees-management/payment-school-config')->withErrors($validator)->withInput();			
		}
		*/
		//dd($request->all());
		$data=request()->except(['_token']);
		
		if($request->institute_code <> null || $request->institute_code <> '')
		{
			$fees=new Fees();
						
			$fees->create($data);
			Session::flash('message','Payment Configuration Successfully Saved.');
			return redirect('sms/fees-management/view-payment-config');
		}
		else
		{
			return redirect('sms/fees-management/payment-config');
		}
	}
	
	public function formPaymentUniversityConfig()
	{
		$class_rs=$institute_code=$fees_head_rs='';
		$faculty_rs=Faculty::where('faculty_status','=','active')->get();
		$course_rs=Course::where('course_status','=','active')->get();
		$fees_head_rs=FeesHead::where('fees_head_status','=','Active')->get();
		return view('sms/fees-management/payment-university-config',compact('institute_code','faculty_rs','course_rs','fees_head_rs'));
	}
	
	public function savePaymentUniversityConfig(Request $request)
	{
		/*
		$validator=Validator::make($request->all(),[
		'institute_code'=>'',
		'faculty_code'=>'required',
		'course_code'=>'required',
		'fees_head_code'=>'required',
		'category'=>'required',
		'amount'=>'required'
		],
		[
		'faculty_code.required'=>'Faculty Name Required',
		'course_code.required'=>'Course Name Required',
		'fees_head_code.required'=>'Fee Hade Name Required',
		'category.required'=>'Category Name Required',
		'amount.required'=>'Amount  Required'
		]);
		
		if($validator->fails())
		{
			return redirect('sms/fees-management/payment-university-config')->withErrors($validator)->withInput();			
		}
		*/
		$data=request()->except(['_token']);
		//dd($request->all());
		if($request->institute_code <> null || $request->institute_code <> '')
		{
			//dd($request->all());
			$fees=new Fees();
			$fees->create($data);
			Session::flash('message','Payment Configuration Successfully Saved.');
			return redirect('sms/fees-management/view-payment-config');
		}
		else
		{
			return redirect('sms/fees-management/payment-config');
		}
	}
}

