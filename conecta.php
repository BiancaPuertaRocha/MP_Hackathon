<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodedados = "u";
$conexao = mysqli_connect($servidor, $usuario, $senha, $bancodedados);

// verificando se houve erro 
if (mysqli_connect_error($conexao)) {
    echo "Erro na conexao!!!";
    die();
}

