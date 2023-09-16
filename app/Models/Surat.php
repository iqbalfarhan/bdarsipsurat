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
        'usePassword',
        'password',
        'file',
    ];

    public function subkategori()
    {
        return $this->belongsTo(Subkategori::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}