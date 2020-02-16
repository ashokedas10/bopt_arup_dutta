<?php

namespace App\Model\Masters;

use Illuminate\Database\Eloquent\Model;
use DB;



class Coa extends Model
{
    protected $table = 'coa_master';
    public $timestamps= false;

	protected $fillable = ['coa_code', 'head_name','account_tool','account_type','account_name','account_reflect_on','coa_remarks'];

}
