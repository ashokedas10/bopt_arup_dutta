<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Company;
use App\HolidayModel;
use Validator;
use Session;
use View;

class CompanyWiseHolidayController extends Controller
{
    //
	public function viewCompanyWiseHoliday()
	{
		$company_rs=Company::where('company_status','=','active')->select('id','company_name')->get();	
		$result='';
		return view('attendance/view-companywise-holiday', compact('company_rs','result'));
	}
	public function holidaydata(Request $request)
	{
		$validator=Validator::make($request->all(),[
		
		'company_id'=>'required'
		],
		[
		
		'company_id.required'=>'Company Name Required'
		]);
		if ($validator->fails()) {
            return redirect('attendance/view-companywise-holiday')
                        ->withErrors($validator)
                        ->withInput();
        }
		$company_rs=Company::where('company_status','=','active')->select('id','company_name')->get();
		$cid = $request->company_id;
		//dd($cid);
		//DB::enableQueryLog();
		$holiday_rs=DB::Table('holiday')
		->leftJoin('company','holiday.company_id','=','company.id')
		->where('holiday.company_id','=',$cid)
		->select('holiday.*','company.company_name')->get();
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
							<td><a href="#"><i class="ti-pencil-alt"></i></a><a href="#"><i class="ti-trash"></i></a></td>
						</tr>';
		}
		
		return view('attendance/view-companywise-holiday', compact('holiday_rs','result','company_rs'));
	}
}
