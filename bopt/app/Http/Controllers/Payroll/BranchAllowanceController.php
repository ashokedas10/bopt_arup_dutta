<?php
namespace App;
namespace App\Http\Controllers\Payroll;

use App\Http\Controllers\Controller;
use App\Grade;
use App\Company;
use App\Branch;
use App\BranchAllowance;
use Illuminate\Http\Request;
use view;
use Validator;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Validation\Rule;

class BranchAllowanceController extends Controller
{
    //
	public function viewAddBranchAllowance()
	{
		$company_rs=Company::where('company_status','=','active')->get();
		$branch_rs=Branch::where('branch_status','=','active')->get();
		return view('pis/add-new-branch-allowance', compact('company_rs','branch_rs'));
	}
	
	public function saveBranchAllowance(Request $request)
	{
		$company_id=$request->company_id;
		$grade_id=$request->grade_id;
		$branch_id=$request->branch_id;
		
		$validator = Validator::make($request->all(), [
		'company_id' => [	'required',
							Rule::unique('branch_allowance')->where(function ($query) use($company_id,$grade_id,$branch_id) {
							return $query->where('company_id', $company_id)
							->where('grade_id', $grade_id)
							->where('branch_id', $branch_id);
						}),
					],
		'grade_id' => 'required',
		'branch_id' => 'required',
		'allowance_amount' => 'required',
		'valid_to' => 'required',
		'valid_from' => 'required'
        ],
		[
		 'company_id.required'=>'Company Name Required',
		 'company_id.unique'=>'Company, Grade and Branch name already exists',
		 'grade_id.required'=>'Grade Name Required',
		 'branch_id'=>'Branch is Required',
		 'allowance_amount'=>'Allowance Amount is Required',
		 'valid_to'=>'Valid To is Required',
		 'valid_from'=>'Valid From is Required'
		]);
		
		if ($validator->fails()) {
            return redirect('pis/add-new-branch-allowance')
                        ->withErrors($validator)
                        ->withInput();
        }
		
		$data = request()->except(['_token']);
		
		$branch_allowance=new BranchAllowance();
		$branch_allowance->create($data);
		//$company->save($data);  //time stamps false in model
		Session::flash('message','Branch AllowanceInformation Successfully saved.');
		return redirect('pis/vw-branch-wise-allocation');
		
	}
	
	public function getBranchAllowance()
	{
		$branch_allowance_rs=DB::Table('branch_allowance')
							->leftJoin('company','branch_allowance.company_id','=','company.id')
							->leftJoin('grade','branch_allowance.grade_id','=','grade.id')
							->leftJoin('branch','branch_allowance.branch_id','=','branch.id')
							->select('branch_allowance.*','company.company_name','grade.grade_name','branch.branch_name')
							->get();
		/*$grade_rs=DB::Table('grade')
		->leftJoin('company','grade.company_id','=','company.id')
		->select('grade.*','company.*')->get();*/
		
		return view('pis/branch-wise-allocation', compact('branch_allowance_rs'));
	}
	
	
	
}
