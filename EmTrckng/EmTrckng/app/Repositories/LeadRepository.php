<?php

namespace App\Repositories;

use App\Models\Lead;
use App\Models\LeadReplay;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Class LeadRepository
 * @package App\Repositories
 * @version July 26, 2021, 12:17 pm UTC
 */

class LeadRepository extends BaseRepository
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
        return Lead::class;
    }

}
