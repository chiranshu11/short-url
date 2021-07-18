<?php

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        $plan = new Plan();
        $plan->name = 'Free Plan';
        $plan->url_limit = 10;
        $plan->is_default = 1;
        $plan->save();

        $plan = new Plan();
        $plan->name = 'Paid Plan';
        $plan->url_limit = 1000;
        $plan->is_default = 0;
        $plan->save();
    }
}
