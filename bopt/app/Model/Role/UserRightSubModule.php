<?php

namespace App\Model\Role;

use Illuminate\Database\Eloquent\Model;

class UserRightSubModule extends Model
{
    //
	protected $table="user_rights_sub_module";
	protected $primaryKey="id";
	protected $fillable=['id', 'role_auth_id', 'member_id', 'sub_module_name', 'menu_name', 'created_at', 'updated_at'];
}
