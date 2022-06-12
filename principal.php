<?php
	
	session_start();
	
	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}

  $conectar=mysqli_connect('localhost', 'root', '', 'gastos_ingresos');
	
	$nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];
  $idUsuario = $_SESSION['idUsuario'];
	
  
?>

<!DOCTYPE html>
<html lang="es" data-dark>

<head>
  <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>INTELIGENCIA DE NEGOCIOS</title>
  <!-- bootstrap -->
  <!-- <link href="./style/b_styles.css" rel="stylesheet" /> -->
  <!-- <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" /> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script> -->
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
      <a href="./gastos/index.php" data-scroll-spy>GASTOS</a>
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
      <?php
        $sql_ingreso = "SELECT SUM(Ingreso),count(*) from ingresos where Usuario_idUsuario = $idUsuario";
        $resultado_ingreso = mysqli_query($conectar, $sql_ingreso);
        $mostrar_ingreso = mysqli_fetch_array($resultado_ingreso);
      ?>

      <?php 
        if(($mostrar_ingreso['SUM(Ingreso)']) > 0){
      ?>
      <h3 class="font">Frecuencia de ingresos</h3>
      <div class="ingreso-grafica">
        <div id="ingreso_frecuencia"></div>
        <div class="caja">
          <!-- <h3 class="font">Gastos por semana</h3> -->
          <div id="ingreso_total">
            <b>Ingresos totales: $<span><?php echo $mostrar_ingreso['SUM(Ingreso)'] ?></span></b>
            <br>
            <br>
            <b>Cantidad de gastos: <span><?php echo $mostrar_ingreso['count(*)'] ?></span></b>
          </div>
        </div>
      </div>
      <?php
        }else{
          echo "<h2>AÚN NO HAY INGRESOS</h2>";
        }
      ?>

        <!-- ÚLTIMO INGRESO -->
      <?php 
        if(($mostrar_ingreso['SUM(Ingreso)']) > 0){
      ?>
      <h3>Último ingreso registrado</h3>
      <div class="table">
        <table>
          <!-- select idIngreso, Ingreso, Fecha, Hora from ingresos where idIngreso=(SELECT max(idingreso) from ingresos where Usuario_idUsuario=1000); -->
        <thead>
          <tr>
            <th>ID de ingreso</th>
            <th>Cantidad</th>
            <th>Fecha</th>
            <th>Hora</th>
          </tr>
        </thead>

        <tbody>
            <?php
              $sql_ultimoIngreso = "SELECT idIngreso, Ingreso, Fecha, Hora from ingresos where idIngreso=(SELECT max(idingreso) from ingresos where Usuario_idUsuario=$idUsuario);";
              $resultado_ultimoIngreso = mysqli_query($conectar, $sql_ultimoIngreso);
              $mostrar_ultimoIngreso = mysqli_fetch_array($resultado_ultimoIngreso);
            ?>
          <tr>
            <td><?php echo $mostrar_ultimoIngreso['idIngreso'] ?></td>
            <td><?php echo $mostrar_ultimoIngreso['Ingreso'] ?></td>
            <td><?php echo $mostrar_ultimoIngreso['Fecha'] ?></td>
            <td><?php echo $mostrar_ultimoIngreso['Hora'] ?></td>
          </tr>
        </tbody>

        </table>
      </div>
      <?php
        }
      ?>
    </section>

    <section id="seccion2" class="section gastos" data-scroll-spy>
      <h2>GASTOS</h2>
      <?php
        $sql_ultimoGasto = "SELECT ID_gasto, Establecimiento, Fecha, Hora, producto_servicio, Monto, cant, subtotal from gastos where ID_gasto=(SELECT max(ID_gasto) from gastos where Usuario_idUsuario=$idUsuario);";
        $resultado_ultimoGasto = mysqli_query($conectar, $sql_ultimoGasto);
        $mostrar_ultimoGasto = mysqli_fetch_array($resultado_ultimoGasto);
      ?>
      <!--  -->
      <!-- PLOTLY -->
      <!-- <h3 class="font">Gastos por categoría</h3> -->
      <?php
              $sql_gasto = "SELECT SUM(subtotal),count(*) from gastos where Usuario_idUsuario = $idUsuario;";
              $resultado_gasto = mysqli_query($conectar, $sql_gasto);
              $mostrar_gasto = mysqli_fetch_array($resultado_gasto);
            ?>
          <?php 
            if(($mostrar_gasto['SUM(subtotal)']) > 0){
          ?>
      <div class="gasto-grafica">

        <div id="gasto_categoria"></div>
        <script>
          function crearCadena(json){
            let parsed = JSON.parse(json);
            let arr = [];
            for(let x in parsed){
              arr.push(parsed[x]);
            }
            return arr;
          }
        </script>
        
        <div class="caja">
          <!-- <h3 class="font">Gastos por semana</h3> -->
          <div id="gasto_total">
          <!-- //! -->
            <b>Gasto total: $<span><?php echo $mostrar_gasto['SUM(subtotal)'] ?></span></b>
            <br>
            <br>
            <b>Cantidad de gastos: <span><?php echo $mostrar_gasto['count(*)'] ?></span></b>
          </div>
        </div>
      </div>
      <!--  -->
      <?php
        }else{
          echo "<h2>AÚN NO HAY GASTOS</h2>";
        }
      ?>
      <?php 
        if(($mostrar_gasto['SUM(subtotal)']) > 0){
      ?>
      <h3>Último gasto realizado</h3>
      <div class="table">
        <table>
          <!-- select ID, Establecimiento, Fecha, Hora, producto_servicio, Monto, cant, subtotal from gastos where id=(SELECT max(id) from gastos where Usuario_idUsuario=1000); -->
        <thead>
          <tr>
            <th>ID de gasto</th>
            <th>Establecimiento</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Producto o servicio</th>
            <th>Precio unitario</th>
            <th>Cantidad</th>
            <th>Total</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td><?php echo $mostrar_ultimoGasto['ID_gasto'] ?></td>
            <td><?php echo $mostrar_ultimoGasto['Establecimiento'] ?></td>
            <td><?php echo $mostrar_ultimoGasto['Fecha'] ?></td>
            <td><?php echo $mostrar_ultimoGasto['Hora'] ?></td>
            <td><?php echo $mostrar_ultimoGasto['producto_servicio'] ?></td>
            <td><?php echo $mostrar_ultimoGasto['Monto'] ?></td>
            <td><?php echo $mostrar_ultimoGasto['cant'] ?></td>
            <td><?php echo $mostrar_ultimoGasto['subtotal'] ?></td>
          </tr>
        </tbody>

        </table>
      </div>
      <?php
        }
      ?>

    </seccion>
  </main>
  <button class="scroll-top-btn hidden">&#11014;</button>

  <!-- /*-----------GASTOS-----------*/
    // GRÁFICA DE PASTEL (CATEGORÍAS)
    // TODO SELECT categoria Categoría, COUNT(*) Cantidad, SUM(subtotal) Total, Usuario_idUsuario Usuario FROM gastos INNER JOIN categorias ON Categorias_idCategorias = idCategoria where Usuario_idUsuario=1000  GROUP BY(Categorias_idCategorias) ORDER BY(Total) DESC; -->
  <!-- //* TODO CATEGORÍAS -->
  <?php
    $sql_categoria = "SELECT categoria, COUNT(*), SUM(subtotal), Usuario_idUsuario FROM gastos INNER JOIN categorias ON Categorias_idCategorias = idCategoria where Usuario_idUsuario=$idUsuario  GROUP BY(Categorias_idCategorias) ORDER BY(SUM(subtotal)) DESC;";
    $resultado_categoria = mysqli_query($conectar, $sql_categoria);
    $values=array();
    $labels=array();
    
    while ($mostrar_categoria = mysqli_fetch_row($resultado_categoria)) {
      $values[]=$mostrar_categoria[2];
      $labels[]=$mostrar_categoria[0];
    }
    $datosValues=json_encode($values);  
    $datosLabels=json_encode($labels);
  ?>

  <!-- //*Ingresos -->
  <?php
    $sql_grafica_ingreso = "SELECT * from ingresos where Usuario_idUsuario=$idUsuario;";
    $resultado_grafica_ingreso = mysqli_query($conectar, $sql_grafica_ingreso);
    $datosX=array();
    $datosY=array();
    
    while ($mostrar_grafica_ingreso = mysqli_fetch_row($resultado_grafica_ingreso)) {
      $datosX[]=$mostrar_grafica_ingreso[3]; // *Fecha
      $datosY[]=$mostrar_grafica_ingreso[2]; // *Cantidad
    }
    $datosValuesX=json_encode($datosX);  
    $datosValuesY=json_encode($datosY);
  ?>

  <script>
        /*-----------INGRESOS-----------*/
        datosValuesX=crearCadena('<?php echo $datosValuesX ?>');
        datosValuesY=crearCadena('<?php echo $datosValuesY ?>');
        Plotly.newPlot("ingreso_frecuencia",{
            "data": [{ "x":datosValuesX,
                       "y": datosValuesY}],
            "layout": { "width": 800, "height": 600, "title": 'Frecuencia de ingresos por quincena'}
        });
        
      // ! En esta gráfica de pastel no se puede mostrar las categorías con php ya que las llaves estorban
      // todo: Esta es la gráfica por categoría
        
        datosValues=crearCadena('<?php echo $datosValues ?>');
        datosLabels=crearCadena('<?php echo $datosLabels ?>');

        var data = [{
          values: datosValues,
          labels: datosLabels,
          type: 'pie'
        }];
        var layout = {
          title: 'Gasto por categoría',
          height: 400,
          width: 500
        };
        Plotly.newPlot('gasto_categoria', data, layout);
      

        // GRÁFICA POR FECHAS (SEMANAL)
        /*
        var data = [
        {
          x: ['2013-10-04 22:23:00', '2013-11-04 22:23:00', '2013-12-04 22:23:00'],
          y: [1, 3, 6],
          type: 'scatter'
        }
      ];
      */
     // GRÁFICA DE BARRAS
     var trace1 = {
          type: 'bar',
          x: [12090],
          y: [82],
          marker: {
              color: '#C8A2C8',
              line: {
                  width: 0.5
              }
          }
        };

        var data = [ trace1 ];

        var layout = { 
          title: 'Gasto total',
          font: {size: 18},
          
        };

        var config = {responsive: true}
        
  </script>
</body>
  
</html>