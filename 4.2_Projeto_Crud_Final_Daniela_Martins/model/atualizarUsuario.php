<?php

//conexão como banco de dados
include "connect.php";

$id = $_POST['id_usuario'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$telefone = $_POST['telefone'];
$dtnasc = $_POST['dtnasc'];
$sexo = $_POST['sexo'];
$tipo = $_POST['tipo'];
$avatar = $_POST['avatar'];

$dir = "../assets/avatar/";
$id = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : '';


if ($_FILES['avatar']['name']) {
  if (is_file('../assets/avatar/' . $avatar)) { //verifica se o avatar existe
  }
  unlink($dir . $avatar);
  $dir = "../assets/avatar/";  //diretório para salvar a imagem
  $arr_ext = $_FILES['avatar']['name'];
  $separa = explode(".", $arr_ext);
  $ext = array_reverse($separa);
  $avatar = strtolower($email . "." . $ext[0]); //converter o nome para minúsculo


  $from = $_FILES['avatar']['tmp_name'];
  $to = $dir . $avatar;
  echo $to . "<br>";
  if (move_uploaded_file($from, $to)) { //mover o arquivo para o diretório
    //echo "ok";

  } else {
    echo "error";
  }
} else {
  $avatar = null;
}



$result = "UPDATE usuario SET 
nome = '$nome',
senha = '$senha',
telefone = '$telefone',
dtnasc = '$dtnasc',
sexo = '$sexo',
tipo = '$tipo',
avatar = '$avatar'
WHERE id='$id'";




$resultado = mysqli_query($conn, $result);

if ($resultado) {  //para confirmar a alteração ou informar o erro
  echo "Atualização realizada com sucesso!";
} else {
  echo "Atualização não realizada <br/><br/>";
}



header('Location:../view/exibirUsuarios.php');
