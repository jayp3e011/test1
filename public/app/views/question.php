<script src="app/controllers/question.js"></script>
<script src="dist/js/xlsx.full.min.js"></script>
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">              
					<li  class="active"><a href="#questionTable" data-toggle="tab">Add/Edit/Delete</a></li>
					<li ><a href="#import" data-toggle="tab">Import</a></li>
					<li class="pull-right"><a href="#">Welcome Admin (admin@gmail.com)!</a></li>
				</ul>
				<div class="tab-content">
					<div class="active tab-pane" id="questionTable">
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
									<!-- <button id="questiontable-btnimport" type="button" class="btn btn-default" data-toggle="modal" data-target="#questionmodal-import" data-id="0" style="display:none;">
										<i class="fa fa-file-excel-o text-green"></i> &nbsp;&nbsp;Import</button> -->
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
					</div>

					<div class=" tab-pane" id="import">
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title">Import Question</h3> 
							</div>
							<div class="box-body">
								<div class="form-group" id="importBtns">


									<input type="file" class="form-control" id="import">
									<button type="button" class="btn bg-maroon btn-flat margin" id="questionbtnmodalimport" disabled="disable">Import</button>
									<label for="count" id="count">Rows:</label>&nbsp;<label for="count" id="saved"></label>
									<!-- <button class="btn btn-lg btn-success" id="btnImport" disabled="disable">Import</button> -->
								</div>				
								<div class="col-sm-6">
									<div class="box box-default" id="topicTbl">
										<div class="box-header with-border">
											<h3 class="box-title">Topic</h3>
										</div>
										<div class=" box-body table-responsive">
											<table class="table table-condense" id="topicData">
												<thead>
													<tr>
														<th>No</th>
														<th>Name</th>
														<th>Action</th>
													</tr>
												</thead>
											</table>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="box box-default" id="subjTbl">
										<div class="box-header with-border">
											<h3 class="box-title">Subject</h3>
										</div>
										<div class=" box-body table-responsive">
											<table class="table table-condense" id="subjData">
												<thead>
													<tr>
														<th>No</th>
														<th>Name</th>
														<th>Action</th>
													</tr>
												</thead>
											</table>
										</div>
									</div>
								</div>
								<div id="exlTable">
									<table class="table table-condense table-responsive" id="excelData">
										<thead>
											<tr>
												<th>No.</th>
												<th>SID</th>
												<th>TID</th>
												<th>Question</th>
												<th>Answer</th>
												<th>Choice A</th>
												<th>Choice B</th>
												<th>Choice C</th>
												<th>Choice D</th>
												<!-- <th>Reference</th> -->
												<th>Status</th>
											</tr>
										</thead>
										<tbody></tbody>
									</table>
								</div>
								
								<!-- /.box-body -->
							</div>
						</div>
					</div>
				</div>

<!-- modals start-->

<!-- read modal start -->
<div class="modal fade" id="questionmodal-read" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-success modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Read</h4>
			</div>
			<div class="modal-body">
				
			</div>
			<div class="modal-footer">
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
				<form data-toggle="validator" role="form">
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Subject:</label>
						<select name="colors" class="form-control" id="subjectidCreate" required>
						</select>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Topic:</label>
						<select name="colors" class="form-control" id="topictidCreate" required>
						</select>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Question:</label>
						<textarea class="form-control" placeholder="content" id="questionCreate" data-maxlength="250" data-error="not moremore than 250 characters" required></textarea>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Choice A:</label>
						<textarea class="form-control" placeholder="choice_a" id="choice_aCreate" data-maxlength="250" data-error="not mor than 250 characters" required></textarea>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Choice B:</label>
						<textarea class="form-control" placeholder="choice_b" id="choice_bCreate" data-maxlength="250" data-error="not more than 250 characters" required></textarea>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Choice C:</label>
						<textarea class="form-control" placeholder="choice_c" id="choice_cCreate" data-maxlength="250" data-error="not more than 250 characters" required></textarea>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Choice D:</label>
						<textarea class="form-control" placeholder="choice_d" id="choice_dCreate" data-maxlength="250" data-error="not more than 250 characters" required></textarea>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Answer:</label>
						<input type="text" class="form-control" placeholder="answer" id="answerCreate" data-maxlength="1" data-error="not more than 1 character" required></input>						
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Reference:</label>
						<textarea class="form-control" placeholder="reference" id="referenceCreate" data-maxlength="250" data-error="not more than 250 character" required></textarea>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-outline pull-right" id="questionbtnmodalcreate">Save</button>
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
<div class="modal fade" id="questionmodal-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-warning modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Edit Question</h4>
			</div>
			<div class="modal-body">
				<form data-toggle="validator" role="form">
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Subject:</label>
						<select name="colors" class="form-control" id="subjectidUpdate" required>
						</select>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Topic:</label>
						<select name="colors" class="form-control" id="topictidUpdate" required>
						</select>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Question:</label>
						<textarea class="form-control" placeholder="content" id="questionUpdate" data-maxlength="250" data-error="not more than 250 characters" required></textarea>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Choice A:</label>
						<textarea class="form-control" placeholder="choice_a" id="choice_aUpdate" data-maxlength="250" data-error="not more than 250 characters" required></textarea>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Choice B:</label>
						<textarea class="form-control" placeholder="choice_b" id="choice_bUpdate" data-maxlength="250" data-error="not more than 250 characters" required></textarea>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Choice C:</label>
						<textarea class="form-control" placeholder="choice_c" id="choice_cUpdate" data-maxlength="250" data-error="not more than 250 characters" required></textarea>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Choice D:</label>
						<textarea class="form-control" placeholder="choice_d" id="choice_dUpdate" data-maxlength="250" data-error="not more than 250 characters" required></textarea>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Answer:</label>
						<input type="text" class="form-control" placeholder="answer" id="answerUpdate" data-maxlength="1" data-error="not more than 1 characters" required></input>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Reference:</label>
						<textarea class="form-control" placeholder="reference" id="referenceUpdate" data-maxlength="255" data-error="not more than 255 characters" required></textarea>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-outline pull-right" id="questionbtnmodalcreate">Save</button>
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
<!-- delete modal start -->
<div class="modal fade" id="questionmodal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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
				<button type="button" class="btn btn-outline" id="questionbtnmodaldelete">Delete</button>
				<!-- <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>  -->
			</div>
		</div>
	</div>
</div>

<!-- delete modal end -->
<!-- modal import end -->
<!-- modals end-->

<script>
	class Settings{
		constructor(){
			this.data = {
				"subject" : [],
				"topic" : [],
				"arrTopic" : [],
				"arrSubj" : []
			};
			this.loadData(()=>{
				// console.log(this.data.subject);
				// console.log(this.data.topic);
				this.main();
			});
		}
		loadData(callback){
			$.ajax({url: "app/models/subject.php"})
			.done(function(res){
				let data = JSON.parse(res);
				settings.data.subject = data;
				$.ajax({url: "app/models/report-topic.php"})
				.done(function(res){								
					let data = JSON.parse(res);
					settings.data.topic = data;
					callback();
				});
			});
		}

		main(){
			// this.initialize();
			// console.log(this.data.subject);	
			$('body').addClass('sidebar-collapse sidebar-mini');			
			this.sampleUpload();
			$('#exlTable').hide();
			$('#subjTbl').hide();
			$('#topicTbl').hide();
		}
		initialize(){
			$('input[type=file]').on('change', (event)=>{
					settings.files = event.target.files;
			});
			$('#formUploadQuestions').submit((event)=>{
				console.log("submitted");
				event.preventDefault();
				let formData = new FormData();
				$.each(this.files,(key,value)=>{
					formData.append(key, value);
				});
				console.log(formData);			
				return false;
			});
		}

		sampleUpload(){
			// $elm = $('#import');
			$('#import').on('change', function (changeEvent) {
		        var reader = new FileReader();
		        
		        reader.onload = function (evt) {
					var data = evt.target.result;
					var workbook = XLSX.read(data, {type: 'binary'});
					var headerNames = XLSX.utils.sheet_to_json( workbook.Sheets[workbook.SheetNames[0]], { header: 1 })[0];
					var data = XLSX.utils.sheet_to_json( workbook.Sheets[workbook.SheetNames[0]]);
					// console.log('RAW______'+XLSX.utils.sheet_to_json(workbook.Sheets[workbook.SheetNames]));
					// console.log('head____'+headerNames);
					// console.log(data);
					// dt = JSON.parse(data);
					$('#exlTable').show();
					data.map(function(xlobject){
						// console.log(rowCount);
						// settings.data.arrTopic.push(xlobject.topic);
						// settings.data.arrSubj.push(xlobject.subject);
						var html = "";
						html+=  "<tr><td>"+xlobject.__rowNum__+"</td>";
						html+=  "<td>"+settings.getSubjectID(xlobject.subject)+"</td>";
						html+=  "<td>"+settings.getTopicID(xlobject.topic)+"</td>";
						html+=  "<td>"+xlobject.question+"</td>";
						html+=  "<td>"+xlobject.answer+"</td>";
						html+=  "<td>"+xlobject.choice_a+"</td>";
						html+=  "<td>"+xlobject.choice_b+"</td>";
						html+=  "<td>"+xlobject.choice_c+"</td>";
						html+=  "<td>"+xlobject.choice_d+"</td>";
						// html+=  "<td>"+xlobject.reference+"</td>";
						html+=  '<td><span class="label label-danger">Not Saved</span></td><tr>';
						$('#excelData tbody').append(html);
						$('#count').text('Rows: '+xlobject.__rowNum__);
						if ($('#questionbtnmodalimport').on('click', function(e){
							e.preventDefault();
							swal("Error","There's a change in the database structure this feature is under maintenace","error");
							// if (saveData(xlobject.question,xlobject.answer,xlobject.choice_a,xlobject.choice_b,xlobject.choice_c,xlobject.choice_d,xlobject.reference)) {
							// 	alert('Saved....');
							// }
							
						}));
					});
					setTimeout(changeTableStatus('<span class="label label-warning">Already Saved</span>'),10000);
					$('#questionbtnmodalimport').removeAttr('disabled', 'disable');
		        };
		        
		        reader.readAsBinaryString(changeEvent.target.files[0]);
		  });
			function saveData(question,answer,choice_a,choice_b,choice_c,choice_d,reference)
			{
				var success = false;
				$.ajax({
					method :"POST",
					url : "app/models/question.php",
					data : {
						'action':'importquestion',
						'question' : question,
						'answer' : answer,
						'choice_a' : choice_a,
						'choice_b' : choice_b,
						'choice_c' : choice_c,
						'choice_d' : choice_d,
						'reference' : reference
					}
					}).done(function(res){
						// alert(res);
						// console.log(res); 
						setTimeout(changeTableStatus('<span class="label label-success">Saved</span>'),3000);
						success = true;
						
					});
					return success;
			}
			function changeTableStatus(status)
			{
				var count = 0;
				$.ajax({
					method :"POST",
					url : "app/models/question.php",
					data : {
						'action':'getQuest1'
					}
				}).done(function(dt){
					var dbe = JSON.parse(dt);
					// console.log(dt);
					dbe.map(function(dbobject){
						$('#excelData tbody tr').each(function(row, tr){
					        if ($(tr).find('td:eq(1)').text() === dbobject.question && $(tr).find('td:eq(2)').text()===dbobject.answer && $(tr).find('td:eq(3)').text()===dbobject.choice_a && $(tr).find('td:eq(4)').text()===dbobject.choice_b && $(tr).find('td:eq(5)').text()===dbobject.choice_c && $(tr).find('td:eq(6)').text()===dbobject.choice_d && $(tr).find('td:eq(7)').text()===dbobject.reference) 
					        {
					        	$(tr).find('td:eq(8)').html(status);
					        	$('#questionbtnmodalimport').attr('disabled','disable');
					        	count++;
					        }
					        
					    }); 
					});
					 $('#saved').text(' / Rows saved: '+count);
				});
			}


		}

		getSubjectID(subject){
			// console.log(settings.data.subject);				
			// console.log(subject);
			var id = 0;
			var html ="";
			var arr = [];
			var c =0;
			settings.data.subject.map(function(subjobj){
				// arr.push(subject);
				if (subjobj.name===subject) {
					id = subjobj.id;
				}
				else{

					return 0;
					// if (c==0) {
					// 	html+="<tr><td>"+subject+"</td>";
					// 		html+="<td><button class='btn btn-success'>Save</button></td></tr>";
					// 		$('#subjData').append(html);
					// 		// $('#exlTable').hide();
					// 		c++;

					// }
					// $('#subjData tbody tr').each(function(row, tr){
				 //        if ($(tr).find('td:eq(2)').text() !== subject){
				 //        	html+="<tr><td>"+subject+"</td>";
					// 		html+="<td><button class='btn btn-success'>Save</button></td></tr>";
					// 		$('#subjData').append(html);
					// 		// $('#exlTable').hide();
				 //        }
				 //    });
					
				}
			});
			return id;
			// console.log(settings.data.arrSubj);
		}
		getTopicID(topic){
			// console.log(this.data.topic);
			// console.log(topic);
			var id = 0;
			var html ="";
			var arr = [];
			var c =0;
			settings.data.topic.map(function(topicobj){
				
				if (topicobj.name===topic) {
					id = topicobj.id;
				}
				else{
					// return 0;
					// arr.push(topic);
					// if (c==0) {
					// 	html+="<tr><td>"+topic+"</td>";
					// 		html+="<td><button class='btn btn-success'>Save</button></td></tr>";
					// 		$('#topicData').append(html);
					// 		// $('#exlTable').hide();
					// 		c++;

					// }
					// $('#topicData tbody tr').each(function(row, tr){
				 //        if ($(tr).find('td:eq(2)').text() !== topic){
				 //        	html+="<tr><td>"+topic+"</td>";
					// 		html+="<td><button class='btn btn-success'>Save</button></td></tr>";
					// 		$('#topicData').append(html);
					// 		// $('#exlTable').hide();
				 //        }
				 //    });
					
				}
			});
			return id;
		}

	}
	let settings = new Settings();
</script>


