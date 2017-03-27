<script src="app/controllers/news.js"></script>
<div class="box box-success">
	<div class="box-header with-border"> 
		<h3 class="box-title">Manage News</h3>
	</div>
	<div class="box-body">
		<div class="btn-group" role="group" aria-label="...">
			<button id="newstable-btncreate" type="button" class="btn btn-primary" data-toggle="modal" data-target="#newsmodal-create" data-id="0" style="display:none;">
				<i class="fa fa-plus text-gray"></i> &nbsp;&nbsp;Create </button>
			<button id="newstable-btnread" type="button" class="btn btn-success" data-toggle="modal" data-target="#newsmodal-read" data-id="0" style="display:none;" disabled>
				<i class="fa fa-eye text-gray"></i> &nbsp;&nbsp;Read </button>
			<button id="newstable-btnupdate" type="button" class="btn btn-warning" data-toggle="modal" data-target="#newsmodal-update" data-id="0" style="display:none;" disabled>
				<i class="fa fa-pencil text-gray"></i> &nbsp;&nbsp;Update</button>
			<button id="newstable-btndelete" type="button" class="btn btn-danger" data-toggle="modal" data-target="#newsmodal-delete" data-id="0" style="display:none;" disabled>
				<i class="fa fa-times text-gray"></i> &nbsp;&nbsp;Delete</button>
		</div>
		<div id="newstable-status" style="text-align: center"></div>
		<div>&nbsp;</div>
		<!-- datatable start-->
		<table id="newstable" class="table table-bordered table-hover">
			<div id="newstable-loading" style="text-align: center;">Create
				<img src="dist/img/loading1.gif">
			</div>
		</table>
		<!-- datatable end-->

	</div>				
							<!-- /.box-body -->
</div>
<!-- modals start-->

<!-- read modal start -->
<div class="modal fade" id="newsmodal-read" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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
						<input type="text" class="form-control" id="newsuserid">
						<label for="recipient-name" class="control-label">Name:</label>
						<input type="text" class="form-control" id="newsname">
						<label for="recipient-name" class="control-label">Content:</label>
						<textarea class="form-control" id="newscontent"></textarea>
						<label for="recipient-name" class="control-label">Created at:</label>
						<input type="text" class="form-control" id="newscreatedat">
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
<div class="modal fade" id="newsmodal-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-primary modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Create</h4>
			</div>
				<div class="modal-body">
					<form data-toggle="validator" role="form" id="addNews-form">
						<div class="form-group has-feedback">
							<label for="recipient-name" class="control-label">User:</label>
							<input type="text" class="form-control" placeholder="first name" id="useridCreate" data-minlength="1" data-error="input cannot be empty" required>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group has-feedback">
							<label for="recipient-name" class="control-label">Title:</label>
							<input type="text" class="form-control" placeholder="Enter title" data-minlength="1"  id="nameCreate" data-error="input cannot be empty required" required>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group has-feedback">
							<label for="recipient-name" class="control-label">Content:</label>
							<textarea class="form-control" placeholder="content" id="contentCreate" data-maxlength="250" data-minlength="1" data-error="input cannot be empty or more than 250 characters" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
						<!-- <div class="form-group"> -->
							<button type="submit" class="btn btn-outline pull-right" id="newsbtnmodalcreate">Save</button>
						<!-- </div> -->
					</form>
					<br><br>
				</div>
			</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
		</div>
	</div>
</div>
<!-- create modal end -->

<!-- update modal start -->
<div class="modal fade" id="newsmodal-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-warning modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Update</h4>
			</div>
				<div class="modal-body">
					<form data-toggle="validator" role="form" id="updateNews-form">
						<div class="form-group has-feedback">
							<label for="recipient-name" class="control-label">User:</label>
							<input type="text" class="form-control" placeholder="first name" id="useridUpdate" data-minlength="1" data-error="input cannot be empty" required>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group has-feedback">
							<label for="recipient-name" class="control-label">Title:</label>
							<input type="text" class="form-control" placeholder="Enter title" data-minlength="1"  id="nameUpdate" data-error="input cannot be empty required" required>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group has-feedback">
							<label for="recipient-name" class="control-label">Content:</label>
							<textarea class="form-control" placeholder="content" id="contentUpdate" data-maxlength="250" data-minlength="1" data-error="input cannot be empty or more than 250 characters" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
						<!-- <div class="form-group"> -->
						<button type="submit" class="btn btn-outline pull-right" id="newsbtnmodalupdate">Save changes</button>
						<!-- </div> -->
					</form>
					<br><br>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
					<!-- <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>  -->
				</div>
		</div>
	</div>
</div>
<!-- update modal end -->

<!-- delete modal start-->
<div class="modal fade" id="newsmodal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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
				<button type="button" class="btn btn-outline" id="newsbtnmodaldelete">Save changes</button>
			</div>
		</div>
	</div>
</div>
<!-- delete modal end -->

<!-- modals end-->


