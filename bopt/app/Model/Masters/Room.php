<?php

namespace App\Model\Masters;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
	protected $table="room";
	protected $primaryKey="id";
	protected $fillable=['id', 'room_code', 'room_number', 'room_capacity', 'location', 'building_no', 'floor_no', 'room_type_code', 'accessories_code', 'room_status', 'updated_at', 'created_at'];
}
