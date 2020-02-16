<?php

namespace App\Model\Masters;

use Illuminate\Database\Eloquent\Model;
use DB;



class Tds extends Model
{
    protected $table = 'tds_master';
    public $timestamps= false;

	protected $fillable = ['tds_section', 'tds_percentage'];

}
