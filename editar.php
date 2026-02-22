<?php

require_once __DIR__ . '/classes/Chamado.php';

if (isset($_GET['editar'])){
    $id = $_GET['editar'];

    $editar = Chamado::buscarporId($id);
}