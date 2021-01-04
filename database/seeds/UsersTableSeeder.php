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
use App\Membership;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UsersTableSeeder  extends Seeder
{
    public function run(){
        \App\AutoApprove::create([
            'isAuto' => false
        ]);
        User::create([
            'email' => "admin@gmail.com",
            'password' => bcrypt('asdfasdf'),
            'role' => 'admin',
            'super_admin' => true,
            'isActive' => true,
            'security_question_id' => 1,
            'security_answer' => "answer",
            'verified' => 1,
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
            'avatar' => 'default/girl-1.png',
        ]);

        Membership::create([
            'name'=>'basic',
            'price'=>0,
            'state'=>1,
            'search'=>5,
            'image'=>0,
            'video'=>0,
            'video_length'=>0,
            'record'=>10
        ]);
        Membership::create([
            'name'=>'extended',
            'price'=>2,
            'state'=>5,
            'search'=>10,
            'image'=>5,
            'video'=>2,
            'video_length'=>30,
            'record'=>50
        ]);
        Membership::create([
            'name'=>'premium',
            'price'=>5,
            'state'=>-1,
            'search'=>-1,
            'image'=>10,
            'video'=>5,
            'video_length'=>60,
            'record'=>100
        ]);
        factory(Customer::class, 10)->create();
        factory(Company::class, 10)->create();
        factory(Admin::class, 5)->create();
    }

}