<?php

function json($data = [], $status = 200)
{
    $response = new \App\Http\Response($data, $status);
    return $response;
}
