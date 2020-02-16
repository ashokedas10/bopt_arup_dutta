<?php
namespace App;
namespace App\Http\Controllers\Payroll;
use App\Http\Controllers\Controller;

use App\Company;
use Illuminate\Http\Request;
use View;
use Validator;
use Session;
use pis;


class CompanyController extends Controller
{
    //
	public function viewAddCompany()
	{
		 return view('pis/company');
	}
	
	public function saveCompany(Request $request)
	{
		$filename='';
		
		$validator = Validator::make($request->all(), [
		'company_code' => 'required|unique:company|max:100',
		'company_name'	=>'required|max:100',
		'comapny_address'=>'required|max:100'
        ],
		['company_code.required'=>'Company Code Required',
		 'company_code.unique'=>'This company code has already been taken.',
		 'company_name.required'=>'Company Name Required',
		 'comapny_address.required'=>'Company Address Required'
		]);
		
		if ($validator->fails()) {
            return redirect('pis/company')
                        ->withErrors($validator)
                        ->withInput();
        }
		
		//$companies=$request->all();
		if($request->hasFile('company_logo'))
		{
			$files = $request->file('company_logo');		
			$filename = $files->store('company_logo');
		}
		
		$data = request()->except(['_token','company_logo']);
		$data['company_logo']=$filename;
		//dd($data);
		//DB::table('employee_master')->insert($data);	
		$company=new Company();
		$company->create($data);
		//$company->save($data);  //time stamps false in model
		Session::flash('message','Company Information Successfully saved.');
		
		return redirect('pis/vw-company');
		
	}
	
	public function getCompanies()
	{
		$companies_rs=Company::all();
		return view('pis/view-company', compact('companies_rs'));	
	}
	
	
	
}
