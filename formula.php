<?php
    $id_categoria = (int)$_GET['idc'];
    $id_formula = (int)$_GET['idf'];

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

    <title>Fórmula Física</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
        function okCalculo(){
            $("#modalResultado").modal ('hide');
        };

        function calcular(respuesta) {
            document.getElementById("modalResultadoNum").innerHTML = respuesta;
            $("#modalResultado").modal ("show");
        }
    </script>

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
        <hr>
        <hr>
        <br>

        <div class="container">
            <div class="well">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Seleccione la fórmula que se adapte a sus datos:</h3>
                    </div>
                </div>
                <?php
                    $no_campos = array();
                            
                    array_push($no_campos, 0);

                    $resultado = $mysqli->query("SELECT id_despeje, form_despeje, datos_despeje FROM despejes WHERE id_cat=$id_categoria AND id_form=$id_formula;") or die($mysqli->error);
                    $num_mods = 0;
                    while( $row = $resultado->fetch_array(MYSQLI_NUM) ) {
                        echo "<br>";
                        echo "<div class=\"row\">";
                        echo "<div class=\"col-lg-4\">";
                        echo "<a href=\"#modal$row[0]\" style=\"margin-bottom:4px;white-space: normal\" role=\"button\" class=\"btn btn-primary btn-lg\" data-toggle=\"modal\">$row[1]</a>";
                        echo "</div>";
                        echo "<div class=\"col-lg-8\">";
                        echo "<h5>$row[2]</h5>";
                        echo "</div></div>";
                        $num_mods++;
                    }
                    echo "<h4>Despejes Disponibles: $num_mods</h4>";
                ?>
            </div>
        </div>

        <?php 
            $resultado = $mysqli->query("SELECT id_despeje, form_despeje, datos_despeje FROM despejes WHERE id_cat=$id_categoria AND id_form=$id_formula;") or die($mysqli->error);

            $datos = $mysqli->query("SELECT nom_form, desc_form FROM formula WHERE id_cat=$id_categoria AND id_form=$id_formula;") or die($mysqli->error);

            $nombre = $datos->fetch_array(MYSQLI_NUM);

            while( $row = $resultado->fetch_array(MYSQLI_NUM) ) {
        ?>
        <div id="modal<?php echo $row[0]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="container" aria-hidden="true">
                <br>
                <br>
                <div class="well" aria-hidden="true">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h3 id="myModalLabel"><?php echo "$nombre[0] ··· $row[1]"; ?></h3>
                      <small><?php echo $nombre[1];?></small>
                    </div>
                    <div class="modal-body">
                      <p>Introduzca los datos para aplicar la fórmula:</p>
                      <form method="POST">
                        <?php
                            $campos = $mysqli->query("SELECT nom_var, abr_var, id_variable, unidad_medida FROM variables WHERE id_cat=$id_categoria AND id_form=$id_formula AND id_despeje=$row[0];") or die($mysqli->error);

                            $temporal = 0;
                            while ($fila = $campos->fetch_array(MYSQLI_NUM)) {
                                echo "<br><div class=\"input-group\">";
                                echo "<span class=\"input-group-addon\">$fila[1]</span>";
                                echo "<input type=\"num\" class=\"form-control\" placeholder=\"$fila[0]\" name=\"campo$fila[2]\" required></input><br>";
                                echo "<span class=\"input-group-addon\">$fila[3]</span>";
                                echo "</div>";
                                $temporal++;
                            }
                            array_push($no_campos, $temporal);
                            echo "<input type=\"hidden\" name=\"origen\" value=\"$row[0]\">";
                        ?>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                            <button type="submit" name="calcular" class="btn btn-primary" >Calcular</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <div id="modalResultado" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="windowLabel" aria-hidden="true">
            <div class="container">
                <br>
                <br>
                <br>
                <div class="well">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h3 id="windowLabel">El resultado es:</h3>
                    </div>
                    <div class="modal-body">
                        <h2 id="modalResultadoNum"></h2>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true" onClick="okCalculo ();">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
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

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
<?php
    if (isset($_POST['calcular'])) {

        $valores = array();
        $resultado = 0;

        $despeje_utilizado = $_POST['origen'];


        for ($i=1; $i <= $no_campos[$despeje_utilizado] ; $i++) {
            $temp = "campo".$i; 
            array_push($valores, $_POST[$temp]);
        }

        if ($id_categoria == 1) {            // Cinemática
            if ($id_formula == 1) {        // Velocidad
                if ($despeje_utilizado == 1) {    // Despeje 1
                    $resultado = $valores[0]/$valores[1];
                }
                elseif ($despeje_utilizado == 2) {// Despeje 2
                    $resultado = $valores[0]*$valores[1];
                }
                else                // Despeje 3
                {
                    $resultado = $valores[0]/$valores[1];
                }
            }
        }
        elseif ($id_categoria == 2) {
            if ($id_formula == 1) {
                if ($despeje_utilizado == 1) {
                    $resultado = $valores[0]*$valores[1];
                }
                elseif ($despeje_utilizado == 2) {
                    $resultado = $valores[0]/$valores[1];
                }
                elseif ($despeje_utilizado == 3) {
                    $resultado = $valores[0]/$valores[1];
                }
            }
            elseif ($id_formula == 2) {
                if ($despeje_utilizado == 1) {
                    $resultado = $valores[0]-$valores[1];
                }
                elseif ($despeje_utilizado == 2) {
                    $resultado = $valores[0]+$valores[1];
                }
                elseif ($despeje_utilizado == 3) {
                    $resultado = $valores[0]-$valores[1];
                }
            }
            elseif ($id_formula == 3) {
                $constante = 0.0821;
                if ($despeje_utilizado == 1) {
                    $resultado = ($valores[0]*$constante*$valores[1])/$valores[2];
                }
                elseif ($despeje_utilizado == 2) {
                    $resultado = ($valores[0]*$constante*$valores[1])/$valores[2];
                }
                elseif ($despeje_utilizado == 3) {
                    $resultado = $valores[0]*$valores[1]/$valores[2]*$constante;                
                }
                elseif ($despeje_utilizado == 4) {
                    $resultado = $valores[0]*$valores[1]/$valores[2]*$constante;
                }
            }
            elseif ($id_formula == 4) {
                if ($despeje_utilizado == 1) {
                    $resultado = $valores[0]-$valores[1];
                }
                elseif ($despeje_utilizado == 2) {
                    $resultado = $valores[0]+$valores[1];
                }
                elseif ($despeje_utilizado == 3) {
                    $resultado = $valores[0]-$valores[1];
                }
                elseif ($despeje_utilizado == 4) {
                    $resultado = $valores[0]*$valores[1]*$valores[2];
                }
                elseif ($despeje_utilizado == 5) {
                    $resultado = $valores[0]/($valores[1]*$valores[2]);
                }
                elseif ($despeje_utilizado == 6) {
                    $resultado = $valores[0]/($valores[1]*$valores[2]);
                }
                elseif ($despeje_utilizado == 7) {
                    $resultado = $valores[0]/($valores[1]*$valores[2]);
                }
            }
            elseif ($id_formula == 5) {
                if ($despeje_utilizado == 1) {
                    $resultado = $valores[0]+($valores[1]*$valores[0]*$valores[2]);
                }
                elseif ($despeje_utilizado == 2) {
                    $resultado = ($valores[0]-$valores[1])/($valores[1]*$valores[2]);
                }
                elseif ($despeje_utilizado == 3) {
                    $resultado = ($valores[0]-$valores[1])/($valores[1]*$valores[2]);
                }
            }
            elseif ($id_formula == 6) {
                if ($despeje_utilizado == 1) {
                    $resultado = $valores[0]-$valores[1];
                }
                elseif ($despeje_utilizado == 2) {
                    $resultado = $valores[0]+$valores[1];
                }
                elseif ($despeje_utilizado == 3) {
                    $resultado = $valores[0]-$valores[1];
                }
            }
            elseif ($id_formula == 7) {
                if ($despeje_utilizado == 1) {
                    $resultado = $valores[0]/$valores[1];
                }
                elseif ($despeje_utilizado == 2) {
                    $resultado = $valores[0]*$valores[1];
                }
                elseif ($despeje_utilizado == 3) {
                    $resultado = $valores[0]/$valores[1];
                }
            }
            elseif ($id_formula == 8) {
                if ($despeje_utilizado == 1) {
                    $resultado = $valores[0]/$valores[1];
                }
                elseif ($despeje_utilizado == 2) {
                    $resultado = $valores[0]*$valores[1];
                }
                elseif ($despeje_utilizado == 3) {
                    $resultado = $valores[0]/$valores[1];
                }
            }   
            elseif ($id_formula == 9) {
                if ($despeje_utilizado == 1) {
                    $resultado = $valores[0]/$valores[1];
                }
                elseif ($despeje_utilizado == 2) {
                    $resultado = $valores[0]*$valores[1];
                }
                elseif ($despeje_utilizado == 3) {
                    $resultado = $valores[0]/$valores[1];
                }
            }
            elseif ($id_formula == 10) {
                $resultado = ($valores[0]*$valores[1])/$valores[2];
            }
        }
        elseif ($id_categoria == 3) {
            if ($id_formula == 1) {
                if ($despeje_utilizado == 1) {
                    $resultado = $valores[0]*$valores[1];
                }
                elseif ($despeje_utilizado == 2) {
                    $resultado = $valores[0]/$valores[1];
                }
                elseif ($despeje_utilizado == 3) {
                    $resultado = $valores[0]/$valores[1];
                }
            }
            elseif ($id_formula == 2) { 
                if ($despeje_utilizado == 1) {
                    $resultado = $valores[0]/$valores[1];
                }
                elseif ($despeje_utilizado == 2) {
                    $resultado = $valores[0]*$valores[1];
                }
                elseif ($despeje_utilizado == 3) {
                    $resultado = $valores[0]/$valores[1];
                }
            }
            elseif ($id_formula == 3) {
                if ($despeje_utilizado == 1) {
                    $resultado = $valores[0]/$valores[1];
                }
                elseif ($despeje_utilizado == 2) {
                    $resultado = $valores[0]/$valores[1];
                }
                elseif ($despeje_utilizado == 3) {
                    $resultado = $valores[0]*$valores[1];
                }
            }
            elseif ($id_formula == 4) {
                $resultado = $valores[0]-($valores[1]*$valores[2]);
            }
            elseif ($id_formula == 5) {
                $resultado = $valores[0]+($valores[1]*$valores[2]);
            }
            elseif ($id_formula == 6) {
                if ($despeje_utilizado == 1) {
                    $resultado = $valores[0]*$valores[1];
                }
                elseif ($despeje_utilizado == 2) {
                    $resultado = $valores[0]*$valores[1]*$valores[2];
                }
                elseif ($despeje_utilizado == 3) {
                    $resultado = $valores[0]*$valores[1];
                }
            }
            elseif ($id_formula == 7) {
                if ($despeje_utilizado == 1) {
                    $resultado = $valores[0]*$valores[1];
                }
                elseif ($despeje_utilizado == 2) {
                    $resultado = $valores[0]*($valores[1]*$valores[1]);
                }
                elseif ($despeje_utilizado == 3) {
                    $resultado = ($valores[0]*$valores[0])/$valores[1];
                }
                elseif ($despeje_utilizado == 4) {
                    $resultado = $valores[0]/$valores[1];
                }
                elseif ($despeje_utilizado == 5) {
                    $resultado = $valores[0]/$valores[1];
                }
                elseif ($despeje_utilizado == 6) {
                    $resultado = sqrt($valores[0]/$valores[1]);
                }
                elseif ($despeje_utilizado == 7) {
                    $resultado = $valores[0]/($valores[1]*$valores[1]);
                }
                elseif ($despeje_utilizado == 8) {
                    $resultado = sqrt($valores[0]*$valores[1]);
                }
                elseif ($despeje_utilizado == 9) {
                    $resultado = ($valores[0]*$valores[0])/$valores[1];
                }
            }
            elseif ($id_formula == 8) {
                if ($despeje_utilizado == 1) {
                    $resultado = $valores[0]/$valores[1];
                }
                elseif ($despeje_utilizado == 2) {
                    $resultado = $valores[0]*$valores[1];
                }
                elseif ($despeje_utilizado == 3) {
                    $resultado = $valores[0]/$valores[1];
                }
            }
        }
        // elseif (condition) {
        //     if (condition) {
        //         if (condition) {
        //             # code...
        //         }
        //     }
        // }
        echo "<script type\"text/javascript\">";
        echo "calcular($resultado);";
        echo "</script>";
    }
?>