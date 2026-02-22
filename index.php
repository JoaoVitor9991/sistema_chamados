<?php

require_once __DIR__ . '/config/banco.php';
require_once __DIR__ . '/classes/Chamado.php';


$lista = Chamado::listar();
if (isset($_GET['editar'])) {
    
    // 2. SÓ AQUI dentro você cria a variável $id
    $id = $_GET['editar']; 
    
    // 3. E usa ela logo em seguida
    $editar = Chamado::buscarporId($id);
}
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
        <input type="hidden" name="id" value="<?php echo $editar['id'] ?? ''; ?>">

        <label for="">Cliente:</label>
        <input type="text" name="cliente" required value = "<?php echo $editar['cliente'] ?? ''?>">

        <label for="">Descreva o problema</label>
        <textarea name="problema"><?php echo $editar['problema'] ?? ''; ?></textarea>


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
        <a href="excluir.php?id=<?php echo $chamado['id']; ?>" onclick="retunr confirm ('Tem certeza que deseja excluir?')">Excluir</a>
        <a href="index.php?editar=<?php echo $chamado['id'] ?? ''; ?>">Editar</a>
        <?php endforeach; ?>
</body>
</html>
