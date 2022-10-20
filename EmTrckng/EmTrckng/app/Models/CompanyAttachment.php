<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyAttachment extends Model
{
    use HasFactory;
    public $table = 'company_attachments';

    public $fillable = [
        'image',
        'company_id'
    ];
}
