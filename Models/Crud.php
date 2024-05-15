<?php
// Incluindo o arquivo de configuração do banco de dados
include_once '../Models/DbConfig.php';

// Classe Crud para operações no banco de dados
class Crud extends DbConfig{
    // Construtor que chama o construtor da classe pai para inicializar a conexão com o banco de dados
    public function __construct(){
        parent::__construct();
    }

    // Método para escapar caracteres especiais em uma string antes de inseri-la no banco de dados
    public function escape_string($value){
        return $this->connection->real_escape_string($value);
    }

    // Método para executar consultas de INSERT, UPDATE, DELETE
    public function execute($query){
        $result = $this->connection->query($query);

        // Verifica se houve algum erro na execução da consulta
        if($result === false){
            throw new Exception('Error: ' . $this->connection->error); 
        }
        
        return true;
    }

    // Método para obter dados de consultas SELECT
    public function getData($query){
        $result = $this->connection->query($query);

        // Verifica se houve algum erro na execução da consulta
        if($result === false){
            throw new Exception('Error: ' . $this->connection->error);
        }

        $rows = array();

        // Obtém os dados resultantes da consulta e os armazena em um array
        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }

        return $rows;
    }

    // Método para realizar operações de DELETE no banco de dados
    public function delete($query){
        $result = $this->connection->query($query);

        // Verifica se houve algum erro na execução da consulta
        if($result === false){
            throw new Exception('Error: ' . $this->connection->error);
        }
        
        return true;
    }

    // Método para realizar operações de UPDATE no banco de dados
    public function update($query){
        $result = $this->connection->query($query);

        // Verifica se houve algum erro na execução da consulta
        if($result === false){
            throw new Exception('Error: ' . $this->connection->error);
        }
        
        return true;
    }

        public function select($query){
        $result = $this->connection->query($query);

        if ($result) {
            $data = array();

            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            return $data;
        } else {
            return false;
        }
    }
}
?>
