<?php

namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;
use Validator;
use Session;
use App\Model\Role\RoleAuthorization;
use App\Model\Role\UserRightSubModule;
use App\Model\Role\UserRightMenu;
use App\Model\Role\UserRightList;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;
class UserAccessRightsController extends Controller
{
    public function viewUserConfig() 
    {
        $data['users']=DB::table('users')->where('user_type','=','user')->get();
        return view('role/view-users',$data);
    }

	public function viewUserAccessRightsForm()
	{
            $data['users']=DB::table('users')->where('user_type','=','user')->get();
            $data['module']=DB::table('module')->get();
            $data['menu']=DB::table('module_config')->get();
           // dd($data);
		return view('role/role',$data);
	}


	public function userWiseAccessList($usermailid,$module_name,$sub_module_name,$menu_name,$rights){

		//echo $usermailid; echo "--"; echo $module_name; echo "=="; echo $sub_module_name; echo "++"; echo $menu_name; echo "@@"; echo $rights;

	   	$useraccessdtl=DB::table('role_authorization')      
	    ->select('role_authorization.*')
	    ->where('role_authorization.member_id','=',$usermailid)
	    ->where('role_authorization.module_name','=',$module_name)
	    ->where('role_authorization.sub_module_name','=',$sub_module_name)
	    ->where('role_authorization.menu','=',$menu_name)
	    ->where('role_authorization.rights','=',$rights) 
	    ->first();
	    //->toSql();
	    //echo $data['useraccessdtl'];
	    //exit;
	    return $useraccessdtl;
	}

	public function UserAccessRightsFormAuth(Request $request) 
    {
    	// $user_access_data = DB::table('role_authorization')->get();
 
    	//$check_user_access = $this->userWiseAccessList($request['member_id'][0]);
    	
		foreach($request['menu_name'] as $key=>$value){              
        $ins_data['menu'] = $request['menu_name'][$key];
        $ins_data['member_id'] = $request['member_id'][0];
        $ins_data['module_name'] = $request['module_name'];
        $ins_data['sub_module_name'] = $request['sub_module_name'];       
           
           	foreach($request['user_rights_name'] as $keyrights=>$rights){
           		$ins_data['rights'] = $rights;
           		$check_user_access = $this->userWiseAccessList($request['member_id'][0],$ins_data['module_name'],$ins_data['sub_module_name'],$ins_data['menu'],$ins_data['rights']); 
           		//echo $request['member_id'][0]; echo "--"; echo $ins_data['module_name']; echo "=="; echo $ins_data['sub_module_name']; echo "++"; echo $ins_data['menu']; echo "@@"; echo $ins_data['rights'];
           		// var_dump($check_user_access); echo "=======";
           		// echo "<pre>";print_r($check_user_access); exit;

           		if(is_null($check_user_access)){

           			DB::table('role_authorization')->insert($ins_data);
   					Session::flash('message','Role Successfully Saved.');
           			

           		}else{
           			Session::flash('message','User Permission already exist!!');
           		}			
           }	
       }
      
	    
		return redirect('role/view-users-role'); 
		/*$ob_RoleAuthorization= new RoleAuthorization();
		
		$i=1;
		$member_id_counter=1;
		$sub_module_name_counter=1;
		$menu_name_counter=1;
		$user_rights_name_counter=1;
		$y='';
		foreach($request->module_name as $module_name)
		{
			
			$index=0;
			$lenSubModule=count($request->input('sub_module_name'.$i));
			$lenMemberID=count($request->input('member_id'.$i));			
			$lenUserRightMenu=count($request->input('menu_name'.$i));
			$lenUserRightList=count($request->input('user_rights_name'.$i));
		
                       
			for($j=0; $j<$lenMemberID;$j++)
			{
				$index_sub=0;
                                
				$member_id_arr=$request->input('member_id'.$member_id_counter);
				$member_id=$member_id_arr[$j];
				$sub_module_idarr=$request->input('sub_module_name'.$sub_module_name_counter);
                             
                for($m=0; $m<$lenUserRightMenu;$m++)
				{						
						$menu_name_arr=$request->input('menu_name'.$menu_name_counter);
						$menu_name=$menu_name_arr[$m];
						
	                for($n=0; $n<$lenUserRightList;$n++)
					{
	                    $user_rights_list_arr=$request->input('user_rights_name'.$user_rights_name_counter);
	                    $user_rights_name=$user_rights_list_arr[$n];                      
	                    $data_role_auth['member_id']=$member_id;
						$data_role_auth['module_name']=$module_name;
						$data_role_auth['member_id']=$member_id;
		                $data_role_auth['sub_module_name']=$sub_module_idarr[0];
						$data_role_auth['menu']=$menu_name;
		                $data_role_auth['rights']=$user_rights_name;
						$role_auth_inserted_id=$ob_RoleAuthorization->create($data_role_auth)->id;
	                }           
                }
				
				$index++;				
			}
           
			$user_rights_name_counter++;
			$menu_name_counter++;
			$sub_module_name_counter++;
			$member_id_counter++;
			$i++;
		}*/ 
		
    }
        
        
	public function saveUserAccessRightsForm(Request $request)
	{
           
            //dd($password);
		//dd($request->all());
		/*
		$validator=Validator::make($request->all(),[
		'module_name' => 'required',
		'sub_module_name'=>'required'
		],
		[
		'module_name.required'=>'Module Name Required',
		'sub_module_name.required'=>'Sub Module Name Required'		
		]);
		
		if($validator->fails())
		{
			return redirect('pis/designation')->withErrors($validator)->withInput();
		}
		*/
		$ob_RoleAuthorization= new RoleAuthorization();
		
		$i=1;
		$member_id_counter=1;
		$sub_module_name_counter=1;
		$menu_name_counter=1;
		$user_rights_name_counter=1;
		
		foreach($request->module_name as $module_name)
		{
			//dd($request->all());
			$index=0;
			//$data_result['head_id']=$head_id=$request->head_id[$i];
			$lenSubModule=count($request->input('sub_module_name'.$i));
			//echo $lenSubModule; die;
			$lenMemberID=count($request->input('member_id'.$i));			
			$lenUserRightMenu=count($request->input('menu_name'.$i));
			$lenUserRightList=count($request->input('user_rights_name'.$i));
			
			for($j=0; $j<$lenMemberID;$j++)
			{
				$index_sub=0;
                                
				$member_id_arr=$request->input('member_id'.$member_id_counter);
				$member_id=$member_id_arr[$j];
				$sub_module_idarr=$request->input('sub_module_name'.$sub_module_name_counter);
                             //   $sub_module_id=
                                dd($sub_module_id);
				$data_role_auth['member_id']=$member_id;
				$data_role_auth['module_name']=$module_name;
				$data_role_auth['member_id']=$member_id;
				
				$role_auth_inserted_id=$ob_RoleAuthorization->create($data_role_auth)->id;
				
				//$inserted_id=$ob_RoleAuthorization->id;
				
				
				//UserRightSubModule
				
				for($k=0; $k<$lenSubModule; $k++)
				{
                                    
					$sub_module_name_arr=$request->input('sub_module_name'.$sub_module_name_counter);
					$sub_module_name=$sub_module_name_arr[$k];
					
					$data_user_right_module['role_auth_id']=$role_auth_inserted_id;
					$data_user_right_module['sub_module_name']=$sub_module_name;
					$data_user_right_module['member_id']=$member_id;
					
					$obj_UserRightSubModule=new UserRightSubModule();				
					$user_right_sub_module_inserted_id=$obj_UserRightSubModule->create($data_user_right_module)->id;
					
					//UserRightMenu					
					
					for($m=0; $m<$lenUserRightMenu;$m++)
					{						
						$menu_name_arr=$request->input('menu_name'.$menu_name_counter);
						$menu_name=$menu_name_arr[$m];
						
						$data_UserRightMenu['role_auth_id']=$role_auth_inserted_id;
						$data_UserRightMenu['user_rights_sub_module_id']=$user_right_sub_module_inserted_id;
						$data_UserRightMenu['menu_name']=$menu_name;
						$data_UserRightMenu['member_id']=$member_id;
						
						$obj_UserRightMenu=new UserRightMenu();
						$id_UserRightMenu=$obj_UserRightMenu->create($data_UserRightMenu)->id;
						
						for($n=0; $n<$lenUserRightList;$n++)
						{
							$user_rights_list_arr=$request->input('user_rights_name'.$user_rights_name_counter);
							$user_rights_name=$user_rights_list_arr[$n];
							
							$data_UserRightList['role_authorization_id']=$role_auth_inserted_id;
							$data_UserRightList['user_rights_sub_module_id']=$user_right_sub_module_inserted_id;
							$data_UserRightList['user_right_menu_id']=$id_UserRightMenu;
							$data_UserRightList['user_rights_name']=$user_rights_name;
							$data_UserRightList['member_id']=$member_id;
							
							$obj_UserRightList=new UserRightList();
							$obj_UserRightList->create($data_UserRightList);
						}						
					}
					$index_sub++;
				}
				
				
				
					
				$index++;				
			}
			
			$user_rights_name_counter++;
			$menu_name_counter++;
			$sub_module_name_counter++;
			$member_id_counter++;
			$i++;
			
		}
		return redirect('role/user-role');
	}
	
        public function viewUserConfigForm()
        {
             $data['employeeslist']=DB::table('employee')->get();
             $data['users']=DB::table('users')->where('user_type','=','user')->get();
             $userlist=array();
	            foreach($data['users'] as $user){
	            	$userlist[]=$user->employee_id;
	            }
            
             $data['employees']=array();
            foreach($data['employeeslist'] as $key=>$employee){
            if(in_array($employee->emp_code, $userlist)) 
			  { 
			  
			  } 
			else
			  { 
			  	$data['employees'][]= (object) array("emp_code"=>$employee->emp_code,"emp_fname"=>$employee->emp_fname,"emp_mname"=>$employee->emp_mname,"emp_lname"=>$employee->emp_lname);
			  }

            }
             
            //echo "<pre>"; print_r($data['employees']); exit;
            return view('role/view-user-config', $data);
        }



        public function GetUserConfigForm($user_id) 
	    {
	        $data['employeeslist']=DB::table('employee')->get();
             $data['users']=DB::table('users')->where('user_type','=','user')->get();
             $userlist=array();
	            foreach($data['users'] as $user){
	            	$userlist[]=$user->employee_id;
	            }
            
            $data['employees']=array();
            foreach($data['employeeslist'] as $key=>$employee){
            if(in_array($employee->emp_code, $userlist)) 
			  { 
			  
			  } 
			else
			  { 
			  	$data['employees'][]= (object) array("emp_code"=>$employee->emp_code,"emp_fname"=>$employee->emp_fname,"emp_mname"=>$employee->emp_mname,"emp_lname"=>$employee->emp_lname);
			  }

            }
           
            $data['user']=DB::table('users')->where('id','=',$user_id)->first();
	        //return redirect('role/vw-user-config');
	         return view('role/view-user-config', $data);
	    }

        public function SaveUserConfigForm(Request $request) 
        {
            //print_r($request->all()); exit;
            $password = Hash::make($request->user_pass);
            $validator=Validator::make($request->all(),[
                'emp_code'=>'required|unique:users,employee_id',
                'user_email'=>'required|email|unique:users,email',
                'user_pass'=>'required|max:20',
                'name'=>'required'  
			],
			[
	                'emp_code.required'=>'Employee Code Required',
	                'emp_code.unique'=>'Employee Code Already Exist',
					'user_email.required'=>'Email ID Required',
					'user_email.unique'=>'Email ID Already Exist',
	                'user_pass.required'=>'Password Required',
			]);
			
			if(!empty($request->employee_id)){
				if(!empty($request->employee_id) && !empty($request->user_pass)){
				DB::table('users')
	            ->where('employee_id','=',$request->employee_id)
	            ->update(['password' => Hash::make($request->user_pass),
             	'status' => $request->status]);
             	Session::flash('message','User info Successfully.');
	            return redirect('role/vw-users'); 
	            
				}else{
					DB::table('users')
		            ->where('employee_id','=',$request->employee_id)
		            ->update(['status' => $request->status]);
		            Session::flash('message','User info Successfully.');
		            return redirect('role/vw-users'); 
				}
			}else{

				if($validator->fails())
				{
					return redirect('role/vw-user-config')->withErrors($validator)->withInput();
		        }else{ 
		         	
		            $user= new User();
		            $user->employee_id=$request->emp_code;
		            $user->name=$request->name;
		            $user->email=$request->user_email;
		            $user->user_type='user';
		            $user->password=Hash::make($request->user_pass);
		            $user->save();
		            Session::flash('message','User info Successfully.');
		            return redirect('role/vw-users'); 
		        }

			}
			
        }

        /*public function getUserAccessRights($role_authorization_id)
        {           
            $data['users']=DB::table('users')->where('user_type','=','user')->get();
            $data['module']=DB::table('module')->get();
            $data['menu']=DB::table('module_config')->get();
            $data['role_authorization'] = DB::table('role_authorization')      
            ->where('id', '=', $role_authorization_id)->first();
        	return view('role/role',$data);  
        }*/

        public function deleteUserAccess($role_authorization_id)
        {           
            // echo $role_authorization_id; exit;
            $result= DB::table('role_authorization')->where('id', '=', $role_authorization_id)->delete();
        	Session::flash('message','Access permission deleted Successfully.');
			return redirect('role/view-users-role'); 
        }

        public function viewUserAccessRights()
        {           
            $data['roles'] = DB::table('role_authorization')      
            ->join('module', 'role_authorization.module_name', '=', 'module.id')
            ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
            ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
            ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
            ->groupBy('role_authorization.member_id')
            ->groupBy('role_authorization.menu')  
            ->groupBy('role_authorization.rights') 
            ->get(); 
        	return view('role/view-users-role',$data);  
        }
        
        
}
