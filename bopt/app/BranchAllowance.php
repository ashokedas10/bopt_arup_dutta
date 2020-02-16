<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchAllowance extends Model
{
    //
	protected $table="branch_allowance";
	protected $primaryKey='id';
	protected $fillable=['id', 'company_id', 'grade_id', 'branch_id', 'allowance_amount','valid_to','valid_from', 'updated_at', 'created_at'];
	
}
