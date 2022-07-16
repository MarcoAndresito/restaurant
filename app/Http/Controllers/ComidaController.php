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
                "state" => "error",
                "type" => "internal error",
                "list" => ["no se encotro el recurso"]
            ], 404);
        }
        return json($comida);
    }

    public function store($comida)
    {
        $errorList = validate($comida, ["nombre", "precio"]);
        if (!empty($errorList)) {
            return json($errorList, 400);
        }

        $errorList = $this->validateComida($comida);
        if (!empty($errorList)) {
            return json($errorList, 400);
        }

        $id = ComidaRepository::Save($comida);
        return json([
            "state" => "ok",
            "mensage" => "guardado correctamente con id: " . $id
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
                "state" => "error",
                "type" => "internal error",
                "list" => ["no se encontro el recurso para editarlo"]
            ], 404);
        }
        ComidaRepository::Update($comida);
        return json([
            "state" => "ok",
            "mensage" => "editado correctamente",
        ]);
    }

    public function destroy($id)
    {
        if (empty($id)) {
            return json([
                "state" => "error",
                "type" => "validation",
                "list" => ["El 'id' es requerido"]
            ]);
        }
        if (empty(ComidaRepository::Find($id))) {
            return json([
                "state" => "error",
                "type" => "internal error",
                "list" => ["no se encontro el recurso para eliminarlo"]
            ], 404);
        }
        ComidaRepository::Delete($id);
        return json([
            "state" => "ok",
            "mensage" => "eliminado correctamente",
        ]);
    }


    private function validateComida($comida)
    {
        $errorList = [];

        if (!empty($comida->nombre)) {
            if (!is_string($comida->nombre)) {
                array_push($errorList, "el valor nombre es invalido");
            }
            $length = strlen($comida->nombre);

            if (!($length > 0 && 20 > $length)) {
                array_push($errorList, "la longitud del valor nombre no se encuentra dentro de los parametros esperados");
            }
        }

        if (!empty($comida->precio)) {
            if (!is_int($comida->precio)) {
                array_push($errorList, "el valor precio es invalido");
            }
        }

        if (!empty($comida->descripcion)) {
            if (!is_string($comida->descripcion)) {
                array_push($errorList, "el valor descripcion es invalio");
            }
            if (!($length > 0 && 100 > $length)) {
                array_push($errorList, "la longitud del valor nombre no se encuentra dentro de los parametros esperados");
            }
        }

        if (!empty($errorList)) {
            return [
                "state" => "error",
                "type" => "error of type",
                "list" => $errorList
            ];
        } else {
            return null;
        }
    }
}
