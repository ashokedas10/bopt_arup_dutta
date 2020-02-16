<?php
namespace App;
namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use App\Grade;
use App\Company;
use Illuminate\Http\Request;
use view;
use Validator;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Input;
class GradeController extends Controller
{
    //
  	public function viewAddGrade()
  	{
               if(Input::get('id'))
               {
                   $data['getGrade']=Grade::where('id','=',Input::get('id'))->get();
                   return view('masters/grade',$data);
               }else{
  		//$company_rs=Company::where('company_status','=','active')->get();
  		return view('masters/grade');
               }
  	}
	
	  public function saveGrade(Request $request)
	  {

      $grade_name= strtoupper(trim($request->grade_name));

    
    if(is_numeric($grade_name)==1){
      Session::flash('message','Pay level Should not be numeric.');
      return redirect('masters/vw-grade');
    }

    $check_grade=DB::table('grade')->where('grade_name', $grade_name)->first();
    if(!empty($check_grade)){
      Session::flash('message','Grade Alredy Exists.');
        return redirect('masters/vw-grade');
    }




		$filename='';
		
		$validator = Validator::make($request->all(), [
		'grade_name' => 'required|max:255'		
                 ],
		[
		 'grade_name.required'=>'Grade Name Required'
		]);
		
            if ($validator->fails()) 
            {
            return redirect('masters/grade')
            ->withErrors($validator)
            ->withInput();
            }
            else
            {
              if(Input::get('id'))
              {  
                  $data=array(
                    'grade_name'=>strtoupper($request->grade_name),
                    'created_at'=>date('Y-m-d h:i:s'),
                    'updated_at'=>date('Y-m-d h:i:s'),
                    'grade_status'=>$request->status,
                   );
                  Grade::where('id',Input::get('id'))->update($data);
                  Session::flash('message','Grade Information Successfully Updated.');
              return redirect('masters/vw-grade');
                  
              }
              else
              {
                    
        		//$data = request()->except(['_token']);
            $data=array(
                        'grade_name'=>strtoupper($request->grade_name),
                        'created_at'=>date('Y-m-d h:i:s')
                       );
        		
        		$grade=new Grade();
        		$grade->create($data);
        		//$company->save($data);  //time stamps false in model
        		Session::flash('message','Grade Information Successfully saved.');
        		return redirect('masters/vw-grade');
                          }
                        }
        	}
        	
	public function getGrades()
	{
		
             if(Input::get('del'))
             {
                  DB::table('grade')
            ->where('id', Input::get('del'))
            ->update(['grade_status' => 'Trash']);
                   Session::flash('message','Grade Successfully Deleted.');
                  return back();
             }
            
		$grade_rs=DB::Table('grade')
                        ->where('grade_status','=','active')
		                    ->get();
      
		return view('masters/view-grade', compact('grade_rs'));
	}
	
	
	
}
