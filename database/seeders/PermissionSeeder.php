<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            'user.index',
            'user.create',
            'user.show',
            'user.edit',
            'user.delete',

            'surat.index',
            'surat.create',
            'surat.show',
            'surat.edit',
            'surat.delete',

            'unit.index',
            'unit.create',
            'unit.show',
            'unit.edit',
            'unit.delete',

            'kategori.index',
            'kategori.create',
            'kategori.show',
            'kategori.edit',
            'kategori.delete',

            'subkategori.index',
            'subkategori.create',
            'subkategori.show',
            'subkategori.edit',
            'subkategori.delete',
        ];

        foreach ($datas as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
