<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewEmployee extends Model
{
        protected  $table = 'view_employee';   
        public $timestamps = false;

      // Specify the columns that can be filled, but typically none for views
      protected $fillable = [];
      use HasFactory;
}
