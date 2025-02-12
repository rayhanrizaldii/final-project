<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class KategoriCoa extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'kategori_coa';
    protected $keyType = 'uuid';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'nama_kategori',
        'created_at',
        'updated_at'
    ];
}
