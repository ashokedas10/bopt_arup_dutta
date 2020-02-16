<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeductionHead extends Model
{
    //
	protected $table='deduction_head';
	protected $primaryKey='id';
	protected $fillable=['id', 'head_name', 'alias_name', 'description', 'created_at', 'updated_at', 'deduction_head_status'];
}
