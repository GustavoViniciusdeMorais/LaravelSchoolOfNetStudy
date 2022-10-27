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
        DB::table('users')->insert([
            [
                'name' => 'gustavo',
                'email' => 'gustavo@email.com',
                'password' => bcrypt('gus123')
            ],
            [
                'name' => 'test',
                'email' => 'test@email.com',
                'password' => bcrypt('gus123')
            ],
            [
                'name' => 'testa',
                'email' => 'testa@email.com',
                'password' => bcrypt('gus123')
            ],
            [
                'name' => 'testb',
                'email' => 'testb@email.com',
                'password' => bcrypt('gus123')
            ],
            [
                'name' => 'testc',
                'email' => 'testc@email.com',
                'password' => bcrypt('gus123')
            ],
            [
                'name' => 'testd',
                'email' => 'testd@email.com',
                'password' => bcrypt('gus123')
            ],
            [
                'name' => 'teste',
                'email' => 'teste@email.com',
                'password' => bcrypt('gus123')
            ],
            [
                'name' => 'testee',
                'email' => 'testee@email.com',
                'password' => bcrypt('gus123')
            ]
        ]);

        // User::factory()->times(10)->create();
    }
}
