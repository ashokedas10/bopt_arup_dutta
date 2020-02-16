<?php

namespace App\Http\Controllers\Payroll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Branch;
use View;
use Validator;
use Session;

class BranchController extends Controller
{
    //
	public function viewAddBranch()
	{
		 return view('pis/branch');		
	}
	
	public function saveBranch(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'branch_name'=>'required|max:255',
		'branch_code'=>'required|unique:branch|max:255',
		'phone'=>'required|max:50',
		'address'=>'required',
		'location'=>'required',
		'branch_status'=>'required'
		],
		[
		'branch_name.required'=>'Branch Name Required',
		'branch_code.required'=>'Branch Code Required',
		'phone.required'=>'Phone Required',
		'address.required'=>'Address Required',
		'location.required'=>'Location Required',
		'branch_status.required'=>'Branch Status Required'
		]);
		
		if ($validator->fails()) {
            return redirect('pis/branch')
                        ->withErrors($validator)
                        ->withInput();
        }
		
		$data=request()->except(['_token']);
		$branch=new Branch();
		$branch->create($data);
		Session::flash('message','Branch Information Successfully saved.');
		return redirect('pis/vw-branch');
	}	
		
	public function getBranch()
	{
		$branch_rs=Branch::all();
		return view('pis/view-branch', compact('branch_rs'));	
	}
}
