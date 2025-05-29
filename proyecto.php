<?php
include 'db/db.php';

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = trim($_POST["titulo"]);
    $descripcion = trim($_POST["descripcion"]);

    if (!empty($titulo) && !empty($descripcion)) {
        $stmt = $conn->prepare("INSERT INTO publicaciones (titulo, descripcion) VALUES (?, ?)");
        $stmt->bind_param("ss", $titulo, $descripcion);
        if ($stmt->execute()) {
            $mensaje = "✅ Proyecto publicado exitosamente.";
        } else {
            $mensaje = "❌ Error al publicar el proyecto.";
        }
        $stmt->close();
    } else {
        $mensaje = "⚠️ Por favor, completa todos los campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Proyecto</title>
    <link rel="stylesheet" href="css/proyecto.css">
</head>
<body>
    <div class="contenedor">
        <h1 class="titulo">Subir Proyecto</h1>
        
        <?php if (!empty($mensaje)) : ?>
            <p class="mensaje"><?= $mensaje ?></p>
        <?php endif; ?>

        <form method="POST" action="proyecto.php">
            <input type="text" name="titulo" placeholder="Título del proyecto" required>
            <textarea name="descripcion" placeholder="Descripción del proyecto" rows="6" required></textarea>
            <button type="submit">Publicar</button>
        </form>
    </div>
</body>
</html>
