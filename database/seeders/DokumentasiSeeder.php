<?php

namespace Database\Seeders;

use App\Models\Dokumentasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DokumentasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                "group" => "surat",
                'permission' => 'surat.create',
                "title" => "Input surat baru",
                "description" => "Silakan untuk masuk ke menu tambah surat dan isi formulir pendaftaran surat baru.\n\nberisi",
            ],
            [
                "group" => "surat",
                'permission' => 'surat.index',
                "title" => "Melihat daftar surat",
                "description" => "silakan untuk masuk ke menu semua surat. disana anda akan melihat semua surat yang dimiliki oleh unit anda. anda dapat mencari atau memfilter surat dengan klik pada tombol dengan icon corong. disana adana dapat memilih kategori dan sub kategrori surat, jenis surat masuk atau keluar dan pencarian dengan perihal.\n\n Secara default halaman ini akan menampukan 25 surat dan anda dapat menentukan berapa surat yang akan ditampilkan dengan klik pada pilihan dengan tampilkan jumlah surat perhalaman.\n\n untuk melihat detail surat anda bisa kelik pada tombol detail dikolom action surat/dokumen (kolo, paling kanan)",
            ],
        ];

        foreach ($datas as $data) {
            Dokumentasi::create($data);
        }
    }
}
