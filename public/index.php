<?php

require __DIR__ . "./../vendor/autoload.php";

session_start();

$request = new \App\Http\Request();

$request->send();
