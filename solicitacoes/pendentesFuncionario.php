<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>  
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Solicitações</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect. -->
        <link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <!--
    BODY TAG OPTIONS:
    =================
    Apply one or more of the following classes to get the
    desired effect
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
    -->
    <body class="hold-transition skin-blue sidebar-mini" onload="exibeDataHora()">
        <div class="wrapper">

            <!-- MENU -->
            <?php
            @include_once("../inicio/menu.php");
            include '../inicio/conecta.php';
            ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Solicitações pendentes
                        <small>Quando aparecer uma solicitação para o seu cargo, você será notificado.</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                        <li class="active">Here</li>
                    </ol>
                </section>
                <br>

                <!-- Main content -->
                <section class="content container-fluid">
                    <div class="col-md-12">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <i class="fa fa-warning"></i>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body"><script>
                                function exibeDataHora() {

                                    /*
                                     *
                                     * Funcao para exibicao de data e hora
                                     * Angelito M. Goulart
                                     * <angelito@bsd.com.br>
                                     * 06/04/2011
                                     *
                                     * Uso: basta chama-la ao carregar a pagina
                                     * e passar a div onde sera exibida a data 
                                     * e hora como parametro.
                                     *
                                     */

                                    //cria um objeto do tipo date
                                    var data = new Date();

                                    // obtem o dia, mes e ano
                                    dia = data.getDate();
                                    mes = data.getMonth() + 1;
                                    ano = data.getFullYear();

                                    //obtem as horas, minutos e segundos
                                    horas = data.getHours();
                                    minutos = data.getMinutes();
                                    segundos = data.getSeconds();

                                    //converte as horas, minutos e segundos para string
                                    str_horas = new String(horas);
                                    str_minutos = new String(minutos);
                                    str_segundos = new String(segundos);

                                    //se tiver menos que 2 digitos, acrescenta o 0
                                    if (str_horas.length < 2)
                                        str_horas = 0 + str_horas;
                                    if (str_minutos.length < 2)
                                        str_minutos = 0 + str_minutos;
                                    if (str_segundos.length < 2)
                                        str_segundos = 0 + str_segundos;

                                    //converte o dia e o mes para string
                                    str_dia = new String(dia);
                                    str_mes = new String(mes);

                                    //se tiver menos que 2 digitos, acrescenta o 0
                                    if (str_dia.length < 2)
                                        str_dia = 0 + str_dia;
                                    if (str_mes.length < 2)
                                        str_mes = 0 + str_mes;

                                    //cria a string que sera exibida na div
                                    data = ano + '-' + str_mes + '-' + str_dia;

                                    //exibe a string na div
                                    document.getElementById('dataReal').value = data;

                                    //executa a funcao com intervalo de 1 segundo


                                }

                                </script>
                                <?php
                                $busca = "select * from solicitacao where situacao=0 or situacao = 1 ;";

                                $resultado = mysqli_query($conexao, $busca);
                                $produto = mysqli_fetch_assoc($resultado);
                                while ($produto) {
                                    if ($produto['funcionario'] != null) {
                                        $busca2 = "select * from funcionario where codigo=" . $produto['funcionario'] . " ;";
                                        $resultado2 = mysqli_query($conexao, $busca2);
                                        $produto2 = mysqli_fetch_assoc($resultado2);
                                        $solicitante = $produto2['login'];
                                    } else {
                                        $busca2 = "select * from checkin where codigo=" . $produto['hospede'] . " ;";

                                        $resultado2 = mysqli_query($conexao, $busca2);
                                        $produto2 = mysqli_fetch_assoc($resultado2);
                                        $solicitante = $produto2['codigoGerado'];
                                    }


                                    if ($produto['situacao'] == 0) {
                                        echo '<form method="POST" action="../manutencao/manutencaoSolicitacao.php">
                                                        <input type="hidden" id="solicitacao" name="solicitacao" value=' . $produto['codigo'] . '>
                                                           
                                                            <input type="hidden" id="dataReal" name="dataReal" >
                                    <div id="caixa" class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                        <h4>Localidade</h4>
                                        
                                        <div class="container-fluid">
                                            <div class="row" style="display: flex">
                                                <div class="col-xs-7 col-sm-8 col-md-8 col-lg-8">
                                                    <p style="font-size: 20px">' . $produto['localidade'] . '</p>
                                                </div>
                                                <div class="col-xs-5 col-sm-4 col-md-4 col-lg-4" style="text-align: center">
                                                    <div class="col-md-auto">
                                                        <h3 class="tempoInicio"style="margin-top: 0"> Recebido: ' . $produto['horariosol'] . '</h3>
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
                                                    <p style="font-size: 30px">Codigo: ' . $solicitante . '</p>
                                                </div>
                                                
                                                <div class="col-xs-6 ccol-sm-6 col-md-3 col-lg-3">
                                                <form method="post" action="indexPatara.php">
                                                   
                                                    <input type="hidden" id="solicitacao" name="solicitacao" value=' . $produto['codigo'] . '>
                                                    </form>
                                                </div>';
                                        echo'
                                                <div class="col-xs-6 ccol-sm-6 col-md-3 col-lg-3">
                                                   <button type="submit" id="btnCaminho" class="btn btn-warning">A caminho!</button>
                                                </div>';
                                    } else {
                                        echo '<form method="POST" action="../manutencao/manutencaoSolicitacao.php">
                                                        <input type="hidden" id="solicitacao" name="solicitacao" value=' . $produto['codigo'] . '>
                                                           
                                                            <input type="hidden" id="dataReal" name="dataReal" >
                                    <div id="caixa" class="alert alert-warning alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                        <h4>Localidade</h4>
                                        
                                        <div class="container-fluid">
                                            <div class="row" style="display: flex">
                                                <div class="col-xs-7 col-sm-8 col-md-8 col-lg-8">
                                                    <p style="font-size: 20px">' . $produto['localidade'] . '</p>
                                                </div>
                                                <div class="col-xs-5 col-sm-4 col-md-4 col-lg-4" style="text-align: center">
                                                    <div class="col-md-auto">
                                                        <h3 id="tempoInicio"style="margin-top: 0"> Recebido: ' . $produto['horariosol'] . '</h3>
                                                    </div>
                                                    <div class="col-md-auto">
                                                        <h3 id="tempoAtual"></h3>
                                                        <input type="hidden" id="horarioresp" name="horarioresp" >
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row" style="text-align: center">
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                    <p style="font-size: 30px">Codigo: ' . $solicitante . '</p>
                                                </div>
                                                
                                                <div class="col-xs-6 ccol-sm-6 col-md-3 col-lg-3">
                                                <form method="post" action="indexPatara.php">
                                                   
                                                    <input type="hidden" id="solicitacao" name="solicitacao" value=' . $produto['codigo'] . '>
                                                    </form>
                                                </div>';
                                        echo'
                                                <div class="col-xs-6 ccol-sm-6 col-md-3 col-lg-3">
                                                    <button type="submit" id="btnConclusao" class="btn btn-success disabled">Concluido!</button>
                                                </div>';
                                    }
                                    echo '
                                            </div>
                                            <br>


                                        </div>

                                    </div>
                                    
                                </form>';
                                    $produto = mysqli_fetch_assoc($resultado);
                                }
                                ?>

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->


            <!-- Control Sidebar -->

            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 3 -->
        <script src="../bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../dist/js/adminlte.min.js"></script>
        <!-- JS pra essa pagina -->
        <script src="../js/funcionario.js" type="text/javascript"></script>

        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. -->
    </body>
</html>