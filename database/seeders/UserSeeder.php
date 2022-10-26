<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     [
        //         'name' => 'gustavo',
        //         'email' => 'gustavo@email.com',
        //         'password' => bcrypt('gus123')
        //     ],
        //     [
        //         'name' => 'test',
        //         'email' => 'test@email.com',
        //         'password' => bcrypt('gus123')
        //     ]
        // ]);

        User::factory()->times(50)->create();
    }
}
