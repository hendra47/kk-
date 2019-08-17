<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class biaya
 * @package App\Models
 * @version June 30, 2019, 4:14 pm UTC
 *
 * @property string nama
 * @property string type
 * @property integer nilai
 */
class biaya extends Model
{
    use SoftDeletes;

    public $table = 'biaya';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'type',
        'nilai'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'type' => 'string',
        'nilai' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'type' => 'required',
        'nilai' => 'required'
    ];

    
}
