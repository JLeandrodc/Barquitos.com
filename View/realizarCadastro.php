<?php
include_once '../Controller/ControllerUser.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Submit'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipoUsuario = $_POST['tipo_usuario'];
    $userController = new ControllerUser();

    //Checa se foi referenciado em outra tabela
    $referencesResult = $userController->checkLoginExistence($email);

    if($referencesResult > 0){
        echo "<script>alert('E-mail ja cadastrado!'); window.location.href='../index.php';</script>";
    } else{
        $userController->addAccount();
        echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='../index.php';</script>";
    }
}
?>
