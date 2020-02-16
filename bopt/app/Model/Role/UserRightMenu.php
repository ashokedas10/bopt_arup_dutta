<?php

namespace App\Model\Role;

use Illuminate\Database\Eloquent\Model;

class UserRightMenu extends Model
{
	protected $table="user_right_menu";
	protected $primaryKey="id";
	protected $fillable=[ 'id', 'role_auth_id', 'user_rights_sub_module_id', 'member_id', 'menu_name', 'updated_at', 'created_at'];
}
