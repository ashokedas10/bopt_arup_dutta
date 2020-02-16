<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
	protected $table = 'department';
	protected $primarykey = 'id';
	protected $fillable = ['id', 'department_code', 'department_name', 'updated_at', 'created_at', 'department_status'];
}
