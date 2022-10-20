<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyVisit extends Model
{
    use HasFactory;

    public $table = 'company_visits';

    public $fillable = [
        'id',
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
        'latitude',
        'longitude',
        'created_by'
    ];

    public static $rules = [];
}
