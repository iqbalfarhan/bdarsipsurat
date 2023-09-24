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
            'user.resetpassword',

            'surat.index',
            'surat.create',
            'surat.show',
            'surat.edit',
            'surat.delete',
            'surat.moreactions',
            'surat.restore',
            'surat.forcedelete',

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

            'pengaturan.menu',
        ];

        foreach ($datas as $permission) {
            $permit = Permission::create(['name' => $permission]);

            if ($permit) {
                if (str_contains($permit, '.delete') == false) {
                    $permit->assignRole('admin');
                }
            }

            if(in_array($permit, ['surat.index', 'surat.show'])){
                $permit->assignRole('user');
            }
        }
    }
}
