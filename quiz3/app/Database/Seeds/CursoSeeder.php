<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CursoSeeder extends Seeder
{
    public function run()
    {
        $datos = [
            [
                'nombre' => 'Programación I',
                'codigo' => 'IF101',
                'creditos' => 4,
                'carrera_id' => 1
            ],
            [
                'nombre' => 'Bases de Datos',
                'codigo' => 'IF102',
                'creditos' => 3,
                'carrera_id' => 1
            ],
            [
                'nombre' => 'Administración General',
                'codigo' => 'AD101',
                'creditos' => 3,
                'carrera_id' => 2
            ],
            [
                'nombre' => 'Contabilidad I',
                'codigo' => 'CO101',
                'creditos' => 4,
                'carrera_id' => 3
            ],
            [
                'nombre' => 'Gestión de Producción',
                'codigo' => 'II101',
                'creditos' => 3,
                'carrera_id' => 4
            ]
        ];

        $this->db->table('cursos')->insertBatch($datos);
    }
}
