<?php

namespace App\Model\Masters;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
	protected $table="item";
	// protected $primaryKey="id";
	protected $fillable=[ 'id', 'item_code', 'name','type', 'c_id', 'min_stock', 'status','unit_id', 'stockable', 'gst', 'item_desc', 'created_at', 'updated_at'];
}
