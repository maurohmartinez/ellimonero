<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'test@test.com',
            'is_admin' => true,
            'password' => '$2y$10$xVaTRwYeYkHYaEkivqpANO/rSifPX8p9.4MyE5qDcdi6aZX4fnp2K', // test
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        if (env('APP_ENV') === 'local') {
            User::factory(10)->create();
        }

        DB::table('menu_items')->insert([
            'name' => 'Home',
            'type' => 'internal_link',
            'link' => '/',
            'lft' => 2,
            'rgt' => 3,
            'depth' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('menu_items')->insert([
            'name' => 'Nosotros',
            'type' => 'internal_link',
            'link' => '#nosotros',
            'lft' => 4,
            'rgt' => 5,
            'depth' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('menu_items')->insert([
            'name' => 'Tienda',
            'type' => 'internal_link',
            'link' => '#tienda',
            'lft' => 6,
            'rgt' => 7,
            'depth' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('menu_items')->insert([
            'name' => 'Blog',
            'type' => 'internal_link',
            'link' => '#blog',
            'lft' => 8,
            'rgt' => 9,
            'depth' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('menu_items')->insert([
            'name' => 'Con opciones',
            'type' => 'internal_link',
            'link' => '#opciones',
            'lft' => 10,
            'rgt' => 15,
            'depth' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('menu_items')->insert([
            'name' => 'Opción 1',
            'type' => 'internal_link',
            'link' => '#',
            'parent_id' => 5,
            'lft' => 11,
            'rgt' => 12,
            'depth' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('menu_items')->insert([
            'name' => 'Opción 2',
            'type' => 'internal_link',
            'link' => '#',
            'parent_id' => 5,
            'lft' => 13,
            'rgt' => 14,
            'depth' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
