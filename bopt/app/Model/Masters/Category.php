<?php

namespace App\Model\Masters;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";
    protected $primaryKey="id";
	public $timestamps = true;
	protected $fillable = ['id', 'cat_name', 'cat_code'];
}
