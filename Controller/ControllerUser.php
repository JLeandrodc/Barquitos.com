<!-- ControllerUser -->
<?php
// Incluindo arquivos necessários
include_once '../Models/Crud.php';
include_once '../Models/Validation.php';

// Classe controladora para gerenciar ações relacionadas a usuários
class ControllerUser
{
    private $crud; // Instância da classe Crud para operações no banco de dados
    private $validation; // Instância da classe Validation para validação de formulários

    // Construtor para inicializar instâncias das classes Crud e Validation
    public function __construct()
    {
        $this->crud = new Crud();
        $this->validation = new Validation();
    }

    //-------------------------------------------- ADD ----------------------------------------------------//


    public function addAccount()
    {
        if (isset($_POST['Submit'])) {
            $email = $this->crud->escape_string($_POST['email']);
            $senha = $this->crud->escape_string($_POST['senha']);
            $tipoUsuario = $this->crud->escape_string($_POST['tipo_usuario']);
            $senhaCrip = password_hash($senha, PASSWORD_DEFAULT);
            $result = $this->crud->execute("INSERT INTO login (email, senha, tipoUsuario ) VALUES('$email', '$senhaCrip', '$tipoUsuario')");
        }
    }


    // Método para adicionar um novo usuário
    public function addUser()
    {
        // Verifica se o formulário foi enviado
        if (isset($_POST['Submit'])) {
            // Sanitiza os dados de entrada
            $nome = $this->crud->escape_string($_POST['nome']);
            $cpf = $this->crud->escape_string($_POST['cpf']);
            $email = $this->crud->escape_string($_POST['email']);
            $tipoBarco = $this->crud->escape_string($_POST['tipo_barco']);
            $marcaBarco = $this->crud->escape_string($_POST['marca_barco']);
            $valorBarco = $this->crud->escape_string($_POST['valor_barco']);
            $descricao = $this->crud->escape_string($_POST['descricao']);

            // Valida os campos do formulário para garantir que não estejam vazios
            $msg = $this->validation->check_empty($_POST, array('nome', 'cpf', 'email', 'tipo_barco', 'marca_barco', 'valor_barco', 'descricao'));

            // Se os campos do formulário não estiverem vazios, insere os dados do usuário no banco de dados
            if ($msg == null) {
                $result = $this->crud->execute("INSERT INTO clientes (nome, cpf, email, tipoBarco_id, marcaBarco_id, valorBarco, descricao ) VALUES('$nome', '$cpf', '$email', '$tipoBarco', '$marcaBarco', '$valorBarco', '$descricao')");
            }
        }
    }

    public function addBoat()
    {
        // Verifica se o formulário foi enviado
        if (isset($_POST['Submit'])) {
            // Sanitiza os dados de entrada
            $tipoBarco = $this->crud->escape_string($_POST['tipo_barco']);

            // Valida os campos do formulário para garantir que não estejam vazios
            $msg = $this->validation->check_empty($_POST, array('tipo_barco'));

            // Se os campos do formulário não estiverem vazios, insere os dados do usuário no banco de dados
            if ($msg == null) {
                $result = $this->crud->execute("INSERT INTO tipodebarco (tipoBarco) VALUES('$tipoBarco')");
            }
        }
    }

    public function addBrandBoat()
    {
        // Verifica se o formulário foi enviado
        if (isset($_POST['Submit'])) {
            // Sanitiza os dados de entrada
            $marcaBarco = $this->crud->escape_string($_POST['marca_barco']);

            // Valida os campos do formulário para garantir que não estejam vazios
            $msg = $this->validation->check_empty($_POST, array('marca_barco'));

            // Se os campos do formulário não estiverem vazios, insere os dados do usuário no banco de dados
            if ($msg == null) {
                $result = $this->crud->execute("INSERT INTO marcadebarco (marcaBarco) VALUES('$marcaBarco')");
            }
        }
    }

    //-------------------------------------------- READ ----------------------------------------------------//

    public function checkLogin($email, $senha)
    {
        $email = $this->crud->escape_string($email);
        $senha = $this->crud->escape_string($senha);

        $result = $this->crud->select("SELECT senha FROM login WHERE email = '$email'");

        if ($result) {
            $hashedPassword = $result[0]['senha'];
            if (password_verify($senha, $hashedPassword)) {
                return true;
            }
        }
        return false;
    }

    // Método para verificar referências da tabela marcadebarco na tabela de clientes
    public function checkReferencesBrandBoat($id)
    {
        $query = "SELECT COUNT(*) as count FROM clientes WHERE marcaBarco_id = $id";

        $result = $this->crud->getData($query);

        if ($result && isset($result[0]['count'])) {
            return $result[0]['count'];
        }

        return 0;
    }


    // Método para verificar referências da tabela marcadebarco na tabela de clientes
    public function checkReferencesBoat($id)
    {
        $query = "SELECT COUNT(*) as count FROM clientes WHERE tipoBarco_id = $id";

        $result = $this->crud->getData($query);

        if ($result && isset($result[0]['count'])) {
            return $result[0]['count'];
        }

        return 0;
    }

    // Método para verificar email repetido
    public function checkLoginExistence ($email)
    {
        $query = "SELECT COUNT(*) as count FROM login WHERE email = '$email'";

        $result = $this->crud->getData($query);

        if ($result && isset($result[0]['count'])) {
            return $result[0]['count'];
        }

        return 0;
    }

    // Método para verificar email repetido
    public function checkUserAccess ($email)
    {
        $query = "SELECT `tipoUsuario` FROM `login` WHERE email = '$email'";

        $result = $this->crud->getData($query);

        return $result;
    }


    public function readBoat()
    {
        $query = "SELECT * FROM tipodebarco";
        $result = $this->crud->getData($query);
        return $result;
    }


    public function readBrandBoat()
    {
        $query = "SELECT * FROM marcadebarco";
        $result = $this->crud->getData($query);
        return $result;
    }


    public function viewUsers()
    {
        $query = "SELECT clientes.id, clientes.nome, clientes.cpf, clientes.email, 
        tipo.tipoBarco AS tipo_barco, marca.marcaBarco AS marca_barco, 
        clientes.valorBarco, clientes.descricao 
        FROM clientes 
        LEFT JOIN tipodebarco AS tipo ON clientes.tipoBarco_id = tipo.id 
        LEFT JOIN marcadebarco AS marca ON clientes.marcaBarco_id = marca.id";
        $result = $this->crud->getData($query);
        return $result;
    }


    //-------------------------------------------- DELETE ----------------------------------------------------//

    // Método para excluir um usuário
    public function deleteUser($id)
    {
        $table = 'clientes';
        $query = "DELETE FROM $table WHERE id = $id";
        $result = $this->crud->delete($query);
        if ($result) {
            header("Location: ../View/view-users.php");
        }
    }

    // Método para excluir um tipo de barco
    public function deleteBoat($id)
    {
        $table = 'tipodebarco';
        $query = "DELETE FROM $table WHERE id = $id";
        $result = $this->crud->delete($query);
        if ($result) {
            header("Location: ../View/view-boat.php");
        }
    }

    // Método para excluir um barco
    public function deleteBrandBoat($id)
    {
        $table = 'marcadebarco';
        $query = "DELETE FROM $table WHERE id = $id";
        $result = $this->crud->delete($query);
        if ($result) {
            header("Location: ../View/view-brandBoat.php");
        }
    }



    //-------------------------------------------- UPDATE ----------------------------------------------------//
    // Método para atualizar um usuário
    public function updateUser($id, $nome, $cpf, $email, $tipoBarco, $marcaBarco, $valorBarco, $descricao)
    {
        $nome = $this->crud->escape_string($nome);
        $cpf = $this->crud->escape_string($cpf);
        $email = $this->crud->escape_string($email);
        $tipoBarco = $this->crud->escape_string($tipoBarco);
        $marcaBarco = $this->crud->escape_string($marcaBarco);
        $valorBarco = $this->crud->escape_string($valorBarco);
        $descricao = $this->crud->escape_string($descricao);

        // Valida os campos do formulário para garantir que não estejam vazios
        $msg = $this->validation->check_empty($_POST, array('nome', 'cpf', 'email', 'tipo_barco', 'marca_barco', 'valor_barco', 'descricao'));

        // Se os campos do formulário não estiverem vazios, atualiza os dados do usuário no banco de dados
        if ($msg == null) {
            $query = "UPDATE clientes SET nome='$nome', cpf='$cpf', email='$email', tipoBarco_id='$tipoBarco', marcaBarco_id='$marcaBarco', valorBarco='$valorBarco', descricao='$descricao' WHERE id=$id";
            $result = $this->crud->execute($query);
        }
    }

    public function updateBoat($id, $tipoBarco)
    {
        $tipoBarco = $this->crud->escape_string($tipoBarco);
        // Valida os campos do formulário para garantir que não estejam vazios
        $msg = $this->validation->check_empty($_POST, array('tipo_barco'));

        // Se os campos do formulário não estiverem vazios, atualiza os dados do usuário no banco de dados
        if ($msg == null) {
            $query = "UPDATE tipodebarco SET tipoBarco='$tipoBarco' WHERE id=$id";
            $result = $this->crud->execute($query);
        }
    }

    public function updateBrandBoat($id, $marcaBarco)
    {
        $marcaBarco = $this->crud->escape_string($marcaBarco);
        // Valida os campos do formulário para garantir que não estejam vazios
        $msg = $this->validation->check_empty($_POST, array('marca_barco'));

        // Se os campos do formulário não estiverem vazios, atualiza os dados do usuário no banco de dados
        if ($msg == null) {
            $query = "UPDATE marcadebarco SET marcaBarco='$marcaBarco' WHERE id=$id";
            $result = $this->crud->execute($query);
        }
    }


    //-------------------------------------------- GET-BY ----------------------------------------------------//

    public function getUserById($id)
    {
        $id = $this->crud->escape_string($id);

        $query = "SELECT * FROM clientes WHERE id=$id";
        $result = $this->crud->getData($query);

        // Se o resultado não estiver vazio, retorna o primeiro item
        if (!empty($result)) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function getBoatById($id)
    {
        $id = $this->crud->escape_string($id);

        $query = "SELECT * FROM tipodebarco WHERE id=$id";
        $result = $this->crud->getData($query);

        // Se o resultado não estiver vazio, retorna o primeiro item
        if (!empty($result)) {
            return $result[0];
        } else {
            return null;
        }
    }

    public function getBrandBoatById($id)
    {
        $id = $this->crud->escape_string($id);

        $query = "SELECT * FROM marcadebarco WHERE id=$id";
        $result = $this->crud->getData($query);

        // Se o resultado não estiver vazio, retorna o primeiro item
        if (!empty($result)) {
            return $result[0];
        } else {
            return null;
        }
    }
}
?>