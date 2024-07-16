<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawatBulanan extends Model
{
    use HasFactory;

    protected $table = 'rawat_bulanan';
    protected $primaryKey = 'id_rawat';
    protected $keyType = 'string';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_rawat',
        'nama_jenazah',
        'id_blok',
        'id_lokasi',
        'status',
        'bukti_transfer',
        'tanggal',
    ];

    public static function generateId()
    {
        $count = self::count() + 1;
        return 'RWB' . str_pad($count, 5, '0', STR_PAD_LEFT);
    }

    public $timestamps = true;

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi');
    }

    public function blok()
    {
        return $this->belongsTo(Blok::class, 'id_blok');
    }
}
