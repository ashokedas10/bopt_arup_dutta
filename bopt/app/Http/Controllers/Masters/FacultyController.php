<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Masters\Institute;
use App\Model\Masters\Faculty;
use App\Branch;
use Validator;
use Session;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class FacultyController extends Controller
{
    //
	public function getFaculty()
	{
		$faculty_rs=DB::Table('faculty')
		->leftJoin('institute','faculty.institute_code','=','institute.institute_code')
		->leftJoin('branch','faculty.location_code','=','branch.branch_code')
		->where('faculty_status','=','active')
		->select('faculty.*','branch.branch_name','institute.institute_name')->get();
		return view('masters/faculty', compact('faculty_rs'));
	}
	
	public function viewFormFaculty()
	{
		$institute_rs=Institute::where('institute_status','=','active')->get();
		$location_rs=Branch::where('branch_status','=','active')->get();
		return view('masters/add-new-faculty', compact('institute_rs', 'location_rs'));
	}
	
	public function saveFaculty(Request $request)
	{	
		$institute_code=$request->institute_code;
		$faculty_id=$request->faculty_id;
		$faculty_name=$request->faculty_name;
				
		$validator=Validator::make($request->all(),[
		'institute_code'=>[	'required',
							Rule::unique('faculty')->where(function ($query) use($institute_code, $faculty_id, $faculty_name) {
							return $query->where('institute_code', $institute_code)
							->where('faculty_id', $faculty_id)
							->where('faculty_name', $faculty_name);
						}),
					],
		'faculty_id'=>'required',
		'location_code'=>'required',
		'faculty_name'=>'required',
		'faculty_status'=>'required'
		],
		[
		'institute_code.required'=>'Institute Name Required',
		'faculty_id.required'=>'School ID Required',
		'location_code.required'=>'Location Name Required',
		'institute_code.unique'=>'Institute Name, School Code, School Name already exists',
		'faculty_status.required'=>'Status Required'
		]);
		
		if($validator->fails())
		{
			return redirect('masters/add-new-faculty')->withErrors($validator)->withInput();
			
		}
		$data = $request->all();
		$data=request()->except(['_token']);
		
		//dd($data);
		$faculty=new Faculty();
		$faculty->create($data);
		Session::flash('message','School Information Successfully Saved.');
		return redirect('masters/vw-faculty');
	}
}
