<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class RollAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {		
		$user="sathi.majumder@ext.riceindia.org";
        $userAccessRights=array();
        view()->composer('index',function($view) use ($user) {
			//	\DB::enableQueryLog();
			$role_authorization_rs=\DB::Table('users')
			->leftJoin('role_authorization','users.email','=','role_authorization.member_id')
			->where('users.email','=',$user)
			->groupBy('role_authorization.module_name')
			->select('users.*','role_authorization.module_name')->get();
			//	dd(\DB::getQueryLog());	
			//	dd($role_authorization_rs);
			
			foreach($role_authorization_rs as $role_auth)
			{
				$module_names[]=$module_name=$role_auth->module_name;
			}
			
			$view->module_names=$module_names;
		});	
		
		 view()->composer('index',function($view) {
			 /*
			 $module_rs=\DB::Table('module')
			 ->select('module.id','module.module_name')->get();
			 $view->module_rs=$module_rs;
			 */
		 });
			 
		
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
