<?php

namespace App\Model\Masters;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
   protected $table = "sub_categories";
   protected $primaryKey="id";
   public $timestamps = true;
   protected $fillable = ['id', 'sub_cat_code', 'cat_name', 'sub_cat_name', 'coa_code'];
}
