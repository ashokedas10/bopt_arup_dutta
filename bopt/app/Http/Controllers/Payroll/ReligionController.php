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
class ReligionController extends Controller
{
   
    public function viewReligionList()
    {
        if(Input::get('del'))
        {
            DB::table('religion')
            ->where('id', Input::get('del'))
            ->update(['status' => 'Trash']);
                   Session::flash('message','Religion Successfully Deleted.');
                  return back();
        }
        
        $data['Religions']=DB::table('religion')->where('status','=','active')->get();
        return view('pis/view-religion',$data);
    }
    public function addReligionForm()
    {
              if(Input::get('id'))
              {
              
                  $data['getRel']=DB::table('religion')->where('id','=',Input::get('id'))->where('status','=','active')->get();
                   return view('pis/add-new-religion',$data);
              }
              else
              {
                 return view('pis/add-new-religion');
              }
    }
    public function addReligionFormSubmit(Request $request)
    {
       
        $validator=Validator::make($request->all(),[
                    
            'rel_id'=>'required',
		'rel_name'=>'required|max:255'
		],
		[
		'rel_id.required'=>'Religion ID Required',
		'rel_name.required'=>'Religion Name Required'		
		]);
		
		if($validator->fails())
		{
			return redirect('pis/add-new-religion')->withErrors($validator)->withInput();
                }
                else
                {
                      if(Input::get('id'))
                      {
                         $data=array(
                      'religion_id'=>$request->rel_id,
                      'religion_name'=>$request->rel_name,
                      'status'=>$request->status
                          );  
                     DB::table('religion')
            ->where('id', Input::get('id'))
            ->update($data);
                    Session::flash('message','Religion Successfully Updated.');
                    return redirect('pis/vw-religion');
                      }
                      else
                      {
                      $data=array(
                      'religion_id'=> $request->rel_id,
                      'religion_name'=>$request->rel_name,
                      'status'=>'active'
                      
                  );  
                    
                    $dataInsert=DB::table('religion')->insert($data);
                    Session::flash('message','Religion Successfully saved.');
                    return redirect('pis/vw-religion');
                    
                }
               
                }
                
        
        
    }
	
}
