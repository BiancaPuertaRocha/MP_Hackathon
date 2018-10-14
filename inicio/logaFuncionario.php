<?php
session_start();
include 'conecta.php';
$senha=$_POST['senha'];
$login = $_POST['login'];
$busca = "select * from funcionario where senha= '$senha' and login='$login' ;";
echo $busca;
$resultado = mysqli_query($conexao, $busca);
$produto = mysqli_fetch_assoc($resultado);
$_SESSION['funcionario']= $login;
$_SESSION['nome']= $produto['nome'];
  @header("Location: http://localhost/MP_Hackathon/solicitacoes/pendentesFuncionario.php");