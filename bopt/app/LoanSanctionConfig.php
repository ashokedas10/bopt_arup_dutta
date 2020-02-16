<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanSanctionConfig extends Model
{
    //
	protected $table='loan_sanction_config';
	protected $primaryKey='id';
	protected $fillable=['id', 'employee_code', 'loan_applied_no', 'loan_sanction_no', 'loan_type', 'loan_apply_date', 'loan_sanction_date', 'loan_sanction_amount', 'rate_of_intrest', 'number_of_installement', 'principal_amt', 'intrest_amt', 'recover_month', 'recover_year', 'recover_status', 'updated_at', 'created_at'];
	 
}
