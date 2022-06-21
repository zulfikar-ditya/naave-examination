<?php

namespace Database\Seeders;

use App\Http\Helpers\RandomCode;
use App\Models\Company;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    use RandomCode;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        for ($i=0; $i < 20; $i++) { 
            $model = new Company();
            $name = $faker->company();
            $model->name = $name;
            $model->code = $this->company_code($name);
            $model->siup = '';
            $model->npwp = '';
            $model->contact_person = $faker->phoneNumber();
            $model->address = $faker->address();
            $model->save();
        }
    }
}
