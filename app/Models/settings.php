<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class settings
 * @package App\Models
 * @version June 30, 2019, 1:29 pm UTC
 *
 * @property string nama_klinik
 * @property string alamat
 * @property string phone
 * @property string logo
 */
class settings extends Model
{
    use SoftDeletes;

    public $table = 'settings';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_klinik',
        'alamat',
        'phone',
        'logo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama_klinik' => 'string',
        'alamat' => 'string',
        'phone' => 'string',
        'logo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_klinik' => 'required',
        'alamat' => 'required',
        'phone' => 'required',
        'logo' => 'required'
    ];

    
}
