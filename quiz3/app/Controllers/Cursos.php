<?php

namespace App\Controllers;

use App\Models\CursoModel;
use App\Models\CarreraModel;
use App\Models\MatriculaModel;

class Cursos extends BaseController
{
    public function index()
    {
        $modelo = new CursoModel();

        $datos['cursos'] = $modelo
            ->select('cursos.*, carreras.nombre AS carrera')
            ->join('carreras', 'carreras.id = cursos.carrera_id')
            ->findAll();

        return view('cursos/index', $datos);
    }

    public function crear()
    {
        $modelo = new CarreraModel();

        $datos['carreras'] = $modelo->findAll();

        return view('cursos/crear', $datos);
    }

    public function guardar()
    {
        $modelo = new CursoModel();

        $datos = [
            'nombre' => $this->request->getPost('nombre'),
            'codigo' => $this->request->getPost('codigo'),
            'creditos' => $this->request->getPost('creditos'),
            'carrera_id' => $this->request->getPost('carrera_id')
        ];

        $modelo->insert($datos);

        return redirect()->to(site_url('cursos'));
    }

    public function editar($id)
    {
        $modelo = new CursoModel();
        $carreraModelo = new CarreraModel();

        $datos['curso'] = $modelo->find($id);
        $datos['carreras'] = $carreraModelo->findAll();

        return view('cursos/editar', $datos);
    }

    public function actualizar($id)
    {
        $modelo = new CursoModel();

        $datos = [
            'nombre' => $this->request->getPost('nombre'),
            'codigo' => $this->request->getPost('codigo'),
            'creditos' => $this->request->getPost('creditos'),
            'carrera_id' => $this->request->getPost('carrera_id')
        ];

        $modelo->update($id, $datos);

        return redirect()->to(site_url('cursos'));
    }

    
public function eliminar($id)
{
    $modelo = new CursoModel();
    $matriculaModelo = new MatriculaModel();

    $matriculas = $matriculaModelo
        ->where('curso_id', $id)
        ->countAllResults();

    if ($matriculas > 0) {
        return redirect()->to(site_url('cursos'))
            ->with('error', 'No se puede eliminar un curso con estudiantes matriculados.');
    }

    if (!$modelo->find($id)) {
        return redirect()->to(site_url('cursos'))
            ->with('error', 'El curso no existe.');
    }

    $modelo->delete($id);

    return redirect()->to(site_url('cursos'))
        ->with('mensaje', 'Curso eliminado correctamente.');
}

}
