<?php

session_start();

include 'conecta.php';




$peca = $_POST['peca'];
$descricao = $_POST['descricao'];
$localidade = $_POST['localidade'];
$validade = $_POST['validade'];
$soli = $_POST['solicitacao'];
$dataReal = $_POST['Dsaida'];
$busca = "select * from solicitacao where codigo= $soli ;";

$resultado = mysqli_query($conexao, $busca);
$produto = mysqli_fetch_assoc($resultado);
if ($produto['situacao'] == 1) {

    $inclusao = "insert into manutencao
                             (peca, descricao, localidade, validade, solicitacao, dataReal)
                        value
                             ($peca, '$descricao', '$localidade','$validade', $soli, '$dataReal')";

    mysqli_query($conexao, $inclusao);
    $inclusao = "update solicitacao set situacao=2 where codigo= $soli;";


    mysqli_query($conexao, $inclusao);
} else {
    $inclusao = "update solicitacao set situacao=1 where codigo= $soli;";


    mysqli_query($conexao, $inclusao);
}
echo $inclusao;


if (mysqli_error($conexao)) {
    echo "<h2>Erro na conexão, não cadastrado</h2>";
    header("location: indexPatara.php");
} else {
    header("location: indexPatara.php");
}
mysqli_close($conexao);
?>