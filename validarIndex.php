<?php
ob_start();
session_start();
include 'db/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = trim($_POST['usuario']);
    $passwordvar = $_POST['password_'];

    if (!empty($usuario) && !empty($passwordvar)) {
        $stmt = $conn->prepare("SELECT id, usuario, password_ FROM usuario WHERE usuario = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if ($passwordvar === $user['password_']) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['usuario'] = $user['usuario'];
                header('Location: home.php');
                exit();
            } else {
                echo "⚠️ Contraseña incorrecta";
            }
        } else {
            echo "⚠️ Usuario no encontrado";
        }
    } else {
        echo "⚠️ Faltan campos por completar";
    }
}
ob_end_flush();
?>
