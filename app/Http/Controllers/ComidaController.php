<?php

namespace App\Http\Controllers;

use App\Repositories\ComidaRepository;

class ComidaController
{
    public function index()
    {
        $comidas = ComidaRepository::GetAll();
        return json($comidas);
    }

    public function show($id)
    {
        $comida = ComidaRepository::Find($id);
        if (empty($comida)) {
            return json("no se encontro la comida", 404);
        }
        return json($comida);
    }

    public function store($id)
    {
        return json();
    }

    public function update($id)
    {
        return json();
    }

    public function destroy($id)
    {
        ComidaRepository::Delete($id);
        return json("ok");
    }
}
