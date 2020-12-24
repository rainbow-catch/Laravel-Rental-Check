<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('password'),
        'role' => array_rand(['customer'=>'customer', 'company'=> 'customer']),
        'isActive' => $faker->boolean,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Customer::class, function (Faker $faker) {
    static $password;
    $gender = $faker->randomElement(['male', 'female', 'others']);

    if($gender == "female")
        $avatar = $faker->randomElement(['girl.png', 'girl-1.png', 'girl-2.png']);
    else
        $avatar = $faker->randomElement(['boy.png', 'boy-1.png', 'man.png', 'man-1.png', 'man-2.png', 'man-3.png']);
    return [
        'user_id' => factory('App\User')->create()->id,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'gender' => $gender,
        'phone' => $faker->isbn10(),
        'address' => $faker->address,
        'avatar' => $avatar,
        'about' => $faker->text($maxNbChars = 200),
        'license' => str_random(10),
        'facebook_id' => $faker->url,
        'twitter_id' => $faker->url,
        'linkedin_id' => $faker->url,
        'instagram_id' => $faker->url,
    ];
});


$factory->define(App\Company::class, function (Faker $faker) {
    static $password;
    $gender = $faker->randomElement(['male', 'female', 'others']);
    $categories = \App\Category::all();
    if($gender == "female")
        $avatar = $faker->randomElement(['girl.png', 'girl-1.png', 'girl-2.png']);
    else
        $avatar = $faker->randomElement(['boy.png', 'boy-1.png', 'man.png', 'man-1.png', 'man-2.png', 'man-3.png']);
    return [
        'user_id' => factory('App\User')->create()->id,
        'company_name' => $faker->name,
        'manager_name' => $faker->name,
        'gender' => $gender,
        'phone' => $faker->isbn10(),
        'address' => $faker->address,
        'avatar' => $avatar,
        'about' => $faker->text($maxNbChars = 200),
        'license' => str_random(10),
        'facebook_id' => $faker->url,
        'twitter_id' => $faker->url,
        'linkedin_id' => $faker->url,
        'instagram_id' => $faker->url,
        'fed_id' => $faker->randomNumber(6),
        'category_id' => $faker->randomElement($categories)->id
    ];
});
$factory->define(App\Admin::class, function (Faker $faker) {
    static $password;
    $gender = $faker->randomElement(['male', 'female', 'others']);

    if($gender == "female")
        $avatar = $faker->randomElement(['girl.png', 'girl-1.png', 'girl-2.png']);
    else
        $avatar = $faker->randomElement(['boy.png', 'boy-1.png', 'man.png', 'man-1.png', 'man-2.png', 'man-3.png']);
    return [
        'user_id' => factory('App\User')->create()->id,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'gender' => $gender,
        'phone' => $faker->isbn10(),
        'address' => $faker->address,
        'avatar' => $avatar,
        'facebook_id' => $faker->url,
        'twitter_id' => $faker->url,
        'linkedin_id' => $faker->url,
        'instagram_id' => $faker->url,
    ];
});
