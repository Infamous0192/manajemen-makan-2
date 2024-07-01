<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerja extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pekerja';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_pekerja';

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
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'id_pekerja',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_hp'

    ];

    public static function generateId()
    {
        $count = self::count() + 1;
        return 'PK' . str_pad($count, 5, '0', STR_PAD_LEFT);
    }



    public function prosesMakam()
    {
        return $this->hasMany(ProsesMakam::class, 'id_pekerja');
    }

    public function rawat()
    {
        return $this->hasMany(Rawat::class, 'id_pekerja');
    }

    public function gaji()
    {
        return $this->hasMany(Gaji::class, 'id_pekerja');
    }
}
