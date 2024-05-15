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
    $userController = new ControllerUser();

    if (isset($_POST['Submit'])) {
        $userController->addUser();
        echo "<script>alert('Aluguel cadastrado com sucesso!'); window.location.href='add-users.php';</script>";
    }
    ?>

    <div class="form_CADASTRO">
        <form method="post" name="form1" action="">
            <center>
                <h1>Formulário - Incluir registro</h1>
            </center>
            <table>
                <tr>
                    <td><label for="nome">Nome do Cliente:</label></td>
                    <td><input id="nome" name="nome" autofocus></td>
                </tr>
                <tr>
                    <td><label for="cpf">CPF do Cliente:</label></td>
                    <td><input id="cpf" name="cpf" required></td>
                </tr>
                <tr>
                    <td><label for="email">Email do Cliente:</label></td>
                    <td><input id="email" name="email" required></td>
                </tr>
                <tr>
                    <td><label for="tipo_barco">Tipo do Barco:</label></td>
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
                    <td><label for="marca_barco">Marca do Barco:</label></td>
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
                    <td><input id="valor_barco" name="valor_barco" required pattern="^\d{1,3}(?:[\.\,]?\d{3})*(?:[\.\,]\d+)?$" title="Por favor, insira números nos formatos 1, 1.000 ou 1.000.000 (use ponto ou vírgula como separador decimal)."></td>
                </tr>

                <!--    PROFESSOR ALEXANDRE, FIZ POR STRING E TENTEI VALIDAR A ENTRADA
                        ^\d{1,3}(?:[\.\,]?\d{3})*(?:[\.\,]\d+)?$^\d{1,3}: Começa com um a três dígitos.
                        (?:[\.\,]?\d{3})*: Permite a entrada opcional de mais digitos (2 vez).
                        (?:[\.\,]\d+)?: Permite a entrada opcional de mais digitos (3 vez).       -->

                <tr>
                    <td><label for="descricao">Descrição:</label></td>
                    <td><textarea id="descricao" name="descricao" required></textarea></td>
                </tr>
            </table>
            <td>
                <button type="submit" name="Submit" value="Cadastrar">Salvar registro</button>
            </td>
        </form>
    </div>
</body>

</html>