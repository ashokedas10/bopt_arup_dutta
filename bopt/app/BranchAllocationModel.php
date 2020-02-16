<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchAllocationModel extends Model
{
    //
	protected $table = 'branch_allocation';
	protected $primarykey = 'id';
	protected $fillable = ['id', 'company_id', 'branch_id', 'updated_at', 'created_at'];
}
