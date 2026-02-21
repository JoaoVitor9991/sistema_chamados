<?php

require_once __DIR__ . '/../config/banco.php';

class Chamado {
    private $cliente;
    private $problema;
    private $prioridade;
    private $id;

    public function __construct($cliente, $problema, $prioridade, $id = null)
    {
        $this->cliente = $cliente;
        $this->problema = $problema;
        $this->prioridade = $prioridade;
        $this->id = $id;
    }


    public function salvar(){
        try {
        $pdo = Conexao::conectar();

        $sql = "INSERT INTO chamados (cliente, problema, prioridade) values (:cliente, :problema, :prioridade)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':cliente', $this->cliente);
        $stmt->bindValue(':problema', $this->problema);
        $stmt->bindValue(':prioridade', $this->prioridade);
        $stmt->execute();
        } catch (PDOException $e){
            die("Erro ao salvar no banco: " . $e->getMessage());
        }
    }

    public static function listar(){
        try {
        $pdo = Conexao::conectar();

        $sql = "SELECT * FROM chamados";

        $stmt = $pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            die("Erro ao listar todos os chamados no banco: " . $e->getMessage());
        }
    }

    public static function deletar($id){
        $pdo = Conexao::conectar();

        $sql = "DELETE FROM chamados where id = :id";

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}