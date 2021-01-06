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
        if(env('APP_ENV') === 'local'){
            User::factory(10)->create();
        }
    }
}
