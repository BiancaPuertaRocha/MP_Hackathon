<?php

session_start();

include 'conecta.php';




$peca = $_POST['peca'];
$descricao = $_POST['descricao'];
$localidade = $_POST['localidade'];
$validade = $_POST['validade'];
$dataReal = $_POST['dataReal'];


$inclusao = "insert into manutencao
                             (peca, descricao, localidade, validade, dataReal)
                        value
                             ($peca, '$descricao', '$localidade','$validade', '$dataReal')";

mysqli_query($conexao, $inclusao);
echo $inclusao;


if (mysqli_error($conexao)) {
    echo "<h2>Erro na conexão, não cadastrado</h2>";
    header("location: manutencao.php");
} else {
    header("location: manutencao.php");
}
mysqli_close($conexao);
?>