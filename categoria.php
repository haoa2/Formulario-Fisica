<?php
    $id_categoria = (int)$_GET['id'];

    $mysqli = new mysqli("localhost","formulario","formpass","fisica2");

    $resultado = $mysqli->query("SELECT id_cat, nom_cat, desc_cat FROM categorias;");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Página con las fórmulas de las categorías de Física">
        <meta name="author" content="Humberto Alejandro Ortega Alcocer">
    
        <title>Categoría Física</title>
    
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
    
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
                            <li><a href="index.php">Inicio</a></li>
                            <li><a href="equipo.php">Acerca de Nosotros</a></li>
                            <li><a href="convertidor.php">Conversión de Unidades</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Temas de Física<span class="caret"></span></a>
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
            <hr>
            <hr>
            <br>
            <div class="container">
                <div class="well">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                                $resultado = $mysqli->query("SELECT nom_cat FROM categorias WHERE id_cat=$id_categoria;");
                                $row = $resultado->fetch_array(MYSQLI_NUM);
    
                                echo "<h1>Fórmulas de $row[0]</h1>";
                            ?>
                        </div>
                    </div>
                </div>
                <br>
                <div class="well">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Seleccione la fórmula a utilizar:</h4>
                        </div>
                    </div>
                    <?php
                        $resultado = $mysqli->query("SELECT id_form, nom_form, desc_form FROM formula WHERE id_cat=$id_categoria;");
    
                        while ($row = $resultado->fetch_array(MYSQLI_NUM)) {
                            echo "<br>";
                            echo "<div class=\"row\">";
                            echo "<div class=\"col-lg-4\">";
                            echo "<a href=\"formula.php?idc=$id_categoria&&idf=$row[0]\" style=\"margin-bottom:4px;white-space: normal\" class=\"btn btn-primary btn-lg\" role=\"button\">$row[1]</a>";
                            echo "</div>";
                            echo "<div class=\"col-lg-8\">";
                            echo "<h5>$row[2]</h5>";
                            echo "</div>";
                            echo "</div>";
                        }
                    ?>
                </div>
            </div>
            <!-- container-->
            <!-- Footer -->
            <footer>
                <div class="container">
                    <div class="well">
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Copyright &copy; Formulario Electrónico 2014</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        <!-- Scripts Necesarios -->
        <script src="js/jquery-1.11.0.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>