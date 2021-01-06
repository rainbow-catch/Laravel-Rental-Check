<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/21/2020
 * Time: 11:15 PM
 */

use App\Membership;
use Illuminate\Database\Seeder;

class BasicSeeder  extends Seeder
{
    public function run(){
        \App\AutoApprove::create([
            'model' => 'user',
            'isAuto' => false
        ]);
        \App\AutoApprove::create([
            'model' => 'complaint',
            'isAuto' => false
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
    }
}