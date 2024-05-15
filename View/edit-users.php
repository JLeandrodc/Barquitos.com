<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locação de Barcos</title>
    <link rel="stylesheet" href="./../style.css">
</head>

<body>
    <?php
    include_once 'header.php';
    include_once '../Controller/ControllerUser.php';


    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $userController = new ControllerUser();

        $user = $userController->getUserById($id);
        var_dump($user);

    //     if (!$user) {
    //         echo "Usuário não encontrado";
    //         exit;
    //     }

    //     if (isset($_POST['Submit'])) {

    //         // // $nome = $_POST['nome'];
    //         // $cpf = $_POST['cpf'];
    //         // $email = $_POST['email'];
    //         // $tipoBarco = $_POST['tipo_barco'];
    //         // $marcaBarco = $_POST['marca_barco'];
    //         // $valorBarco = $_POST['valor_barco'];
    //         // $descricao = $_POST['descricao'];

    //         $userController->updateUser($id, $nome, $cpf, $email, $tipoBarco, $marcaBarco, $valorBarco, $descricao);
    //         echo "<script>alert('Cadastrado atualizado com sucesso!'); window.location.href='view-users.php';</script>";
    //     }
    // } else {
    //     echo 'ID de usuário não fornecido';
    //     exit;
     }
    ?>
    <div class="form_update">
        <form name="form1" method="post" action="">
            <table border="0">
                <tr>
                    <td>Nome</td>
                    <td><input type="text" name="nome" value="<?php echo $user['nome']; ?>"></td>
                </tr>


                <tr>
                    <td>CPF</td>
                    <td><input type="text" name="cpf" value="<?php echo $user['cpf']; ?>"></td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" value="<?php echo $user['email']; ?>"></td>
                </tr>


                <tr>
                    <td><label name="tipo_barco" for="tipo_barco">Tipo do Barco:</label></td>
                    <td>
                        <select id="tipo_barco" name="tipo_barco" required>
                            <?php
                            $tipos_barcos = $userController->readBoat();
                            if ($tipos_barcos) {
                                foreach ($tipos_barcos as $tipo_barco) {
                                    echo "<option value='{$tipo_barco['id']}'>{$tipo_barco['tipoBarco']}</option>";
                                }
                            } else {
                                echo "<option value='Nenhum tipo de barco encontrado'>Nenhum tipo de barco encontrado</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td><label name="marca_barco" for="marca_barco">Marca do Barco:</label></td>
                    <td>
                        <select id="marca_barco" name="marca_barco" required>
                            <?php
                            $marcas_barcos = $userController->readBrandBoat();
                            if ($marcas_barcos) {
                                foreach ($marcas_barcos as $marca_barco) {
                                    echo "<option value='{$marca_barco['id']}'>{$marca_barco['marcaBarco']}</option>";
                                }
                            } else {
                                echo "<option value='Nenhum tipo de barco encontrado'>Nenhum tipo de barco encontrado</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label for="valor_barco">Valor do Barco:</label></td>
                    <td><input id="valor_barco" name="valor_barco" required pattern="^\d{1,3}(?:[\.,]?\d{3})*(?:[\.,]\d+)?$" title="Por favor, insira números nos formatos 1, 1.000 ou 1.000.000 (use ponto ou vírgula como separador decimal)." value="<?php echo $user['valorBarco']; ?>"></td>
                </tr>

                <!--    PROFESSOR ALEXANDRE, FIZ POR STRING E TENTEI VALIDAR A ENTRADA
                        ^\d{1,3}(?:[\.\,]?\d{3})*(?:[\.\,]\d+)?$^\d{1,3}: Começa com um a três dígitos.
                        (?:[\.\,]?\d{3})*: Permite a entrada opcional de mais digitos (2 vez).
                        (?:[\.\,]\d+)?: Permite a entrada opcional de mais digitos (3 vez).       -->

                <tr>
                    <td>descrição</td>
                    <td><input type="text" name="descricao" value="<?php echo $user['descricao']; ?>"></td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" name="Submit" value="Atualizar">
                    </td>
                    <td>
                        <input type='submit' formaction='../View/view-users.php' value=" Voltar ">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>