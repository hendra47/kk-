<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class pembayaran_detail1
 * @package App\Models
 * @version July 6, 2019, 5:25 pm UTC
 *
 * @property integer id_pembayaran
 * @property string tindakan
 * @property integer biaya
 */
class pembayaran_detail1 extends Model
{
    use SoftDeletes;

    public $table = 'pembayaran_detail1';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_pembayaran',
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
        'id_pembayaran' => 'integer',
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
        'id_pembayaran' => 'required',
        'tindakan' => 'required',
        'biaya' => 'required'
    ];

    
}
