<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class profile
 * @package App\Models
 * @version July 5, 2019, 11:57 am UTC
 *
 * @property integer id_group
 * @property string name
 * @property string phone
 * @property string jk
 * @property string Alamat
 * @property string email
 * @property string password
 */
class profile extends Model
{
    use SoftDeletes;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_group',
        'name',
        'phone',
        'jk',
        'Alamat',
        'email',
        'password',
        'photo',

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_group' => 'integer',
        'name' => 'string',
        'phone' => 'string',
        'jk' => 'string',
        'Alamat' => 'string',
        'email' => 'string',
        'password' => 'string',
        'photo' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'phone' => 'required',
        'jk' => 'required',
        'Alamat' => 'required',
        'email' => 'required'
    ];

    
}
