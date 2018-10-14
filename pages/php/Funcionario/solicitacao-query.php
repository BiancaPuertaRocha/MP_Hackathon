<?php
$codigoFunc = $_SESSION['codigo']; // ID Auto Increment
$tiposerv = $_SESSION['tipoServ'];
$sql = "SELECT * from solicitacao where tipo = $tiposerv;";
$conexao->set_charset("utf8");
$result = $conexao->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $path = "../pages/php/Funcionario/solicitacao-status.php";
        $alert = "danger";
        $btnAlert = "warning";
        $botao = true;
        $botaoText = "A Caminho!";
        
        if ($row['situacao'] == 0) {
            $alert = "danger";
        } else if($row['situacao'] == 1) {
            $alert = "warning";
            $btnAlert = "success";
            $botaoText = "Concluir";
        } else if($row['situacao'] == 2) {
            $alert = "success";
            $botao = false;
        }
        
        echo '<form method="POST" action="'.$path.'">
        <input type="hidden" id="solicitacao" name="solicitacao" value=' . $row['codigo'] . '>
        <input type="hidden" name="opcao" value="'.$row['situacao'].'">

        <input type="hidden" id="dataReal" name="dataReal" >
        <div id="caixa" class="alert alert-'.$alert.' alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <h4>Localidade</h4>

            <div class="container-fluid">
                <div class="row" style="display: flex">
                    <div class="col-xs-7 col-sm-8 col-md-8 col-lg-8">
                        <p style="font-size: 20px">' . $row['localidade'] . '</p>
                    </div>
                    <div class="col-xs-5 col-sm-4 col-md-4 col-lg-4" style="text-align: center">
                        <div class="col-md-auto">
                            <h3 class="tempoInicio"style="margin-top: 0"> Recebido: ' . $row['horariosol'] . '</h3>
                                ';
                            if($alert == "success"){
                                echo '<h3 class="tempoInicio"style="margin-top: 0"> Conclusão: ' . $row['horarioresp'] . '</h3>';
                            }
            echo '
                        </div>
                        <div class="col-md-auto">
                            <h3 class="tempoAtual"></h3>
                            <input type="hidden" id="horarioresp" name="horarioresp" >
                        </div>
                    </div>
                </div>
                <br>
                <div class="row" style="text-align: center">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <p style="font-size: 30px">Codigo: ';
            
                            if(isset($row['hospede'])){
                                $sqll = "SELECT * from checkin where codigo = ". $row['hospede'] ." LIMIT 1;";
                                $resultt = mysqli_query($conexao, $sqll);
                                $roww = mysqli_fetch_assoc($resultt);
                                if(isset($roww)){
                                    echo $roww['nome'];
                                }
                            }else if(isset($row['funcionario'])){
                                $sqll = "SELECT * from funcionario where codigo = ". $row['funcionario'] ." LIMIT 1;";
                                $resultt = mysqli_query($conexao, $sqll);
                                $roww = mysqli_fetch_assoc($resultt);
                                if(isset($roww)){
                                    echo $roww['nome'];
                                }
                            }
                    
                     echo '</p>
                    </div>

                    <div class="col-xs-6 ccol-sm-6 col-md-3 col-lg-3">
                    <form method="post" action="indexPatara.php">

                        <input type="hidden" id="solicitacao" name="solicitacao" value=' . $row['codigo'] . '>
                        </form>
                    </div>';
            echo'
                    <div class="col-xs-6 ccol-sm-6 col-md-3 col-lg-3">
                    ';  
                        if($botao == true){
                            echo '<button type="submit" id="btnCaminho" class="btn btn-'.$btnAlert.'">'.$botaoText.'</button>';
                        }else{
                            echo "<h3>Concluido!</h3>";
                        }
                        echo '
                    </div>
                </div>
                <br>
            </div>
        </div>
    </form>';
    }
}
?>