<script src="app/controllers/feedback.js"></script>
<div class="box box-success">
	<div class="box-header with-border">
		<h3 class="box-title">Feedback</h3>
	</div>
	<div class="box-body">
		<div class="feedback">
			<div id="feedbacktable-loading" style="text-align: center;">
				<img src="dist/img/loading1.gif"><br>Loading....
			</div>
		</div>
		<!-- <div class="btn-group" role="group" aria-label="...">
			<button id="feedbacktable-btncreate" type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedbackmodal-create" data-id="0" style="display:none;">
				<i class="fa fa-plus text-gray"></i> &nbsp;&nbsp;Create </button>
			<button id="feedbacktable-btnread" type="button" class="btn btn-success" data-toggle="modal" data-target="#feedbackmodal-read" data-id="0" style="display:none;" disabled>
				<i class="fa fa-eye text-gray"></i> &nbsp;&nbsp;Read </button>
			<button id="feedbacktable-btnupdate" type="button" class="btn btn-warning" data-toggle="modal" data-target="#feedbackmodal-update" data-id="0" style="display:none;" disabled>
				<i class="fa fa-pencil text-gray"></i> &nbsp;&nbsp;Update</button>
			<button id="feedbacktable-btndelete" type="button" class="btn btn-danger" data-toggle="modal" data-target="#feedbackmodal-delete" data-id="0" style="display:none;" disabled>
				<i class="fa fa-times text-gray"></i> &nbsp;&nbsp;Delete</button>
		</div>
		<div id="feedbacktable-status" style="text-align: center"></div>
		<div>&nbsp;</div> -->
		<!-- datatable start-->
		<!-- <table id="feedbacktable" class="table table-bordered table-hover">
			<div id="feedbacktable-loading" style="text-align: center;">
				<img src="dist/img/loading1.gif"><br>Loading....
			</div>
		</table> -->
		<!-- datatable end-->
	</div>				
		<!-- /.box-body -->
</div>
<!-- modals start-->

<!-- read modal start -->
<div class="modal fade" id="feedbackmodal-read" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-success modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">New message</h4>
			</div>
			<div class="modal-body">
				<!-- <form>
					<div class="form-group">
						<label for="recipient-name" class="control-label">User Name:</label>
						<input type="text" class="form-control" id="feedbackuserid">
						<label for="recipient-name" class="control-label">Content:</label>
						<textarea class="form-control" id="feedbackcontent"></textarea>
						<label for="recipient-name" class="control-label">Created at:</label>
						<input type="text" class="form-control" id="feedbackcreatedat">
					</div>
				</form> -->
			</div>
			<div class="modal-footer">
				<!-- <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-outline">Save changes</button> -->
				<button type="button" class="btn btn-outline" data-dismiss="modal">Close</button> 
			</div>
		</div>
	</div>
</div>
<!-- read modal end -->

<!-- create modal start-->
<div class="modal fade" id="feedbackmodal-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-primary modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Create</h4>
			</div>
			<form data-toggle="validator" role="form" id="addFeddback-form">
				<div class="modal-body"> 
					<!-- <form data-toggle="validator" role="form" id="addFeddback-form">
						<div class="form-group has-feedback">
							<label for="recipient-name" class="control-label">User Name:</label>
							<input type="text" class="form-control" placeholder="first name" id="createfeedbackuserid" required>
							<span class="glyphicon glyphicon-feedback form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback">
							<label for="recipient-name" class="control-label">Content:</label>
							<textarea class="form-control" placeholder="content" id="createfeedbackcontent" data-maxlength="255" data-error="not less than 255 characters" required></textarea>
							<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group has-feedback">
							<label for="recipient-name" class="control-label">Created at:</label>
							<input type="datepicker" class="form-control" id="createfeedbackcreatedad" required>
							<span class="glyphicon glyphicon-feedback form-control-feedback"></span>
						</div>
					</form> -->
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-outline" id="feedbackbtnmodalcreate">Save changes</button>
			</form>
					<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				</div>
		</div>
	</div>
</div>
<!-- create modal end -->

<!-- update modal start -->
<div class="modal fade" id="feedbackmodal-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-warning modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Update</h4>
			</div>
			<form data-toggle="validator" role="form" id="updateFeddback-form">
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-outline" id="feedbackbtnmodalupdate">Save changes</button>
			</form>
					<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
					<!-- <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>  -->
				</div>
		</div>
	</div>
</div>
<!-- update modal end -->

<!-- delete modal start-->
<div class="modal fade" id="feedbackmodal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-danger modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Delete</h4>
			</div>
				<div class="modal-body">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline" id="feedbackbtnmodaldelete">Save changes</button>
			
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- delete modal end -->

<!-- modals end-->
<script>
	var feedback=[];
    var user=[];
    $.ajax({
      method: "POST",
      url: "app/models/user.php"
    }).done(function(userdata){
      user = JSON.parse(userdata);
      $.ajax({
        method: "POST",
        url: "app/models/feedback.php",
      }).done(function(feedbackdata){
        feedback = JSON.parse(feedbackdata);
        render_StudentFeedback(feedback,user);
        $('feedbacktable-loading').hide();  
      })
    });
    
    function render_StudentFeedback(feedbackdata,usersdata){
  
      let html = '';  
      var i = 0;
      var j = 0;
      for(i in feedbackdata){
        for(j in usersdata){
          // console.log(feedbackdata[i]);
          // console.log(usersdata[j]);
          if (feedbackdata[i].user_id===usersdata[j].firstname+' '+usersdata[j].lastname) {
            var dt = moment(feedbackdata[i].date,"YYYY-MM-DD h:mm:ss");
            // var dt = feedbackdata[i].createdat;
            html += '<div class="post" style="border:1px solid #ddd;padding:5px;">';
               html +=  '<div class="user-block">';
                 html +=  '<img class="img-circle img-bordered-sm" src="dist/img/avatar.png" alt="user image">';
                 html +=  '<span class="username">';
                   html +=  '<a href="#">'+usersdata[j].firstname+' '+usersdata[j].lastname+'</a>';
                   html +=  '<!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a> -->';
                 html +=  '</span>';
                 html +=  '<span class="description">Shared publicly - '+dt.format("MMMM Do YYYY h:mm A")+'('+dt.fromNow()+')</span>';
               html +=  '</div>';
               html +=  '<p>'+feedbackdata[i].feedback;
                html += '</p>'
               html +=  '<ul class="list-inline">';
                 // html +=  '<li><a href="#" class="link-black text-sm"><i class="fa fa-commenting-o margin-r-5"></i> General Announcement</a></li>';
                 // html +=  '<li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-eye margin-r-5"></i> Seen (5)</a></li>';
             html +=  '</ul>';
             html +=  '</div>';
          }
        }
      }
      $('.feedback').html(html);
    }
</script>


