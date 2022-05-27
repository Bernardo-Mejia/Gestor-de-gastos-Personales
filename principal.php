<?php
	
	session_start();
	
	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}
	
	$nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];
	
	
?>

<!DOCTYPE html>
<html lang="es" data-dark>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>INTELIGENCIA DE NEGOCIOS</title>
  <!-- bootstrap -->
  <!-- <link href="./style/b_styles.css" rel="stylesheet" /> -->
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
  <!--  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hamburgers/1.1.3/hamburgers.min.css">
  <link rel="stylesheet" type="text/css" href="style/style.css">
  <script src="Scripts/index.js" type="module"></script>
</head>

<body data-dark>
  <header class="header">
    <h1>SISTEMA DE CONTROL DE GASTOS</h1>
  </header>
  <button class="panel-btn hamburger hamburger--elastic" type="button">
    <span class="hamburger-box">
      <span class="hamburger-inner"></span>
    </span>
  </button>
  <aside class="panel">
    <nav class="menu">
      <a href="#" data-scroll-spy>GASTOS</a>
      <a href="#" data-scroll-spy>INGRESOS</a>
      <?php if($tipo_usuario == 2) { ?>
        <!-- <p>aber</p> -->
        <a href="#" data-scroll-spy>CATEGORÍAS</a>
        <a href="#" data-scroll-spy>USUARIOS</a>
      <?php } ?>
      <a href="logout.php" data-scroll-spy>CERRAR SESIÓN</a>
      <h2 class="sesion-name">Sesión iniciada de <?php echo $nombre; ?></h2>
    </nav>
  </aside>
  <main>
    <section id="seccion1" class="section" data-scroll-spy>
      
    </section>
    <section id="seccion2" class="section" data-scroll-spy>
     
  </main>
  <button class="scroll-top-btn hidden">&#11014;</button>
</body>
  
</html>