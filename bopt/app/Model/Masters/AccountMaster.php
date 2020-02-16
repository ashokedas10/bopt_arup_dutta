<?php

namespace App\Model\Masters;

use Illuminate\Database\Eloquent\Model;
use DB;



class AccountMaster extends Model
{
    protected $table = 'account_master';
    public $timestamps= false;

	protected $fillable = ['account_code', 'account_type','account_name','account_desc','created_at'];

}
