<?php

require_once 'config/banco.php';

$teste = Conexao::conectar();
var_dump($teste);