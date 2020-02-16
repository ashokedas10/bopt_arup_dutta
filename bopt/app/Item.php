<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Item extends Model
{
    //
	protected $table='item';
	// protected $primaryKey="id";
	protected $fillable=[ 'id', 'item_code', 'name','type', 'min_stock', 'status','unit_id', 'created_at', 'updated_at'];
}
