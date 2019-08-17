<?php

namespace App\Repositories;

use App\Models\biaya;
use App\Repositories\BaseRepository;

/**
 * Class biayaRepository
 * @package App\Repositories
 * @version June 30, 2019, 4:14 pm UTC
*/

class biayaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'type',
        'nilai'
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
        return biaya::class;
    }
}
