<?php
    if(isset($_GET['borrar'])){
        $editar_id = $_GET['borrar'];
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

<br/>

<div id="registro">
		<h5 id="crear2">ELIMINAR PRODUCTOS</h5>
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
                <input id="delete" type="submit" name="del" class="btnReg" value="Eliminar producto"><br/>
        </form>
</div>
<div id="espacio2">

</div>
<?php
    if(isset($_POST['del'])){
        $borra= "DELETE FROM INVENTARIO WHERE ID = '$editar_id'";
        $ejecutar = sqlsrv_query($con, $borra);
        
        if($ejecutar){
            echo "<script> alert('Producto eliminado')</script>";
            echo "<script> window.open('inventario.php', '_self')</script>";
        }
    }
?>