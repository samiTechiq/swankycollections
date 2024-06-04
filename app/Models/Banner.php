<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_title',
        'second_title',
        'third_title',
        'first_image',
        'second_image',
        'third_image',
    ];
}
