<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Coa extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'coa';
    protected $keyType = 'uuid';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'kode',
        'nama',
        'kategori_coa_id',
        'created_at',
        'updated_at'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function kategoriCoa()
    {
        return $this->belongsTo(KategoriCoa::class, 'kategori_coa_id', 'id');
    }
}
