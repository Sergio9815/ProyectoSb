<?php
    if(isset($_GET['editar'])){
        $editar_id = $_GET['editar'];
        $consulta = "SELECT * FROM INVENTARIO WHERE ID = '$editar_id'";
        $ejecutar = sqlsrv_query($con, $consulta);
        $fila = sqlsrv_fetch_array($ejecutar);

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
    }
?>


<div id="registro">
		<h5 id="crear2">ACTUALIZAR DATOS</h5>
        <form method="POST" action="" id="regis">
        <label class="titu">Nombre</label>
                <input type="text" name="nombre" class="in" value="<?php echo $nombre; ?>">
            
                <label class="titu">Marca</label>
                <input type="text" name="marca" class="in" value="<?php echo $marca; ?>">
            
                <label class="titu">Fecha de expiración</label>
                <input type="date" name="f_expira" class="date" value="<?php echo $expira; ?>">
           
                <label class="titu">Cantidad disponible</label>
                <input type="text" name="canti" class="in" value="<?php echo $cant; ?>">

                <label class="titu">Precio</label>
                <input type="text" name="prec" class="in" value="<?php echo $pre; ?>">
            
                <a id="cancel" href="inventario.php">Cancelar</a>
                <input id="update" type="submit" name="actualizar" class="btnReg" value="Actualizar datos"><br/>
        </form>
</div>

<div id="espacio2">

</div>
<?php
    if(isset($_POST['actualizar'])){
        $actualizar_nom = $_POST['nombre'];
        $actualizar_mar = $_POST['marca'];
        $actualizar_exp = $_POST['f_expira'];
        $actualizar_canti = $_POST['canti'];
        $actualizar_pre = $_POST['prec'];

        $consulta = "UPDATE INVENTARIO SET NOMBRE = '$actualizar_nom', MARCA= '$actualizar_mar', 
        EXPIRA = '$actualizar_exp', CANT = '$actualizar_canti', PRECIO = '$actualizar_pre' 
        WHERE ID = '$editar_id'";

        $ejecutar = sqlsrv_query($con, $consulta);

        if($ejecutar){
            echo "<script> alert('Datos actualizados')</script>";
            echo "<script> window.open('inventario.php', '_self')</script>";
        }

    }
?>