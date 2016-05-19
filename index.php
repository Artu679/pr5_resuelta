<?php 

$current = "home";

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
    
<!--Slideshow-->
<script src="js/galleria-1.4.2.min.js"></script>


</head>


<body>
<div class="container-fluid">
    
    <?php include('include/header.php') ?>
    
    <!--BREADCRUMB-->
    <div class="row">
        <div id="breadcrumb">
            Home
        </div>
    </div>
    <!--END BREADCRUMB-->
    
    
    <div class="row">
    	
        <?php include('include/menu.php') ?>
            
        <!--SLIDESHOW-->
        <div class="col-sm-8 col-md-10" id="slideshow">
            <div class="galleria">
                <img src="assets/images/galeria/2b.jpg" alt="1">
                <img src="assets/images/galeria/4b.jpg" alt="2">
                <img src="assets/images/galeria/6b.jpg" alt="3">
                <img src="assets/images/galeria/8b.jpg" alt="4">
            </div>
        
        </div>
        <!--END SLIDESHOW-->
    </div>
    
    
    <!--FOOTER-->
    <footer>
        <!--https://creativecommons.org/choose/?lang=es-->
        <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank" title="Creative Commons"><img alt="Licencia Creative Commons" src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" /></a>Esta obra está bajo una <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank" >Licencia Creative Commons Atribución-NoComercial-CompartirIgual 4.0 Internacional</a>.
    </footer>
    <!--END FOOTER-->
</div>
<!--Slideshow run-->
<script>
	Galleria.loadTheme('js/themes/classic/galleria.classic.min.js');
	Galleria.run('.galleria');
</script>
</body>
</html>