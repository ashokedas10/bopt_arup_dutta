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
class CastController extends Controller
{
    //
	public function viewCast()
	{
             if(Input::get('del'))
             {
                  DB::table('cast')
            ->where('id', Input::get('del'))
            ->update(['cast_status' => 'Trash']);
                   Session::flash('message','Cast Successfully Deleted.');
                  return back();
             }
            
            $data['getCast']=DB::table('cast')->where('cast_status','=','active')->get();
		 return view('pis/view-cast',$data);		
	}
        public function addCast() {
            
             if(Input::get('id'))
             {
               $data['getCast']=DB::table('cast')->where('id',Input::get('id'))->where('cast_status','=','active')->get(); 
            return view('pis/add-new-cast',$data);	
               }
               else{
           return view('pis/add-new-cast');
               }
        }
	public function addSaveCast(Request $request)
        {
            
            
            $cast_id=$request->cast_id;
		$cast_name=$request->cast_name;
		
		$validator=Validator::make($request->all(),[
                    'cast_id'=>'required',
		'cast_name'=>'required|max:255'
		],
		[
		'cast_id.required'=>'Cast ID Required',
		'cast_name.required'=>'Cast Name Required'		
		]);
		
		if($validator->fails())
		{
			return redirect('pis/add-new-cast')->withErrors($validator)->withInput();
                }
                else
                {
                      if(Input::get('id'))
                     {
                   $data=array(
                      'cast_id'=>$cast_id,
                      'cast_name'=>$cast_name,
                      'cast_status'=>$request->cast_status
                          );  
                     DB::table('cast')
            ->where('id', Input::get('id'))
            ->update($data);
                    Session::flash('message','Cast Successfully Updated.');
                    return redirect('pis/vw-cast');
                   
                     }
                     else
                     {
                  $data=array(
                      'cast_id'=>$cast_id,
                      'cast_name'=>$cast_name,
                      'cast_status'=>'active'
                      
                  );  
                    
                    $dataInsert=DB::table('cast')->insert($data);
                    Session::flash('message','Cast Successfully saved.');
                    return redirect('pis/vw-cast');
                     }
                }
                
                
                
        }
        
        
        public function viewSubCast()
        {
             if(Input::get('del')){
                  DB::table('sub_cast')
            ->where('id', Input::get('del'))
            ->update(['sub_cast_status' => 'Trash']);
                   Session::flash('message','Sub Cast Successfully Deleted.');
                  return back();
            }
            $data['getSubCast']=DB::Table('sub_cast')
                       ->join('cast', 'sub_cast.cast_id', '=', 'cast.cast_id')
                    ->where('sub_cast_status','=','active')
            ->select('sub_cast.*', 'cast.cast_name')
                      ->get();
            
           // $data['getSubCast']=DB::table('sub_cast')->where('sub_cast_status','=','active')->get();
		 return view('pis/view-sub-cast',$data);	
        }
        public function viewAddSubCast() 
        {
             Input::get('id');
             if(Input::get('id'))
             {
                   $data['getCast']=DB::Table('sub_cast')
                       ->join('cast', 'sub_cast.cast_id', '=', 'cast.cast_id')
                          ->where('sub_cast.id','=',Input::get('id'))
            ->select('sub_cast.*', 'cast.cast_name')
                      ->get();
               //$data['getCast']=DB::table('cast')->where('cast_status','=','active')->get();
		 return view('pis/add-sub-cast',$data);
                 
             }else{
                 
             $data['getCast']=DB::table('cast')->where('cast_status','=','active')->get();
		 return view('pis/add-sub-cast',$data);
             }
        }
        public function addSaveSubCast(Request $request)   
        {
           
            
                $subcast_id=$request->sub_cast_id;
		$subcast_name=$request->sub_cast_name;
		$cast_id=$request->cast_id;
		$validator=Validator::make($request->all(),[
                    'cast_id'=>'required',
                    'sub_cast_id'=>'required',
		'sub_cast_name'=>'required|max:255'
                   
		],
		[
		'cast_id.required'=>'Cast ID Required',
		'sub_cast_name.required'=>'Sub Cast Name Required',
                    'sub_cast_id.required'=>'Sub Cast ID Required',
		]);
		
		if($validator->fails())
		{
			return redirect('pis/add-sub-cast')->withErrors($validator)->withInput();
                }
                else
                {
                     if(Input::get('id'))
                     {
                        
                          $data=array(
                      'cast_id'=>$cast_id,
                      'sub_cast_id'=>$subcast_id,
                      'sub_cast_name'=>$subcast_name,
                      'sub_cast_status'=> $request->cast_status
                      
                       );  
                    
                   DB::table('sub_cast')
            ->where('id', Input::get('id'))
            ->update($data);
                    Session::flash('message','Sub Cast Successfully Updated.');
                    return redirect('pis/vw-sub-cast');
                     } 
                     else
                     {
                      $data=array(
                      'cast_id'=>$cast_id,
                      'sub_cast_id'=>$subcast_id,
                      'sub_cast_name'=>$subcast_name,
                      'sub_cast_status'=>'active'
                      
                       );  
                    
                    $dataInsert=DB::table('sub_cast')->insert($data);
                    Session::flash('message','Sub Cast Successfully saved.');
                    return redirect('pis/vw-sub-cast');
                     }

                }
        }
	
}
