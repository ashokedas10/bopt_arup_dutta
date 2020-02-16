<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
		//URL::forceScheme('https');
		\URL::forceRootUrl(\Config::get('app.url'));    
		// And this if you wanna handle https URL scheme
		// It's not usefull for http://www.example.com, it's just to make it more independant from the constant value
		if (str_contains(\Config::get('app.url'), 'https://')) {
			\URL::forceScheme('https');
			//use \URL:forceSchema('https') if you use laravel < 5.4
		}
                //Pass Value ALL sidebar Blade View
               view()->composer('partials.sidebar',function ($view){
                    $email = Auth::user()->email;
   $data = DB::table('role_authorization')      
            ->join('module', 'role_authorization.module_name', '=', 'module.id')
            ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
            ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name')
              ->where('member_id','=',$email) 
            ->get(); 
                   $view->with('Roledata',$data);
               });
                      view()->composer('leave.partials.sidebar',function ($view){
                    $email = Auth::user()->email;
   $data = DB::table('role_authorization')      
            ->join('module', 'role_authorization.module_name', '=', 'module.id')
            ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
            ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name')
              ->where('member_id','=',$email) 
            ->get(); 
                   $view->with('Roledata',$data);
               });
		
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
