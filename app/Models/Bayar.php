<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bayar extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bayar';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_bayar';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

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

        'id_bayar',
        'id_daftar',
        'id_jenazah',
        'id_lokasi',
        'id_biaya',
        'id_harga',
        'tanggal_bayar',
        'jenis_bayar',
        'jumlah',
        'status'

    ];

    public static function generateId()
    {
        $count = self::count() + 1;
        return 'BYR' . str_pad($count, 5, '0', STR_PAD_LEFT);
    }

    public function daftar()
    {
        return $this->belongsTo(Daftar::class, 'id_daftar');
    }

    public function jenazah()
    {
        return $this->belongsTo(Jenazah::class, 'id_jenazah');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi');
    }

    public function biaya()
    {
        return $this->belongsTo(Biaya::class, 'id_biaya');
    }

    public function hargaMakam()
    {
        return $this->belongsTo(HargaMakam::class, 'id_harga');
    }
}
