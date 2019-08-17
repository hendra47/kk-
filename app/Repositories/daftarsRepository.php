<?php

namespace App\Repositories;

use App\Models\daftars;
use App\Repositories\BaseRepository;

/**
 * Class daftarsRepository
 * @package App\Repositories
 * @version June 25, 2019, 6:18 pm UTC
*/

class daftarsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tgl',
        'id_pasien',
        'nama',
        'pulang'
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
        return daftars::class;
    }
}
