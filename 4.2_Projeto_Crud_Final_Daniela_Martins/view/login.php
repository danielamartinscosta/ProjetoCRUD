<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minufied CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> 
    
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="pt-2">
            <div class="card bg-light">
                <div class="card-header bg-dark text-white">
                    <h2>Login</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="#" enctype="multipart/form-data">
                        
                        <div class="row g-3">
                            <div class="col-md"></div>
                            <div class="col-md">    
                                <label for="inputEmail" class="form-label pt-3">Email</label>
                                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email Address" required>
                            </div>
                            <div class="col-md"></div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md"></div>
                            <div class="col-md">
                                <div class="col-md"></div>
                                <label for="inputEmail" class="form-label pt-3">Senha</label>
                                <input type="password" name="senha" id="inputSenha" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="col-md"></div>
                        </div>
                        


                        <div class="row g-3 pt-3">
                            <div class="col-md"></div>
                                <div class="col-md">
                                    <button type="submit" class="btn btn-dark text-white center">Entrar</button>
                                </div>
                            <div class="col-md"></div>
                        </div>
  
                        <?php
                        //conectar ao banco
                        include "../model/connect.php";
                        
                        // Pesquisar usuario e senha no banco e receber dados do formulario
                        $email = isset($_POST['email']) ? $_POST['email'] : '';
                        $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

                        //query de busca no banco
                        if (isset($_POST['email']) && isset($_POST['senha'])){

                            $sql = "SELECT senha, email FROM usuario WHERE email='$email' AND senha='$senha'";

                            // recebe a quantidade de registros (0= login errado e 1= ok
                            $result = $conn->query($sql);

                            // testar se tem registro
                            if($result->num_rows === 1){
                                //iniciar uma sessão no servidor
                                session_start();

                                //criar uma variável de sessão no servidor
                                $_SESSION['email'] = $email;

                                header("location:formulario.php");
                                
                            } else{
                               echo "<div class='row g-3 pt-3'>
                                <div class='col-md'></div>
                                    <div class='col-md'>
                                        <div class='alert alert-danger'role='alert'>
                                        Login ou senha incorreto! Verifique os dados e tente novamente.
                                        </div>
                                    </div>
                                <div class='col-md'></div>
                                </div>";
                                
                            }
                        }
                        
                        ?>

                    </form>
                </div>   

                <div class="card-footer bg-dark text-white">
                    Autora: Daniela Martins
                </div>
            </div>
        </div>
                    
    </div>
    
</body>
</html>