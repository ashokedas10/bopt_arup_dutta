<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanModel extends Model
{
    //
	protected $table = 'loan_master';
	protected $primaryKey = 'id';
	protected $fillable = ['id', 'loan_id', 'loan_type', 'remarks', 'loan_status', 'updated_at', 'created_at'];
}
