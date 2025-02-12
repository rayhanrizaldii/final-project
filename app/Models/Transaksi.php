<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Transaksi extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'transaksi';
    protected $keyType = 'uuid';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'tahun_id',
        'coa_id',
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

    public function coa()
    {
        return $this->belongsTo(Coa::class, 'coa_id', 'id');
    }
}
