<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert([
            [
                'name' => 'add_product'
            ],
            [
                'name' => 'list_products'
            ],
            [
                'name' => 'update_product'
            ],
            [
                'name' => 'view_product'
            ]
        ]);
    }
}
