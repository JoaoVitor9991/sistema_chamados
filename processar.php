<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/classes/Chamado.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'] ?? null;
    $cliente = $_POST['cliente'];
    $problema = $_POST['problema'];
    $prioridade = $_POST['prioridade'];


    $chamado = new Chamado($cliente, $problema, $prioridade, $id);


    if (!empty($id)) {
    
    $chamado->editar();
    } else {
    
    $chamado->salvar();
    }
    header("Location: index.php");
    exit;
}