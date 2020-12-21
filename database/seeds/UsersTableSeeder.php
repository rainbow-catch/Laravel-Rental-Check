<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/21/2020
 * Time: 12:50 PM
 */

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => "admin",
            'last_name' => "admin",
            'gender' => "male",
            'phone' => "123456789",
            'address' => "admin's address",
            'email' => "admin@gmail.com",
            'password' => bcrypt('asdfasdf'),
            'avatar' => 'girl-1.png',
            'about' => "hello from the other world",
            'role' => 'admin',
            'status' => TRUE,
            'remember_token' => str_random(10),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        factory(App\Model\User::class, 10)->create();
    }
}

