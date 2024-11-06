<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsections extends Model
{
    use HasFactory;

    protected $fillable = [
        'sections_id',
        'name',
        'sort',
        'is_active'
    ];
}
