<?php

namespace App\Model\Role;

use Illuminate\Database\Eloquent\Model;

class UserRightList extends Model
{
    //
	protected $table="user_rights_list";
	protected $primaryKey="id";
	protected $fillable=[ 'id', 'role_authorization_id', 'user_rights_sub_module_id', 'user_right_menu_id', 'member_id', 'user_rights_name', 'updated_at', 'created_at'];
}
