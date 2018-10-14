<?php
include_once("conecta.php");
@session_start();
 
$login = mysqli_real_escape_string($conexao, $_POST['login']);
$loginValidada = (isset($login)) ? $login : '' ;
 
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
$senhaValidada = (isset($senha)) ? $senha : '' ;
 
// Verifica se a requisição é o dominío nosso
if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != "http://localhost/MP_Hackathon/inicio/login.php"):
    echo 'url error';
    @header("Location: http://localhost/MP_Hackathon/inicio/login.php");
    exit();
endif;
 
if (empty($loginValidada) || empty($senhaValidada)):
    echo 'login ou senha está vazio';
    @header("Location: http://localhost/MP_Hackathon/inicio/login.php");
    exit();
endif;
 
$sql = "SELECT * from funcionario where senha= '$senha' and login='$login';";
$conexao->set_charset("utf8");
$result = $conexao->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $_SESSION['codigo']   = $row['codigo'];
        $_SESSION['nome']     = $row['nome'];
        $_SESSION['login']    = $row['login'];
        $_SESSION['tipoServ'] = $row['tipoServ'];
        $_SESSION['logado']   = "true";
        echo 'logado';
        @header("Location: http://localhost/MP_Hackathon/solicitacoes/pendentesFuncionario.php");
    }
} else {
    $_SESSION['logado'] = "false";
    $_SESSION['mensagem'] = "Usuário ou senha incorretos!";
    echo 'erro login';
   
 
    @header("Location: http://localhost/MP_Hackathon/inicio/login.php");
}
$_SESSION['funcionario']=1;