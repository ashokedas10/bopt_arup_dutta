<?php

namespace App\Model\Room;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    // 
	protected $table="room_type";
	protected $primaryKey="id";
	protected $fillable=['id', 'room_type_code', 'room_type_name', 'room_type_status', 'updated_at', 'created_at'];
}
