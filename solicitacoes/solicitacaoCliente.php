<?php
  @session_start();
  include_once("../pages/php/valida-login-cliente.php");
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Auto G | Solicitações</title>
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
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- MENU -->
  <?php
    @include_once("../inicio/menu.php");
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Minhas Solicitações
        <small>Visualizar o acompanhamento das minhas solicitações</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Solicitações</a></li>
        <li class="active">Minhas Solicitações</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <!-- MENU LOGAR (codigo check-in) -->
        <!--
        <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Entrar</h3>
            </div>
            <div class="box-body">
              <div class="col-md-10">
                <input class="form-control input" type="text" placeholder="Código Check-In">
              </div>
              <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Entrar</button>
              </div>
            </div>
          </div>
          -->
   
          <div class="box box-danger">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li class=""><a href="#tab_1-1" data-toggle="tab" aria-expanded="false">Nova Solicitação</a></li>
              <li class="active"><a href="#tab_2-2" data-toggle="tab" aria-expanded="true">Minha Solicitações</a></li>
              <li class="pull-left header"><i class="fa fa-list-alt"></i> Solicitações</li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="tab_1-1">

              <form action="http://localhost/MP_Hackathon/pages/php/Cliente/solicitacao-nova-cliente.php" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Localidade</label>
                  <input type="text" class="form-control" placeholder="Localidade" name="localidade">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Tipo de Funcionário</label>
                  <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tipo">
                    <option selected="selected" value="1">Eletricista</option>
                    <option value="2">Hidraulico</option>
                  </select>
                </div>

                <div class="form-group">
                    <label>Descrição</label>
                    <textarea class="form-control" rows="5 placeholder="Descreve o problema que está ocorrendo" name="descricao"></textarea>
                  </div>

                  <!-- BOTAO SUBMIT -->
                  <button type="submit" class="btn btn-block btn-success btn-flat">Adicionar</button>
                </form>

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_2-2">
                
              <ul class="products-list product-list-in-box">

                  <!-- Lista as Solicitações -->
                  <?php
                    include_once("../inicio/conecta.php");
                    include_once("../pages/php/Cliente/solicitacao-query.php");
                    
                  ?>

              </ul>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          </div>
    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  

  <!-- Control Sidebar -->
  
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

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>