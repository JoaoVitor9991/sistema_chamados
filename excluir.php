<?php

require_once __DIR__ . '/classes/Chamado.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];

    Chamado::deletar($id);
    header("Location: index.php");
    exit();
}