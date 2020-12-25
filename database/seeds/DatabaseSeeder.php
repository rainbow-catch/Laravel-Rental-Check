<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CategoryTableSeeder::class);
         $this->call(SecurityQuestionsSeeder::class);
         $this->call(UsersTableSeeder::class);
    }
}
