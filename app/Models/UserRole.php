<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{   protected  $table = 'user_roles';
    protected $primaryKey ='id';
    protected $fillable = ['role_name', 'description'];

    use HasFactory;
}
