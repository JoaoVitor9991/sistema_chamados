<?php

require_once __DIR__ . '/classes/Chamado.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $cliente = $_POST['cliente'];
    $problema = $_POST['problema'];
    $prioridade = $_POST['prioridade'];


    $novoChamado = new Chamado($cliente, $problema, $prioridade);

    $novoChamado->salvar();
    header("Location: index.php");
    exit;
}