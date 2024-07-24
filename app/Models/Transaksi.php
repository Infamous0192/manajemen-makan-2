<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    public $incrementing = false; // Since the primary key is not auto-incrementing
    protected $keyType = 'string';

    protected $fillable = [
        'id_transaksi',
        'judul',
        'keterangan',
        'jenis',
        'jumlah',
        'tanggal',
    ];

    public static function generateId()
    {
        $count = self::count() + 1;
        return 'TX' . str_pad($count, 5, '0', STR_PAD_LEFT);
    }
}
