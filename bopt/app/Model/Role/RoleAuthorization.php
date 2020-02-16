<?php

namespace App\Model\Role;

use Illuminate\Database\Eloquent\Model;

class RoleAuthorization extends Model
{
    //
	protected $table="role_authorization";
	protected $primaryKey="id";
	protected $fillable=[ 'id', 'member_id', 'user_type', 'module_name','sub_module_name','menu','rights', 'updated_at', 'created_at'];
}
