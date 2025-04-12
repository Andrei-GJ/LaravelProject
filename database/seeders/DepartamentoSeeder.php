<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departamento;

class DepartamentoSeeder extends Seeder
{
    public function run()
    {
        Departamento::create(['nombre' => 'Cundinamarca']);
        Departamento::create(['nombre' => 'Antioquia']);
        Departamento::create(['nombre' => 'Valle del Cauca']);
        Departamento::create(['nombre' => 'Atlántico']);
        Departamento::create(['nombre' => 'Santander']);
    }
}
