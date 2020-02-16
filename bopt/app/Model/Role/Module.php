<?php

namespace App\Model\Role;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //
	protected $table="module";
	protected $primaryKey="id";
	protected $fillable=['id', 'module_name', 'created_at', 'updated_at'];
}
