<?php
// Classe para validação de dados
class Validation{
    // Método para verificar se campos em um array de dados POST estão vazios
    public function check_empty($data, $fields){
        $msg = null;

        // Verifica se $fields é um array
        if (is_array($fields)){
            // Itera sobre os campos especificados
            foreach ($fields as $field){
                // Verifica se o método de requisição é POST
                if ($_SERVER["REQUEST_METHOD"] == "POST"){
                    // Verifica se o campo está vazio
                    if (empty($data[$field])){
                        $msg .= "$field está vazio<br />";
                    }
                }
            }
        }

        // Retorna a mensagem de erro, se houver
        return $msg;
    }
}
?>