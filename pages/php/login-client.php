<?php
    @include_once("connectDB.php");
    @session_start();

    $codCli = filter_input(INPUT_POST, 'codigoCliente');
    $codCli = str_replace(" ", "", $codCli);
    $codCli = str_replace("-", "", $codCli);
    $codigoCliente = (isset($codCli)) ? $codCli : '' ;
    
    // Verifica se a requisição é o dominío nosso
    if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != "http://localhost/MP_Hackathon/inicio/login-user.php"):
        echo 'url error';
        @header("Location: http://localhost/MP_Hackathon/inicio/login-user.php");
        exit();
    endif;

    if (empty($codigoCliente)):
        echo 'codigo client está vazio';
        @header("Location: http://localhost/MP_Hackathon/inicio/login-user.php");
        exit();
    endif;

    $sql = "SELECT * from checkin where codigoGerado = '$codigoCliente';";
    $conn->set_charset("utf8");
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $_SESSION['codigo'] = $row['codigo'];
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['quarto'] = $row['quarto'];
            $_SESSION['codigoGerado'] =$row['codigoGerado'];
            $_SESSION['logado'] = "true";
            echo 'logado';
            @header("Location: http://localhost/MP_Hackathon/solicitacoes/solicitacaoCliente.php");
        }
    } else {
        $_SESSION['logado'] = "false";
        $_SESSION['mensagem'] = "Código incorreto!";
        echo 'erro login';
        

        @header("Location: http://localhost/MP_Hackathon/inicio/login-user.php");
    }
    $_SESSION['funcionario']=0;
?>