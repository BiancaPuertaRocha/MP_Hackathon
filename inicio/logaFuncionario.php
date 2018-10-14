<?php
session_start();
$senha=$_POST['senha'];
$login = $_POST['login'];
$busca = "select * from funcionario where senha= $senha and login=$login ;";

$resultado = mysqli_query($conexao, $busca);
$produto = mysqli_fetch_assoc($resultado);
$_SESSION['funcionario']= $login;
$_SESSION['nome']= $produto['nome'];
  @header("Location: http://localhost/MP_Hackathon/solicitacoes/pendentesFuncionario.php");