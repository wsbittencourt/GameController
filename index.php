<!DOCTYPE HTML>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
        <title>GameController</title>
        
        <link rel="shortcut icon" type="image/ico" href="img/favicon.ico"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="css/index.css" rel="stylesheet" id="bootstrap-css">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-1.11.1.min.js"></script>
   
    </head>
    
    <body>
        <div class="container">
            <h1 class="welcome text-center">Bem-vindo ao <br> GameController</h1>
            <div class="card card-container">
                <h2 class='login_title text-center'>Login</h2>
                <hr>

                <form class="form-signin">
                    <span id="reauth-email" class="reauth-email"></span>
                    <p class="input_title">Usuário</p>
                    <input type="text" id="inputUser" class="login_box" placeholder="wagner" required autofocus>
                    <p class="input_title">Senha</p>
                    <input type="password" id="inputPassword" class="login_box" placeholder="***" required>
                    <div id="remember" class="checkbox">
                        <label>

                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary" type="submit">Entrar</button>
                </form><!-- /form -->
            </div><!-- /card-container -->
        </div><!-- /container -->
    </body>
</html>
