<?php
namespace App;
namespace App\Http\Controllers\Payroll;

use App\Http\Controllers\Controller;
use App\Grade;
use App\Company;
use App\Branch;
use App\ExtraClassAllowance;
use Illuminate\Http\Request;
use view;
use Validator;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Validation\Rule;

class ExtraClassAllowanceController extends Controller
{
    //
	public function viewAddExtraClassAllowance()
	{
		$company_rs=Company::where('company_status','=','active')->get();
		$branch_rs=Branch::where('branch_status','=','active')->get();
		return view('pis/add-new-extra-class', compact('company_rs','branch_rs'));
	}
	
	public function saveExtraClassAllowance(Request $request)
	{
		$company_id=$request->company_id;
		$grade_id=$request->grade_id;
		$branch_id=$request->branch_id;
		
		$validator = Validator::make($request->all(), [
		'company_id' => [	'required',
							Rule::unique('extra_class_allowance')->where(function ($query) use($company_id,$grade_id,$branch_id) {
							return $query->where('company_id', $company_id)
							->where('grade_id', $grade_id)
							->where('branch_id', $branch_id);
						}),
		],
		'grade_id' => 'required',
		'branch_id' => 'required',
		'allowance_amount' => 'required'
        ],
		['company_id.required'=>'Company Name Required',
		 'company_id.unique'=>'Company, Grade and Branch name already exists',
		 'grade_id.required'=>'Grade Name Required',
		 'branch_id'=>'Branch is Required',
		 'allowance_amount'=>'Allowance Amount is Required'
		]);
		
		if ($validator->fails()) {
            return redirect('pis/add-new-extra-class')
                        ->withErrors($validator)
                        ->withInput();
        }
		
		$data = request()->except(['_token']);
		
		$extra_class_allowance=new ExtraClassAllowance();
		$extra_class_allowance->create($data);
		//$company->save($data);  //time stamps false in model
		Session::flash('message','Extra Class Allowance Information Successfully saved.');
		return redirect('pis/vw-extra-class');
		
	}
	
	public function getExtraClassAllowance()
	{
		$extra_class_allowance_rs=DB::Table('extra_class_allowance')
							->leftJoin('company','extra_class_allowance.company_id','=','company.id')
							->leftJoin('grade','extra_class_allowance.grade_id','=','grade.id')
							->leftJoin('branch','extra_class_allowance.branch_id','=','branch.id')
							->select('extra_class_allowance.*','company.company_name','grade.grade_name','branch.branch_name')
							->get();
		/*$grade_rs=DB::Table('grade')
		->leftJoin('company','grade.company_id','=','company.id')
		->select('grade.*','company.*')->get();*/
		
		return view('pis/extra-class', compact('extra_class_allowance_rs'));
	}
	
	
	
}
