<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class pembayaran_detail2
 * @package App\Models
 * @version July 6, 2019, 5:26 pm UTC
 *
 * @property integer id_pembayaran
 * @property integer id_obat
 * @property string nama_obat
 * @property integer qty
 * @property integer harga
 * @property string note
 */
class pembayaran_detail2 extends Model
{
    use SoftDeletes;

    public $table = 'pembayaran_detail2';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_pembayaran',
        'id_obat',
        'nama_obat',
        'qty',
        'harga',
        'note'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_pembayaran' => 'integer',
        'id_obat' => 'integer',
        'nama_obat' => 'string',
        'qty' => 'integer',
        'harga' => 'integer',
        'note' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required',
        'id_pembayaran' => 'required',
        'id_obat' => 'required',
        'nama_obat' => 'required',
        'qty' => 'required',
        'harga' => 'required',
        'note' => 'required'
    ];

    
}
