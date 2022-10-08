<?php

namespace App\Repositories;

use App\Models\CompanyVisit;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Class CompanyVisitRepository
 * @package App\Repositories
 * @version July 26, 2021, 12:17 pm UTC
 */

class CompanyVisitRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
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
        return CompanyVisit::class;
    }
}
