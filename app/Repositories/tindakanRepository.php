<?php

namespace App\Repositories;

use App\Models\tindakan;
use App\Repositories\BaseRepository;

/**
 * Class tindakanRepository
 * @package App\Repositories
 * @version June 30, 2019, 1:26 pm UTC
*/

class tindakanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'nama',
        'type',
        'biaya'
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
        return tindakan::class;
    }
}
