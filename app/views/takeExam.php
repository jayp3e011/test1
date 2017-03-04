
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>iMock</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/png" href="../../public/favicon16.png" />
  <link rel="stylesheet" href="../../public/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../public/dist/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../public/dist/css/ionicons.min.css">

  <!-- css plugins -->
  <link rel="stylesheet" href="../../public/plugins/iCheck/square/green.css">
  <link rel="stylesheet" type="text/css" href="../../public/plugins/sweetalert/sweetalert.css">

  <link rel="stylesheet" href="../../public/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../public/dist/css/skins/skin-green.min.css">	
  <link rel="stylesheet" href="../../public/dist/css/app.css">
  <link href="../../public/dist/css/custom.css" rel="stylesheet" type="text/css" />
  <link href="../../public/dist/css/bootstrap-tour.min.css" rel="stylesheet">

  <!-- js plugins -->
  <script src="../../public/plugins/jQuery/jquery-2.2.3.min.js"></script>  
  <script src="../../public/plugins/iCheck/icheck.min.js"></script>
  <script src="../../public/dist/js/validator.min.js"></script>
  <!-- <script src="../controllers/app.js"></script> -->
  <style>
  	.countdown-label {
	  font: thin 15px Arial, sans-serif;
		color: #65584c;
		text-align: center;
		text-transform: uppercase;
		display: inline-block;
	  letter-spacing: 2px;
	  margin-top: 9px
	}
	#countdown{
	box-shadow: 0 1px 2px 0 rgba(1, 1, 1, 0.4);
	width: 240px;
		height: 96px;
		text-align: center;
	background: #f1f1f1;

		border-radius: 5px;

		margin: auto;

	}
	#countdown #tiles{
	  color: #fff;
		position: relative;
		z-index: 1;
	text-shadow: 1px 1px 0px #ccc;
		display: inline-block;
	  font-family: Arial, sans-serif;
		text-align: center;
	  
	  padding: 20px;
	  border-radius: 5px 5px 0 0;
	  font-size: 48px;
	  font-weight: thin;
	  display: block;
	    
	}

	.color-full {
	  background: #53bb74;
	}
	.color-half {
	  background: #ebc85d;
	}
	.color-empty {
	  background: #e5554e;
	}
  </style>

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-green layout-top-nav">
	<header class="main-header">
		<nav class="navbar navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<div class="navbar-brand">
						<div id="countdown">
						  
						  <div id='tiles' class="color-full"></div>
						  <div class="countdown-label">Time Remaining</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</header>
  <div class="wrapper">
	<div class="content-wrapper" style="background-color: #999"><br><br><br><br>
		<div class="container">
			<section class="content">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title">Manage Exam</h3>					
					</div>
					<div class="box-body">
						<div class="box box-default">
							<div class="box-header with-border">
								<h3 class="box-title">Subject: <span id="subjecttitle"></span></h3>
							</div>
							<div class="box-body">		
								<div id="select_subject">
									<!-- <form> -->
										<input type="hidden" id="user_id" value="<?php echo $_SESSION['id']; ?>">
										<div class="form-group">
											<label for="subject_id" class="control-label">Select a Subject</label>
											<select name="subject_id" id="subject_id" class="form-control"><p id="sel">looading...</p></select>
										</div>
										<button type="submit" class="btn btn-primary" id="takeExam">Take Exam</button>	
									<!-- </form> -->
								</div>			
								<div id="examSheet">
									<table class="table">
										<div id="table-loading" style="text-align: center;">
											<img src="../../public/dist/img/loading1.gif"><br>Loading....
										</div>
										<caption>
											<div id="subjectdesc">table title and/or explanatory text</div>
											<button class="btn btn-danger pull-right" style="width: 200px" id="submit">SUBMIT</button>
										</caption>
										<thead>
											<tr>
												<th id="sheet" colspan="4">ANSWER SHEET</th>
												<th width="6%">ITEM NO.</th>
												<th width="70%">QUESTION SHEET</th>
											</tr>
										</thead>
										<tbody id="items"></tbody>
									</table>
								</div>
							</div>
							<!-- /.box-body -->
						</div>
						
					</div>
					<!-- /.box-body -->
				</div>			
			</section>
		</div>
		<!-- /.container -->
	</div>
</div>
  <!-- ./wrapper -->


	<script src="../../public/bootstrap/js/bootstrap.min.js"></script>
	<script src="../../public/plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<script src="../../public/plugins/fastclick/fastclick.js"></script>
	<script src="../../public/plugins/sweetalert/sweetalert.min.js"></script>
	<script src="../../public/dist/js/app.min.js"></script>
	<script src="../controllers/script.js"></script>
	<script src="../../public/dist/js/demo.js"></script>
	<script src="../../public/dist/js/bootstrap-tour.min.js"></script>
	<script src="../controllers/takeExam.js"></script>
	<script>
		
	</script>

</body>
</html>