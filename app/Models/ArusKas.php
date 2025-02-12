<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class ArusKas extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'arus_kas';
    protected $keyType = 'uuid';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'tahun_id',
        'kode',
        'nama',
        'debit',
        'kredit',
        'created_at',
        'updated_at'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function tahun()
    {
        return $this->belongsTo(Periode::class, 'tahun_id', 'id');
    }
}
