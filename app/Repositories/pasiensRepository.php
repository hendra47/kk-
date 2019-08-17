<?php

namespace App\Repositories;

use App\Models\pasiens;
use App\Repositories\BaseRepository;

/**
 * Class pasiensRepository
 * @package App\Repositories
 * @version June 25, 2019, 6:09 pm UTC
*/

class pasiensRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'no_ktp',
        'jk',
        'tgl_lahir',
        'alamat'
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
        return pasiens::class;
    }
}
