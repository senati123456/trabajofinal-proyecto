<?php 
session_start();
include 'db/db.php'; 
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['usuario'])) 
    {
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $passwordvar = $_POST['password_'];


if(!empty($usuario)&& !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            $stmt = $conn->prepare('INSERT INTO usuario(usuario,email,password_) values (?,?,?)');
            $stmt->bind_param("sss", $usuario,$email,$passwordvar);

            if ($stmt->execute()) {
                header("Location: index.php?registro=exito");
                exit();
            } else {
                header("Location: index.php?registro=error");
                exit();
            }
        }else{
            echo '<div class="alert alert-warning">Completa todos los campos correctamente</div>';
        }
    }
?>