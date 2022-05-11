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

    <title>Lista de usuário</title>
</head>

<body>
    <!--
+----------+--------------+------+-----+-------------------+----------------+
| Field    | Type         | Null | Key | Default           | Extra          |
+----------+--------------+------+-----+-------------------+----------------+
| id       | int(11)      | NO   | PRI | NULL              | auto_increment |
| nome     | varchar(255) | YES  |     | NULL              |                |
| email    | varchar(255) | YES  | UNI | NULL              |                |
| sexo     | varchar(10)  | YES  |     | NULL              |                |
| telefone | varchar(25)  | YES  |     | NULL              |                |
| senha    | varchar(255) | YES  |     | NULL              |                |
| dtnasc   | varchar(25)  | YES  |     | NULL              |                |
| tipo     | varchar(25)  | YES  |     | NULL              |                |
| avatar   | varchar(255) | YES  |     | NULL              |                |
| data     | timestamp    | YES  |     | CURRENT_TIMESTAMP |                |
+----------+--------------+------+-----+-------------------+----------------+

-->
    <div class="container">
        <div class="pt-4">
            <div class="card bg-light">
                <div class="card-header bg-dark text-white">
                    <div class="col-md"><a href="../model/logoff.php" class="btn btn-dark text-white float-end">Sair</a></div>
                    <h2 class="d-grid gap-2 d-md-flex justify-content-md-center">Lista de Usuários</h2>
                </div>

                <div class="card-body">
                    <!-- Adicionar um form -->
                    <form method="POST" action="#">
                        <div class="row pb-3">
                            <div class="col-md-2"></div>
                            <div class="col-md-6">
                                <input name="pesq" type="search" class="form-control" id="inputPesq" value="<?php echo isset($_POST['pesq']) ? $_POST['pesq'] : "" ?>">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-dark text-white">Pesquisar</button>
                            </div>
                            <div class="col-md-2"></div>
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle table-striped table-hover" width="100%">
                                <!--<table class="table table-striped table-hover">-->
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">NOME</th>
                                        <th scope="col">NASCIMENTO</th>
                                        <th scope="col">E-MAIL</th>
                                        <th scope="col">SEXO</th>
                                        <th scope="col">TELEFONE</th>
                                        <th scope="col">TIPO</th>
                                        <th scope="col">AÇÃO</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- incluir o php para montar a lista -->
                                    <?php

                                    include "../model/connect.php";

                                    // receber os dados do search do formulario
                                    //usar if ternário para garantir a pesquisa
                                    $nomePesq = isset($_POST['pesq']) ? $_POST['pesq'] : "";
                                    //echo "$nomePesq";


                                    $sql = "SELECT * FROM usuario WHERE nome LIKE '%$nomePesq%'";

                                    //buscar no banco de dados por meio da query select
                                    // para isso usamos o objeto de conexão e o método query()
                                    $result = $conn->query($sql);

                                    // montar a lista na tabela
                                    // enquanto o fetch array possui registros ele retorna TRUE e quando eletermina
                                    // while ($linha = mysqli_fetch_array($result)) { //procedural mode}

                                    while ($linha = $result->fetch_array()) { // mysqli_num or mysqli_assoc
                                        $id = $linha['id'];
                                        $nome = $linha['nome'];
                                        //formatar a data a ser exibida
                                        //$dtnasc = $linha['dtnasc'];
                                        $date = date_create($linha['dtnasc']);
                                        $dtnasc = date_format($date, "d/m/Y");
                                        $email = $linha['email'];
                                        $sexo = $linha['sexo'];
                                        $telefone = $linha['telefone'];
                                        $tipo = $linha['tipo'];
                                        $avatar = $linha['avatar'];

                                        //montar a tabela 
                                        $html = <<<HTML
                                <tr>
                                    <td>$id</td>
                                    <td>$nome</td>
                                    <td>$dtnasc</td>
                                    <td>$email</td>
                                    <td>$sexo</td>
                                    <td>$telefone</td>
                                    <td>$tipo</td>
                                    <td>
                                        <a href="formAlterarUsuario.php?id_usuario=$id" class="text-decoration-none me-2"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            width="16px" height="16px" viewBox="0 0 528.899 528.899" style="enable-background:new 0 0 528.899 528.899;"
                                            xml:space="preserve">
                                            <g>
                                            <path d="M328.883,89.125l107.59,107.589l-272.34,272.34L56.604,361.465L328.883,89.125z M518.113,63.177l-47.981-47.981
                                                c-18.543-18.543-48.653-18.543-67.259,0l-45.961,45.961l107.59,107.59l53.611-53.611
                                                C532.495,100.753,532.495,77.559,518.113,63.177z M0.3,512.69c-1.958,8.812,5.998,16.708,14.811,14.565l119.891-29.069
                                                L27.473,390.597L0.3,512.69z"/></svg></a>
                                        <a href='../model/excluirUsuario.php?id_usuario=$id && avatar=$avatar'  class="text-decoration-none ms-2" ><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            width="16px" height="16px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                            <g>
                                            <path d="M432,96h-48V32c0-17.672-14.328-32-32-32H160c-17.672,0-32,14.328-32,32v64H80c-17.672,0-32,14.328-32,32v32h416v-32
                                                C464,110.328,449.672,96,432,96z M192,96V64h128v32H192z"/>
                                            <path d="M80,480.004C80,497.676,94.324,512,111.996,512h288.012C417.676,512,432,497.676,432,480.008v-0.004V192H80V480.004z
                                                M320,272c0-8.836,7.164-16,16-16s16,7.164,16,16v160c0,8.836-7.164,16-16,16s-16-7.164-16-16V272z M240,272
                                                c0-8.836,7.164-16,16-16s16,7.164,16,16v160c0,8.836-7.164,16-16,16s-16-7.164-16-16V272z M160,272c0-8.836,7.164-16,16-16
                                                s16,7.164,16,16v160c0,8.836-7.164,16-16,16s-16-7.164-16-16V272z"/></svg></a>
                                    </td>
                                </tr>

HTML;


                                        echo $html;
                                    } // fim do while


                                    // Limpar o objeto result
                                    $result->free_result();


                                    //encerrar conexao
                                    $conn->close();
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="row g-3 pt-3">
                    <div class="col-md pb-4 pe-5">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="formulario.php" class="btn btn-dark text-white float-end">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-dark text-white">
            Autora: Daniela Martins
        </div>
    </div>


</body>

</html>