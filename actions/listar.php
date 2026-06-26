<?php

    require_once "classes/Database.php";
    require_once "classes/Usuario.php";

    $database= new Database();
    $db = $database->getConnection();

    $usuario = new Usuario($db);

    $usuarios = $usuario->listar();