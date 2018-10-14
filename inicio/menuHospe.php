<!-- Main Header -->
<header class="main-header">

<!-- Logo -->
<a href="index.html" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>N</b>AA</span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>Name</b>AA</span>]
</a>

<!-- Header Navbar -->
<nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="http://localhost/MP_Hackathon/inicio/logout.php"><i class="fas fa-sign-out-alt"></i>Sair</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

<!-- Header Navbar -->
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="../dist/img/user-160x160.png" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p><?php echo $_SESSION['codigoGerado']; ?></p>
      <!-- Status -->
      <a href="#"><i class="fas fa-user-md text-success"></i> <?php echo $_SESSION['nome']; ?></a>
    </div>
  </div>

  <!-- search form (Optional)
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
    </div>
  </form>
   /.search form -->

  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">
    <!-- Optionally, you can add icons to the links -->
    <li class="active"><a href="../solicitacoes/solicitacaoCliente.php"><i class="fa fa-link"></i> <span>Solicitações</span></a></li>
  
   
  </ul>
  <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>