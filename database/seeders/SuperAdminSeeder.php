<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add Admin role to level_user if it doesn't exist
        $adminRole = DB::table('level_user')->where('nama', 'Admin')->first();
        if (!$adminRole) {
            DB::table('level_user')->insert([
                'nama' => 'Admin'
            ]);
        }

        // Add User role to level_user if it doesn't exist
        $userRole = DB::table('level_user')->where('nama', 'User')->first();
        if (!$userRole) {
            DB::table('level_user')->insert([
                'nama' => 'User'
            ]);
        }

        $superAdminLevel = DB::table('level_user')->where('nama', 'Super Admin')->first();
        $idUserLevel = $superAdminLevel ? $superAdminLevel->id_user_level : 1;

        DB::table('user')->updateOrInsert(
            ['email' => 'admin@example.com'],
            [
                'nama' => 'Super Administrator',
                'nip' => '000001',
                'username' => 'super_admin_new',
                'password' => Hash::make('admin1993Ab!'),
                'id_user_level' => $idUserLevel,
                'is_active' => true,
                'auth_act' => 'enable',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}