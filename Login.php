<!DOCTYPE html><!--Proyecto IS-->
<meta charset="UTF-8">
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <script src="login/js/jquery-3.3.1.min.js"></script>
    <script src="login/js/bootstrap.js"></script>
    <title> Angel Saloon </title>
    <link href="css/style.css" rel="stylesheet">
    </head>

<body>

    <div id="header" >

    </div>

    <div class="main">
			<article>
                <div id="picture">
					<a>
				    	<img src="imagenes/Logo.jpg" height="350" width="500" alt="Angel Saloon">
					</a>
				</div>
				<div id="sesion">
				    <h5 id="tituS">Inicia sesión</h5>
					    <form id="inicio">
                            <input type="email" id="email" name="inputEmail" placeholder="Nombre de usuario" maxlength="255" class="ini"/>
                                <br />
						        <input type="password" name="inputPassword" placeholder="Contraseña" class="ini"/>
							    <br />
							    <input type="button" value="A c c e d e r" class="btnIni" onclick="check(this.form)"/>
					    </form>
                </div>
                <div id="blanco">

                </div>
			</article>

	</div>

    <script language="javascript">
        function check(form)
        {
            var nombre = form.inputEmail.value;
            nombre = nombre.toUpperCase();
            var clave = form.inputPassword.value
            clave = clave.toUpperCase();
            var a = 0;

            if(nombre == "YAZMIN" && clave == "123")
            {
                window.open('inicio.php', '_self')
            }
            else
            {
              alert("Nombre de usuario o clave incorrecta")
              a++
            }

        }
    </script>

</body>

<footer>
    </footer>
</html>
