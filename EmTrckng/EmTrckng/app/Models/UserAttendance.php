<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAttendance extends Model
{
	use HasFactory;

	public $table = 'user_attendance';

	public $fillable = [
		'id',
		'user_id',
		'check_in_date',
		'check_in_time',
		'check_out_date',
		'check_out_time',
		'user_location',
		'latitude',
		'longitude',
		'created_at',
		'updated_at'
	];

	protected $appends = array('user_name');
    public function getUserNameAttribute()
    {
        return $this->user->name;
    }
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
