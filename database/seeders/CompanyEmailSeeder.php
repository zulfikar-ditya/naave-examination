<?php

namespace Database\Seeders;

use App\Models\CompanyEmail;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyEmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');
        for ($i=1; $i < 21; $i++) { 
            $model = new CompanyEmail();
            $model->company_id = $i;
            $model->email = $faker->email;
            $model->save();
        }
    }
}
