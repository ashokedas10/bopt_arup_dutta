<?php

namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Session;
use App\Model\Role\Module;

class ModuleController extends Controller
{
    public function viewModuleForm()
	{
		return view('role/module');		
	}
	
	public function saveModuleForm(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'module_name' => 'required|max:100'
		],
		[
		'module_name.required'=>'Module Name Required'	
		]);
		
		if($validator->fails())
		{
			return redirect('role/module')->withErrors($validator)->withInput();
		}
		
		$data=request()->except(['_token']);
		$module=new Module();
		
		$module->create($data);
		Session::flash('message','Module Information Successfully saved.');
		return redirect('role/vw-module');
	}
	
	public function getModules()
	{
		$modules=Module::get();
		
		return view('role/view-module', compact('modules'));
	}
	
	
	
}
