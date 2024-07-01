<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biaya extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'biaya';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_biaya';

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

        'id_biaya',
        'nama_pekerjaan',
        'nama_paket',
        'jumlah_pekerja',
        'fasilitas',
        'harga'

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
        return 'BI' . str_pad($count, 5, '0', STR_PAD_LEFT);
    }



    public function bayar()
    {
        return $this->hasMany(Bayar::class, 'id_biaya');
    }

    public function prosesMakam()
    {
        return $this->hasMany(ProsesMakam::class, 'id_biaya');
    }
}
