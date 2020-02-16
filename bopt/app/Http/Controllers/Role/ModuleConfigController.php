<?php

namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;
use Session;
use App\Model\Role\SubModule;
use App\Model\Role\Module;
use App\Model\Role\ModuleConfig;

class ModuleConfigController extends Controller
{
    public function viewModuleConfig()
	{
		$modules=Module::all();
		return view('role/module-config', compact('modules'));
	}
	
	public function saveModuleConfig(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'module_id' => 'required|max:100',
		'menu_name' => 'required|max:100'
		],
		[
		'module_id.required'=>'Module Name Required',
		'menu_name.required'=>'Menu Name Required'		
		]);
		
		if($validator->fails())
		{
			return redirect('role/module-config')->withErrors($validator)->withInput();
		}
		
		$data=request()->except(['_token']);
		$moduleConfig=new ModuleConfig();
		$moduleConfig->create($data);
		Session::flash('message','Module Configuration Information Successfully saved.');
		return redirect('role/vw-module-config');
	}
	
	public function getModuleConfig()
	{
		$module_configs=DB::Table('module_config')
			->leftJoin('module','module_config.module_id','=','module.id')
			->leftJoin('sub_module','module_config.sub_module_id','=','sub_module.id')
			->select('module_config.*','module.module_name','sub_module.sub_module_name')->get();
		//dd($module_configs);
		return view('role/view-module-config', compact('module_configs'));
	}
	
	
	
}
