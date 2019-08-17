<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class obats
 * @package App\Models
 * @version June 30, 2019, 1:26 pm UTC
 *
 * @property string code
 * @property string nama
 * @property string jenis
 * @property string satuan
 * @property integer harga_beli
 * @property integer harga_jual
 */
class tindakan extends Model
{
    // use SoftDeletes;

    public $table = 'tindakan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'code',
        'nama',
        'type',
        'biaya'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'nama' => 'string',
        'type' => 'string',
        'biaya' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required',
        'nama' => 'required',
        'type' => 'required',
        'biaya' => 'required'
    ];

    
}
