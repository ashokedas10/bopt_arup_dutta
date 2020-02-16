<?php

namespace App\Model\Role;

use Illuminate\Database\Eloquent\Model;

class SubModule extends Model
{
    //
	protected $table="sub_module";
	protected $primaryKey="id";
	protected $fillable=[ 'id', 'module_id', 'sub_module_name', 'created_at', 'updated_at'];
}
