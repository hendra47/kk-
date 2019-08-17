<?php

namespace App\Repositories;

use App\Models\groups;
use App\Repositories\BaseRepository;

/**
 * Class groupsRepository
 * @package App\Repositories
 * @version June 30, 2019, 3:45 pm UTC
*/

class groupsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama'
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
        return groups::class;
    }
}
