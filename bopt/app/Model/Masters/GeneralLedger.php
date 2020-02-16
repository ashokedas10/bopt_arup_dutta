<?php

namespace App\Model\Masters;

use Illuminate\Database\Eloquent\Model;
use DB;



class GeneralLedger extends Model
{
    protected $table = 'ledger_master';
    public $timestamps= false;
	protected $fillable = ['asset_grp', 'gl_code','gl_name','gl_type','gl_description'];

}
