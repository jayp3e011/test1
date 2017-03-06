<script src="../app/controllers/question.js"></script>
<div class="box box-success">
	<div class="box-header with-border">
		<h3 class="box-title">Manage Question</h3>
	</div>
	<div class="box-body">
		<div class="btn-group" role="group" aria-label="...">
			<button id="questiontable-btncreate" type="button" class="btn btn-primary" data-toggle="modal" data-target="#questionmodal-create" data-id="0" style="display:none;">
				<i class="fa fa-plus text-gray"></i> &nbsp;&nbsp;Create </button>
			<button id="questiontable-btnread" type="button" class="btn btn-success" data-toggle="modal" data-target="#questionmodal-read" data-id="0" style="display:none;" disabled>
				<i class="fa fa-eye text-gray"></i> &nbsp;&nbsp;Read </button>
			<button id="questiontable-btnupdate" type="button" class="btn btn-warning" data-toggle="modal" data-target="#questionmodal-update" data-id="0" style="display:none;" disabled>
				<i class="fa fa-pencil text-gray"></i> &nbsp;&nbsp;Update</button>
			<button id="questiontable-btndelete" type="button" class="btn btn-danger" data-toggle="modal" data-target="#questionmodal-delete" data-id="0" style="display:none;" disabled>
				<i class="fa fa-times text-gray"></i> &nbsp;&nbsp;Delete</button>
		</div>
		<div id="questiontable-status" style="text-align: center"></div>
		<div>&nbsp;</div>
		<!-- datatable start-->
		<table id="questiontable" class="table table-bordered table-hover table-responsive">
			<div id="questiontable-loading" style="text-align: center;">
				<img src="dist/img/loading1.gif">
			</div>
		</table>
		<!-- datatable end-->

	</div>				
	<!-- /.box-body -->
</div>
<!-- modals start-->

<!-- read modal start -->
<div class="modal fade" id="questionmodal-read" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-success modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">New message</h4>
			</div>
			<div class="modal-body">
				<!-- <form>
					<div class="form-group">
						<label for="recipient-name" class="control-label">First Name:</label>
						<input type="text" class="form-control" id="questionfirstname">
						<label for="recipient-name" class="control-label">Last Name:</label>
						<input type="text" class="form-control" id="questionlastname">
						<label for="recipient-name" class="control-label">Email:</label>
						<input type="email" class="form-control" id="questionemail">
						<label for="recipient-name" class="control-label">Role:</label>
						<input type="text" class="form-control" id="questionisadmin">
				        <select name="colors" class="form-control" name="questionisadmin" id="questionisadmin">
				            <option value="0">Student</option>
				            <option value="1">Admin</option>
				        </select>
			            <label for="recipient-name" class="control-label">Created at:</label>
			            <input type="text" class="form-control" id="questioncreatedat">
			            <label for="recipient-name" class="control-label">Password:</label>
			            <input type="text" class="form-control" id="questionpassword">
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
<div class="modal fade" id="questionmodal-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-primary modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Create</h4>
			</div>
			<div class="modal-body">
				<!-- <form data-toggle="validator" role="form" id="addQuestion-form">
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">First Name:</label>
						<input type="text" class="form-control" placeholder="first name" id="createquestionfirstname" required>
						<span class="glyphicon glyphicon-question form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Last Name:</label>
						<input type="text" class="form-control" placeholder="Last name" id="createquestionlastname" required>
						<span class="glyphicon glyphicon-question form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">E-mail:</label>
						<input type="email" class="form-control" placeholder="Email" id="createquestionemail" data-error="This email address is invalid" required>
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Role:</label>
						<select name="colors" class="form-control" id="questionisadmin">
							<option value="0">Student</option>
							<option value="1">Admin</option>
						</select>
						<span class="glyphicon glyphicon-question form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Created at:</label>
						<input type="date" class="form-control" id="createquestioncreatedad" required>
						<span class="glyphicon glyphicon-question form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Password:</label>
						<input type="password" data-minlength="6" class="form-control" placeholder="Password" id="createquestionpassword" required>
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
						<div class="help-block">Minimum of 6 characters</div>
					</div>
					<div class="form-group has-feedback">
						<input type="password" class="form-control" placeholder="Retype password" id="createquestionconfirmpassword" data-match="#createquestionpassword" data-match-error="Password mismatch">
						<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
						<div class="help-block with-errors"></div>
					</div>
				</form> -->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-outline" id="questionbtnmodalcreate">Save changes</button>
			</div>
		</div>
	</div>
</div>
<!-- create modal end -->

<!-- update modal start -->
<div class="modal fade" id="questionmodal-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-warning modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">New message</h4>
			</div>
			<div class="modal-body">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-outline" id="questionbtnmodalupdate">Save changes</button>
				<!-- <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>  -->
			</div>
		</div>
	</div>
</div>

<!-- update modal end -->
<!-- delete modal start -->
<div class="modal fade" id="questionmodal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-danger modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">New message</h4>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-outline" id="questionbtnmodaldelete">Save changes</button>
				<!-- <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>  -->
			</div>
		</div>
	</div>
</div>

<!-- delete modal end -->
<!-- modals end-->


