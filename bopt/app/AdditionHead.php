<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionHead extends Model
{
    //
	protected $table='addition_head';
	protected $primaryKey='id';
	protected $fillable=['id', 'head_name', 'alias_name', 'description', 'created_at', 'updated_at', 'addition_head_status'];
}
