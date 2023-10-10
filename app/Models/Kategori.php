<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'warna',
    ];

    public function subs()
    {
        return $this->hasMany(Subkategori::class);
    }

    public function getColorAttribute(){
        return $this->warna ?? '#e1e1e1';
    }
}