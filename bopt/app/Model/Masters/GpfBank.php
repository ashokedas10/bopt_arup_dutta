<?php

namespace App\Model\Masters;

use Illuminate\Database\Eloquent\Model;
use DB;



class GpfBank extends Model
{
    protected $table = 'gpf_bank';
    public $timestamps= false;

	protected $fillable = ['bank_name', 'branch_name','ifsc_code','micr_code','opening_balance','financial_year','bank_status'];

}
