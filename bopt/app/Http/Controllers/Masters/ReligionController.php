<?php

namespace App\Http\Controllers\Masters;

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
        return view('masters/view-religion',$data);
    }

    public function addReligionForm()
    {
              if(Input::get('id'))
              {
              
                  $data['getRel']=DB::table('religion')->where('id','=',Input::get('id'))->where('status','=','active')->get();
                   return view('masters/add-new-religion',$data);
              }
              else
              {
                 return view('masters/add-new-religion');
              }
    }


    public function addReligionFormSubmit(Request $request)
    {
     
       $rel_name= strtoupper(trim($request->rel_name));

    
    if(is_numeric($rel_name)==1){
      Session::flash('message','Religion Name Should not be numeric.');
        return redirect('masters/vw-religion');
      
    }
    $check_religion_name=DB::table('religion')->where('religion_name', $request->rel_name)->first();
    if(!empty($check_religion_name)){
      Session::flash('message','Already Exists.');
        return redirect('masters/vw-religion');
    }

      $validator=Validator::make($request->all(),[     
    //'rel_id'=>'required',
		'rel_name'=>'required|max:255'
		],
		[
		//'rel_id.required'=>'Religion ID Required',
		'rel_name.required'=>'Religion Name Required'		
		]);
		
		if($validator->fails())
		{
			return redirect('masters/add-new-religion')->withErrors($validator)->withInput();
                }
                else
                {
                      if(Input::get('id'))
                      {
                         $data=array(
                      'religion_id'=>$request->rel_id,
                      'religion_name'=>strtoupper($request->rel_name),
                      'status'=>$request->status
                          );  
                     DB::table('religion')
            ->where('id', Input::get('id'))
            ->update($data);
                    Session::flash('message','Religion Successfully Updated.');
                    return redirect('masters/vw-religion');
                      }
                      else
                      {
                      $data=array(
                      'religion_id'=> $request->rel_id,
                      'religion_name'=>strtoupper($request->rel_name),
                      'status'=>'active'
                      
                  );  
                    
                    $dataInsert=DB::table('religion')->insert($data);
                    Session::flash('message','Religion Successfully saved.');
                    return redirect('masters/vw-religion');
                    
                }
               
                }
                
        
        
    }
	
}
