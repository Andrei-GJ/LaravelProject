<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoDocumento;

class TipoDocumentoSeeder extends Seeder
{
    public function run()
    {
        TipoDocumento::create(['nombre' => 'Cédula de Ciudadanía']);
        TipoDocumento::create(['nombre' => 'Tarjeta de Identidad']);
    }
}
