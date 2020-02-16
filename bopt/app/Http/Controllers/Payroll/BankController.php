<?php

namespace App\Http\Controllers\Payroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bank;
use view;
use Validator;
use Session;


class BankController extends Controller
{
    //
	public function viewAddBank()
	{
		 return view('pis/bank');		
	}
	
	public function saveBank(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'bank_name'=>'required|max:255',
		'branch_name'=>'required|unique:bank|max:255',
		'ifsc_code'=>'required|unique:bank|max:255',
		'swift_code'=>'required|unique:bank|max:255'
		],
		[
		'bank_name.required'=>'Bank Name Required.',
		'branch_name.required'=>'Branch name Required',
		'branch_name.unique'=>'Branch name already exsits',
		'ifsc_code.required'=>'IFSC name Required',
		'ifsc_code.unique'=>'IFSC name already exsits',
		'swift_code.required'=>'Swift code Name Required',
		'swift_code.unique'=>'Swift code Name already exsits'
		]);
		
		if ($validator->fails()) {
            return redirect('pis/bank')
                        ->withErrors($validator)
                        ->withInput();
        }
		
		$data=request()->except(['_token']);
		$bank=new Bank();
		$bank->create($data);
		Session::flash('message','Bank Information Successfully saved.');
		return redirect('pis/vw-bank');
	}	
		
	public function getBanks()
	{
		$bank_rs=Bank::all();
		return view('pis/view-bank', compact('bank_rs'));	
	}
}
