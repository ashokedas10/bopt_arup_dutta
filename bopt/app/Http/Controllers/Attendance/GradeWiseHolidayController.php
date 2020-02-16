<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Grade;
use App\Company;
use App\HolidayModel;
use Validator;
use Session;
use View;

class GradeWiseHolidayController extends Controller
{
    //
	public function viewGradeWiseHoliday()
	{
		//$company_rs=Company::where('company_status','=','active')->select('id','company_name')->get();
		$grade_rs=Grade::where('grade_status','=','active')->select('id','grade_name')->get();	
		$result='';
		return view('attendance/view-gradewise-holiday', compact('grade_rs','result'));
	}
	public function holidaydata(Request $request)
	{
		$validator=Validator::make($request->all(),[
			
			'grade_id'=>'required'
			],
			[
			
			'grade_id.required'=>'Grade Name Required'
			]);
		if ($validator->fails()) {
            return redirect('attendance/view-gradewise-holiday')
                        ->withErrors($validator)
                        ->withInput();
        }
		//$company_rs=Company::where('company_status','=','active')->select('id','company_name')->get();
		$grade_rs=Grade::where('grade_status','=','active')->select('id','grade_name')->get();	
		$gid = $request->grade_id;
		//dd($cid);
		//DB::enableQueryLog();
		$holiday_rs=DB::Table('holiday')
		->leftJoin('grade','holiday.grade_id','=','grade.id')
		->leftJoin('company','holiday.company_id','=','company.id')
		->where('holiday.grade_id','=',$gid)
		->select('holiday.*','grade.grade_name','company.company_name')->get();
		//dd(DB::getQueryLog());
		//dd($holiday_rs);
		
		$result='';
		
		foreach($holiday_rs as $holiday)
		{
			$from_dtarr = explode("-",$holiday->from_date);
			$d = $from_dtarr[2];
			$m = $from_dtarr[1];
			$y = $from_dtarr[0];
			$fromdt = $d."-".$m."-".$y;
			$result .=' <tr>
							<td>'.$holiday->years.'</td>
							<td>'.$fromdt.'</td>
							<td>'.$holiday->holiday_descripion.'</td>
							<td>'.$holiday->company_name.'</td>
							<td>'.$holiday->grade_name.'</td>
							<td><a href="#"><i class="ti-pencil-alt"></i></a><a href="#"><i class="ti-trash"></i></a></td>
						</tr>';
		}
		
		return view('attendance/view-gradewise-holiday', compact('holiday_rs','result','grade_rs'));
	}
}
