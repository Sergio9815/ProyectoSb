<?php
    if(isset($_GET['editar'])){
        $editar_id = $_GET['editar'];
        $consulta = "SELECT * FROM CLIENTES WHERE ID = '$editar_id'";
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
    }
?>


<div id="registro">
		<h5 id="crear2">ACTUALIZAR DATOS</h5>
        <form method="POST" action="" id="regis">
                <label class="titu">Nombre</label>
                <input type="text" name="nombre" class="in" value="<?php echo $nombre; ?>">
            
                <label class="titu">Apellido</label>
                <input type="text" name="apellido" class="in" value="<?php echo $apellido; ?>">
            
                <label class="titu">Fecha de nacimiento</label>
                <input type="date" name="f_nacimiento" class="date" value="<?php echo $nacimiento; ?>">
           
                <label class="titu">Contacto</label>
                <input type="text" name="contac" class="in" value="<?php echo $cont; ?>">
            
                <a id="cancel" href="inicio.php">Cancelar</a>
                <input id="update" type="submit" name="actualizar" class="btnReg" value="Actualizar datos"><br/>
        </form>
</div>

<div id="espacio">

</div>
<?php
    if(isset($_POST['actualizar'])){
        $actualizar_nom = $_POST['nombre'];
        $actualizar_ape = $_POST['apellido'];
        $actualizar_naci = $_POST['f_nacimiento'];
        $actualizar_conta = $_POST['contac'];

        $consulta = "UPDATE CLIENTES SET NOMBRE = '$actualizar_nom', APELLIDO = '$actualizar_ape', 
        CUMPLE = '$actualizar_naci', CONTACTO = '$actualizar_conta' 
        WHERE ID = '$editar_id'";

        $ejecutar = sqlsrv_query($con, $consulta);

        if($ejecutar){
            echo "<script> alert('Datos actualizados')</script>";
            echo "<script> window.open('inicio.php', '_self')</script>";
        }

    }
?>