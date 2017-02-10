<div class="content-wrapper" style="background-color: #999">
	<div class="container">
		<section class="content">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Manage Subject</h3>
				</div>
				<div class="box-body">
					<div class="btn-group" role="group" aria-label="...">
						<button id="subjecttable-btncreate" type="button" class="btn btn-primary" data-toggle="modal" data-target="#subjectmodal-create" data-id="0" style="display:none;">
							<i class="fa fa-plus text-gray"></i> &nbsp;&nbsp;Create </button>
						<button id="subjecttable-btnread" type="button" class="btn btn-success" data-toggle="modal" data-target="#subjectmodal-read" data-id="0" style="display:none;" disabled>
							<i class="fa fa-eye text-gray"></i> &nbsp;&nbsp;Read </button>
						<button id="subjecttable-btnupdate" type="button" class="btn btn-warning" data-toggle="modal" data-target="#subjectmodal-update" data-id="0" style="display:none;" disabled>
							<i class="fa fa-pencil text-gray"></i> &nbsp;&nbsp;Update</button>
						<button id="subjecttable-btndelete" type="button" class="btn btn-danger" data-toggle="modal" data-target="#subjectmodal-delete" data-id="0" style="display:none;" disabled>
							<i class="fa fa-times text-gray"></i> &nbsp;&nbsp;Delete</button>
					</div>
					<div id="subjecttable-status" style="text-align: center"></div>
					<div>&nbsp;</div>
					<!-- datatable start-->
					<table id="subjecttable" class="table table-bordered table-hover">
						<div id="subjecttable-loading" style="text-align: center;">
							<img src="dist/img/loading1.gif">
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
	<div class="modal fade" id="subjectmodal-read" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-success modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">New message</h4>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-4">
									<label for="recipient-name" class="control-label">Name:</label>
									<input type="text" class="form-control" id="subjectname">
								</div>
								<div class="col-sm-4">
									<label for="recipient-name" class="control-label">Time Duration:</label>
									<input type="text" class="form-control" id="subjecttimeduration">
								</div>
								<div class="col-sm-4">
									<label for="recipient-name" class="control-label">Passing Rate:</label>
									<input type="text" class="form-control" id="subjectpassingrate">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="message-text" class="control-label">Description:</label>
							<textarea class="form-control" id="subjectdescription"></textarea>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label for="recipient-name" class="control-label">No. of attempts:</label>
									<input type="text" class="form-control" id="subjectattempt">
								</div>
								<div class="col-sm-6">
									<label for="recipient-name" class="control-label">No. of items:</label>
									<input type="text" class="form-control" id="subjectitems">
								</div>
							</div>
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
	<div class="modal fade" id="subjectmodal-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-primary modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">Create</h4>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-4">
									<label for="recipient-name" class="control-label">Name:</label>
									<input type="text" class="form-control" id="subjectcreatename">
								</div>
								<div class="col-sm-4">
									<label for="recipient-name" class="control-label">Time Duration:</label>
									<input type="text" class="form-control" id="subjectcreatetimeduration">
								</div>
								<div class="col-sm-4">
									<label for="recipient-name" class="control-label">Passing Rate:</label>
									<input type="text" class="form-control" id="subjectcreatepassingrate">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="message-text" class="control-label">Description:</label>
							<textarea class="form-control" id="subjectcreatedescription"></textarea>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label for="recipient-name" class="control-label">No. of attempts:</label>
									<input type="text" class="form-control" id="subjectcreateattempt">
								</div>
								<div class="col-sm-6">
									<label for="recipient-name" class="control-label">No. of items:</label>
									<input type="text" class="form-control" id="subjectcreateitems">
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-outline" id="subjectbtnmodalcreate">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	<!-- create modal end -->

<!-- modals end-->


<script src="../app/controllers/subject.js"></script>