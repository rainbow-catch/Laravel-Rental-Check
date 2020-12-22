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
            'incident'=>'Damages'
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

        $length = Category::all()->count();
        $category1 = Category::create([
            'category' => 'auto',
            'order' => $length
        ]);

        $category2 = Category::create([
            'category' => 'apartment',
            'order' => $length + 1
        ]);

        $category1->incidents([
            1 => ['score'=>5],
            2 => ['score'=>6],
            5 => ['score'=>1],
            6 => ['score'=>2],
        ]);

        $category2->incidents([
            2 => ['score'=>5],
            4 => ['score'=>6],
        ]);
    }
}