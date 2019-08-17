<?php

namespace App\Repositories;

use App\Models\obats;
use App\Repositories\BaseRepository;

/**
 * Class obatsRepository
 * @package App\Repositories
 * @version June 30, 2019, 1:26 pm UTC
*/

class obatsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'nama',
        'jenis',
        'satuan',
        'harga_jual'
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
        return obats::class;
    }
}
