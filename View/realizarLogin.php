<?php
include_once '../Controller/ControllerUser.php';
$userController = new ControllerUser();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Submit'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($userController->checkLogin($email, $senha)) {
        $result = $userController->checkUserAccess($email);

        if ($result) {
            session_start();
            $_SESSION['tipoUsuario'] = $result[0]['tipoUsuario'];
            echo "<script>alert('Login realizado com sucesso! Bem-vindo, $email!'); window.location.href='add-users.php';</script>";
        } else {
            echo "Erro ao obter tipo de usuário.";
        }
    } else {
        echo "Credenciais inválidas. <a href='../index.php'>Tente novamente</a>";
    }
}
?>
