<?php
include_once("conexao.php");
$nome = filter_input(INPUT_POST,'nome');
$email = filter_input(INPUT_POST,'email');
$telefone = filter_input(INPUT_POST,'telefone');
$senha = filter_input(INPUT_POST,'senha');

$result_usuario = "INSERT INTO usuario(nome, email, telefone, senha) VALUES ('$senha', '$email', '$telefone', '$senha')";
$resultado_usuario = mysqli_query($conn, $result_usuario);
header('Location: login.php');
?>