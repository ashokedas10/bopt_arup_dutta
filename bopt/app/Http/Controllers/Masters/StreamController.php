<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Masters\Stream;
use Validator;
use Session;

class StreamController extends Controller
{
    //
	public function getStream()
	{
		$stream_rs=Stream::get();
		return view('masters/view-stream',compact('stream_rs'));
	}
	
	public function viewFormStream()
	{
		return view('masters/stream');
	}
	
	public function saveStream(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'stream_code'=>'required|unique:stream',
		'stream_name'=>'required',
		'stream_status'=>'required'
		
		],
		[
		'stream_code.required'=>'Stream Code Required',
		'stream_code.unique'=>'Stream Code already exists',
		'stream_name.required'=>'Stream Name Required',
		'stream_status.required'=>'Stream Status Required'
		
		]);
		
		if($validator->fails())
		{
			return redirect('masters/stream')->withErrors($validator)->withInput();
			
		}
		$data = $request->all();
		$data=request()->except(['_token']);
		
		//dd($data);
		$stream=new Stream();
		$stream->create($data);
		Session::flash('message','Stream Information Successfully Saved.');
		return redirect('masters/vw-stream');
	}
}
