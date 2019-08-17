<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class pembayaran
 * @package App\Models
 * @version July 6, 2019, 5:25 pm UTC
 *
 * @property integer id_pasien
 * @property integer id_dokter
 * @property integer id_rekam_medis
 * @property integer total
 * @property string note
 * @property string is_tindakan
 */
class pembayaran extends Model
{
    use SoftDeletes;

    public $table = 'pembayaran';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_pasien',
        'id_dokter',
        'id_rekam_medis',
        'total',
        'note',
        'is_tindakan'
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
        'id_rekam_medis' => 'integer',
        'total' => 'integer',
        'note' => 'string',
        'is_tindakan' => 'string'
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
        'id_rekam_medis' => 'required',
        'total' => 'required',
        'note' => 'required',
        'is_tindakan' => 'required'
    ];

    
}
