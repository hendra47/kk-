<?php

namespace App\Repositories;

use App\Models\settings;
use App\Repositories\BaseRepository;

/**
 * Class settingsRepository
 * @package App\Repositories
 * @version June 30, 2019, 1:29 pm UTC
*/

class settingsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_klinik',
        'alamat',
        'phone',
        'logo'
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
        return settings::class;
    }
}
