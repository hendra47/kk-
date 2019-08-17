<?php

namespace App\Repositories;

use App\Models\profile;
use App\Repositories\BaseRepository;

/**
 * Class profileRepository
 * @package App\Repositories
 * @version July 5, 2019, 11:57 am UTC
*/

class profileRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_group',
        'name',
        'phone',
        'jk',
        'Alamat',
        'email',
        'password'
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
        return profile::class;
    }
}
