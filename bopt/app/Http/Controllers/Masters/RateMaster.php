<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bank;
use App\Rate;
use view;
use Validator;
use Session;
use DB;
use Illuminate\Support\Facades\Input;
class RateMaster extends Controller
{
    public function addRateDetailsForm() 
    {
        $data['Rate']=DB::table('rate_master')->get();
                
        return view('masters/add-rate-details',$data);
    }
    public function SubmitRateDetailsForm(Request $request)
    {
        $request->head_id;
        $validator=Validator::make($request->all(),[
                    'head_id'=>'required',
                    'min_basic'=>'required',
                    'max_basic'=>'required',
                    'from_date'=>'required',
                    'to_date'=>'required',
		],
		[
		'head_id.required'=>'Head Name Required',
		'min_basic.required'=>'Minimum Basic Required',
                  'max_basic.required'=>'Maximum Basic Required',
                    'from_date.required'=>'From Date Required',
                  'to_date.required'=>'To Date Required',
		]);
		
		if($validator->fails())
		{
			return redirect('masters/add-rate-details')->withErrors($validator)->withInput();
                }
                else
                {
                    $data=array(
                          'id'=>$request->head_id,
                        'inpercentage'=>'',	
                        'inrupees'=>'',
                        'min_basic'=>$request->min_basic,
                        'max_basic'=>$request->max_basic,
                        'from_date'=>$request->from_date,
                        'to_date'=>$request->to_date,
                      );
                    
                    DB::table('rate_details')->insert($data);
                    Session::flash('message','Rate Details Successfully Updated.');
                    return back();
                }
        
    }


    public function getRateList() 
    {
        $data['ratelist'] = DB::table('rate_details')
            ->join('rate_master', 'rate_details.rate_id', '=', 'rate_master.id')
            ->select('rate_details.*',  'rate_master.head_name')
            ->get();
            //echo "<pre>"; print_r($data); exit;
        return view('masters/rate-detail',$data);
    }

    public function getRateChart($rate_id) 
    {   
        $data['ratedtl'] = DB::table('rate_details')
            ->join('rate_master', 'rate_details.rate_id', '=', 'rate_master.id')
             ->where('rate_details.id', '=', $rate_id)
            ->select('rate_details.*',  'rate_master.head_name')
            ->get();
        return view('masters/edit-rate',$data);
    }

    public function saveRateChart(Request $request) {

      $request->validate([
        'inpercentage'=>'required|numeric',
        'inrupees'=>'required|numeric'
      ]);
      $data=array(
      'id'=>$request->id,
      'inpercentage'=>$request->inpercentage,
      'inrupees'=> $request->inrupees
      );
      
        DB::table('rate_details')
        ->where('id', $request->id)
        ->update(['inpercentage' =>$request['inpercentage'],
        'inrupees'=>$request['inrupees']]);
      //return back()->with('success','Rate Save successfully');
        Session::flash('message','Rate Details Successfully Updated.');
        //return back();
        return redirect('masters/ratelist');   
    }

	
}
