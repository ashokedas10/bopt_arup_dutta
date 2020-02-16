<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GraceperiodModel extends Model
{
    //
	protected $table = 'grace_period';
	protected $primarykey = 'id';
	protected $fillable = [ 'id', 'company_id', 'grade_id', 'branch_id', 'shift_name', 'shift_in_time', 'grace_period', 'updated_at', 'created_at'];
}
