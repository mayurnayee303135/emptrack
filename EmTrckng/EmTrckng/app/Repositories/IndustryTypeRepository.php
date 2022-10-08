<?php

namespace App\Repositories;

use App\Models\IndustryType;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Class IndustryTypeRepository
 * @package App\Repositories
 * @version July 26, 2021, 12:17 pm UTC
 */

class IndustryTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'status',
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
        return IndustryType::class;
    }
}
