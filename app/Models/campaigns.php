<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class campaigns extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'from',
        'to',
        'total',
        'daily_budget',
        'images'
    ];
}
