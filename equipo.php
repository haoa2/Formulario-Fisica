<?php
    require 'db_connection.php';

    $resultado = $mysqli->query("SELECT id_cat, nom_cat, desc_cat FROM categorias;");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página acerca del Equipo que creó el Sitio WEB">
    <meta name="author" content="Humberto Alejandro Ortega Alcocer">

    <title>¿Quiénes Somos?</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/round-about.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background-image:url(img/fondo.jpg)">

    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Formulario de Física</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="equipo.php">Acerca de Nosotros</a></li>
                        <li><a href="convertidor.php">Conversión de Unidades</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Temas de Física <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <?php
                                    while ($row = $resultado->fetch_array(MYSQLI_NUM)) 
                                    {
                                        echo "<li><a href=\"categoria.php?id=$row[0]\" data-toggle=\"tooltip\" title=\"$row[2]\">$row[1]</a></li>";
                                    }
                                ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <!-- Page Content -->
    <div class="container">
        <div class="well">
        <!-- Introduction Row -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Nuestro Equipo
                    <small> ¿Quiénes somos?</small>
                </h1>
                <p>
                    Nosotros somos alumnos del Quinto semestre de Preparatoria, compartimos el gusto por la programación
                    y para nuestro proyecto de Física, realizamos el presente Formulario Electrónico, con el fin de ayudar
                    a los alumnos a comprender de manera conceptual los temas de la materia, sin necesidad de depender de 
                    un Formulario. Somos del grupo 504, y no, no somos tan feos en persona.
                </p>
            </div>
            </div>
        </div>

        <!-- Team Members Row -->
        <div class="well">
        <div class="row">
            
            <div class="col-lg-12">
                <h2 class="page-header">Nuestro Equipo</h2>
            </div>
            <div class="col-lg-4 col-sm-6 text-center">
                <img class="img-circle img-responsive img-center" src="img/david.jpg" alt="">
                <h3>David Aldair Molina Mendoza
                    <small>Diseño y Front-end</small>
                </h3>
                <p>Diseño de los Templates para las Fórmulas. ¡Encuéntrame en <a href="https://www.facebook.com/David3Molina">Facebook</a>!</p>
            </div>
            <div class="col-lg-4 col-sm-6 text-center">
                <img class="img-circle img-responsive img-center" src="img/zarza.jpg" alt="">
                <h3>Victor Manuel Zarza Hernández
                    <small>Front-end y Testing</small>
                </h3>
                <p>Diseño de los templates de presentación y pruebas en diferentes dispositivos. ¡Encuéntrame en <a href="https://www.facebook.com/victormanuel.zarzahernandez">Facebook</a>!</p>
            </div>
            <div class="col-lg-4 col-sm-6 text-center">
                <img class="img-circle img-responsive img-center" src="img/yo.png" alt="">
                <h3>Humberto Alejandro Ortega Alcocer
                    <small>Programación, Desarrollo y Debugging</small>
                </h3>
                <p>Programación general del Sitio Web. ¡Encuéntrame en <a href="https://twitter.com/HumbertoWoody">Twitter</a>!</p>
            </div>
            <div class="col-lg-12 col-sm-6 text-center">
                <img class="img-circle img-responsive img-center" src="img/arturo.jpg" alt="">
                <h3>Arturo Munguía Guadarrama
                    <small>Recavación de Información.</small>
                </h3>
                <p>Fórmulas y Despejes.  ¡Encuéntrame en <a href="https://www.facebook.com/arturo.munguia.393?fref=ts">Facebook</a>!</p>
            </div>
        </div>
        </div>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="well">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Formulario Electrónico 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>