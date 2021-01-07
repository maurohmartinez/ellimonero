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
            'name' => 'Administrador Tester',
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
        
        for($i=1; $i<=10; $i++){
            DB::table('products')->insert([
                'name' => 'Producto ' . $i,
                'slug' => 'producto-' . $i,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed.',
                'content' => '<h2>Test de producto</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
                'type' => $i <= 5 ? 'regular' : 'auction',
                'price' => rand(100, 900),
                'price_min' => $i <= 5 ? null : 300,
                'images' => '[{"image_url":"/storage/popups/producto.jpg"}]',
                'timeframe' => 'always',
                'active' => 1,
                'new' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        DB::table('popups')->insert([
            'title' => 'Entrada gratis',
            'subtitle' => 'Obtené tu regalo',
            'slug' => 'obtene-tu-entrada-gratis',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed.',
            'type' => $i <= 5 ? 'regular' : 'auction',
            'price' => 0,
            'price_min' => null,
            'images' => '[{"image_url":"/storage/popups/popup.jpg"},{"image_url":"/storage/popups/popup.jpg"}]',
            'active' => 1,
            'starts' => '2021-01-01 00:00:00',
            'ends' => '2021-05-01 00:00:00',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
