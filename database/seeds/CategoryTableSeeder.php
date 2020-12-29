<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/21/2020
 * Time: 11:25 PM
 */

use App\Category;
use App\Incident;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends seeder
{
    public function run() {
        Incident::create([
            'incident'=>'Insurance Fraud'
        ]);
        Incident::create([
            'incident'=>'Damages_$'
        ]);
        Incident::create([
            'incident'=>'Days Late'
        ]);
        Incident::create([
            'incident'=>'Fail To Return'
        ]);
        Incident::create([
            'incident'=>'Fraudulent'
        ]);
        Incident::create([
            'incident'=>'Soiled Seats'
        ]);
        Incident::create([
            'incident'=>'Smoke Odor'
        ]);
        Incident::create([
            'incident'=>'Deposit Spent'
        ]);
        Incident::create([
            'incident'=>'Citations / Violations'
        ]);
        Incident::create([
            'incident'=>'Other'
        ]);

        $autoRental = Category::create([
            'category' => 'Auto Rental',
            'detail' => json_encode(['vehicle info']),
            'order' => 0
        ]);

        $apartmentRental = Category::create([
            'category' => 'Apartment Rental',
            'detail' => json_encode(['rooms', 'bathrooms', 'kitchen']),
            'order' => 1
        ]);

        $eventRental = Category::create([
            'category' => 'Event Rental',
            'detail' => json_encode(['meeting', 'party']),
            'order' => 2
        ]);

        $equipmentRental = Category::create([
            'category' => 'Equipment Rental',
            'detail' => json_encode(['equipment info']),
            'order' => 3
        ]);

        $furnitureRental = Category::create([
            'category' => 'Furniture Rental',
            'detail' => json_encode(['sofa', 'loveseat', 'tv', 'appliances']),
            'order' => 4
        ]);

        $autoRental->incidents([
            1 => ['score'=>8],
            2 => ['score'=>6],
            3 => ['score'=>4],
            4 => ['score'=>10],
            5 => ['score'=>9],
            6 => ['score'=>5],
            7 => ['score'=>7],
            8 => ['score'=>3],
            9 => ['score'=>2],
            10 => ['score'=>1],
        ]);

        $apartmentRental->incidents([
            1 => ['score'=>8],
            2 => ['score'=>6],
            6 => ['score'=>5],
            7 => ['score'=>7],
            9 => ['score'=>2],
            10 => ['score'=>1],
        ]);

        $eventRental->incidents([
            2 => ['score'=>6],
            4 => ['score'=>10],
            5 => ['score'=>9],
            8 => ['score'=>3],
            10 => ['score'=>1],
        ]);

        $equipmentRental ->incidents([
            2 => ['score'=>6],
            4 => ['score'=>10],
            5 => ['score'=>9],
            8 => ['score'=>3],
            10 => ['score'=>1],
        ]);

        $furnitureRental->incidents([
            1 => ['score'=>8],
            2 => ['score'=>6],
            4 => ['score'=>10],
            5 => ['score'=>9],
            6 => ['score'=>5],
            8 => ['score'=>3],
            10 => ['score'=>1],
        ]);
    }
}