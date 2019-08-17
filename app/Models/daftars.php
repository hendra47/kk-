<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class daftars
 * @package App\Models
 * @version June 25, 2019, 6:18 pm UTC
 *
 * @property string tgl
 * @property integer id_pasien
 * @property string nama
 * @property boolean pulang
 */
class daftars extends Model
{
    // use SoftDeletes;

    public $table = 'daftars';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'tgl',
        'id_pasien',
        'nama',
        'id_dokter',
        'decode'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tgl' => 'date',
        'id_pasien' => 'integer',
        'nama' => 'string',
        'pulang' => 'boolean',
        'id_dokter'=>'integer',
        'decode'=>'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tgl' => 'required',
        'id_pasien' => 'required',
        'id_dokter' => 'required',
    ];

    
}
