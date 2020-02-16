<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
	protected $table='grade';
	protected $primaryKey='id';
	protected $fillable=['id', 'grade_name', 'created_at', 'updated_at', 'grade_status'];
}
