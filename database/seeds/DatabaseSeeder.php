<?php

use Illuminate\Database\Seeder;

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
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'first_name' => 'Gwen',
            'last_name' => 'Merida',
            'description' => 'Im an Admin',
            'email' => 'gd.merida@dispostable.com',
            'is_admin' => 1,
            'is_enabled' => 1,
            'updated_at' => now(),
            'created_at' => now()
        ]);
        factory(App\User::class, 20)->create();
    }
}
