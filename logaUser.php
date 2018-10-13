<?php
session_start();
$senha= $_POST['senha'];
$login=$_POST['login'];
$busca = "select * from funcionario where login= $login and senha=$senha ;";
$resultado = mysqli_query($conexao, $busca);
    $produto = mysqli_fetch_assoc($resultado);

    $_SESSION['nome'] = $produto ['nome'];
    $_SESSION['codigoGerado']=$produto ['login'];
    



