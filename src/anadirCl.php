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
			<div class="search">
		    	<input type="search" placeholder="Buscar..." id="bar" name="buscar" title="Ingrese el ID del cliente">
				<button type="submit" name="btnBuscar" id="boton"><img src="./assets/img/busqueda.png" alt="search" id="icon"/></button>
			</div>
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
                    <div id="sesion">
                        <h5 id="regTitu">REGISTRAR CLIENTE</h5>
                        <form id="regis2" method="POST" action="">
                            <label class="titu">Nombre</label>
                            <input type="text" class="in" name="nombre"/>
                                            
                            <label class="titu">Apellido</label>
                            <input type="text" id="ape" name="apellido" class="in"/>
                                            
                            <label class="titu">Fecha de nacimiento</label>
                            <input type="date" name="f_nacimiento" maxlength="255" class="in"/>
                        
                            <label class="titu">Whatsapp / Teléfono</label>
                            <input type="text" class="in" name="whats"/>
                        
                            <input type="submit" name="insert" class="btnIns" value="INSERTAR CLIENTE"><br /><br />
                        </form>
                    </div>
		</article>

    </div>

    <?php
		if(isset($_POST['insert'])){
			$nombre= $_POST['nombre'];
			$apellido = $_POST['apellido'];
            $naci = $_POST['f_nacimiento'];
            $whats = $_POST['whats'];

            $insertar = "INSERT INTO CLIENTES (NOMBRE, APELLIDO, CUMPLE , CONTACTO) VALUES('$nombre', '$apellido', '$naci','$whats')";

			$ejecutar = sqlsrv_query($con, $insertar);

			if($ejecutar){
				echo "<script> alert('¡Registro Exitoso!')</script>";
			}

		}

	?>
</body>

<div id="blanco2">

</div>

<footer>
        
</footer>
</html>