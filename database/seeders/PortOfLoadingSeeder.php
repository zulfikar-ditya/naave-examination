<?php

namespace Database\Seeders;

use App\Models\Port;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortOfLoadingSeeder extends Seeder
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
            $model = new Port();
            $model->name = $value;
            $model->save();
        }
    }
}
