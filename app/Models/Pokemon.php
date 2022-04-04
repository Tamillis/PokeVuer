<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Pokemon extends Model
{
    use HasApiTokens;

    protected $fillable = [
        'name',
        'spriteUrl',
    ];
}
