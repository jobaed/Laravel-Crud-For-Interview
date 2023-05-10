<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    // Fillabe Propartys
    protected $fillable = ['name', 'email', 'other_infos'];
}
