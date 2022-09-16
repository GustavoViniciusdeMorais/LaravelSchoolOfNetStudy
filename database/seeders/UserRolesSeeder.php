<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::insert([
            [
                'user_id' => 1,
                'role_id' => 2
            ],
            [
                'user_id' => 2,
                'role_id' => 1
            ]
        ]);
    }
}
