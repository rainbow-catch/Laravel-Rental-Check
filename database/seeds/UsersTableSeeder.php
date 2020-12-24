<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/21/2020
 * Time: 11:15 PM
 */

use App\Admin;
use App\Company;
use App\Customer;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UsersTableSeeder  extends Seeder
{
    public function run(){
        User::create([
            'email' => "admin@gmail.com",
            'password' => bcrypt('asdfasdf'),
            'role' => 'admin',
            'super_admin' => true,
            'isActive' => true,
            'remember_token' => str_random(10),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Admin::create([
            'user_id' => 1,
            'first_name' => "admin",
            'last_name' => "admin",
            'gender' => "male",
            'phone' => "123456789",
            'address' => "admin's address",
            'avatar' => 'girl-1.png',
        ]);
        factory(Customer::class, 10)->create();
        factory(Company::class, 10)->create();
        factory(Admin::class, 5)->create();
    }
}