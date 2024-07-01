<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'daftar';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_daftar';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'int';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'nama',
        'no_hp',
        'tanggal_meninggal',
        'id_jenazah'

    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    public static function generateId()
    {
        $count = self::count() + 1;
        return 'DF' . str_pad($count, 5, '0', STR_PAD_LEFT);
    }



    public function jenazah()
    {
        return $this->belongsTo(Jenazah::class, 'id_jenazah');
    }

    public function bayar()
    {
        return $this->hasMany(Bayar::class, 'id_daftar');
    }
}
