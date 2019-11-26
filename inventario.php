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
        <title>Angel Saloon</title>
        <link href="css/style.css" rel="stylesheet">
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
		    	<input type="number" placeholder="Buscar..." id="bar" name="buscar" title="Ingrese el ID del producto">
				<button type="submit" name="btnBuscar" id="boton"><img src="imagenes/busqueda.png" alt="search" id="icon"/></button>
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
                <h1>ANGEL SALOON</h1>
                
                <img src="imagenes/iconIn.png" height="100" alt="Softbeauty" class="logo"> 
            </div>            
    </header>

    <?php
            $serverName="DESKTOP-HR0N2L2\SQLEXPRESS";
            $connectionInfo = array("Database"=>"ANGELDB");
            $con =sqlsrv_connect($serverName, $connectionInfo);
            /*if($con){
                echo "<script> alert('Conexion Exitosa')</script>";
            }else{
                echo "<script> alert('Conexion Fallida')</script>";
            }*/
    ?>

    <div class="main">
            <article>
                <div id="contenedor">
                    <form id="cont">
                        <h6 id="tituloCliente">Gestión de productos</h6>
                        <div method="POST" action="" class="filt">
                            <button class="fi">Filtrar por</button>
                            <div class="contenidoFiltro">
                                <a href="inventario.php?nom=<?php echo $nom; ?>">Nombre</a>
                                <a href="inventario.php?mar=<?php echo $ape; ?>">Marca</a>
                                <a href="inventario.php?canti=<?php echo $canti; ?>">Cantidad</a>
                                <a href="inventario.php?expi=<?php echo $expi; ?>">Expiración</a>
                                <a href="inventario.php?preci=<?php echo $preci; ?>">Precio</a>
                            </div>
                        </div>
                        <div id="tab"> 
                            <div id="canDiv">
                                <table class="table table-bordered table-responsive" align="center">
                                    <tr align="center" class="campos">
                                        <td class="campos">ID</td>
                                        <td>NOMBRE</td>
                                        <td>MARCA</td>
                                        <td>CANTIDAD</td>
                                        <td>EXPIRACIÓN</td>
                                        <td>PRECIO</td>
                                        <td>ACCIÓN</td>
                                        <td class="campos">ACCIÓN</td>
                                    </tr>
                                    
                                    <?php
                 
                                            if(isset($_GET['nom'])){
                                                $consulta = "SELECT * FROM INVENTARIO ORDER BY NOMBRE";
                                            }
                                            elseif(isset($_GET['mar'])){
                                                $consulta = "SELECT * FROM INVENTARIO ORDER BY MARCA";
                                            }
                                            elseif(isset($_GET['canti'])){
                                                $consulta = "SELECT * FROM INVENTARIO ORDER BY CANT";
                                            }
                                            elseif(isset($_GET['expi'])){
                                                $consulta = "SELECT * FROM INVENTARIO ORDER BY EXPIRA";
                                            }
                                            elseif(isset($_GET['preci'])){
                                                $consulta = "SELECT * FROM INVENTARIO ORDER BY PRECIO";
                                            }
                                            elseif(isset($_POST['btnBuscar'])){
                                                $b = $_POST['buscar'];
                                                $consulta = "EXEC SP_PRODUCTOS_UNO '$b'";
                                            }
                                            else{
                                                $consulta = "SELECT * FROM INVENTARIO";
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

                                                $marca = $fila['MARCA'];
                                                if(is_null($marca)){
                                                    $marca = "-";
                                                }

                                                if(is_null($fila['EXPIRA'])){
                                                    $expira = "-";
                                                }
                                                else{
                                                    $fecha_ex = $fila['EXPIRA'];
                                                    $expira = date_format($fecha_ex, "d/m/Y");
                                                }

                                                $cant = $fila['CANT'];
                                                if(is_null($cant)){
                                                    $cant = "-";
                                                }

                                                $pre = $fila['PRECIO'];
                                                if(is_null($pre)){
                                                    $pre = "-";
                                                }

                                                $i++;
                                                
                                                    
                                        ?>

                                            <tr align="center">
                                                <td><?php echo $id; ?></td>
                                                <td><?php echo $nombre; ?></td>
                                                <td><?php echo $marca; ?></td>
                                                <td><?php echo $cant; ?></td>
                                                <td><?php echo $expira; ?></td>
                                                <td><?php echo $pre; ?></td>
                                                <td><a class="botones" href="inventario.php?editar=<?php echo $id; ?>">Editar</a></td>
                                                <td><a class="botones2" href="inventario.php?borrar=<?php echo $id; ?>">Borrar</a></td>
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
                include("editarPro.php");
            }
        ?>

        <?php
            if(isset($_GET['borrar'])){
                include("borrarPro.php");
            }
        ?>


<footer>
        
</footer>
</html>