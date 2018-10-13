<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>  
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Agendamento de Manunten��o</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
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
                        Manuntenções agendadas
                        <small>Pesquise dentre o intervalo de data para ver os componentes que necessitam de manuntenção.</small>
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
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">Tabela de manuntenção</h3>
                                        <form method="POST" action="manutencaoPatara.php">
                                        <div class="box-tools">
                                            <div class="input-group input-group-sm" style="width: 200px;">
                                                
                                                <input type="date" name="table_search" class="form-control pull-right" placeholder="Search">
                                                <div class="input-group-btn">
                                                </div>
                                                <input type="date" name="table_search" class="form-control pull-right" placeholder="Search">
                                                 <div class="input-group-btn">
                                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                            </form>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <tbody><tr>
                                                    <th>Código</th>
                                                    <th>Produto</th>
                                                    <th>Local</th>
                                                    <th>Data da ultima manutencao</th>
                                                    <th>Validade</th>
                                                    <th>Descrição</th>
                                                    <th>Checkar</th>
                                                </tr>
                                                 <?php
                                                $busca = "select * from manutencao ;";
                                                $resultado = mysqli_query($conexao, $busca);
                                                $produto = mysqli_fetch_assoc($resultado);
                                                while ($produto) {
                                                    $busca2 = "select * from pecas where codigo = ".$produto['peca']." ;";
                                                $resultado2 = mysqli_query($conexao, $busca2);
                                                echo $busca2;
                                                $produto2 = mysqli_fetch_assoc($resultado2);
                                                    echo '<tr>
                                                    <td>'.$produto2['codigo'].'</td>
                                                    <td>'.$produto2['descricao'].'</td>
                                                   
                                                    <td>'.$produto['localidade'].'</td>
                                                    <td>'.$produto2['dataReal'].'</td>
                                                    <td>'.$produto['validade'].'</td>
                                                   
                                                    <td id="lbl0"><span class="label label-success">Em funcionamento</span></td>
                                                   
                                                    <td>
                                                        <button id="btn0" type="button" class="btn btn-success">OK!</button>
                                                    </td>
                                                </tr>';
                                                    echo '<option value=' . $produto['codigo'] . '>' . $produto['codigo'] . ' - ' . $produto['descricao'] . '</option>';
                                                    $produto = mysqli_fetch_assoc($resultado);
                                                }
                                                ?>
                                                
                                                <tr>
                                                    <td>00000</td>
                                                    <td>Bomba d'�gua</td>
                                                    <td>Piscina 2</td>
                                                    <td id="date1">13-10-2018</td>
                                                    <td id="lbl1"><span class="label label-warning">Requer manunten��o</span></td>
                                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                                    <td>
                                                        <button id="btn1" type="button" class="btn btn-success">OK!</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>00000</td>
                                                    <td>M�quina de caf�</td>
                                                    <td>Escrit�rio tal</td>
                                                    <td id="date2">06-06-2018</td>
                                                    <td id="lbl2"><span class="label label-danger">Atrasado!</span></td>
                                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                                    <td>
                                                        <button id="btn2" type="button" class="btn btn-success">OK!</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>

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
                <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
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
        <!-- JS pra essa pagina -->
        <script src="manuntencao.js" type="text/javascript"></script>

        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. -->
    </body>
</html>