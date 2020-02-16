<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtraClassAllowance extends Model
{
    //
	protected $table="extra_class_allowance";
	protected $primaryKey='id';
	protected $fillable=['id', 'company_id', 'grade_id', 'branch_id', 'allowance_amount', 'updated_at', 'created_at'];
	
}
