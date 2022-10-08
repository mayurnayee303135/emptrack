<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustryType extends Model
{
    use HasFactory;
    
    public $table = 'industry_types';

    public $fillable = [
        'id',
        'name',
        'description',
        'status'
    ];

    public static $rules = [];
}
