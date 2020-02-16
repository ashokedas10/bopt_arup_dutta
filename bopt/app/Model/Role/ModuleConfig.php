<?php

namespace App\Model\Role;

use Illuminate\Database\Eloquent\Model;

class ModuleConfig extends Model
{
    //
	protected $table="module_config";
	protected $primaryKey="id";
	protected $fillable=['id', 'module_id', 'sub_module_id', 'menu_name', 'updated_at', 'created_at'];
}
