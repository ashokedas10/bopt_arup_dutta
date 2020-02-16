<?php

namespace App\Http\Controllers\Payroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Company;
use App\Branch;
use App\BranchAllocationModel;
use Validator;
use Session;
use View;
use Illuminate\Validation\Rule;

class BranchAllocationController extends Controller
{
    //
	public function getBranchAllocation()
	{
		$branch_allocation_rs = DB::Table('branch_allocation')
								->leftJoin('company','branch_allocation.company_id','=','company.id')
								->leftJoin('branch','branch_allocation.branch_id','=','branch.id')
								->select('branch_allocation.*','company.company_name','branch.branch_name')->get();
		return view('pis/branch-allocation',compact('branch_allocation_rs'));
		
	}
	public function viewAddBranchAllocation()
	{
		$company_rs=Company::where('company_status','=','active')->select('id','company_name')->get();		
		$branch_rs=Branch::where('branch_status','=','active')->select('id','branch_name')->get();		
		return view('pis/add-new-branch-allocation',compact('company_rs','branch_rs'));
	}
	public function saveBranchAllocation(Request $request)
	{	
		$company_id=$request->company_id;
		$branch_id=$request->branch_id;
		
		$validator=Validator::make($request->all(),[
		'company_id'=>[	'required',
						Rule::unique('branch_allocation')->where(function ($query) use($company_id,$branch_id) {
							return $query->where('company_id', $company_id)
							->where('branch_id', $branch_id);
						}),
					],
		'branch_id'=>'required'		
		],
		[
		'company_id.required'=>'Company Name Required',
		'company_id.unique'=>'Company Name and Branch Name already exists',
		'branch_id.required'=>'Branch Name Required'		
		]);
		
		if($validator->fails())
		{
			return redirect('pis/add-new-branch-allocation')->withErrors($validator)->withInput();
			
		}
		$data = $request->all();
		$data=request()->except(['_token']);
		
		//dd($data);
		$branch_allocation=new BranchAllocationModel();
		$branch_allocation->create($data);
		Session::flash('message','Branch Allocation Information Successfully Saved.');
		return redirect('pis/vw-branch-allocation');
	}
}
