<?php

namespace App\Controllers;

use App\Models\CursoModel;
use App\Models\MatriculaModel;

class Matriculas extends BaseController
{
    public function index()
    {
        $modelo = new CursoModel();

        $datos['cursos'] = $modelo->findAll();

        return view('matriculas/index', $datos);
    }

    public function guardar()
    {
        $modelo = new MatriculaModel();

        $datos = [
            'nombre_estudiante' => $this->request->getPost('nombre_estudiante'),
            'identificacion' => $this->request->getPost('identificacion'),
            'curso_id' => $this->request->getPost('curso_id')
        ];

        $modelo->insert($datos);

        $id = $modelo->getInsertID();

        return redirect()->to(site_url('matriculas/confirmacion/' . $id));
    }

    public function confirmacion($id)
    {
        $modelo = new MatriculaModel();

        $datos['matricula'] = $modelo
            ->select('matriculas.*, cursos.nombre AS curso, cursos.codigo, cursos.creditos')
            ->join('cursos', 'cursos.id = matriculas.curso_id')
            ->find($id);

        if (!$datos['matricula']) {
            return redirect()->to(site_url('/'));
        }

        return view('matriculas/confirmacion', $datos);
    }
}
