<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class rekam_medis_detail2
 * @package App\Models
 * @version July 6, 2019, 4:15 pm UTC
 *
 * @property integer id_rekam_medis
 * @property integer id_obat
 * @property string nama_obat
 * @property integer qty
 * @property string note
 */
class rekam_medis_detail2 extends Model
{
    use SoftDeletes;

    public $table = 'rekam_medis_detail2';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_rekam_medis',
        'id_obat',
        'nama_obat',
        'qty',
        'note'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_rekam_medis' => 'integer',
        'id_obat' => 'integer',
        'nama_obat' => 'string',
        'qty' => 'integer',
        'note' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required',
        'id_rekam_medis' => 'required',
        'id_obat' => 'required',
        'nama_obat' => 'required',
        'qty' => 'required',
        'note' => 'required'
    ];

    
}
