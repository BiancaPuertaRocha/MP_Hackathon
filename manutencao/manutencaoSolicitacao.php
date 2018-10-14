<!DOCTYPE html>
<html>
      <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Hotelaria</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
        <!-- daterange picker -->
        <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
        <!-- bootstrap datepicker -->
        <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="../plugins/iCheck/all.css">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

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
    <body class="hold-transition skin-blue sidebar-mini"onload="exibeDataHora()">
        <div class="wrapper">
            <?php
            @include_once("../inicio/menu.php");
            include '../inicio/conecta.php';
            
            ?>
            <script  type="text/javascript" >

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
                    document.getElementById('data').value = new Date();

                    //executa a funcao com intervalo de 1 segundo


                }

            </script>
            <!-- Left side column. contains the logo and sidebar -->


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->


                <!-- Main content -->
                <section class="content container-fluid">

                    <!-- SELECT2 EXAMPLE -->
                    <div class="box box-info">
                        <section class="content-header">
                            <h1>
                                Manutenção
                                <small>Formulário de manutenção agendada</small>
                            </h1>

                        </section>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <form method="POST" action="insereManutencaoSolicitacao.php">
                                <?php
                                
                                $soli = $_POST['solicitacao'];
                                $busca = "select * from solicitacao where  codigo=$soli ;";
                                
                                
                                $resultado = mysqli_query($conexao, $busca);
                                $produto = mysqli_fetch_assoc($resultado);

                                echo '<input type="hidden" id="solicitacao" name="solicitacao" value=' . $produto['codigo'] . '>';
                                if($produto['situacao'] == 0){
                                     $inclusao = "update solicitacao set situacao=1 where codigo= $soli;";
                                     mysqli_query($conexao, $inclusao);
                                     header("location: indexPatara.php");
                                }
                                
                                ?>
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label>Peça: </label>
                                            <select  name="peca" class="form-control select2" style="width: 100%;">
                                                <?php
                                                $busca = "select * from pecas ;";
                                                $resultado = mysqli_query($conexao, $busca);
                                                $produto = mysqli_fetch_assoc($resultado);
                                                while ($produto) {
                                                    echo '<option value=' . $produto['codigo'] . '>' . $produto['codigo'] . ' - ' . $produto['descricao'] . '</option>';
                                                    $produto = mysqli_fetch_assoc($resultado);
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->

                                    </div>
                                    <!-- /.col -->
                                </div>


                                <div class="row">
                                    <div class="col-md-9">

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Validade da Manutencao</label>
                                            <input  name="validade" type="date" class="form-control">
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">

                                        <div  class="form-group">
                                            <label for="exampleInputPassword1">Data da Manutenção</label>
                                            <input class="form-control"  type='date' name='Dsaida' id='DSaida' value='<?php echo date("Y-m-d"); ?>' >
                                        </div>
                                        
                                        <!-- /.col -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Localização</label>
                                            <input  name="localidade" type="text" class="form-control">
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Descrição</label>
                                            <input name="descricao" type="text" class="form-control">
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </div>



                                <div class="box-footer">
                                    <button type="submit"  class="btn btn-success">Registrar</button>
                                </div>
                            </form>

                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->


                    </div>

                    <!-- /.box -->


                    <!-- /.row -->

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->


            <!-- Control Sidebar -->

            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

       <script src="../bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Select2 -->
        <script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
        <!-- InputMask -->
        <script src="../plugins/input-mask/jquery.inputmask.js"></script>
        <script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
        <script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
        <!-- date-range-picker -->
        <script src="../bower_components/moment/min/moment.min.js"></script>
        <script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap datepicker -->
        <script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <!-- bootstrap color picker -->
        <script src="../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        <!-- bootstrap time picker -->
        <script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <!-- SlimScroll -->
        <script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- iCheck 1.0.1 -->
        <script src="../plugins/iCheck/icheck.min.js"></script>
        <!-- FastClick -->
        <script src="../bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="../dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../dist/js/demo.js"></script>
        <!-- Page script -->
        <script>
                $(function () {
                    //Initialize Select2 Elements
                    $('.select2').select2()

                    //Datemask dd/mm/yyyy
                    $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
                    //Datemask2 mm/dd/yyyy
                    $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
                    //Money Euro
                    $('[data-mask]').inputmask()

                    //Date range picker
                    $('#reservation').daterangepicker()
                    //Date range picker with time picker
                    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'})
                    //Date range as a button
                    $('#daterange-btn').daterangepicker(
                            {
                                ranges: {
                                    'Today': [moment(), moment()],
                                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                                },
                                startDate: moment().subtract(29, 'days'),
                                endDate: moment()
                            },
                            function (start, end) {
                                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                            }
                    )

                    //Date picker
                    $('#datepicker').datepicker({
                        autoclose: true
                    })

                    //iCheck for checkbox and radio inputs
                    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                        checkboxClass: 'icheckbox_minimal-blue',
                        radioClass: 'iradio_minimal-blue'
                    })
                    //Red color scheme for iCheck
                    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                        checkboxClass: 'icheckbox_minimal-red',
                        radioClass: 'iradio_minimal-red'
                    })
                    //Flat red color scheme for iCheck
                    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                        checkboxClass: 'icheckbox_flat-green',
                        radioClass: 'iradio_flat-green'
                    })

                    //Colorpicker
                    $('.my-colorpicker1').colorpicker()
                    //color picker with addon
                    $('.my-colorpicker2').colorpicker()

                    //Timepicker
                    $('.timepicker').timepicker({
                        showInputs: false
                    })
                })
        </script>
    </body>
</html>


