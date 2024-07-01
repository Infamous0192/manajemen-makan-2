<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lokasi';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_lokasi';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'id_lokasi',
        'id_blok'

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];



    public static function generateId()
    {
        $count = self::count() + 1;
        return 'LK' . str_pad($count, 5, '0', STR_PAD_LEFT);
    }

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    public function blok()
    {
        return $this->belongsTo(Blok::class, 'id_blok');
    }

    public function bayar()
    {
        return $this->hasMany(Bayar::class, 'id_lokasi');
    }

    public function prosesMakam()
    {
        return $this->hasMany(ProsesMakam::class, 'id_lokasi');
    }

    public function rawat()
    {
        return $this->hasMany(Rawat::class, 'id_lokasi');
    }
}
