<?php

namespace Database\Seeders;

use App\Models\PortOfDischarge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortOfDischargeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['Adaut', 'Atapupu', 'Air Buaya', 'Ambalau', 'Air Bangis', 'Probolinggo', 'Agata', 'Amahai'];

        foreach ($arr as $key => $value) {
            $model = new PortOfDischarge();
            $model->name = $value;
            $model->save();
        }
    }
}
