<script src="app/controllers/topic.js"></script>
<div class="box box-success">
	<div class="box-header with-border">
		<h3 class="box-title">Manage Topic</h3>
	</div>
	<div class="box-body">
		<div class="btn-group" role="group" aria-label="...">
			<button id="topictable-btncreate" type="button" class="btn btn-primary" data-toggle="modal" data-target="#topicmodal-create" data-id="0" style="display:none;">
				<i class="fa fa-plus text-gray"></i> &nbsp;&nbsp;Create </button>
			<button id="topictable-btnread" type="button" class="btn btn-success" data-toggle="modal" data-target="#topicmodal-read" data-id="0" style="display:none;" disabled>
				<i class="fa fa-eye text-gray"></i> &nbsp;&nbsp;Read </button>
			<button id="topictable-btnupdate" type="button" class="btn btn-warning" data-toggle="modal" data-target="#topicmodal-update" data-id="0" style="display:none;" disabled>
				<i class="fa fa-pencil text-gray"></i> &nbsp;&nbsp;Update</button>
			<button id="topictable-btndelete" type="button" class="btn btn-danger" data-toggle="modal" data-target="#topicmodal-delete" data-id="0" style="display:none;" disabled>
				<i class="fa fa-times text-gray"></i> &nbsp;&nbsp;Delete</button>
			</div>
		<div id="topictable-status" style="text-align: center"></div> 
		<div>&nbsp;</div>
		<!-- datatable start-->
		<table id="topictable" class="table table-bordered table-hover">
			<div id="topictable-loading" style="text-align: center;">
				<img src="dist/img/loading1.gif"><br>Loading....
			</div>
		</table>
		<!-- datatable end-->

	</div>				
	<!-- /.box-body -->
</div>
<!-- modals start-->

<!-- read modal start -->
<div class="modal fade" id="topicmodal-read" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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
						<input type="text" class="form-control" id="topicuserid">
						<label for="recipient-name" class="control-label">Subject:</label>
						<input type="text" class="form-control" id="topicsubjectid">
						<label for="recipient-name" class="control-label">Name</label>
						<input type="text" class="form-control" id="topicname">
						<label for="recipient-name" class="control-label">Created at:</label>
						<input type="text" class="form-control" id="topiccreatedat">
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
<div class="modal fade" id="topicmodal-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-primary modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Create</h4>
			</div>
			<div class="modal-body">
				<form data-toggle="validator" role="form" id="addTopic-form">
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Subject:</label>
						<select class="form-control" id="subjectidCreate" data-error="must select a subject">
						</select>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Name:</label>
						<input type="text" class="form-control" placeholder="Enter title" id="nameCreate" data-error="input cannot be empty" required>
						<span class="glyphicon glyphicon-topic form-control-feedback"></span>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-outline pull-right" id="topicbtnmodalcreate">Save</button>
					</div>
				</form><br><br>
			</div>
			<!-- <div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
			</div> -->
		</div>
	</div>
</div>
<!-- create modal end -->

<!-- update modal start -->
<div class="modal fade" id="topicmodal-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-warning modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Update</h4>
			</div>
			<div class="modal-body">
				<form data-toggle="validator" role="form" id="addTopic-form">
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Subject:</label>
						<select name="colors" class="form-control" id="subjectidUpdate" data-error="must select a subject" required=>
						</select>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Name:</label>
						<input type="text" class="form-control" placeholder="Enter title" id="nameUpdate" data-error="input cannot be empty" required>
						<span class="glyphicon glyphicon-topic form-control-feedback"></span>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-outline pull-right" id="topicbtnmodalupdate">Save changes</button>
					</div>
				</form><br><br>
			</div>
			<!-- <div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
			</div> -->
		</div>
	</div>
</div>
<!-- update modal end -->

<!-- delete modal start-->
<div class="modal fade" id="topicmodal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-danger modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Delete</h4>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-outline" id="topicbtnmodaldelete">Delete</button>
			</div>
		</div>
	</div>
</div>
<!-- delete modal end -->

<!-- modals end-->


