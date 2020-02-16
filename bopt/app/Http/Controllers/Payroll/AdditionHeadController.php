<?php

namespace App\Http\Controllers\Payroll;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\AdditionHead;
use Validator;
use Session;
use View;

class AdditionHeadController extends Controller
{
    //
	
	public function viewAddAdditionHead()
	{
		return view('pis/addition-head');
	}
	
	public function saveAdditionHead(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'head_name'=>'required|unique:addition_head|max:255',
		'alias_name'=>'required|unique:addition_head|max:255',
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
			return redirect('pis/addition-head')->withErrors($validator)->withInput();
			
		}
		
		$data=request()->except(['_token']);
		$addition_head=new AdditionHead();
		$addition_head->create($data);
		Session::flash('message','Addition Head Information Successfully Saved.');
		return redirect('pis/vw-addition-head');
		
	}
	
	public function getAdditionHeads()
	{
		$addition_head_rs=AdditionHead::all();
		return view('pis/view-addition-head', compact('addition_head_rs'));
	}
}
