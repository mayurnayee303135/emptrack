<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadReplay extends Model
{
    use HasFactory;

    public $table = 'lead_replays';

    public $fillable = [
        'id',
        'lead_id',
        'comment',
        'attachment',
        'created_by'
    ];

    public static $rules = [];
}
