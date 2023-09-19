<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    public $fillable = [
        'subkategori_id',
        'unit_id',
        'user_id',
        'jenis',
        'perihal',
        'use_password',
        'password',
        'file',
    ];

    public function subkategori()
    {
        return $this->belongsTo(Subkategori::class);
    }

    public function kategori()
    {
        return $this->subkategori->kategori();
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}