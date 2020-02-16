<?php

namespace App\Model\Masters;

use Illuminate\Database\Eloquent\Model;
use DB;



class Gpfrate extends Model
{
    protected $table = 'gpf_rate_master';
    public $timestamps= false;

	protected $fillable = ['rate_of_interest','from_date','to_date','created_at'];

}
