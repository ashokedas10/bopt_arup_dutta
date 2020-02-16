<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryAdvanceModel extends Model
{
    //
	protected $table = "salary_advance";
	protected $primarykey = "id";
	protected $fillable = ['id', 'salary_advance_amount', 'apply_date', 'salary_advance_status', 'updated_at', 'created_at'];
}
