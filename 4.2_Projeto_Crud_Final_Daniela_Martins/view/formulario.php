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
    
    <title>Cadastro de usuário</title>
</head>
<body>

    <?php
    //testar de o usuário está logado


    //verificar se existe uma sessão aberta no servidor
    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }

    //testar se o usuário está logado ou não
    if(isset($_SESSION['email'])){
        echo $_SESSION['email'];
    }else {
        // apagar a variável de sessão
        unset($_SESSION['email']);
        header("Location: ../index.php");
    }



    ?>
    <div class="container">
        <div class="pt-2">
            <div class="card bg-light">
                <div class="card-header bg-dark text-white">
                    <div class="row">
                        <div class="col-md-11">
                            <h2>Cadastro de usuários</h2>
                        </div>
                        <div class="col-md"><a href="../model/logoff.php" class="btn btn-dark text-white float-end">Sair</a>

                    </div>
                    </div> 
                </div>
                <div class="card-body">
                    <form method="post" action="../model/cadastrarUsuario.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="inputNome" class="form-label">Nome</label>
                                <input type="text" name="nome" id="inputNome" class="form-control"placeholder="Name" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <label for="inputDate" class="form-label pt-3">Data de Nascimento</label>
                                <input type="date" name="dtnasc" id="inputDate" class="form-control" required>
                            </div>
                            <div class="col-md">
                                <label for="inputPhone" class="form-label pt-3">Telefone</label>
                                <input type="text" name="telefone" id="inputPhone" class="form-control" placeholder="Ex.(11)99999-9999" required pattern="\([1-9]{2}\)[9]{0,1}[4-9]{1}[0-9]{3}-[0-9]{4}$" />
                            </div>
                        </div>

                        <div class="row">
                            <div class='col-md-3'>
                                <label for="inputSexo" class="form-label pt-3">Sexo</label>
                                <select name="sexo" class="form-select" id="inpuSexo" aria-label="Default select example" required>
                                    <option selected></option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <label for="inputEmail" class="form-label pt-3">Email</label>
                                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email Address" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                            </div>
                            <div class="col-md">
                                <label for="inputEmail" class="form-label pt-3">Senha</label>
                                <input type="password" name="senha" id="inputSenha" class="form-control" placeholder="Password" required pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=^.{8,15}$).*$">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="inputType" class="form-label">Tipo</label>
                                <select name="tipo" class="form-select" aria-label="Default select example" required>
                                    <option selected></option>
                                    <option value="Adm">Administrador</option>
                                    <option value="Usuario">Usuário</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="formFileLg" class="form-label pt-3">Avatar</label>
                            <input type="file" name="avatar" id="inputAvatar" class="form-control" placeholder="Escolha um avatar" >
                        </div>

                        <div class="row g-3 pt-3">
                            <div class="col-md">
                                <button type="submit" class="btn btn-dark text-white fload-end">Cadastrar</button>
                                <button type="reset" class="btn btn-dark text-white fload-end">Limpar</button>
                            </div>
                        </div>

                        <div>    
                            <div class="col-md pt-3">
                                <a href="exibirUsuarios.php" class="btn btn-success text-white fload-end">Listar</a>
                            </div>
                        </div>
                        
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