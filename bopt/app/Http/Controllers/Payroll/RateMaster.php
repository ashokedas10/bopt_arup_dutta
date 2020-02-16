<?php

namespace App\Http\Controllers\Payroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bank;
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
                
        return view('pis/add-rate-details',$data);
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
			return redirect('pis/add-rate-details')->withErrors($validator)->withInput();
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
	
}
