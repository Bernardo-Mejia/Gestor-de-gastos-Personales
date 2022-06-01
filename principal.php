<?php
	
	session_start();
	
	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}
	
	$nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];
	
	$sql = "select * from ingresos where idIngreso=(SELECT max(idingreso) from ingresos where Usuario_idUsuario=1000)";
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
  <script src="Scripts/index.js" type="module"></script>
  <!-- PLOTLY -->
  <script src="https://cdn.plot.ly/plotly-2.12.1.min.js"></script>
  <!-- <script src="scripts/graficas/graficas.js"></script> -->

  <!-- ESTILOS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hamburgers/1.1.3/hamburgers.min.css">
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="./style/graficas.css">
</head>

<body data-dark>
  <header class="header">
    <h1>SISTEMA DE CONTROL DE GASTOS PERSONALES</h1>
  </header>
  <button class="panel-btn hamburger hamburger--elastic" type="button">
    <span class="hamburger-box">
      <span class="hamburger-inner"></span>
    </span>
  </button>
  <aside class="panel">
    <nav class="menu">
      <a href="./ingresos/index.php" data-scroll-spy>INGRESOS</a>
      <a href="#" data-scroll-spy>GASTOS</a>
      <?php if($tipo_usuario == 2) { ?>
        <!-- <p>aber</p> -->
        <a href="./categorias/index.php" data-scroll-spy>CATEGORÍAS</a>
        <a href="./usuarios/index.php" data-scroll-spy>USUARIOS</a>
        <a href="./comprobantes/index.php" data-scroll-spy>COMPROBANTES</a>
      <?php } ?>
      <a href="logout.php" data-scroll-spy>CERRAR SESIÓN</a>
      <h2 class="sesion-name">Sesión iniciada de <?php echo $nombre; ?></h2>
    </nav>
  </aside>
  <main>
    <section id="seccion1" class="section" data-scroll-spy>
      <h2>INGRESOS</h2>

      <!-- 
      <div class="ultimo">
        <h3>ÚLTIMO INGRESO</h3>

        <table class="table">
        <tr>
            <th>ID de ingreso</th>
            <th>ID de usuario</th>
            <th>Ingreso</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Saldo anterior</th>
            <th>Saldo</th>
        </tr>
        <tbody>
          <th>2020</th>
          <th>1000</th>
          <th>500.00</th>
          <th>2022-05-31</th>
          <th>12:00:00</th>
          <th>26.000</th>
          <th>526.000</th>
        </tbody>
        </table>
        
      </div>
      -->

      <!-- PLOTLY -->
      <h3 class="font">Frecuencia de ingresos</h3>
      <div class="ingreso-grafica">
        <div id="ingreso_frecuencia"></div>
        <div id="ingreso_barra"></div>
      </div>
    </section>

    <section id="seccion2" class="section gastos" data-scroll-spy>
      <h2>GASTOS</h2>
      <!-- PLOTLY -->
      <h3 class="font">Gastos por categoría</h3>
      <div class="gasto-grafica">
        <div id="gasto_categoria"></div>
        
        <div class="caja">
          <h3 class="font">Gastos por semana</h3>
          <div id="gasto_semana"></div>
        </div>
      </div>
    </seccion>
  </main>
  <button class="scroll-top-btn hidden">&#11014;</button>

  <script>
        /*-----------INGRESOS-----------*/
        Plotly.newPlot("ingreso_frecuencia", /* JSON object */ {
            "data": [{ "y": [1, 2, 3] }],
            "layout": { "width": 500, "height": 400}
        });

        // GRÁFICA DE BARRAS
        var trace1 = {
          type: 'bar',
          x: [1, 2, 3, 4],
          y: [5, 10, 2, 8],
          marker: {
              color: '#C8A2C8',
              line: {
                  width: 0.5
              }
          }
        };

        var data = [ trace1 ];

        var layout = { 
          title: 'Cantidad de ingresos',
          font: {size: 18}
        };

        var config = {responsive: true}

        Plotly.newPlot('ingreso_barra', data, layout, config );

        /*-----------GASTOS-----------*/
        // GRÁFICA DE PASTEL (CATEGORÍAS)
        var data = [{
          values: [19, 26, 55],
          labels: ['Residential', 'Non-Residential', 'Utility'],
          type: 'pie'
        }];
        var layout = {
          title: 'Gasto por categoría',
          height: 400,
          width: 500
        };
        Plotly.newPlot('gasto_categoria', data, layout);

        // GRÁFICA POR FECHAS (SEMANAL)
        var data = [
        {
          x: ['2013-10-04 22:23:00', '2013-11-04 22:23:00', '2013-12-04 22:23:00'],
          y: [1, 3, 6],
          type: 'scatter'
        }
      ];

      Plotly.newPlot('gasto_semana', data);
  </script>
</body>
  
</html>