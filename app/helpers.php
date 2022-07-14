<?php

function json($data = [], $status = 200)
{
    $response = new \App\Http\Response($data, $status);
    return $response;
}

function validate($objet, $valiadateList)
{
    $errorList = [];

    foreach ($valiadateList as $value) {

        if (empty($objet->$value)) {
            array_push($errorList, "el campo " . $value . " es obligatorio");
        }
    }

    if (!empty($errorList)) {
        return [
            "errorType" => "validation",
            "errorList" => $errorList
        ];
    } else {
        return null;
    }
}
