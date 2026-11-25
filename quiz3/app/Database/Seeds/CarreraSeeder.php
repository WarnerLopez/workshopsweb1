<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CarreraSeeder extends Seeder
{
    public function run()
    {
        $datos = [
            ['nombre' => 'Ingeniería Informática'],
            ['nombre' => 'Administración de Empresas'],
            ['nombre' => 'Contabilidad'],
            ['nombre' => 'Ingeniería Industrial']
        ];

        $this->db->table('carreras')->insertBatch($datos);
    }
}
