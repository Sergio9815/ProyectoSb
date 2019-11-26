<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <title>Angel Saloon</title>
        <link href="css/styleAgenda.css" rel="stylesheet">
        <link href="css/Bootstrap.css" rel="stylesheet">
        <script src="js/jquery.min.js"></script>
        <script src="js/moment.min.js"></script>
        <link href="css/fullcalendar.min.css" rel="stylesheet">
        <script src="js/fullcalendar.min.js"></script>
        <script src="js/es.js"></script>
        <script src="js/popper.min.js" ></script>
        <script src="js/bootstrap.min.js"></script>
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
				<button type="submit" name="btnBuscar" id="boton"><img src="imagenes/busqueda.png" alt="search" id="icon"/></button>
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
    
    <header>
            <div id="titulo">
                <br><br>
                <h1>ANGEL SALOON</h1>
                
                <img src="imagenes/iconDate.png" height="100" alt="Softbeauty" class="logo"> 
            </div>            
    </header>
    <div id="calenSep">
        <br>
    </div>
    <div class="containers">
            <div class="row">
                <div class="col"></div>
                <div class="col-7"><div id="CalendarioWeb"></div></div>
                <div class="col"></div>
            </div>
        </div>
        
        <script>
            $(document).ready(function(){
                $('#CalendarioWeb').fullCalendar({
                    header:{
                        left:'today,prev,next,MiBoton',
                        center:'title',
                        right:'month,basicWeek,basicDay,agendaWeek,agendaDay'
                    },
                    customButtons:{
                        MiBoton:{
                            text:"Boton",
                            click:function(){
                                alert("Hola mundo");
                            }
                        }
                    },
                    dayClick:function(date, jsEvent, view){
                       // alert("Dia seleccionado: "+ date.format());
                       // alert("Vista: "+ view.name);
                        $(this).css('background-color', 'lightcoral')
                        $('#exampleModal').modal();
                    },
                    eventSources:[{
                    events : [
                        {
                            title:'Evento 1, tratamiento de cabello',
                           // description:"Corte, lavado y tinte de cabello"
                            start:'2019-07-01'
                        },
                        {
                            title:'Evento 2, Tratamiento de uñas',
                            start:'2019-07-09',
                            end:'2019-07-10'
                        },
                        {
                            title:'Evento 3, saludos',
                            start:'2019-07-11T12:30',
                            allDay:false
                        },
                    ],
                    color:"#FF0F0",
                    textColor:"#FFFFFF"

                    }],
                    eventClick:function(CalEvent,jsEvent,view){
                       // $('#tituloEvento').html(calEvent.title);
                       // $('#descripcionEvent').html(calEvent.descripcion);
                        $('#exampleModal').modal();
                    }
                });
            });
        </script>

            
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloEvento"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <div id="descripcionEvent"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Agregar</button>
                <button type="button" class="btn btn-success" data-dismiss="modal">Modificar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Borrar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
</body>

<footer>
        
</footer>
</html>