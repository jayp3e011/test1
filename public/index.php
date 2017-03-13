<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>iMock</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/png" href="favicon16.png" />
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/ionicons.min.css">

  <!-- css plugins -->
  <link rel="stylesheet" href="plugins/iCheck/square/green.css">
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" type="text/css" href="plugins/sweetalert/sweetalert.css">

  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-green.min.css">  
  <link rel="stylesheet" href="dist/css/app.css">
  <link href="dist/css/custom.css" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- js plugins -->
  <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>  
  <script src="plugins/iCheck/icheck.min.js"></script>
  <script src="dist/js/validator.min.js"></script>

  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script src="../app/controllers/app.js"></script>
  <!-- <script src="dist/js/jquery.routes.js"></script> -->
  <!-- <script src="../app/controllers/init.js"></script> -->
  <style>
    body { padding-top: 50px; }

    #myCarousel .carousel-caption {
        left:0;
      right:0;
      bottom:0;
      text-align:left;
      padding:10px;
      background:rgba(0,0,0,0.6);
      text-shadow:none;
    }

    #myCarousel .list-group {
      position:absolute;
      top:0;
      right:0;
    }
    #myCarousel .list-group-item {
      border-radius:0px;
      cursor:pointer;
    }
    #myCarousel .list-group .active {
      background-color:#eee;  
    }

    @media (min-width: 992px) { 
      #myCarousel {padding-right:33.3333%;}
      #myCarousel .carousel-controls {display:none;}  
    }
    @media (max-width: 991px) { 
      .carousel-caption p,
      #myCarousel .list-group {display:none;} 
    }
  </style>

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-green layout-top-nav">
  <div class="wrapper">

    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a href="?page=login" class="navbar-brand"><b>i</b>MOCK</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
            <ul class="nav navbar-nav">
             <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
              <!-- <li class=""><a href="?page=login">Login</a></li>
              <li><a href="?page=register">Register</a></li>
              <li><a href="?page=user">User</a></li> -->
              <li><a href="../app/views/takeExam.php" target="_blank">Exam</a></li>
              <!-- <li><a href="?page=subject">Subject</a></li>
              <li><a href="?page=question">Question</a></li>
              <li><a href="?page=topic">Topic</a></li>
              <li><a href="?page=quiz">Quiz</a></li>
              <li><a href="?page=news">News</a></li>
              <li><a href="?page=feedback">Feedback</a></li>
              <li><a href="?page=guidelines">Guidelines</a></li>
              <li><a href="?page=logout">Logout</a></li> -->
            </ul>
          </div>
          <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
      </nav>
    </header>
    <!-- Full Width Column -->
      <div class="container">
        <div class="row">
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
          
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
            
              <div class="item active">
                <img src="http://placehold.it/760x400/cccccc/ffffff">
                 <div class="carousel-caption">
                  <h4><a href="#">News Title 1</a></h4>
                  <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. <a class="label label-primary" href="#" target="_blank">Read More...</a></p>
                </div>
              </div><!-- End Item -->
       
               <div class="item">
                <img src="http://placehold.it/760x400/999999/cccccc">
                 <div class="carousel-caption">
                  <h4><a href="#">News Title 2</a></h4>
                  <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat... <a class="label label-primary" href="#" target="_blank">Read More...</a></p>
                </div>
              </div><!-- End Item -->
              
              <div class="item">
                <img src="http://placehold.it/760x400/dddddd/333333">
                 <div class="carousel-caption">
                  <h4><a href="#">News Title 3</a></h4>
                  <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat... <a class="label label-primary" href="#" target="_blank">Read More...</a></p>
                </div>
              </div><!-- End Item -->
              
              <div class="item">
                <img src="http://placehold.it/760x400/999999/cccccc">
                 <div class="carousel-caption">
                  <h4><a href="#">News Title 4</a></h4>
                  <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. <a class="label label-primary" href="#" target="_blank">Read More....</a></p>
                </div>
              </div><!-- End Item -->

              <div class="item">
                <img src="http://placehold.it/760x400/dddddd/333333">
                 <div class="carousel-caption">
                  <h4><a href="#">News Title 5</a></h4>
                  <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat... <a class="label label-primary" href="#" target="_blank">Read More...</a></p>
                </div>
              </div><!-- End Item -->
                      
            </div><!-- End Carousel Inner -->


          <ul class="list-group col-sm-4">
            <li data-target="#myCarousel" data-slide-to="0" class="list-group-item active"><h4>News Title 1</h4></li>
            <li data-target="#myCarousel" data-slide-to="1" class="list-group-item"><h4>News Title 2</h4></li>
            <li data-target="#myCarousel" data-slide-to="2" class="list-group-item"><h4>News Title 3</h4></li>
            <li data-target="#myCarousel" data-slide-to="3" class="list-group-item"><h4>News Title 4</h4></li>
            <li data-target="#myCarousel" data-slide-to="4" class="list-group-item"><h4>News Title 5</h4></li>
          </ul>

            <!-- Controls -->
            <div class="carousel-controls">
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>

          </div><!-- End Carousel -->
      </div>
    </div>
      <?php
        //routes
        if(isset($_GET['page'])){
          if($_GET['page'] == "login"){
            $page_url = "../app/views/login.php";
          }          
          else if($_GET['page'] == "register"){
            $page_url = "../app/views/register.php";
          }          
          else if($_GET['page'] == "exam"){
            $page_url = "../app/views/takeExam.php";
          }          
          else if($_GET['page'] == "subject"){
            $page_url = "../app/views/subject.php";
          }
          else if($_GET['page'] == "user"){
            $page_url = "../app/views/user.php";
          }
          else if($_GET['page'] == "topic"){
            $page_url = "../app/views/topic.php";
          }
          else if($_GET['page'] == "news"){
            $page_url = "../app/views/news.php";
          }
          else if($_GET['page'] == "feedback"){
            $page_url = "../app/views/feedback.php";
          }
          else if($_GET['page'] == "guidelines"){
            $page_url = "../app/views/guidelines.php";
          }
          else{
            $page_url = "../app/views/error404.php";
          }
          require_once($page_url);
        }
        else{
          // require_once("../app/views/login.php");
        }
        // include('AltoRouter.php');
        // $router = new AltoRouter();

        // map homepage
        // $router->map( 'GET', 'admin/exam', function() {
        //     require __DIR__ . 'index.php?page=exam';
        // });

        // // map users details page
        // $router->map( 'GET|POST', '/admin/[i:page]/', function( $page ) {
        //   $user = '#load';
        //   require __DIR__ . '/';
        // });
      ?>        
<!-- bago -->
<div id="login-modal" class="modal fade" aria-labelledby="myModalLabel" aria-hidden="true" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="login-modal-container">
      <form id="login-form" data-toggle="validator" role="form">
        <div class="modal-header" style="background-color: #00A65A;">
          <h1 style="color: white; text-align: center;">iMock</h1>
        </div>
        <div class="modal-body">
          <h2>Login To Your Account </h2>
          <div id="err-msg"></div>
          <div class="form-group has-feedback">
            <input type="email" id="email" name="email" placeholder="Your email address" class="form-control input-lg" data-error="This email address is invalid" required />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="password" data-minlength="6" name="password" placeholder="Password" class="form-control input-lg" required />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <div class="help-block">Minimum of 6 characters</div>
          </div>
          <div class="form-group">
            <div id="captcha"></div>
          </div>
          <div class="form-group">
            <input type="submit" id="login" name="login" value="Sign In" class="btn btn-success btn-block btn-lg" />
          </div>
        </div>
        <div class="modal-footer">
          <!-- Don't have an account? <a href="#">Sign Up here</a> -->
        </div>
      </form>
    </div>
  </div>
</div>      


<!--     <footer class="main-footer">
      <div class="container">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2016-2017 <a href="#">iMock | AMA Capstone</a>.</strong> All rights
        reserved.
      </div>
    </footer> -->
  </div>
  <!-- ./wrapper -->


  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="plugins/fastclick/fastclick.js"></script>
   <script src="plugins/sweetalert/sweetalert.min.js"></script>
  <script src="dist/js/app.min.js"></script>
    <script src="../app/controllers/script.js"></script>
  <script src="dist/js/demo.js"></script>
  <script>
    $(document).ready(function(){
    
    var clickEvent = false;
    $('#myCarousel').carousel({
      interval:   4000  
    }).on('click', '.list-group li', function() {
        clickEvent = true;
        $('.list-group li').removeClass('active');
        $(this).addClass('active');   
    }).on('slid.bs.carousel', function(e) {
      if(!clickEvent) {
        var count = $('.list-group').children().length -1;
        var current = $('.list-group li.active');
        current.removeClass('active').next().addClass('active');
        var id = parseInt(current.data('slide-to'));
        if(count == id) {
          $('.list-group li').first().addClass('active'); 
        }
      }
      clickEvent = false;
    });
  })

  $(window).load(function() {
      var boxheight = $('#myCarousel .carousel-inner').innerHeight();
      var itemlength = $('#myCarousel .item').length;
      var triggerheight = Math.round(boxheight/itemlength+1);
    $('#myCarousel .list-group-item').outerHeight(triggerheight);
  });
  </script>

</body>
</html>
