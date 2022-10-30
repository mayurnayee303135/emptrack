<?php

namespace App\Repositories;

use App\Models\UserAttendance;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Class UserAttendanceRepository
 * @package App\Repositories
 * @version July 26, 2021, 12:17 pm UTC
 */

class UserAttendanceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'check_in_date',
        'check_out_date',
        'user_location',
        'check_in_time',
        'check_out_time',
        'check_out_location'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserAttendance::class;
    }
}
