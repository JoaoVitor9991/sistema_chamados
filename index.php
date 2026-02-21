<?php

require_once __DIR__ . '/config/banco.php';
require_once __DIR__ . '/classes/Chamado.php';


$lista = Chamado::listar();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chamados de problemas</title>
</head>
<body>
    <h1>Enviar um chamado</h1>

    <form method="POST" class="chamados" action="processar.php">

        <label for="">Cliente:</label>
        <input type="text" name="cliente" required>

        <label for="">Descreva o problema</label>
        <textarea name="problema" id=""></textarea>


        <select name="prioridade">
           <option value="Baixa">Baixa</option>
            <option value="Média">Média</option>
            <option value="Alta">Alta</option>
        </select>

        <button type="submit">Enviar</button>
    </form>

    <hr> <?php foreach ($lista as $chamado) : ?>
        <p>
            <strong>Cliente:</strong> <?php echo $chamado['cliente']; ?>
            <strong>Problema:</strong> <?php echo $chamado['problema']; ?>
        </p>
        <?php endforeach; ?>
</body>
</html>
