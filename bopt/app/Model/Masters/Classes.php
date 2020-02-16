<?php

namespace App\Model\Masters;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    //
	protected $table="class";
	protected $primaryKey="id";
	protected $fillable=['id', 'class_code', 'class_name', 'class_capacity', 'class_status', 'updated_at', 'created_at'];
}
