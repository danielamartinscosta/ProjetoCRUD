<?php

//conecta ao banco de dados
include "connect.php";

// recuperar dados por get
$id = $_GET['id_usuario'];
$avatar = $_GET['avatar'];

//busca o diretório
$dir = "../assets/avatar/";


//sql to delete a record
$sql = "DELETE FROM usuario WHERE id='$id'";



//echo $sql; //debug

if ($conn->query($sql) === TRUE) {
    $dir = "../assets/avatar/";
    if (is_file('../assets/avatar/' . $avatar)) { //verifica se o avatar existe
    }
    unlink($dir . $avatar); // se existir deleta

    $conn->close(); // fechar a conexão
    header('Location:../view/exibirUsuarios.php');
} else {
    echo "Error deleting record: " . $conn->error; // se não existir apresenta o erro
}
