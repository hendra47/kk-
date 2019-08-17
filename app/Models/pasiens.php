<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class pasiens
 * @package App\Models
 * @version June 30, 2019, 2:12 pm UTC
 *
 * @property string nama
 * @property integer no_ktp
 * @property string jk
 * @property string tgl_lahir
 * @property string alamat
 */
class pasiens extends Model
{
    // use SoftDeletes;

    public $table = 'pasiens';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'no_ktp',
        'jk',
        'tgl_lahir',
        'alamat'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'no_ktp' => 'integer',
        'jk' => 'string',
        'tgl_lahir' => 'date',
        'alamat' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'no_ktp' => 'required',
        'jk' => 'required',
        'tgl_lahir' => 'required',
        'alamat' => 'required'
    ];

    
}
