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
            return json([
                "status" => "error",
                "errorType" => "internal error",
                "errorDescription" => "no se encotro el recurso"
            ], 404);
        }
        return json($comida);
    }

    public function store($comida)
    {
        $errorList = validate($comida, ["id", "nombre", "precio"]);
        if (!empty($errorList)) {
            return json($errorList, 400);
        }
        ComidaRepository::Save($comida);
        return json([
            "status" => "ok",
            "descripcion" => "guardado correctamente"
        ]);
    }

    public function update($comida)
    {
        $errorList = validate($comida, ["id", "nombre"]);
        if (!empty($errorList)) {
            return json($errorList, 400);
        }
        if (empty(ComidaRepository::Find($comida->id))) {
            return json([
                "status" => "error",
                "errorType" => "internal error",
                "errorDescription" => "no se encontro el recurso para editarlo"
            ], 404);
        }
        ComidaRepository::Update($comida);
        return json([
            "status" => "ok",
            "descripcion" => "editado correctamente",
        ]);
    }

    public function destroy($id)
    {
        if (empty($id)) {
            return json([
                "status" => "error",
                "error" => "El 'id' es requerido"
            ]);
        }
        if (empty(ComidaRepository::Find($id))) {
            return json([
                "status" => "error",
                "errorType" => "internal error",
                "errorDescription" => "no se encontro el recurso para eliminarlo"
            ], 404);
        }
        ComidaRepository::Delete($id);
        return json([
            "status" => "ok",
            "descripcion" => "eliminado correctamente",
        ]);
    }
}
