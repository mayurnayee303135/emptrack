<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    public $table = 'leads';

    public $fillable = [
        'id',
        'company_visit_id',
        'name',
        'city',
        'state',
        'address',
        'operated_by',
        'industry',
        'contact_person',
        'designation',
        'department',
        'decision_maker',
        'contact_no',
        'email',
        'customer_code',
        'date_of_visit',
        'next_follow_update',
        'attachment',
        'created_by'
    ];

    public static $rules = [];
}
