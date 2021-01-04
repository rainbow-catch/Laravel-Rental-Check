<?php

use Faker\Generator as Faker;

$factory->define(App\Complaint::class, function (Faker $faker) {
    $company = array_random(\App\Company::all()->all());
    $customer = array_random(\App\Customer::all()->all());

    $detail = [];
    foreach (json_decode($company->category->detail) as $item) {
        $detail[$item] = $faker->sentence();
    }

    $incident_types = [];
    foreach ($company->category->incidents as $item) {
        if(random_int(0,1)) array_push($incident_types, $item->id);
    }

    $image_path = "default/".array_random(['1.png', '2.png', '3.png', '4.png']);
    return [
        'company_id' => $company->id,
        'customer_id' => $customer->id,
        'incident_date' => $faker->dateTimeBetween('-30 days', 'now'),
        'zipcode' => $faker->numerify('######'),
        'detail' => json_encode($detail,JSON_UNESCAPED_SLASHES),
        'amount' => $faker->numberBetween(1, 100),
        'pickup_date' => $faker->dateTimeBetween('-2 years', '-3 months'),
        'return_date' => $faker->dateTimeBetween('-3 months', '-1 months'),
        'description' => $faker->sentence(),
        'incident_types' => json_encode($incident_types, JSON_UNESCAPED_SLASHES),
        'media_type' => array_random(['background', 'carousel', 'video']),
        'pathOrUrl' => json_encode([array_random([ ['type'=>'path','src'=>$image_path], ['type'=>'url','src'=>$faker->imageUrl()] ])],JSON_UNESCAPED_SLASHES),
    ];
});
