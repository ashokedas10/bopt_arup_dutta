<?php
namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\UploadAttendenceModel;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Employee;
use Validator;
use Session;
use View;
use Excel;
use League\Csv\Reader;
use Auth;

use DateTime;


class UploadAttendenceController extends Controller
{
    //
	public function viewUploadAttendence()
	{
		$email = Auth::user()->email;
        $data['Roledata']=DB::table('role_authorization')      
        ->join('module', 'role_authorization.module_name', '=', 'module.id')
        ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
        ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
        ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
        ->where('member_id','=',$email) 
        ->get();

        return view('attendance/upload-data',$data);
	}
	
	public function importExcel(Request $request)
    {
        
        DB::beginTransaction();
        $request->validate([
            'upload_csv' => 'required|mimes:csv,txt'
        ],
		['upload_csv.required'=>'File Must Be required!',
		'upload_csv.mimes'=>'File Must Be CSV format!']);
		
		
        $path = $request->file('upload_csv');
		$reader = Reader::createFromPath($path->getRealPath());

		$month_entry= DB::table('upload_attendence')->distinct()->get(['month_yr']);

		$entrymonth=array();
		
		foreach($month_entry as $month){
			$entrymonth[]=$month->month_yr; 
		}

        foreach ($reader as $key => $value)
        {
        	if($key>0){
                
				$datetime1 = new DateTime($value[4]);
				$datetime2 = new DateTime($value[5]);
				$interval = $datetime1->diff($datetime2);
				$dutyhr=$interval->format('%h')." Hours ".$interval->format('%i')." Minutes";
                
                $newDate = explode('/', $value[6]); 
                $new_data = $newDate[1].'/'.$newDate[2];
                $attdate=$value[6];
                $date = str_replace('/', '-', $attdate);
				$att_date=date("Y-m-d", strtotime($date));
                
             
                $data=array(
                'employee_code'=>$value[1],
                'name'=>$value[2],
                'shift'=>$value[3],
                'arrival_time'=>$value[4],
                'departure_time'=>$value[5],
                'att_date'=>$att_date,
                'month_yr'=>$new_data,
                'attendence_status'=>$value[7],
                'duty_hrs'=>$dutyhr,  
                'updated_at'=>date('Y-m-d'),
                'created_at'=>date('Y-m-d'),
                );

                if (in_array($newDate, $entrymonth)) {
					Session::flash('message','Already process is completed for these month');
					return redirect('attendance/upload-data');   
				}else{

                    if(empty($data['employee_code']) || empty($data['name']) || empty($data['att_date'])){
                        DB::rollback();
                        Session::flash('message','Error in Attendance Sheet .');
                        return redirect('attendance/upload-data');
                    }else{
                       DB::table('upload_attendence')->insert($data);
                    }
                   
				}
               
        	}

        }
       
        DB::commit(); 
        Session::flash('message','Attendance  Information Successfully saved.');
		return redirect('attendance/upload-data');
    }
}
