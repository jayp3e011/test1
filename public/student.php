<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>iMock | TestStudentPage</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/png" href="favicon16.png" />
  <link rel="stylesheet" href="dist/css/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/ionicons.min.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- css plugins -->
  <link rel="stylesheet" href="plugins/iCheck/square/green.css">
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" type="text/css" href="plugins/sweetalert/sweetalert.css">

  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-green-light.min.css">  
  <link rel="stylesheet" href="dist/css/app.css">
  <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>  
  <script src="plugins/iCheck/icheck.min.js"></script>
  <script src="dist/js/validator.min.js"></script>

  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script src="../app/controllers/app.js"></script>
  <script src="dist/js/jquery.routes.js"></script>
   <script src="../app/controllers/routes.js"></script>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-green-light sidebar-mini">
  <div class="wrapper">
    <!-- NAVBARTOP -->
    <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>iMk</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>iMock</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="{{ url('/news') }}">News</a></li>
            <li><a href="{{ url('/about') }}">About Us</a></li>
          </ul>
          <!-- <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
            </div>
          </form> -->
        </div>
        <!-- /.navbar-collapse -->

      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">
          <li>
            <!-- USERNAME/LOGOUT -->
            <a href="../includes/logout.php">
                <i class="fa fa-fw fa-power-off"></i> LOGOUT
            </a>
            <!-- /USERNAME/LOGOUT -->
          </li>
        </ul>
      </div>
    </nav>
  </header>
    <!-- /NAVBARTOP -->
    <!-- =============================================== -->
    <!-- SideBarr Here -->
    <aside class="main-sidebar control-sidebar-dark">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- <div class="user-panel"> -->
        <!-- <div class="pull-left image"> -->
          <!-- <img src="{{asset('assets/dist/img/user2-160x160.png')}}" class="img-circle" alt="User Image"> -->
        <!-- </div> -->
        <!-- <div class="pull-left info"> -->
          <!-- <p>Jaypee Bautista</p> -->
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Student</a> -->
        <!-- </div> -->
      <!-- </div> -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="?page=quiz">
            <i class="fa fa-edit"></i> <span>Quiz</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Exam</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=take"><i class="fa fa-circle-o"></i> Take Exam</a></li>
            <li><a href="?page=results"><i class="fa fa-circle-o"></i> Status</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="?page=feedback">
            <i class="fa fa-feed"></i> <span>Feedback</span>
            </span>
          </a>
       </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
            </span>
          </a>
       </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
    <!-- End Side Bar Here -->
    <!-- Full Width Column -->
     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Admin
          <small>Dashboard</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <!-- <li><a href="#">Examples</a></li> -->
          <!-- <li class="active">Blank page</li> -->
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <?php
        //routes
        if(isset($_GET['page'])){
          if($_GET['page'] == "quiz"){
            $page_url = "../app/views/quiz/index.php";
          }          
          else if($_GET['page'] == "take"){
            $page_url = "../app/views/exam/index.php";
          }          
          else if($_GET['page'] == "results"){
            $page_url = "../app/views/exam/index.php";
          }
          else if($_GET['page'] == "feedback"){
            $page_url = "../app/views/feedback/index.php";
          }
          else if($_GET['page'] == "news"){
            $page_url = "../app/views/news/index.php";
          }
          else{
            $page_url = "../app/views/error404.php";
          }
          require_once($page_url);
        }
        else{
          require_once("news.php");
        }
      ?>  
        <!-- /.box -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  </div>
<!-- ./wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.1
    </div>
    <strong>Copyright &copy;2016 <a href="#">J&J</a>.</strong> All rights reserved.
  </footer>
 
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
