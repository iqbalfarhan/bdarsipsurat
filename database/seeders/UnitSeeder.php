<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            "Tata usaha",
            "bimbingan napi / anak didik",
            "kegiatan kerja",
            "kamtib / KPLP",
        ];

        foreach ($datas as $data) {
            Unit::create([
                'name' => $data
            ]);
        }
    }
}