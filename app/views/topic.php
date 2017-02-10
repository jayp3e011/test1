<script src="../app/controllers/topic.js"></script>
<div class="content-wrapper" style="background-color: #999">
	<div class="container">
		<section class="content">
			<div class="box box-default">
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
		</section>
	</div>
	<!-- /.container -->
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
					<form>
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
					</form>
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
							<label for="recipient-name" class="control-label">User Name:</label>
			            	<input type="text" class="form-control" placeholder="first name" id="createtopicuserid" required>
			            	<span class="glyphicon glyphicon-topic form-control-feedback"></span>
			          	</div>
						<div class="form-group has-feedback">
							<label for="recipient-name" class="control-label">Subject:</label>
							<select name="colors" class="form-control" id="createtopicsubjectid">
							</select>
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback">
							<label for="recipient-name" class="control-label">Name:</label>
							<input type="text" class="form-control" placeholder="Enter title" id="createtopicname" required>
							<span class="glyphicon glyphicon-topic form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback">
							<label for="recipient-name" class="control-label">Date:</label>
							<input type="datepicker" class="form-control" id="createtopiccreatedad" required>
							<span class="glyphicon glyphicon-topic form-control-feedback"></span>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-outline" id="topicbtnmodalcreate">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	<!-- create modal end -->

<!-- modals end-->


