<?php

namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;
use Session;
use App\Model\Role\SubModule;
use App\Model\Role\Module;

class SubModuleController extends Controller
{
    public function viewSubModuleForm()
	{
		$modules=Module::all();
		return view('role/sub-module', compact('modules'));		
	}
	
	public function saveSubModuleForm(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'module_id' => 'required|max:100',
		
		],
		[
		'module_id.required'=>'Module Name Required',
				
		]);
		
		if($validator->fails())
		{
			return redirect('role/sub-module')->withErrors($validator)->withInput();
		}
		
		$data=request()->except(['_token']);
		$submodule=new SubModule();
		
		$submodule->create($data);
		Session::flash('message','Sub Module Information Successfully saved.');
		return redirect('role/vw-sub-module');
	}
	
	public function getSubModules()
	{
		$submodules=DB::Table('sub_module')
			->leftJoin('module','sub_module.module_id','=','module.id')
			->select('sub_module.*','module.module_name')->get();
		//dd($submodules);
		return view('role/view-sub-module', compact('submodules'));
	}
	
	
	
}
