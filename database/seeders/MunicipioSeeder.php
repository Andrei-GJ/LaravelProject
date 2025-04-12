<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Municipio;

class MunicipioSeeder extends Seeder
{
    public function run()
    {
        Municipio::create(['nombre' => 'Bogotá', 'departamento_id' => 1]);
        Municipio::create(['nombre' => 'Soacha', 'departamento_id' => 1]);
        Municipio::create(['nombre' => 'Medellín', 'departamento_id' => 2]);
        Municipio::create(['nombre' => 'Envigado', 'departamento_id' => 2]);
        // Agrega los demás municipios según necesites
    }
}
