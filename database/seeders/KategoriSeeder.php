<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\SubKategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            "PERENCANAAN" => [
                "Program dan Anggaran",
                "Evaluasi Program Kinerja",
                "Laporan Akuntabiltas Kinerja dan Pelaporan",
            ],
            "ORGANISASI DAN TATA LAKSANA" => [
                "Organisasi dan Ketatalaksanaan",
                "Reformasi Birokrasi",
            ],
            "KEPEGAWAIAN" => [
                "Formasi dan Perimaan Pegawai",
                "Pengangkatan dan Mutasi Pegawai",
                "Pembinaan dan Hukuman Disiplin Pegawau",
                "Pengembangan Pegawai",
                "Tata Usaha Kepegawaian",
                "Pemberhentian Pegawai",
            ],
            "KEUANGAN" => [
                "Pelaksanaan Anggaran",
                "Tata Usaha Keuangan",
                "Perbendaharaan",
                "Akuntansi dan Pelaporan",
            ],
            "PENGELOLAAN BARANG MILIK NEGARA" => [
                "Perencanaan dan Pengadaan BMN",
                "Penetapan Status dan Penggunaan BMN",
                "Penatausahaan BMN",
                "Pemindahtanganan dan Penghapusan BMN",
            ],
            "UMUM" => [
                "Ketatausahaan dan Kearsipan",
                "Kerumahtanggan, Keprotokolan dan Pengamanan",
                "Pembinaan Sikap Mental dan Layanan Kesehatan",
            ],
            "PENGAWASAN" => [
                "Perencanaan dan Pelaksanaan Pengawasan",
                "Pelaporan dan Tindak Lanjut Laporan",
                "Reviu dan Tindak Lanjut Reviu",
                "Tindak Lanjut Pengaduan",
            ],
            "KEHUMASAN DAN HUKUM" => [
                "Infokom, Dokumentasi dan Kepustakaan",
            ],
            "TEKNOLOGI DAN INFORMASI" => [
                "Pengamanan Data, Jaringan dan Standarisasi",
                "Kerjasama",
                "Pengelolaan dan Layanan Sistem TI",
            ],
            "PEMASYARAKATAN" => [
                "Pelayanan Pemasyarakatan",
                "Assesment dan Klasifikasi",
                "Statistik Pelayanan Pemasyarakatan",
                "Bimbingan Kemasyarakatan",
                "Pelayanan Tahanan, Pembinaan Napi dan Latihan Kerja Produksi",
                "Perwatan Kesehatan dan Rehabilitasi",
                "Keamanan dan Ketertiban",
            ],
        ];


        foreach ($datas as $title => $subs) {
            $kat = Kategori::create([
                'name' => $title,
            ]);

            foreach ($subs as $sub) {
                SubKategori::create([
                    'kategoris_id' => $kat->id,
                    'name' => $sub
                ]);
            }
        }
    }
}