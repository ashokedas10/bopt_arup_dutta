<?php
namespace App;
namespace App\Http\Controllers\Masters;
use App\Http\Controllers\Controller;

use App\Company;
use Illuminate\Http\Request;
use View;
use Validator;
use Session;
use pis;
use Illuminate\Support\Facades\Input;
use DB;
class CompanyController extends Controller
{
    //
	public function viewAddCompany()
	{
            if($input=Input::get('c_id'))
            {
              $data['CompanyData']=DB::table('company')->where('id','=',$input)->get();
              return view('masters/company',$data);
            }
            else
            {
                return view('masters/company');
            }
	}
	
	public function saveCompany(Request $request)
	{        
            
		$filename='';
		
		if(is_numeric($request->company_name)==1){
			Session::flash('message','Company Name Should not be numeric.');
		    return redirect('masters/vw-company');
		}
		
		

		$validator = Validator::make($request->all(), [
		'company_name'	=>'required|max:100',
		'company_address'=>'required|max:255',
		'company_phone'	=>'required',
		'company_cin'	=>'required',
		'company_pan'=>'required|max:10'
        ],
		[
		 'company_name.required'=>'Company Name Required',
		 'company_address.required'=>'Company Address Required',
		 'company_phone.required'=>'Company Phone Required',
		 'company_cin.required'=>'CIN Required',
		 'company_pan.required'=>'Company Pan Required'
		]);
		
		if ($validator->fails()) {
            return redirect('masters/company')
                        ->withErrors($validator)
                        ->withInput();
        }
		
		//$companies=$request->all();
		if($request->hasFile('company_logo'))
		{
			$files = $request->file('company_logo');		
			$filename = $files->store('company_logo');
		}
		
		$data = request()->except(['_token','company_logo','c_id']);
                if(Input::get('c_id')){
                    $data['company_logo']=$request->company_logo;
                }else{
		$data['company_logo']=$filename;
                }
                 if($id=Input::get('c_id'))
                 {
                    

                    Company::where('id',$id)->update($data);
                 }
                 else
                 {
                 	
                 	//echo $request->company_name; exit;
                 	$check_company_name=DB::table('company')->where('company_name', trim($request->company_name))->first();
					if(!empty($check_company_name)){
						Session::flash('message','Company Alredy Exists.');
					    return redirect('masters/vw-company');
					}
                    $company=new Company();
	            	//$company->create($data);
                 }
	
		Session::flash('message','Company Information Successfully saved.');
		return redirect('masters/vw-company');
		
	}
	
	public function getCompanies()
	{
		$companies_rs=Company::all();
		return view('masters/view-company', compact('companies_rs'));	
	}
	
}
