<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanConfigurationModel extends Model
{
    //
	protected $table = 'loan_configuration';
	protected $primarykey = 'id';
	protected $fillable = ['id', 'loan_config_id', 'loan_type', 'max_sanction_amt', 'max_time', 'rate_of_interest', 'loan_config_status', 'updated_at', 'created_at'];
}
