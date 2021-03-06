<?php
    session_start();
    if (!isset($_SESSION["usuario"])) {
        header('location:../index.php');
    } 
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
        <title>Emprestimos</title>

        <link rel="shortcut icon" type="image/ico" href="../img/favicon.ico"/>
        <link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="../css/estilo.css" rel="stylesheet" id="bootstrap-css">
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery-1.11.1.min.js"></script> 
    </head>
    <body>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <span class="navbar-brand">
                        <span title="Logo">
                            <a href="#" id="home"><img src="../img/logo.png" border="0" height="auto" hspace="0" width="40px" /></a>
                        </span>
                        <span>GameController</span>
                    </span>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <!--  Menu -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active">
                            <a href="emprestimos.php">
                                <span class="glyphicon glyphicon-send" aria-hidden="true"></span> Emprestimos
                            </a>
                        </li>
                        <li>
                            <a href="amigos.php">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Amigos
                            </a>
                        </li>
                        <li>
                            <a href="jogos.php">
                                <span class="glyphicon glyphicon-knight" aria-hidden="true"></span> Jogos
                            </a>
                        </li>
                        
                        <li>
                            <?php
                                echo '<a href="../php/logoff.php?token='.md5(session_id()).'">'
                                        . '<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Sair</a>';
                            ?>
                        </li>

                        <!-- Dropdwon -->
                        <!-- <li class="dropdown " title="Menu principal">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <span class="fa fa-user-circle" aria-hidden="true"></span>
                                Usuario
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header">CONFIGURAÇÕES</li>
                                <li class="">
                                    <a href="#" id="change">
                                        <span class="fa fa-key" aria-hidden="true"></span>
                                        Alterar senha
                                    </a>
                                </li>
                                <li class="divider"></li>

                                <li>
                                    <a tabindex="-1" href="#" class="cor sair">
                                        <span class="fa fa-sign-out" aria-hidden="true"></span>
                                        Sair</a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <section class="pane">
            <div class="container" >
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 ">
                        <span class="t1">Emprestimos</span>
                        
                    </div>
                </div>
            </div>
            <!-- /.container -->
        </section>
    </body>
</html>
