<?php
// Classe para configuração e estabelecimento de conexão com o banco de dados
class DbConfig {
    // Atributos para as configurações do banco de dados
    private $_host = 'localhost';
    private $_username ='root';
    private $_password ='';
    private $_database ='barquitos';
    protected $connection;

    // Método construtor para inicializar a conexão com o banco de dados
    public function __construct(){
        // Verifica se a conexão já foi estabelecida
        if (!isset($this->connection)){
            // Tenta estabelecer a conexão utilizando os dados fornecidos
            $this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
        }

        // Verifica se a conexão foi bem-sucedida
        if ($this->connection->connect_error){
            echo 'Não é possível conectar ao servidor de banco de dados: ' . $this->connection->connect_error;
            exit;
        }
    }
}
?>
