<?php

namespace App\Repositories;

use App\Models\users;
use App\Repositories\BaseRepository;

/**
 * Class usersRepository
 * @package App\Repositories
 * @version June 30, 2019, 3:50 pm UTC
*/

class usersRepository extends BaseRepository
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
        return users::class;
    }
}
