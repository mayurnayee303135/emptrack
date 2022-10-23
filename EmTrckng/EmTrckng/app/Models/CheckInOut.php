<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckInOut extends Model
{
    use HasFactory;
    public $table = 'check_in_outs';

    public $fillable = [
        'user_id',
        'date',
        'flag',
        'check_in',
        'check_out',
        'latitude',
        'longitude',
        'address'
    ];
}
