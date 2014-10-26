<?php
    $mysqli = new mysqli("localhost","root","Eddymascota22\"","fisica2");

    $resultado = $mysqli->query("SELECT id_cat, nom_cat, desc_cat FROM categorias;");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Página Web con la presentación del Proyecto.">
        <meta name="author" content="Humberto Alejandro Ortega Alcocer <humbertowoody@gmail.com>">

        <title>Formulario de Física</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/one-page-wonder.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body role="document">
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
                        <li class="active"><a href="index.php">Inicio</a></li>
                        <li><a href="equipo.php">Acerca de Nosotros</a></li>
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

        <!-- Full Width Image Header -->
    <header class="header-image">
        <div class="headline">
            <div class="container">
                <h1>Formulario de Física</h1>
                <h2>Memorizar fórmulas es parte del Pasado.</h2>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <div class="container">

        <hr class="featurette-divider">

        <!-- First Featurette -->
        <div class="featurette" id="about">
            <img class="featurette-image img-circle img-responsive pull-right" src="img/1.jpg">
            <h2 class="featurette-heading">La Física
                <span class="text-muted"> Aprender sin Memorizar.</span>
            </h2>
            <p class="lead">
                Uno de los mayores problemas a los que se enfrenta la enseñanza de la materia de física hoy
                en día, es lograr que los alumnos comprendan los conceptos y no los "memoricen", sin darle un
                adecuado uso al conocimiento que en realidad viene detrás de las fórmulas. 
            </p>
        </div>

        <hr class="featurette-divider">

        <!-- Second Featurette -->
        <div class="featurette" id="services">
            <img class="featurette-image img-circle img-responsive pull-left" src="img/2.jpg">
            <h2 class="featurette-heading">Reinventar los Formularios
                <span class="text-muted">¿Para qué me sirve un formulario?</span>
            </h2>
            <p class="lead">
                Un formulario, normalmente sirve de pauta para indicarle al alumno el modelo matemático que
                debe utilizar para llegar al resultado deseado. De esta forma, se limita el aprendizaje y se
                hace al alumno dependiente al formulario, sin el cual no podrá realizar ninguna operación.
            </p>
        </div>

        <hr class="featurette-divider">

        <!-- Third Featurette -->
        <div class="featurette" id="contact">
            <img class="featurette-image img-circle img-responsive pull-right" src="img/3.jpg">
            <h2 class="featurette-heading">Aprovechar el Conocimiento.
                <span class="text-muted"> Nadie necesita un formulario para saber física</span>
            </h2>
            <p class="lead">
                Los alumnos no deben depender de un formulario para aprender física, es más, el uso de un
                formulario, no debe verse como algo perjudicial desde el punto de vista de los maestros, sino que,
                al contrario, debe de verse como la manera de ayudar a los alumnos a comprender de manera
                algebráica el concepto que se vió durante la clase. El propósito del presente formulario, es enseñar a 
                los alumnos a razonar las fórmulas, y no únicamente seguir el modelo matemático.
            </p>
        </div>

        <hr class="featurette-divider">

        <footer>
            <div class="container">
            <div class="well">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Formulario Electrónico 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            </div>
            </div>
            <!-- /.row -->
        </footer>

        <!-- JQuery -->
        <script src="js/jquery-1.11.0.js"></script> 
        <!-- Bootstrap-->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>