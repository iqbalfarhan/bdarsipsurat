<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    public $fillable = [
        'sub_kategoris_id',
        'unit_id',
        'jenis',
        'perihal',
        'file',
    ];

    public function subkategori()
    {
        return $this->belongsTo(SubKategori::class, 'sub_kategoris_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}