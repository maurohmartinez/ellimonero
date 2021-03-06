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
            'name' => 'Mauro Martínez',
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

        DB::table('products')->insert([
            'name' => 'Producto 1',
            'slug' => 'producto-1',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed.',
            'content' => '<h2>Test de producto</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
            'starts' => '2021-01-01 00:00:00',
            'ends' => '2021-05-01 00:00:00',
            'type' => 'regular',
            'price' => 900,
            'images' => '[{"image_url":"/storage/products/02678edd6a2b657421f5c4d50527f66e.jpg"}]',
            'timeframe' => 'always',
            'active' => 1,
            'new' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('products')->insert([
            'name' => 'Producto 2',
            'slug' => 'producto-2',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed.',
            'content' => '<h2>Test de producto</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
            'starts' => '2021-01-01 00:00:00',
            'ends' => '2021-05-01 00:00:00',
            'type' => 'regular',
            'price' => 850,
            'images' => '[{"image_url":"/storage/products/02678edd6a2b657421f5c4d50527f66e.jpg"}]',
            'timeframe' => 'always',
            'active' => 1,
            'new' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('products')->insert([
            'name' => 'Producto 3',
            'slug' => 'producto-3',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed.',
            'content' => '<h2>Test de producto</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
            'starts' => '2021-01-01 00:00:00',
            'ends' => '2021-05-01 00:00:00',
            'type' => 'auction',
            'price' => 500,
            'stock' => 1,
            'images' => '[{"image_url":"/storage/products/02678edd6a2b657421f5c4d50527f66e.jpg"}]',
            'timeframe' => 'always',
            'active' => 1,
            'new' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('products')->insert([
            'name' => 'Producto 4',
            'slug' => '2-cds-autografiados',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed.',
            'content' => '<h2>Test de producto</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
            'starts' => '2021-01-01 00:00:00',
            'ends' => '2021-05-01 00:00:00',
            'type' => 'auction',
            'price' => 550,
            'stock' => 1,
            'images' => '[{"image_url":"/storage/products/02678edd6a2b657421f5c4d50527f66e.jpg"}]',
            'timeframe' => 'always',
            'active' => 1,
            'new' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('popups')->insert([
            'title' => 'Entrada gratis',
            'subtitle' => 'Obtené tu regalo',
            'slug' => 'obtene-tu-entrada-gratis',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed.',
            'images' => '[{"image_url":"/storage/popups/popup.jpg"},{"image_url":"/storage/popups/popup.jpg"}]',
            'active' => 1,
            'starts' => '2021-01-01 00:00:00',
            'ends' => '2021-05-01 00:00:00',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        
        DB::table('qrs')->insert([
            'token' => 'si3u1',
            'welcome' => 'Estás a un paso de ganarte 2 entradas para ver a Maxi',
            'success' => '<h5>¡Ganaste 2 entradas para ver un show de Maxi!</h5><p><br>¿Dónde? Calle Corrientes — ¿Cuándo? Durante el 2021.</p><p><small>* Apenas se confirme la fecha del recital te avisaremos con tiempo para que puedas programarlo.</small></p>',
            'description' => 'Vale x2 entradas para ver a Maxi el día xx-xx en xxx. Para ingresar entrá por puerta xx y mostrá este mensaje.',
            'image' => '/storage/qr/294c9acfa0f5363e0e470872dbddb96a.jpg',
            'stock' => 100,
            'always_visible' => 1,
            'active' => 1,
            'type' => 'ticket',
            'starts' => '2021-01-01 00:00:00',
            'ends' => '2021-05-01 00:00:00',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
