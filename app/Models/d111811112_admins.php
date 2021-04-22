<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class d111811112_admins extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password'
    ];
}