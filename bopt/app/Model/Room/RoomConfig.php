<?php

namespace App\Model\Room;

use Illuminate\Database\Eloquent\Model;

class RoomConfig extends Model
{
    // 
	protected $table="room_config";
	protected $primaryKey="id";
	protected $fillable=['id', 'institute_code', 'faculty_id', 'course_code', 'class_code', 'subject_code', 'room_code', 'room_config_status', 'updated_at', 'created_at'];
}
