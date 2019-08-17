<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class rekam_medis
 * @package App\Models
 * @version July 6, 2019, 5:26 pm UTC
 *
 * @property integer id_pasien
 * @property integer id_dokter
 * @property string keluhan
 * @property string alergi_obat
 * @property string is_tindakan
 * @property string note
 * @property integer id_daftar
 */
class rekam_medis extends Model
{
    use SoftDeletes;

    public $table = 'rekam_medis';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_pasien',
        'id_dokter',
        'keluhan',
        'alergi_obat',
        'is_tindakan',
        'note',
        'id_daftar'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_pasien' => 'integer',
        'id_dokter' => 'integer',
        'keluhan' => 'string',
        'alergi_obat' => 'string',
        'is_tindakan' => 'string',
        'note' => 'string',
        'id_daftar' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required',
        'id_pasien' => 'required',
        'id_dokter' => 'required',
        'keluhan' => 'required',
        'alergi_obat' => 'required',
        'is_tindakan' => 'required'
    ];

    
}
