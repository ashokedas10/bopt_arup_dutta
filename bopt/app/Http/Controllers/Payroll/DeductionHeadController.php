<?php

namespace App\Http\Controllers\Payroll;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DeductionHead;
use Validator;
use Session;
use View;

class DeductionHeadController extends Controller
{
    //
	
	public function viewDeductionHead()
	{
		return view('pis/deduction-head');
	}
	
	public function saveDeductionHead(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'head_name'=>'required|unique:deduction_head|max:255',
		'alias_name'=>'required|unique:deduction_head|max:255',
		'description'=>'required|max:1000'
		],
		[
		'head_name.required'=>'Head Name Required',
		'head_name.unique'=>'Head name already exsits',
		'alias_name.required'=>'Alias Name Required',
		'alias_name.unique'=>'Alias name already exsits',
		'description.required'=>'Description Required'
		]);
		
		if($validator->fails())
		{
			return redirect('pis/deduction-head')->withErrors($validator)->withInput();
			
		}
		
		$data=request()->except(['_token']);
		$deduction_head=new DeductionHead();
		$deduction_head->create($data);
		Session::flash('message','Deduction Head Information Successfully Saved.');
		return redirect('pis/vw-deduction-head');
		
	}
	
	public function getDeductionHeads()
	{
		$deduction_head_rs=DeductionHead::all();
		return view('pis/view-deduction-head', compact('deduction_head_rs'));
	}
}
