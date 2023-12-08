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
        $this->call(MenusTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(LokasisTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PreferencesTableSeeder::class);
    }
}
