<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <title>SoftBeauty</title>
        <link href="styles/style.css" rel="stylesheet">
    </head>

    <script type="text/javascript">
		window.history.forward();
		function sinVueltaAtras(){ window.history.forward(); }
	</script>
	
<body onload="sinVueltaAtras();" onpageshow="if (event.persisted) sinVueltaAtras();" onunload="">
    
    <div id="barMenu">
		<nav class="menu">
			<ul>   
				<li><a href="inicio.php">CLIENTES</a></li>
					
				<li><a href="agenda.php">AGENDA</a></li>

                <li><a href="inventario.php">INVENTARIO</a></li>  

			</ul>    
			<form class="search" method="post">
		    	<input type="number" placeholder="Buscar..." id="bar" name="buscar" title="Ingrese el ID del cliente">
				<button type="submit" name="btnBuscar" id="boton"><img src="./assets/img/busqueda.png" alt="search" id="icon"/></button>
            </form>	
			<div class="login">
                <p id="separar">|</p>
                <a id="ini" href="anadirCl.php">AÑADIR CLIENTES</a>
				<p id="separar">|</p>
                <a id="ini" href="anadirPro.php">AÑADIR PRODUCTOS</a>
				<p id="separar">|</p>
                <a id="ini" href="Login.php">CERRAR SESIÓN</a>
                <p id="separar">|</p>
			</div>
		</nav>
	</div>
    
    <header>
            <div id="titulo">
                <h1>SOFTBEAUTY</h1>
                
                <img src="./assets/img/iconCli.png" height="100" alt="Softbeauty" class="logo"> 
            </div>            
    </header>

    <?php
        $serverName="DESKTOP-HR0N2L2\SQLEXPRESS";
        $connectionInfo = array("Database"=>"ANGELDB");
        $con =sqlsrv_connect($serverName, $connectionInfo);
       /* if($con){
            echo "<script> alert('Conexion Exitosa')</script>";
        }else{
            echo "<script> alert('Conexion Fallida')</script>";
        }*/
    ?>

    <div class="main">
            <article>
                <div id="contenedor">
                    <form id="cont">
                        <h6 id="tituloCliente">Gestión de clientes</h6>
                        <div method="POST" action="" class="filt">
                            <button class="fi">Filtrar por</button>
                            <div class="contenidoFiltro">
                                <a href="inicio.php?nom=<?php echo $nom; ?>">Nombre</a>
                                <a href="inicio.php?ape=<?php echo $ape; ?>">Apellido</a>
                                <a href="inicio.php?cum=<?php echo $cum; ?>">Cumpleaños</a>
                            </div>
                        </div>
                        <div id="tab"> 
                            <div id="canDiv">
                                <table class="table table-bordered table-responsive" >
                                    <tr align="center" class="campos">
                                        <td class="campos">ID</td>
                                        <td>NOMBRE</td>
                                        <td>APELLIDO</td>
                                        <td>CUMPLEAÑOS</td>
                                        <td>CONTÁCTO</td>
                                        <td>ACCIÓN</td>
                                        <td class="campos">ACCIÓN</td>
                                    </tr>
                                    <?php
                 
                                            if(isset($_GET['nom'])){
                                                $consulta = "SELECT * FROM CLIENTES ORDER BY NOMBRE";
                                            }
                                            elseif(isset($_GET['ape'])){
                                                $consulta = "SELECT * FROM CLIENTES ORDER BY APELLIDO";
                                            }
                                            elseif(isset($_GET['cum'])){
                                                $consulta = "SELECT * FROM CLIENTES ORDER BY CUMPLE";
                                            }
                                            elseif(isset($_POST['btnBuscar'])){
                                                $b = $_POST['buscar'];
                                                $consulta = "EXEC SP_CLIENTES_INSCRITOS_UNO '$b'";
                                            }
                                            else{
                                                $consulta = "SELECT * FROM CLIENTES";
                                           }

                                            $ejecutar = sqlsrv_query($con, $consulta);
                                            
                                            $i = 0;
                                            while ($fila = sqlsrv_fetch_array($ejecutar)) {
                                                $id = $fila['ID'];
                                                if(is_null($id)){
                                                    $id = "-";
                                                }

                                                $nombre = $fila['NOMBRE'];
                                                if(is_null($nombre)){
                                                    $nombre = "-";
                                                }

                                                $apellido = $fila['APELLIDO'];
                                                if(is_null($apellido)){
                                                    $apellido = "-";
                                                }

                                                if(is_null($fila['CUMPLE'])){
                                                    $nacimiento = "-";
                                                }
                                                else{
                                                    $fecha_na = $fila['CUMPLE'];
                                                    $nacimiento = date_format($fecha_na, "d/m/Y");
                                                }

                                                $cont = $fila['CONTACTO'];
                                                if(is_null($cont)){
                                                    $cont = "-";
                                                }

                                                $i++;
                                                
                                                    
                                        ?>

                                            <tr align="center">
                                                <td><?php echo $id; ?></td>
                                                <td><?php echo $nombre; ?></td>
                                                <td><?php echo $apellido; ?></td>
                                                <td><?php echo $nacimiento; ?></td>
                                                <td><?php echo $cont; ?></td>
                                                <td><a class="botones" href="inicio.php?editar=<?php echo $id; ?>">Editar</a></td>
                                                <td><a class="botones2" href="inicio.php?borrar=<?php echo $id; ?>">Borrar</a></td>
                                            </tr>

                                        <?php } ?>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </article>
    </div>

</body>


        <?php
            if(isset($_GET['editar'])){
                include("editar.php");
            }
        ?>

        <?php
            if(isset($_GET['borrar'])){
                include("borrar.php");
            }
        ?>
        
<br><br>
<footer>
        
</footer>
</html>