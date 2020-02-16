<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class OpenBalance extends Model
{
    //
	protected $table="account_opening_balance";
	protected $primaryKey='id';
    protected $fillable=['id', 'group_code', 'group_name', 'account_code', 'account_name', 'opening_balance', 'month_yr','financial_year',
    'cr_amount','dr_amount','closing_balance'];







}
