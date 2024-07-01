<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenazah extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jenazah';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_jenazah';

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

        'id_jenazah',
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'status_kawin',
        'kewarganegaraan',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'rt',
        'rw',
        'alamat_lengkap',
        'alamat_singkat',
        'agama',
        'pendidikan',
        'pekerjaan'

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

        'rt' => 'integer',
        'rw' => 'integer'

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
        return 'JZ' . str_pad($count, 5, '0', STR_PAD_LEFT);
    }



    public function daftar()
    {
        return $this->hasMany(Daftar::class, 'id_jenazah');
    }

    public function bayar()
    {
        return $this->hasMany(Bayar::class, 'id_jenazah');
    }

    public function prosesMakam()
    {
        return $this->hasMany(ProsesMakam::class, 'id_jenazah');
    }

    public function rawat()
    {
        return $this->hasMany(Rawat::class, 'id_jenazah');
    }
}
