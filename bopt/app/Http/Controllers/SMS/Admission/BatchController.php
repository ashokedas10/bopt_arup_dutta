<?php

namespace App\Http\Controllers\SMS\Admission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;
use Validator;
use App\Model\Admission\Batch;

class BatchController extends Controller
{
	public function getBatch()
	{
		$batch_rs = Batch::where('status','=','active')->get();
		return view('sms/admission/batch', compact('batch_rs'));
	}
	
	public function viewAddNewBatch()
	{
		return view('sms/admission/add-new-batch');
	}
	
	public function saveAddNewBatch(Request $request)
	{
		//dd($request->all());
		$validator=Validator::make($request->all(),[
		'batch_id'=>'required',
		'batch_name'=>'required',
		'status'=>'required'		
		],
		[
		'batch_id.required'=>'Batch Id Required',
		'batch_name.required'=>'Batch Name Required',
		'status.required'=>'Status Required'
		]);
		
		if($validator->fails())
		{
			return redirect('sms/admission/add-new-batch')->withErrors($validator)->withInput();			
		}
		
		$data=request()->except(['_token']);
		//dd($data);
		$batch=new Batch();
		
		$batch->create($data);
		
		Session::flash('message','Batch Successfully Saved.');
		return redirect('sms/admission/batch');
	}
}
