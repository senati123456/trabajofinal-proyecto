<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

include 'db/db.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <header>
    <nav class="navbar">
        <div class="logo">TecnoSoluciones</div>
        <ul class="nav-links">
        <li><a href="home.php">Inicio</a></li>
        <li><a href="proyecto.php">Proyecto</a></li>
        <li><a href="#">Contacto</a></li>
        </ul>
    </nav>
    </header>

    <main class="contenido">
    <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h2>
    <p>Gracias por visitarnos. Explora nuestros proyectos y contáctanos para más información.</p>
    <section class="projects">
        <h3>Publicaciones recientes</h3>
        <?php
        $query = "SELECT titulo, descripcion FROM publicaciones ORDER BY fecha DESC";
$resultado = mysqli_query($conn, $query);
?>

<section class="proyectos">
    <h2>Proyectos</h2>
    
    <?php while ($proyecto = mysqli_fetch_assoc($resultado)) : ?>
        <div class="proyecto">
            <h3><?= htmlspecialchars($proyecto['titulo']) ?></h3>
            <p><?= nl2br(htmlspecialchars($proyecto['descripcion'])) ?></p>
        </div>
    <?php endwhile; ?>
</section>
    </main>
</body>
</html>