<?php
    $id_categoria = (int)$_GET['id'];

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
    <link rel="shortcut icon" href="img/icon.png">

    <title>Categoría Física</title>

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

        function calcular(respuesta, titulo) {
            document.getElementById("modalResultadoNum").innerHTML = respuesta;
            document.getElementById("modalTitulo").innerHTML = titulo;
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
                        <li class="active"><a href="convertidor.php">Conversión de Unidades</a></li>
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

        <div class="page-header">
            <div class="container">          
            <div class="well">
            <h1>Conversión de Unidades de Temperatura</h1>
            </div>
            </div>
        </div>

        <!-- <div class="container">
            <div class="row">
                    <div class="col-lg-12">
                        <form name="datosUnidades" id="formConversiones" method="post">
                            <div class="well">
                                <h4>Seleccione la Unidad Origen:</h4>
                                <br>
                                <div class="input-group form-group">
                                        <input type="radio" name="origen" id="origen" value="f">Farenheit<br>
                                        <input type="radio" name="origen" id="origen" value="c">Celsius<br>
                                        <input type="radio" name="origen" id="origen" value="r">Ranking<br>
                                        <input type="radio" name="origen" id="origen" value="k">Kelvin<br>
                                </div>
                            </div>
                            <div class="well">
                                <h4>Seleccione la Unidad de Destino:</h4>
                            </div>
                            <br>
                            <div class="well">
                                <div class="input-group form-group">
                                    <input type="radio" name="dest" id="dest" value="f">Farenheit<br>
                                    <input type="radio" name="dest" id="dest" value="c">Celsius<br>
                                    <input type="radio" name="dest" id="dest" value="r">Ranking<br>
                                    <input type="radio" name="dest" id="dest" value="k">Kelvin<br>
                                </div>
                            </div>
                            <div class="well">
                                <label>Valor de la Unidad:</label>
                            
                                <input type="number" name="u1">
                                <br>
                                <br>
                                <button type="submit" class="btn btn-primary btn-block">Convertir</button>
                            </div>
                    </form>
                </div>
            </div>
        </div> -->

        <div class="container">
            <form method="POST" name="datosUnidades" id="formConversiones" role="form">            
                <div class="row">
                    <div class="form-group">
                        <div class="col-lg-6">
                            <div class="well">
                                <h4>Seleccione la Unidad Origen:</h4>
                                <br>
                                <div class="input-group form-group">
                                        <input type="radio" name="origen" id="origen" value="f">Farenheit<br>
                                        <input type="radio" name="origen" id="origen" value="c">Celsius<br>
                                        <input type="radio" name="origen" id="origen" value="r">Ranking<br>
                                        <input type="radio" name="origen" id="origen" value="k">Kelvin<br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-6">
                            <div class="well">
                                <h4>Seleccione la Unidad de Destino:</h4>
                                <br>
                                <div class="input-group form-group">
                                    <input type="radio" name="dest" id="dest" value="f">Farenheit<br>
                                    <input type="radio" name="dest" id="dest" value="c">Celsius<br>
                                    <input type="radio" name="dest" id="dest" value="r">Ranking<br>
                                    <input type="radio" name="dest" id="dest" value="k">Kelvin<br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-lg-6">
                            <div class="well">
                                <div class="input-group input-group-lg">
                                    <input type="number" class="form-control" placeholder="Valor a Convertir" name"u1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="from-group">
                        <div class="col-lg-6">
                            <div class="well">
                                <button type="submit" name="subir" class="btn btn-primary btn-lg btn-block">Convertir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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

        <div id="modalResultado" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="windowLabel" aria-hidden="true">
            <div class="container">
                <br>
                <br>
                <br>
                <div class="well">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h3 id="modalTitulo">Resultado</h3>
                      <h2 id="modalResultadoNum"></h2>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true" onClick="okCalculo ();">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

    
    <!-- /.container -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
<?php
    if (isset($_POST['u1']) && isset($_POST['origen']) && isset($_POST['dest'])) {
        echo "<h1>PENDEJO";
        $origen = $_POST['origen'];
        $destino = $_POST['dest'];
        $valor = (int)$_POST['u1'];
        $res = 0;

        $farenheit = "f";
        $kelvin = "k";
        $rankine = "r";
        $celsius = "c";

        if (strcmp($origen, $destino) != 0) {
            if(strcmp($origen, $farenheit) == 0 && strcmp($destino, $celsius) == 0){
                $res = ($valor-32)/1.8;
            } else if(strcmp($origen, $farenheit) == 0 && strcmp($destino, $kelvin) == 0 ){
                $res = (($valor-32)/1.8)+273;
            } else if(strcmp($origen, $farenheit) == 0 && strcmp($destino, $rankine) == 0){
                $res = $valor+463;
            } else if(strcmp($origen, $celsius) == 0 && strcmp($destino, $farenheit) == 0){
                $res = 1.8*$valor+32;
            } else if(strcmp($origen, $celsius) == 0 && strcmp($destino, $kelvin) == 0){
                $res = $valor+273;
            } else if(strcmp($origen, $celsius) == 0 && strcmp($destino, $rankine) == 0){
                $res = (($valor*1.8)+32)+463;
            }  else if(strcmp($origen, $kelvin) == 0 && strcmp($destino, $farenheit) == 0){
                $res = (($valor-273)*1.8)+32;
            }  else if(strcmp($origen, $kelvin) == 0 && strcmp($destino, $celsius) == 0){
                $res = $valor-273;
            }  else if(strcmp($origen, $kelvin) == 0 && strcmp($destino, $rankine) == 0){
                $res = ((1.8*($valor-273))+32)+463;
            }  else if(strcmp($origen, $rankine) == 0 && strcmp($destino, $kelvin) == 0){
                $res = ((($valor-463)-32)/1.8)+273;
            }  else if(strcmp($origen, $rankine) == 0 && strcmp($destino, $farenheit) == 0){
                $res = $valor-463;
            }  else if(strcmp($origen, $rankine) == 0 && strcmp($destino, $celsius) == 0){
                $res = (($valor-463)-32)/1.8;
            }  

            $english_format_number = number_format($res, 2, '.', '');
            echo "<script type=\"text/javascript\">";
            echo "  calcular($english_format_number,'Resultado:');";
            echo "</script>";

        } else {
            echo "<script type=\"text/javascript\">";
            echo "calcular('Corrobore su selección de Conversión','¡Error! :(');";
            echo "</script>";
        }
    }
?>