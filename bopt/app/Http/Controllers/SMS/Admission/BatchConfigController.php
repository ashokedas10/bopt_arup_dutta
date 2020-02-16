<?php
namespace App;
namespace App\Http\Controllers\SMS\Admission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Model\Admission\Batch;
use App\Model\Admission\BatchConfig;
use Validator;
use Session;
use View;

class BatchConfigController extends Controller
{
	public function getBatchConfig()
	{
		//$batch_config_rs = BatchConfig::where('batch_config_status','=','active')->get();
		$batch_config_rs = DB::Table('batch_configuration')
							->leftJoin('batch','batch_configuration.batch_id','=','batch.batch_id')
							->select('batch_configuration.*','batch.batch_name')
							->get();
		return view('sms/admission/batch-config', compact('batch_config_rs'));
	}
	
	public function viewAddBatchConfig()
	{
		$batch_rs=Batch::where('status','=','active')->get();
		return view('sms/admission/add-batch-config', compact('batch_rs'));
	}
	
	public function saveAddBatchConfig(Request $request)
	{
		//dd($request->all());
		
		$validator=Validator::make($request->all(),[
		'batch_id'=>'required',
		'batch_start'=>'required',
		'batch_end'=>'required',
		'no_of_seat'=>'required',
		'batch_config_status'=>'required'		
		],
		[
		'batch_id.required'=>'Batch  Required',
		'batch_start.required'=>'Batch Start Year Required',
		'batch_end.required'=>'Batch End Year Required',
		'no_of_seat.required'=>'No Of Seat Required',
		'batch_config_status.required'=>'Status Required'
		]);
		
		
		if($validator->fails())
		{
			return redirect('sms/admission/add-batch-config')->withErrors($validator)->withInput();
			
		}
		$data = $request->all();
		$data=request()->except(['_token']);
		//dd($data);
		$batchconfig=new BatchConfig();
		
		$batchconfig->create($data);
		
		Session::flash('message','Batch Configuration Successfully Saved.');
		return redirect('sms/admission/batch-config');
	}
}
