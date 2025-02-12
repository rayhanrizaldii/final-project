<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Periode extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'periode';
    protected $keyType = 'uuid';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'tahun',
        'created_at',
        'updated_at'
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'tahun_id', 'id');
    }
    public function arusKas()
    {
        return $this->hasMany(ArusKas::class, 'tahun_id', 'id');
    }
}
