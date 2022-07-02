<?php

namespace App\Http\Controllers;

class ComidaController
{
    public function index()
    {
        $comidas = [
            [
                "id" => "1",
                "nombre" => "majadito",
            ],
            [
                "id" => "2",
                "nombre" => "tallarin",
            ],
            [
                "id" => "3",
                "nombre" => "pollo frito",
            ],
            [
                "id" => "4",
                "nombre" => "sopa",
            ],
        ];

        return json($comidas);
    }

    public function show($id)
    {
        $comidas = [];
        if (!empty($_SESSION['comidas'])) {
            $comidas = $_SESSION['comidas'];
        }

        foreach ($comidas as $comida) {
            if ($comida['id'] == $id) {
                return json($comida);
            }
        }

        return json(status: 404);
    }

    public function store($id)
    {
        $comidas = [];
        if (!empty($_SESSION['comidas'])) {
            $comidas = $_SESSION['comidas'];
        }

        $comida = [
            'id' => $id,
            'nombre' => 'majadito',
        ];

        array_push($comidas, $comida);

        $_SESSION['comidas'] =  $comidas;

        return json($comida);
    }

    public function update($id)
    {
        $comidas = [];
        if (!empty($_SESSION['comidas'])) {
            $comidas = $_SESSION['comidas'];
        }

        foreach ($comidas as $key => $comida) {
            if ($comida['id'] == $id) {
                $comida['nombre'] = 'sopa de pollo';

                $comidas[$key] = $comida;

                $_SESSION['comidas'] =  $comidas;

                return json($comida);
            }
        }

        return json(status: 400);
    }

    public function destroy($id)
    {
        $comidas = [];
        if (!empty($_SESSION['comidas'])) {
            $comidas = $_SESSION['comidas'];
        }

        foreach ($comidas as $key => $comida) {
            if ($comida['id'] == $id) {

                $comidas[$key] = null;


                $_SESSION['comidas'] =  $comidas;

                return json($comida);
            }
        }

        return json(status: 400);
    }
}
