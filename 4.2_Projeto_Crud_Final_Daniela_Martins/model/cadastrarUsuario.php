<?php

/*
mysql> describe usuario;
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

*/

// inserir os dados no formulário 
$nome = $_POST['nome'];
$email = $_POST['email'];
$sexo = $_POST['sexo'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];
$dtnasc = $_POST['dtnasc'];
$tipo = $_POST['tipo'];


if ($_FILES['avatar']['name']) {
    $dir = "../assets/avatar/";  //diretório para salvar a imagem
    $arr_ext = $_FILES['avatar']['name'];
    $separa = explode(".", $arr_ext);
    $ext = array_reverse($separa);
    $avatar = strtolower($email . "." . $ext[0]); //converter o nome para minúsculo


    $from = $_FILES['avatar']['tmp_name'];
    $to = $dir . $avatar;
    //echo $to . "<br>";
    if (move_uploaded_file($from, $to)) { //mover o arquivo para o diretório
        //echo "ok";

    } else {
        echo "error";
    }
} else {
    $avatar = null;
}



// conexão com o banco de dados

include "connect.php";

// variavel da query
$sql = "INSERT INTO usuario (
    nome, 
    email, 
    sexo, 
    telefone, 
    senha, 
    dtnasc, 
    tipo, 
    avatar 
    ) VALUES (
        '$nome',
        '$email',
        '$sexo',
        '$telefone',
        '$senha',
        '$dtnasc',
        '$tipo',
        '$avatar'
    )";

//echo "<br>".$sql."<br>";


// realizar o insert de dados
$result = $conn->query($sql);

// testar se o cadastro foi feito com sucesso
if ($result) {
    echo "cadastro realizado com sucesso!";
} else {
    echo "Cadastro não realizado";
}

header("location:../view/formulario.php");


// encerra a conexão com o banco de dados

$conn->close();
