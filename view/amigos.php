<?php
session_start();

require_once '../php/amigos_script.php';

$users = todosAmigos();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>    
        <meta charset="UTF-8"/>
        <title>Amigos</title>

        <link rel="shortcut icon" type="image/ico" href="../img/favicon.ico"/>
        <link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"/>
        <link href="../css/estilo.css" rel="stylesheet" id="bootstrap-css"/> 
        
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
                        <li>
                            <a href="emprestimos.php">
                                <span class="glyphicon glyphicon-send" aria-hidden="true"></span> Emprestimos
                            </a>
                        </li>
                        <li class="active">
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
                            echo '<a href="../php/logoff.php?token=' . md5(session_id()) . '">'
                            . '<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Sair</a>';
                            ?>
                        </li>
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
                        <span class="t1">Amigos</span>&ensp;
                        <button type="button" class="btn btn-xs btn-info" id="myBtn">Cadastrar amigo</button>                        
                    </div>
                    <div>
                        <?php                        
                        echo '<table class="table">
                                <thead>
                                    <tr>
                                      <th>Nome</th>
                                      <th>Data de nascimento</th>
                                      <th>Sexo</th>
                                      <th>Telefone</th>
                                      <th>email</th>
                                    </tr>
                                  </thead>
                                  <tbody>';
                        foreach($users as $u){
                            $sexo = 'Masculino';
                            if($u->sexo == 'F'){
                                $sexo = 'Feminino';
                            }
                            echo '<tr>
                                    <td>'.$u->nome.'</td>'.
                                    '<td>'.$u->nascimento.'</td>'.
                                    '<td>'.$sexo.'</td>'.
                                    '<td>'.$u->telefone.'</td>'.
                                    '<td>'.$u->email.'</td>
                                 </tr>';
                        }
                        echo '
                            </tbody>
                          </table>';
                        ?>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style="padding:35px 50px;">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body" style="padding:40px 50px;">
                            <form role="form">                                
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script> 
        <script type="text/javascript" src="../js/amigos.js"></script>
    </body>
</html>
