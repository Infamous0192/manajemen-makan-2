<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $table = 'pengeluaran';
    protected $primaryKey = 'id_pengeluaran';
    protected $keyType = 'string';
    public $timestamps = true;

    protected $fillable = [
        'id_pengeluaran',
        'biaya',
        'tanggal'
    ];

    public static function generateId()
    {
        $count = self::count() + 1;
        return 'PGL' . str_pad($count, 5, '0', STR_PAD_LEFT);
    }
}
