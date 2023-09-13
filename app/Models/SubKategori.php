<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategoris_id',
        'name'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategoris_id', 'id');
    }

    public function surats()
    {
        return $this->hasMany(Surat::class);
    }
}