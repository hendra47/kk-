<?php

namespace App\Repositories;

use App\Models\roles;
use App\Repositories\BaseRepository;

/**
 * Class rolesRepository
 * @package App\Repositories
 * @version July 4, 2019, 12:39 pm UTC
*/

class rolesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'menu',
        'akses'
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
        return roles::class;
    }
}
