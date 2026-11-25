<?php

namespace App\Controllers;

use App\Models\ProductoModel;

class Productos extends BaseController
{
    public function index()
    {
        $modelo = new ProductoModel();

        $datos['productos'] = $modelo->findAll();

        return view('productos/index', $datos);
    }
}