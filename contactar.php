<?php 
//Constantes de servidor
$servername = "localhost";
$username = "losenlaces";
$password = "";
$dbname = "pr5_resuelto";

// Creamos la conexión con la DB y la comprobamos
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Error al conectar con la Base de Datos: " . mysqli_connect_error());
}

//Si se ha enviado el formulario, insertamos los datos
if(isset($_POST) && count($_POST) > 0)
{
	//print_r($_POST);
	$sql = "INSERT INTO contacto
	 			(nombre, correo, consulta, password, ip, unixtime)
			VALUES (
				'" . $_POST['nombre'] . "', 
				'" . $_POST['email'] . "', 
				'" . $_POST['consulta'] . "',
				'" . $_POST['pass'] . "',
				'" . $_POST['ip'] . "',
				'" . time() . "'
				)
			";
	
	if (mysqli_query($conn, $sql)) {
		//Se han insertado los datos
	} else {
		die("Se ha producido un error al procesar la consulta:". $sql) ;
	}
	
	
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Website Responsive </title>
<!--Librerías bootstrap-->
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
<!--CSS-->  
<link href="css/styles.css" rel="stylesheet" type="text/css">

<!--Google Font-->
<link href='https://fonts.googleapis.com/css?family=Tangerine:700|Roboto' rel='stylesheet' type='text/css'>
    


</head>


<body>
<div class="container-fluid">
    <!--HEADER-->
    <div class="row">
        <header>
            Esta es mi Web Responsive
        </header>
    </div>
    <!--END HEADER-->
    
    <!--BREADCRUMB-->
    <div class="row">
        <div id="breadcrumb">
            Home
        </div>
    </div>
    <!--END BREADCRUMB-->
    
    
    <div class="row">
    	
        <!--SIDE MENU-->
        <div class="col-sm-4 col-md-2" id="menu">
            <ul>
                <li><a class="active" href="index.html">Home</a></li>
                <li><a href="nivel1.html">Nivel 1</a></li>
                <li><a href="nosotros.html">Nosotros</a></li>
                <li>
                    <a href="#">Submenus</a>
                    <ul>
                        <li><a href="nivel2a.html" class="subnivel">Submenu1</a></li>
                        <li><a href="nivel2b.html">Submenú2</a></li>
                    </ul>
                </li>
                <li><a href="contactar.php">Contactar</a></li>
            </ul>
        </div>
        <!--END SIDE MENU-->
  
            
        <!--FORMULARIO-->
 

        <div class="col-sm-8 col-md-10">
        
 <?php if(!isset($_POST) OR count($_POST) == 0) : ?>
 
            <h2>Formulario bootstrap con validador javascript</h2>
  <form action="contactar.php" method="post" id="myForm">
      <div class="form-group">
        <label for="exampleInputName">Nombre y apellidos</label>
        <input class="form-control" name="nombre" id="exampleInputName" placeholder="Nombre y apelllidos">
      </div>
      <!--Alerta nombre-->
      <div class="alert alert-warning" style="display:none" id="alertaNombre">
          <strong>¡Alerta!</strong> Este campo no puede estar vacio.
      </div>
      <!--fin alerta nombre-->
      <div class="form-group">
        <label for="exampleInputEmail1">Correo electrónico</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email"  >
      </div>
      <div class="form-group">
        <p>
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Password">
        </p>
        <p>
          <label for="textarea"></label>
        </p>
      </div>
      <!--Alerta pass-->
      <div class="alert alert-danger" id="alertaPass" style="display:none">
          <strong>Error. </strong><span id="spanPass"></span>
        </div>
      <!--Fin alerta pass-->

	  <div class="form-group">

        <p>
          <label for="consulta">Consulta</label>
          <textarea  class="form-control"  name="consulta" id="consulta" cols="45" rows="5"> </textarea>
        </p>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" id="checkInput" name="checkbox" value="si"> Acepto las <a data-toggle="modal" href="#myModal">condiciones</a> del sitio web
        </label>
      </div>
      <!--Alerta check-->
      <div class="alert alert-warning" style="display:none" id="alertaCheck">
          <strong>Alerta!</strong> Tienes que aceptar las condiciones.
      </div>
      <!--fin alerta check-->
      <div class="form-group">
      	<button class="btn btn-default" onclick="enviarForm(); return false;"> Enviar</button>
      </div>

    </form>
  
  <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Condiciones</h4>
      </div>
      <div class="modal-body">
        <p>Acepto las siguientes condiciones.</p>
        <ol>
        	<li>Vendo mi alma a la compañía</li>
            <li>Cedo mis bienes al CEO</li>
        </ol>
      </div>
      <div class="modal-footer">
      	<input type="hidden" name="ip" value="<?php echo $_SERVER["REMOTE_ADDR"] ?>">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

<?php else : ?>

	<h2>Se han insertado los datos. Gracias.</h2>

<?php endif ?>



<script>


function enviarForm() {
	
	var error = false;
	
	//Comprobar nombre
	var nombre = document.getElementById("exampleInputName").value;
	if(nombre == "")
	{
		error = true;
		document.getElementById("alertaNombre").style.display = "";

		document.getElementById("exampleInputName").style.backgroundColor = "#ffdfdf";
	}
	else
	{
		
		document.getElementById("alertaNombre").style.display = "none";
		document.getElementById("exampleInputName").style.backgroundColor = "#fff";
	}
	
	//Comprobar pass
	var pass = document.getElementById("exampleInputPassword1").value;
	if(pass == "")
	{
		error = true;
		document.getElementById("spanPass").innerHTML = " Debes escribir una contraseña";
		document.getElementById("alertaPass").style.display = "";
		document.getElementById("exampleInputPassword1").style.backgroundColor = "#ffdfdf";
	}
	else if(pass.length < 8)
	{
		error = true;
		document.getElementById("spanPass").innerHTML = " Tu contraseña debe tener al menos 8 caracteres";
		document.getElementById("alertaPass").style.display = "";
		document.getElementById("exampleInputPassword1").style.backgroundColor = "#ffdfdf";
	}
	else
	{
		
		document.getElementById("alertaPass").style.display = "none";
		document.getElementById("exampleInputPassword1").style.backgroundColor = "#fff";
	}
	
	//Comprobar check
	if(document.getElementById("checkInput").checked == false)
	{
		document.getElementById("alertaCheck").style.display = "";
		error = true;
	}
	else
	{
		document.getElementById("alertaCheck").style.display = "none";
		
	}
		
	
	//Si no hay errores enviamos el formulario
	if(error === true)
	{
		console.log('Hay errores');
	}
	else
	{
		console.log('Se ha enviado');
		document.getElementById("myForm").submit();	
	}
	
		
	
}

</script>
        
        </div>
        <!--END FORMULARIO-->
    </div>
    
    
    <!--FOOTER-->
    <footer>
        <!--https://creativecommons.org/choose/?lang=es-->
        <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank" title="Creative Commons"><img alt="Licencia Creative Commons" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" /></a>Esta obra está bajo una <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank" >Licencia Creative Commons Atribución-NoComercial-CompartirIgual 4.0 Internacional</a>.
    </footer>
    <!--END FOOTER-->
</div>

</body>
</html>