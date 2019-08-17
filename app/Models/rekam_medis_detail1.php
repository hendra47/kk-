<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class rekam_medis_detail1
 * @package App\Models
 * @version July 6, 2019, 4:15 pm UTC
 *
 * @property integer id_rekam_medis
 * @property string tindakan
 * @property integer biaya
 */
class rekam_medis_detail1 extends Model
{
    use SoftDeletes;

    public $table = 'rekam_medis_detail1';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_rekam_medis',
        'tindakan',
        'biaya'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_rekam_medis' => 'integer',
        'tindakan' => 'string',
        'biaya' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required',
        'id_rekam_medis' => 'required',
        'tindakan' => 'required',
        'biaya' => 'required'
    ];

    
}
