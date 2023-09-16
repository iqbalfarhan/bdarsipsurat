<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subkategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategoris_id',
        'name'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function surats()
    {
        return $this->hasMany(Surat::class);
    }
}