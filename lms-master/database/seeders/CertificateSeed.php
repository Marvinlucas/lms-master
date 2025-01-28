<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CertificateSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Certificate::factory()->create([
            'config_type' => 'CertName',
            'position_1' => 'Position_1',
            'position_2' => 'Position_2',
            'name_1' => 'Name_1',
            'name_2' => 'Name_2',
            'config_category' => 'global',
        ]);


       
    }
}
