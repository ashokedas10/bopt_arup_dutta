<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanSanction extends Model
{
    //
	protected $table="loan_sanction";
	protected $primaryKey='id';
	protected $fillable=['id', 'loan_sanction_no', 'loan_config_id', 'loan_applied_no', 'loan_apply_dt', 'employee_code', 'employee_name', 'purpose_of_loan', 'applied_amt', 'sanction_amt', 'loan_type', 'rate', 'max_time', 'max_sanction_amt', 'months' , 'years', 'loan_sanction_status', 'updated_at', 'created_at'];
	
}
