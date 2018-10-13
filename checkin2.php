<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Hotelaria</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <script src="javasdabia.js" type="text/javascript"></script>
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect. -->
        <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

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
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <!-- MENU -->
            <?php
            @include_once("pages/menu.php");
            include 'conecta.php';
            ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Check-in
                        <small>Formulário de Check-in de hospedes</small>
                    </h1>

                </section>

                <!-- Main content -->
                <section class="content container-fluid">

                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Dados da Reserva</h3>
                        </div>
                        <form role="form">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nome: </label>
                                    <input type="email" class="form-control"value="<?php $_POST['nome'] ?>" disabled="disabled"id="exampleInputEmail1" placeholder="Nome">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">CPF: </label>
                                    <input type="cpf" class="form-control" id="cpf" value="<?php $_POST['cpf'] ?>" disabled="disabled"placeholder="CPF">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Data da Entrada</label>
                                    <input type="date" class="form-control" value="<?php $_POST['dataEntrada'] ?>" disabled="disabled" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Data da Saida</label>
                                    <input type="date" class="form-control" value="<?php $_POST['dataSaida'] ?>" disabled="disabled" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nuemero de Pessoas no Quarto</label>


                                    <select class="form-control" disabled="disabled">
                                        <option value="<?php $_POST['npessoas'] ?>"><?php $_POST['npessoas'] ?></option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Bloco</label>


                                    <select class="form-control" disabled="disabled">
                                        <option value="<?php $_POST['bloco'] ?>"><?php $_POST['bloco'] ?></option>

                                    </select>

                                </div>
                                <div class="form-group">
                                    <label>Quartos Disponíveis</label>
                                    <select multiple class="form-control">
                                        <?php
                                        $busca = "select * from quartos where statusq=0 and bloco=" . $_POST['bloco'] . " and qtdPessoas= " . $_POST['npessoas'] . " ;";
                                        $resultado = mysqli_query($conexao, $busca);
                                        $produto = mysqli_fetch_assoc($resultado);
                                        while ($produto) {
                                            echo '<option value=' . $produto['codigo'] . '>' . $produto['numero'] . '</option>';
                                            $produto = mysqli_fetch_assoc($resultado);
                                        }
                                        ?>



                                    </select>
                                </div>

                                <label for="exampleInputPassword1">Valor Final</label>
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon">.00</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Codigo temporário</label>
                                    <input type="text" id="codigoGer" class=" form-control " > <br>
                                    <button type="button" class="btn btn-primary" onclick="textoAleatorio(8)">Gerar</button>
                                </div>


                                <script>
                                    function textoAleatorio(tamanho)
                                    {
                                        var letras = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz';
                                        var aleatorio = '';
                                        for (var i = 0; i < tamanho; i++) {
                                            var rnum = Math.floor(Math.random() * letras.length);
                                            aleatorio += letras.substring(rnum, rnum + 1);
                                        }
                                        document.getElementById('codigoGer').value = aleatorio;
                                    }
                                </script>



                            </div>


                            <div class="box-footer">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>

                        </form>

                    </div>

                    <!--------------------------
                    | Your Page Content Here |
                    -------------------------->

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="pull-right hidden-xs">
                    Anything you want
                </div>
                <!-- Default to the left -->

            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane active" id="control-sidebar-home-tab">
                        <h3 class="control-sidebar-heading">Recent Activity</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript:;">
                                    <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                        <p>Will be 23 on April 24th</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->

                        <h3 class="control-sidebar-heading">Tasks Progress</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript:;">
                                    <h4 class="control-sidebar-subheading">
                                        Custom Template Design
                                        <span class="pull-right-container">
                                            <span class="label label-danger pull-right">70%</span>
                                        </span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->

                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->
                    <!-- Settings tab content -->
                    <div class="tab-pane" id="control-sidebar-settings-tab">
                        <form method="post">
                            <h3 class="control-sidebar-heading">General Settings</h3>

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Report panel usage
                                    <input type="checkbox" class="pull-right" checked>
                                </label>

                                <p>
                                    Some information about this general settings option
                                </p>
                            </div>
                            <!-- /.form-group -->
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
            </aside>
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 3 -->
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>

        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. -->

    </body>
</html>