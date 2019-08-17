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
class obats extends Model
{
    // use SoftDeletes;

    public $table = 'obats';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'code',
        'nama',
        'jenis',
        'satuan',
        'harga_jual'
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
        'jenis' => 'string',
        'satuan' => 'string',
        'harga_jual' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required',
        'nama' => 'required',
        'jenis' => 'required',
        'satuan' => 'required',
        'harga_jual' => 'required'
    ];

    
}
