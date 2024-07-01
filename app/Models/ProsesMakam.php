<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProsesMakam extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'proses_makam';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_pemakaman';

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

        'id_pemakaman',
        'id_jenazah',
        'id_lokasi',
        'id_biaya',
        'id_pekerja',
        'tanggal_pemakaman',
        'jumlah_pekerja'

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

        'jumlah_pekerja' => 'integer'

    ];



    public static function generateId()
    {
        $count = self::count() + 1;
        return 'PM' . str_pad($count, 5, '0', STR_PAD_LEFT);
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

    public function pekerja()
    {
        return $this->belongsTo(Pekerja::class, 'id_pekerja');
    }
}
