 function renderTable(id,data,columns,actions){
	var arrofobj = JSON.parse(data);

	if(id=='#exam'){
		_EXAMTABLE_SELECTED_ID = id;		
	}		
	else if(id=='#subject'){
		_SUBJECTTABLE_SELECTED_ID = id;		
	}
	else if(id=='#user'){
		_USERTABLE_SELECTED_ID = id;		
	}	
	else if(id=='#news'){
		_NEWSTABLE_SELECTED_ID = id;		
	}	
	else if(id=='#topic'){
		_TOPICTABLE_SELECTED_ID = id;		
	}	
	else if(id=='#guidelines'){
		_GUIDELINESTABLE_SELECTED_ID = id;		
	}	
	else if(id=='#feedback'){
		_FEEDBACKTABLE_SELECTED_ID = id;		
	}	
	else if(id=='#question'){
		_QUESTIONTABLE_SELECTED_ID = id;		
	}	
    var html = "";
    html += "<thead>";
    html += "<tr>";
    for(col in columns)
    	html += "<th>"+columns[col].toUpperCase()+"</th>";
    html += "</tr>";
    html += "</thead>";
    html += "<tbody>";
    for(obj in arrofobj){
      html += "<tr>";
      // console.log(obj);
      for(o in arrofobj[obj])
        html += '<td>'+arrofobj[obj][o]+'</td>';
    	// console.log(obj+' '+o);
      html += "</tr>"
    }
    html+="</tbody>"
    $(id+'table').html(html);
    var table = $(id+'table').DataTable({
    	destroy: true,
    	"language":{
    		search: "_INPUT_",
    		searchPlaceholder: "Search entry..."
    	}
    });        
    $('.dataTables_filter input[type="search"]').css({'width':'350px','display':'inline-block'});
    $(id + 'table tbody').on( 'click', 'tr', function () {
    	if($(this).hasClass('active')){
    		$(this).removeClass('active');  
    		// console.log('Nothing selected'); 
    		_EXAMTABLE_SELECTED_ID = 0;
    		$(id+'table-status').html('<i class="fa fa-info-circle text-gray"></i> &nbsp;&nbsp;Nothing Selected');
    		for(act in actions)if(actions[act]!='create')$(id +'table-btn' + actions[act]).attr('disabled','disabled');
    	} else {
    		$(this).addClass('active').siblings().removeClass('active');
    		// console.log($(this)[0].childNodes[0].innerHTML);
    		_EXAMTABLE_SELECTED_ID = $(this)[0].childNodes[0].innerHTML;
    		$(id+'table-status').html('<i class="fa fa-info-circle text-gray"></i> &nbsp;&nbsp; You selected Entry ID: <span class="text-green" style="font-weight:bold">'+_EXAMTABLE_SELECTED_ID+'</span>!');
			for(act in actions)if(actions[act]!='create')$(id +'table-btn' + actions[act]).removeAttr('disabled');			
    	}    	
    }); 
    $(id+'table-loading').hide();
    $(id+'table-status').html('<i class="fa fa-info-circle text-gray"></i> &nbsp;&nbsp;Nothing Selected');
    for(act in actions){
    	$(id +'table-btn' + actions[act]).show();
    	// console.log(actions[act]); 	  	
    }

    if(id=='#exam')renderExamModals();
    if(id=='#subject')renderSubjectModals();
    if(id=='#user')renderUserModals();
    if(id=='#news')renderNewsModals();
    if(id=='#topic')renderTopicModals();
    if(id=='#feedback')renderFeedbackModals();
    if(id=='#guidelines')renderGuidelinesModals();
	if(id=='#question')renderQuestionModals();
}

let questionForm = `
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">Subject:</label>
			<select name="colors" class="form-control" id="subjectid">
			</select>
		</div>
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">Topic:</label>
			<select name="colors" class="form-control" id="topicid">
			</select>
		</div>
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">Question:</label>
			<textarea class="form-control" placeholder="content" id="question" data-maxlength="250" data-error="not less than 250 characters" required></textarea>
			<div class="help-block with-errors"></div>
		</div>
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">Choice A:</label>
			<textarea class="form-control" placeholder="choice_a" id="choice_a" data-maxlength="250" data-error="not less than 250 characters" required></textarea>
			<div class="help-block with-errors"></div>
		</div>
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">Choice B:</label>
			<textarea class="form-control" placeholder="choice_b" id="choice_b" data-maxlength="250" data-error="not less than 250 characters" required></textarea>
			<div class="help-block with-errors"></div>
		</div>
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">Choice C:</label>
			<textarea class="form-control" placeholder="choice_c" id="choice_c" data-maxlength="250" data-error="not less than 250 characters" required></textarea>
			<div class="help-block with-errors"></div>
		</div>
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">Choice D:</label>
			<textarea class="form-control" placeholder="choice_d" id="choice_d" data-maxlength="250" data-error="not less than 250 characters" required></textarea>
			<div class="help-block with-errors"></div>
		</div>
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">Answer:</label>
			<input type="text" class="form-control" placeholder="answer" id="answer" data-maxlength="1" data-error="not less than 1 characters" required></input>
			<div class="help-block with-errors"></div>
		</div>
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">Reference:</label>
			<textarea class="form-control" placeholder="reference" id="reference" data-maxlength="255" data-error="not less than 255 characters" required></textarea>
			<div class="help-block with-errors"></div>
		</div>
	</form>
`;

let userForm = `
	<form data-toggle="validator" role="form" id="addUser-form">
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">First Name:</label>
			<input type="text" class="form-control" placeholder="first name" id="firstname" required>
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">Last Name:</label>
			<input type="text" class="form-control" placeholder="Last name" id="lastname" required>
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">E-mail:</label>
			<input type="email" class="form-control" placeholder="Email" id="email" data-error="This email address is invalid" required>
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			<div class="help-block with-errors"></div>
		</div>
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">Role:</label>
			<select name="colors" class="form-control" id="isadmin">
				<option value="0">Student</option>
				<option value="1">Admin</option>
			</select>
		</div>
	</form>
`;
let inPass = `<div class="form-group has-feedback password">
				<label for="recipient-name" class="control-label">Password:</label>
				<input type="password" data-minlength="6" class="form-control" placeholder="Password" id="password" required>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				<div class="help-block">Minimum of 6 characters</div>
			</div>`;
let topicForm = `
	<form data-toggle="validator" role="form" id="addTopic-form">
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">Subject:</label>
			<select name="colors" class="form-control" id="subjectid">
			</select>
		</div>
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">Name:</label>
			<input type="text" class="form-control" placeholder="Enter title" id="name" required>
			<span class="glyphicon glyphicon-topic form-control-feedback"></span>
		</div>
	</form>
`;
let subjectForm = `
	<form>
		<div class="form-group">
			<div class="row">
				<input type="hidden" id="subjectid">
				<div class="col-sm-4">
					<label for="recipient-name" class="control-label">Name:</label>
					<input type="text" class="form-control" id="name">
				</div>
				<div class="col-sm-4">
					<label for="recipient-name" class="control-label">Time Duration:</label>
					<input type="number" class="form-control" id="timeduration">
				</div>
				<div class="col-sm-4">
					<label for="recipient-name" class="control-label">Passing Rate:</label>
					<input type="number" class="form-control" id="passingrate">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="message-text" class="control-label">Description:</label>
			<textarea class="form-control" id="description"></textarea>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6">
					<label for="recipient-name" class="control-label">No. of attempts:</label>
					<input type="number" class="form-control" id="attempt">
				</div>
				<div class="col-sm-6">
					<label for="recipient-name" class="control-label">No. of items:</label>
					<input type="number" class="form-control" id="items">
				</div>
			</div>
		</div>
	</form>
`;
let newsForm = `
	<form data-toggle="validator" role="form">
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">User:</label>
			<input type="text" class="form-control" placeholder="first name" id="userid" data-minlength="1" data-error="input cannot be empty" required>
			<span class="glyphicon glyphicon-news form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">Title:</label>
			<input type="text" class="form-control" placeholder="Enter title" data-minlength="1"  id="name" data-error="input cannot be empty required>
		</div>
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">Content:</label>
			<textarea class="form-control" placeholder="content" id="content" data-maxlength="250" data-minlength="1" data-error="input cannot be empty or more than 250 characters" required></textarea>
			<div class="help-block with-errors"></div>
		</div>
	</form>
`;
let guidelinesForm = `
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">User:</label>
			<input type="text" class="form-control" placeholder="first name" id="userid" required>
			<span class="glyphicon glyphicon-guidelines form-control-feedback"></span>
		</div>
		
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">No.of Subject to Pass:</label>
			<input type="number" class="form-control" placeholder="Subjects to Pass" id="subjectstopass" required>
			<span class="glyphicon glyphicon-guidelines form-control-feedback"></span>
		</div>
`;
/* 
<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">Subject:</label>
			<select name="subjects" class="form-control" id="subjectid">
			</select>
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		</div>


*/


let feedBackForms = `
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">User:</label>
			<input type="text" class="form-control" placeholder="first name" id="userid" required>
			<span class="glyphicon glyphicon-feedback form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">Content:</label>
			<textarea class="form-control" data-minlength="1" placeholder="content" id="content" data-maxlength="250" data-error="input cannot be empty or more than 250 characters" required></textarea>
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			<div class="help-block with-errors"></div>
		</div>
`;
function renderExamModals(){
	/*
	$(id + 'modal-create').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) // Button that triggered the modal
	  var recipient = button.data('id') // Extract info from data-* attributes
	  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	  var modal = $(this)
	  modal.find('.modal-title').text('Create')
	  modal.find('.modal-body input').val(recipient)
	});
	*/
	$(_EXAMTABLE_SELECTED_ID + 'modal-read').on('show.bs.modal', function (event) {
	  var modal = $(this);
	  modal.find('.modal-title').text('Read Entry ID: ' + _EXAMTABLE_SELECTED_ID)	  
	  modal.find('.modal-body input').attr('readonly','readonly');
	  modal.find('#examquestion').attr('readonly','readonly');

	  _EXAMTABLE_DATA.map(function(examobj){
	  	if(examobj.id===_EXAMTABLE_SELECTED_ID){
		  	_USERTABLE_DATA.map(function(userobj){
		  		if(userobj.id===examobj.user_id){
		  			_SUBJECTTABLE_DATA.map(function(subjectobj){
		  				if(subjectobj.id===examobj.subject_id){
		  					_QUESTIONTABLE_DATA.map(function(questionobj){
		  						if(questionobj.id===examobj.question_id){
		  							modal.find('#examuser').val(userobj.lastname.toUpperCase()+', '+userobj.firstname.toUpperCase());
		  							modal.find('#examsubject').val(subjectobj.name);
		  							modal.find('#examquestion').val(questionobj.question);
		  							modal.find('#examuseranswer').val(examobj.answer);
		  							modal.find('#examimockanswer').val(questionobj.answer);
		  							(examobj.answer===questionobj.answer)?
		  							modal.find('#examresult').val("CORRECT"):
		  							modal.find('#examresult').val("INCORRECT");				  				
		  							return;
		  						}					  	
		  					});
		  					return;
		  				}
		  			});
		  			return;
		  		}
		  	});
	  	return;
	  }
	});
	  
	});
}

function renderSubjectModals(){

	$(_SUBJECTTABLE_SELECTED_ID + 'modal-read').on('show.bs.modal', function (event) {
		// console.log("I'm here");
		var modal = $(this);
		modal.find('.modal-title').text('Read Entry ID: ' + _SUBJECTTABLE_SELECTED_ID)	  
		modal.find('.modal-body').html(subjectForm);
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('#subjectdescription').attr('readonly','readonly');

		_EXAMTABLE_DATA.map(function(examobj){
	  		_SUBJECTTABLE_DATA.map(function(subjectobj){
	  			if(subjectobj.id===_EXAMTABLE_SELECTED_ID){
					modal.find('#subjectid').val(subjectobj.id);
					modal.find('#name').val(subjectobj.name);
					modal.find('#timeduration').attr('value',subjectobj.timeduration);
					modal.find('#passingrate').attr('value',subjectobj.passingrate);
					modal.find('#description').val(subjectobj.description);
					modal.find('#attempt').attr('value',subjectobj.attempt);		  									  				
					modal.find('#items').attr('value',subjectobj.items);		  									  				
					return;
				}
			});
			return;
		});
	});

	$(_SUBJECTTABLE_SELECTED_ID + 'modal-create').on('show.bs.modal', function (event) {
		var modal =$(this);

	});

	$(_SUBJECTTABLE_SELECTED_ID + 'modal-update').on('show.bs.modal', function (event) {
		var modal =$(this);
		modal.find('.modal-title').text('Edit Entry ID: ' + _SUBJECTTABLE_SELECTED_ID);	  
		// modal.find('.modal-body').html(subjectForm);

		_EXAMTABLE_DATA.map(function(examobj){
	  		_SUBJECTTABLE_DATA.map(function(subjectobj){
	  			if(subjectobj.id===_EXAMTABLE_SELECTED_ID){
					modal.find('#subjectidUpdate').val(subjectobj.id);
					modal.find('#nameUpdate').val(subjectobj.name);
					modal.find('#timedurationUpdate').attr('value',subjectobj.timeduration);
					modal.find('#passingrateUpdate').attr('value',subjectobj.passingrate);
					modal.find('#descriptionUpdate').val(subjectobj.description);
					modal.find('#attemptUpdate').attr('value',subjectobj.attempt);		  									  				
					modal.find('#itemsUpdate').attr('value',subjectobj.items);		  									  				
					return;
				}
			});
			return;
		});
	});

	$(_SUBJECTTABLE_SELECTED_ID + 'modal-delete').on('show.bs.modal', function (event) {
		var modal =$(this);
		modal.find('.modal-body').html(subjectForm);
		modal.find('.modal-title').text('Delete Entry ID: ' + _SUBJECTTABLE_SELECTED_ID)	  
		modal.find('.modal-body').html(subjectForm);
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('#description').attr('readonly','readonly');

		_EXAMTABLE_DATA.map(function(examobj){
	  		_SUBJECTTABLE_DATA.map(function(subjectobj){
	  			if(subjectobj.id===_EXAMTABLE_SELECTED_ID){
					modal.find('#subjectid').val(subjectobj.id);
					modal.find('#name').val(subjectobj.name);
					modal.find('#timeduration').attr('value',subjectobj.timeduration);
					modal.find('#passingrate').attr('value',subjectobj.passingrate);
					modal.find('#description').val(subjectobj.description);
					modal.find('#attempt').attr('value',subjectobj.attempt);		  									  				
					modal.find('#items').attr('value',subjectobj.items);		  									  				
					return;
				}
			});
			return;
		});
	});

	// modal.find('.modal-body').html(subjectForm);
	$('#subjectbtnmodalcreate').on('click',function(e){	
		e.preventDefault();
		var modal =$('#subjectmodal-create');			
		// console.log("clicked");
		// var newSubject = {
			var name=modal.find('#nameCreate').val();
			var timeduration=modal.find('#timedurationCreate').val();
			var passingrate=modal.find('#passingrateCreate').val();
			var description=modal.find('#descriptionCreate').val();
			var attempt=modal.find('#attemptCreate').val();
			var items=modal.find('#itemsCreate').val();
			var action = modal.find("form").attr("action");
		// };
		// console.log(newSubject);
		if(name != '' && timeduration != '' && passingrate != '' && description != '' && attempt != '' && items != '' ) {
			$.ajax({
		        method: "POST",
		        url: action,
		        data: {
		        	action:'createsubject',
		        	name:name,	        	
		        	timeduration:timeduration,	        	
		        	passingrate:passingrate,	        	
		        	description:description,	        	
		        	attempt:attempt,	        	
		        	items:items     	
		        }
		    }).done(function(res){
		    	// console.log(res);
		    	modal.modal('hide');
		    	modal.find('#nameCreate').val('');modal.find('#timedurationCreate').val('');
		    	modal.find('#passingrateCreate').val('');modal.find('#descriptionCreate').val('');
		    	modal.find('#attemptCreate').val('');modal.find('#itemsCreate').val('');
		    	let data = JSON.parse(res);
		    	if (data.result=="ok") {
		    		$('#subjectbtnmodalcreate').unbind();
		    		$('#subjectbtnmodalcreate').bind('click');
		    		setTimeout(function(){
			    		$('#subjecttable-loading').html('<img src="dist/img/loading1.gif">');
			    		doRenderTable('#subject');
			    		swal("Success!", "New subject has been created!", "success");
			    	},1000);	
		    	}
		    	else{
		    		swal("Failed!", "Subject not Saved!", "error");
		    	}		    	
		    });
		}
		else{
			swal("Error","Please fill all the boxes","error");
		}
		
	});

	$('#subjectbtnmodalupdate').on('click',function(e){		
		e.preventDefault();		
		// console.log("updateclicked");
		swal({
		  title: "Are you sure?",
		  text: "You wanna edit this data?",
		  type: "info",
		  showCancelButton: true,
		  confirmButtonColor: "#00c0ef",
		  confirmButtonText: "Yes",
		  cancelButtonText: "No",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
			var modal =$('#subjectmodal-update');			
			// console.log("clicked");
			// var newSubject = {
			var name=modal.find('#nameUpdate').val();
			var timeduration=modal.find('#timedurationUpdate').val();
			var passingrate=modal.find('#passingrateUpdate').val();
			var description=modal.find('#descriptionUpdate').val();
			var attempt=modal.find('#attemptUpdate').val();
			var items=modal.find('#itemsUpdate').val();
			// var action = modal.find("form").attr("action");
			// };
			// console.log(newSubject);
			$.ajax({
		        method: "POST",
		        url: "app/models/subject.php",
		        data: {
		        	action:'updatesubject',
		        	id:_EXAMTABLE_SELECTED_ID,
		        	name:name,	        	
		        	timeduration:timeduration,	        	
		        	passingrate:passingrate,	        	
		        	description:description,	        	
		        	attempt:attempt,	        	
		        	items:items  	
		        }
		    }).done(function(res){
		    	modal.modal('hide');
		    	modal.find('#nameUpdate').val('');modal.find('#timedurationUpdate').val('');
		    	modal.find('#passingrateUpdate').val('');modal.find('#descriptionUpdate').val('');
		    	modal.find('#attemptUpdate').val('');modal.find('#itemsUpdate').val('');
		    	let data = JSON.parse(res);
		    	if (data.result=="ok") {
		    		$('#subjectbtnmodalupdate').unbind();
		    		$('#subjectbtnmodalupdate').bind('click');
		    		setTimeout(function(){
			    		$('#subjecttable-loading').html('<img src="dist/img/loading1.gif">');
			    		doRenderTable('#subject');
			    		swal("Success!", "New subject has been updated!", "success");
			    	},1000);	
		    	}
		    	else{
		    		swal("Failed!", "Subject not Saved!", "error");
		    	}	    	
	    	});
		  } else {
			    swal("Cancelled", "Subject data is safe :)", "error");
		  }
		});
	});

	$('#subjectbtnmodaldelete').on('click',function(){				
		// console.log("delete  clicked");
		swal({
		  title: "Are you sure?",
		  text: "You will not be able to recover this data!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes",
		  cancelButtonText: "No",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
		  	var newSubject = {
				name:$('#name').val(),
				timeduration:$('#timeduration').val(),
				passingrate:$('#passingrate').val(),
				description:$('#description').val(),
				attempt:$('#attempt').val(),
				items:$('#items').val()
			};
		    $.ajax({
		        method: "POST",
		        url: "app/models/subject.php",
		        data: {
		        	action:'deletesubject',
		        	id:_EXAMTABLE_SELECTED_ID,
		        	name:newSubject.name,	        	
		        	timeduration:newSubject.timeduration,	        	
		        	passingrate:newSubject.passingrate,	        	
		        	description:newSubject.description,	        	
		        	attempt:newSubject.attempt,	        	
		        	items:newSubject.items	  	
		        }
		    }).done(function(res){
		    	// console.log(res);
		    	$('#subjectmodal-delete').modal('hide');
		    	$('#name').val("");$('#timeduration').val("");
		    	$('#passingrate').val("");$('#description').val("");
		    	$('#attempt').val("");$('#items').val("");
		    	setTimeout(function(){
		    		$('#subjecttable-loading').html('<img src="dist/img/loading1.gif">');
		    		doRenderTable('#subject');
		    		swal("Deleted!", "The subject has been deleted!", "success");
		    	},1000);	    	
		    });
		  } else {
			    swal("Cancelled", "Subject data is safe :)", "error");
		  }
		});
		
	});
}
function renderUserModals(){

	$(_USERTABLE_SELECTED_ID + 'modal-read').on('show.bs.modal', function (event) {
		// console.log("I'm here " + _EXAMTABLE_SELECTED_ID);
		var modal = $(this);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID);
		modal.find('.modal-body').html(userForm);
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('.modal-body select').attr('disabled','disabled');
  		_USERTABLE_DATA.map(function(userobj){
  			if(userobj.id===_EXAMTABLE_SELECTED_ID){
  				$("#isadmin option").each(function(i){
			        if (userobj.isadmin==this.value) {
  						$(this).attr("selected","selected");
  					}
			    });
				modal.find('#firstname').val(userobj.firstname);
				modal.find('#lastname').val(userobj.lastname);
				modal.find('#email').val(userobj.email);
				modal.find('#password').val(userobj.password);
						  									  				
				modal.find('#createdat').val(userobj.createdat);
				// console.log(userobj);
				return;
  			}
  		});
	});
	$(_USERTABLE_SELECTED_ID + 'modal-create').on('show.bs.modal', function (event) {
		var modal =$(this);
	});

	$(_USERTABLE_SELECTED_ID + 'modal-update').on('show.bs.modal', function (event) {
		var modal =$(this);
		_USERTABLE_DATA.map(function(userobj){
  			if(userobj.id===_EXAMTABLE_SELECTED_ID){
  				$("#isadminUpdate option").each(function(i){
			        if (userobj.isadmin==this.value) {
  						$(this).attr("selected","selected");
  					}
			    });
				modal.find('#firstnameUpdate').val(userobj.firstname);
				modal.find('#lastnameUpdate').val(userobj.lastname);
				modal.find('#emailUpdate').val(userobj.email);
				// modal.find('#password').val(userobj.password);
						  									  				
				modal.find('#createdatUpdate').val(userobj.createdat);
				// console.log(userobj);
				return;
  			}
  		});
	});

	$(_USERTABLE_SELECTED_ID + 'modal-delete').on('show.bs.modal', function (event) {
		var modal =$(this);
		modal.find('.modal-body').html(userForm);
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('.modal-body select').attr('disabled','disabled');
		_USERTABLE_DATA.map(function(userobj){
  			if(userobj.id===_EXAMTABLE_SELECTED_ID){
  				$("#isadmin option").each(function(i){
			        if (userobj.isadmin==this.value) {
  						$(this).attr("selected","selected");
  					}
			    });
				modal.find('#firstname').val(userobj.firstname);
				modal.find('#lastname').val(userobj.lastname);
				modal.find('#email').val(userobj.email);
				modal.find('#password').val(userobj.password);
						  									  				
				modal.find('#createdat').val(userobj.createdat);
				// console.log(userobj);
				return;
  			}
  		});
	});

	$('#userbtnmodalcreate').on('click',function(e){
		e.preventDefault();				
		// console.log("clicked");
		// var newUser = {
			var firstname = $('#firstnameCreate').val();
			var lastname = $('#lastnameCreate').val();
			var email = $('#emailCreate').val();
			var password = $('#passwordCreate').val();
			var isadmin = $('#isadminCreate').val();
		// };
		// console.log(newUser);
		if (firstname!='' && lastname!='' && email!='' && password!='' && isadmin!='') {
			$.ajax({
		        method: "POST",
		        url: "app/models/user.php",
		        data: {
		        	action:'createuser',
		        	firstname:firstname,
		        	lastname:lastname,	        	
		        	email:email,	        	
		        	password:password,	             	
		        	isadmin:isadmin     	
		        }
		    }).done(function(res){
		    	let data =JSON.parse(res);
		    	// console.log(res);
	    		$('#userbtnmodalcreate').unbind();
		    	$('#usermodal-create').modal('hide');
		    	$('#firstnameCreate').val("");$('#lastnameCreate').val("");
		    	$('#emailCreate').val("");$('#passwordCreate').val("");
		    	$('#createdatCreate').val("");$('#isadminCreate').val("");
		    	$('#confirmpasswordCreate').val("");
		    	if (data.result=="ok") {
		    		setTimeout(function(){
			    		$('#usertable-loading').html('<img src="dist/img/loading1.gif">');
			    		doRenderTable('#user');
			    		swal("Success!", "New user has been created!", "success");
			    		$('#userbtnmodalcreate').bind('click');
			    	},1000);
		    	}
		    	else{
		    		console.log(data.message);
		    		swal("Error!","Create New User Failed","error");
		    	}	    	
		    });
		}
		else{
			swal("Error","Please fill up the form","error")
		}
	});

	$('#userbtnmodalupdate').on('click',function(e){				
		e.preventDefault();
		// console.log("updateclicked");
		swal({
		  title: "Are you sure?",
		  text: "You wanna edit this data?",
		  type: "info",
		  showCancelButton: true,
		  confirmButtonColor: "#00c0ef",
		  confirmButtonText: "Yes",
		  cancelButtonText: "No",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
			// var newUser = {
			var firstname = $('#firstnameUpdate').val();
			var lastname = $('#lastnameUpdate').val();
			var email = $('#emailUpdate').val();
			var password = $('#passwordUpdate').val();
			var isadmin = $('#isadminUpdate').val();
		// };
			// console.log(newUser);
			$.ajax({
		        method: "POST",
		        url: "app/models/user.php",
		        data: {
		        	action:'updateuser',
		        	id:_EXAMTABLE_SELECTED_ID,
		        	firstname:firstname,
		        	lastname:lastname,	        	
		        	email:email,	        	
		        	password:password,	             	
		        	isadmin:isadmin     	
		        }
		    }).done(function(res){
		    	// console.log(res);
		    	let data = JSON.parse(res);
		    	$('#usermodal-update').modal('hide');
		    	$('#firstnameUpdate').val('');$('#lastnameUpdate').val('');
		    	// $('#email').val("");$('#password').val("");
		    	$('#createdatUpdate').val('');$('#isadminUpdate').val('');
		    	$('#confirmpasswordUpdate').val('');
		    	if (data.result=="ok") {
		    		setTimeout(function(){
			    		$('#usertable-loading').html('<img src="dist/img/loading1.gif">');
			    		doRenderTable('#user');
			    		swal("Success!", "New user has been updated!", "success");
			    	},1000);
		    	}
		    	else{
		    		swal("Error!","User update failed.","error")
		    	}
	    });
		  } else {
			    swal("Cancelled", "User data is safe :)", "error");
		  }
		});
	});

	$('#userbtnmodaldelete').on('click',function(){				
		// console.log("delete  clicked");
		swal({
		  title: "Are you sure?",
		  text: "You will not be able to recover this data!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes",
		  cancelButtonText: "No",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
		    $.ajax({
		        method: "POST",
		        url: "app/models/user.php",
		        data: {
		        	action:'deleteuser',
		        	id:_EXAMTABLE_SELECTED_ID	
		        }
		    }).done(function(res){
		    	// console.log(res);
		    	$('#usermodal-delete').modal('hide');
		    	$('#firstname').val("");$('#lastname').val("");
		    	$('#email').val("");$('#password').val("");
		    	$('#createdat').val("");$('#isadmin').val("");
		    	$('#confirmpassword').val("");
		    	setTimeout(function(){
		    		$('#usertable-loading').html('<img src="dist/img/loading1.gif">');
		    		doRenderTable('#user');
		    		swal("Deleted!", "The user has been deleted!", "success");
		    	},1000);	    	
		    });
		  } else {
			    swal("Cancelled", "User data is safe :)", "error");
		  }
		});
		
	});
}

function renderNewsModals(){
	$(_NEWSTABLE_SELECTED_ID + 'modal-read').on('show.bs.modal', function (event) {
		// console.log("I'm here " + _EXAMTABLE_SELECTED_ID);
		var modal = $(this);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID);	 
		modal.find('.modal-body').html(newsForm); 
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('#content').attr('readonly','readonly');
  		_NEWSTABLE_DATA.map(function(newsobj){
  			if(newsobj.id===_EXAMTABLE_SELECTED_ID){
				modal.find('#userid').val(newsobj.user_id);
				modal.find('#name').val(newsobj.name);
				modal.find('#content').val(newsobj.content);	  									  				
				modal.find('#createdat').val(newsobj.date);
				// console.log(newsobj);
				return;
  			}
  		});
	});
	$(_NEWSTABLE_SELECTED_ID + 'modal-create').on('show.bs.modal', function (event) {
		var modal = $(this);
		modal.find('#useridCreate').attr('readonly','readonly');
		// modal.find('.modal-body').html(newsForm);
		modal.find('#useridCreate').val(getUID());
	});

	$(_NEWSTABLE_SELECTED_ID + 'modal-update').on('show.bs.modal', function (event) {
		var modal = $(this);
		// modal.find('.modal-body').html(newsForm);
		modal.find('#userid').attr('readonly','readonly');
		modal.find('.modal-title').text('Edit Entry ID: ' + _USERTABLE_SELECTED_ID);
  		_NEWSTABLE_DATA.map(function(newsobj){
  			if(newsobj.id===_EXAMTABLE_SELECTED_ID){
				modal.find('#useridUpdate').val(newsobj.user_id);
				modal.find('#nameUpdate').val(newsobj.name);
				modal.find('#contentUpdate').val(newsobj.content);	  									  				
				modal.find('#createdatUpdate').val(newsobj.date);
				// console.log(newsobj);
				return;
  			}
  		});
	});

	$(_NEWSTABLE_SELECTED_ID + 'modal-delete').on('show.bs.modal', function (event) {
		var modal = $(this);
		modal.find('.modal-body').html(newsForm);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID);	
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('#content').attr('readonly','readonly');
  		_NEWSTABLE_DATA.map(function(newsobj){
  			if(newsobj.id===_EXAMTABLE_SELECTED_ID){
				modal.find('#userid').val(newsobj.user_id);
				modal.find('#name').val(newsobj.name);
				modal.find('#content').val(newsobj.content);	  									  				
				modal.find('#createdat').val(newsobj.date);
				// console.log(newsobj);
				return;
  			}
  		});
	});															

	$('#newsbtnmodalcreate').on('click',function(e){	
		e.preventDefault();			
		// console.log("clicked");
		// var newNews = {
			var userid = $('#useridCreate').val();
			var name = $('#nameCreate').val();
			var content = $('#contentCreate').val();
		// };
		// console.log(newNews);
		if (name!='' && content!='') {
			$.ajax({
		        method: "POST",
		        url: "app/models/news.php",
		        data: {
		        	action:'createnews',
		        	userid:userid,	        	
		        	name:name,	        	
		        	content:content	   
		        }
		    }).done(function(res){
		    	let data = JSON.parse(res);
		    	// console.log(res);
		    	$('#newsmodal-create').modal('hide');
		    	$('#useridCreate').val("");$('#nameCreate').val("");
		    	$('#contentCreate').val("");$('#createdatCreate').val("");
		    	$('#createdatCreate').val("");
		    	if (data.result=="ok") {
		    		setTimeout(function(){
			    		$('#newstable-loading').html('<img src="dist/img/loading1.gif">');
			    		doRenderTable('#news');
			    		swal("Success!", "News has been created!", "success");
			    	},1000);
		    	}
		    	else{
		    		swal("Error!","Create News Failed","error");
		    	}    	
		    });
		}
		else{
			swal("Error","Please Fill up the form","error");
		}
	});

	$('#newsbtnmodalupdate').on('click',function(e){		
		e.preventDefault();		
		// console.log("updateclicked");
		swal({
		  title: "Are you sure?",
		  text: "You wanna edit this data?",
		  type: "info",
		  showCancelButton: true,
		  confirmButtonColor: "#00c0ef",
		  confirmButtonText: "Yes",
		  cancelButtonText: "No",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
			var name = $('#nameUpdate').val();
			var content = $('#contentUpdate').val();
			// console.log(newNews);
			$.ajax({
		        method: "POST",
		        url: "app/models/news.php",
		        data: {
		        	action:'updatenews',
		        	id:_EXAMTABLE_SELECTED_ID,     	
		        	name:name,	        	
		        	content:content	    
		        }
		    }).done(function(res){
		    	let data = JSON.parse(res);
		    	// console.log(res);
		    	$('#newsmodal-update').modal('hide');$('#nameUpdate').val("");
		    	$('#contentUpdate').val("");
		    	if (data.result=="ok") {
		    		setTimeout(function(){
			    		$('#newstable-loading').html('<img src="dist/img/loading1.gif">');
			    		doRenderTable('#news');
			    		swal("Success!", "News has been updated!", "success");
			    	},1000);	
		    	}
		    	else{
		    		swal("Error!","Update News Failed","error");
		    	}  	
		    });
		  } else {
			    swal("Cancelled", "News data is safe :)", "error");
		  }
		});
	});

	$('#newsbtnmodaldelete').on('click',function(){				
		// console.log("delete  clicked");
		swal({
		  title: "Are you sure?",
		  text: "You will not be able to recover this data!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes",
		  cancelButtonText: "No",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
		    $.ajax({
		        method: "POST",
		        url: "app/models/news.php",
		        data: {
		        	action:'deletenews',
		        	id:_EXAMTABLE_SELECTED_ID  	
		        }
		    }).done(function(res){
		    	// console.log(res);
		    	$('#newsmodal-delete').modal('hide');
		    	$('#userid').val("");$('#subjectstopass').val("");
		    	$('#createdat').val("");
		    	setTimeout(function(){
		    		$('#newstable-loading').html('<img src="dist/img/loading1.gif">');
		    		doRenderTable('#news');
		    		swal("Deleted!", "The news has been deleted!", "success");
		    	},1000);	    	
		    });
		  } else {
			    swal("Cancelled", "News data is safe :)", "error");
		  }
		});
		
	});
}

function renderFeedbackModals(){
	$(_FEEDBACKTABLE_SELECTED_ID + 'modal-read').on('show.bs.modal', function (event) {
		// console.log("I'm here " + _EXAMTABLE_SELECTED_ID);
		var modal = $(this);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID);
		modal.find('.modal-body').html(feedBackForms);	  
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('#content').attr('readonly','readonly');
  		_FEEDBACKTABLE_DATA.map(function(feedbackobj){
  			if(feedbackobj.id===_EXAMTABLE_SELECTED_ID){
				modal.find('#userid').val(feedbackobj.user_id.toUpperCase());	  									  				
				modal.find('#content').val(feedbackobj.content);	  									  				
				modal.find('#createdat').val(feedbackobj.date);
				return;
  			}
  		});
	});

	$(_FEEDBACKTABLE_SELECTED_ID + 'modal-create').on('show.bs.modal', function (event) {
		var modal = $(this);
		// modal.find('.modal-body').html(feedBackForms);
		modal.find('#userid').val(getUID());
	});

	$(_FEEDBACKTABLE_SELECTED_ID + 'modal-update').on('show.bs.modal', function (event) {
		var modal = $(this);
		// modal.find('.modal-body').html(feedBackForms);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID);
		modal.find('.modal-body').html(feedBackForms);	  
  		_FEEDBACKTABLE_DATA.map(function(feedbackobj){
  			if(feedbackobj.id===_EXAMTABLE_SELECTED_ID){
				modal.find('#userid').val(feedbackobj.user_id.toUpperCase());	  									  				
				modal.find('#content').val(feedbackobj.content);	  									  				
				modal.find('#createdat').val(feedbackobj.date);
				return;
  			}
  		});
	});

	$(_FEEDBACKTABLE_SELECTED_ID + 'modal-delete').on('show.bs.modal', function (event) {
		var modal = $(this);
		modal.find('.modal-body').html(feedBackForms);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID);
		// modal.find('.modal-body').html(feedBackForms);	  
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('#content').attr('readonly','readonly');
  		_FEEDBACKTABLE_DATA.map(function(feedbackobj){
  			if(feedbackobj.id===_EXAMTABLE_SELECTED_ID){
				modal.find('#userid').val(feedbackobj.user_id.toUpperCase());	  									  				
				modal.find('#content').val(feedbackobj.content);	  									  				
				modal.find('#createdat').val(feedbackobj.date);
				return;
  			}
  		});
	});

	$('#feedbackbtnmodalcreate').on('click',function(){				
		// console.log("clicked");
		var newFeedback = {
			user_id:$('#userid').val(),
			name:$('#name').val(),
			content:$('#content').val()
		};
		// console.log(newFeedback);
		$.ajax({
	        method: "POST",
	        url: "app/models/feedback.php",
	        data: {
	        	action:'createfeedback',
	        	user_id:newFeedback.user_id,	        	
	        	name:newFeedback.name,	        	
	        	content:newFeedback.content	    
	        }
	    }).done(function(res){
	    	// console.log(res);
	    	$('#feedbackmodal-create').modal('hide');
	    	$('#userid').val("");
	    	$('#name').val("");
	    	$('#content').val("");$('#createdat').val("");
	    	$('#createdat').val("");
	    	setTimeout(function(){
	    		$('#feedbacktable-loading').html('<img src="dist/img/loading1.gif">');
	    		doRenderTable('#feedback');
	    		swal("Success!", "New feedback has been created!", "success");
	    	},1000);	    	
	    });
	});

	$('#feedbackbtnmodalupdate').on('click',function(){				
		// console.log("updateclicked");
		swal({
		  title: "Are you sure?",
		  text: "You wanna edit this data?",
		  type: "info",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes",
		  cancelButtonText: "No",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
			var newFeedback = {
				name:$('#name').val(),
				content:$('#content').val()
			};
			// console.log(newFeedback);
			$.ajax({
		        method: "POST",
		        url: "app/models/feedback.php",
		        data: {
		        	action:'updatefeedback',
		        	id:_EXAMTABLE_SELECTED_ID,       	
		        	name:newFeedback.name,	        	
		        	content:newFeedback.content	      
		        }
		    }).done(function(res){
		    	// console.log(res);
		    	$('#feedbackmodal-update').modal('hide');
		    	$('#userid').val("");
		    	$('#name').val("");
		    	$('#content').val("");$('#createdat').val("");
		    	$('#createdat').val("");
		    	setTimeout(function(){
		    		$('#feedbacktable-loading').html('<img src="dist/img/loading1.gif">');
		    		doRenderTable('#feedback');
		    		swal("Success!", "New feedback has been updated!", "success");
		    	},1000);	    	
		    });
		  } else {
			    swal("Cancelled", "Feedback data is safe :)", "error");
		  }
		});
	});

	$('#feedbackbtnmodaldelete').on('click',function(){				
		// console.log("delete  clicked");
		swal({
		  title: "Are you sure?",
		  text: "You will not be able to recover this data!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes",
		  cancelButtonText: "No",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
		    $.ajax({
		        method: "POST",
		        url: "app/models/feedback.php",
		        data: {
		        	action:'deletefeedback',
		        	id:_EXAMTABLE_SELECTED_ID	  	
		        }
		    }).done(function(res){
		    	// console.log(res);
		    	$('#feedbackmodal-delete').modal('hide');
		    	$('#userid').val("");$('#subjectstopass').val("");
		    	$('#createdat').val("");
		    	setTimeout(function(){
		    		$('#feedbacktable-loading').html('<img src="dist/img/loading1.gif">');
		    		doRenderTable('#feedback');
		    		swal("Deleted!", "The feedback has been deleted!", "success");
		    	},1000);	    	
		    });
		  } else {
			    swal("Cancelled", "Feedback data is safe :)", "error");
		  }
		});
		
	});
}

function renderGuidelinesModals(){
	$(_GUIDELINESTABLE_SELECTED_ID + 'modal-read').on('show.bs.modal', function (event) {
		// console.log("I'm here " + _EXAMTABLE_SELECTED_ID);
		var modal = $(this);	  
		modal.find('.modal-body').html(guidelinesForm);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID);
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('#content').attr('readonly','readonly');
  		_GUIDELINESTABLE_DATA.map(function(guidelinesobj){
  			if(guidelinesobj.id===_EXAMTABLE_SELECTED_ID){
				modal.find('#userid').val(guidelinesobj.user_id.toUpperCase());	  									  				
				modal.find('#subjectstopass').attr('value',guidelinesobj.subject_toPass);	  									  				
				modal.find('#createdat').attr('value',guidelinesobj.date);
				// console.log(guidelinesobj);
				return;
  			}
  		});
	});

	$(_GUIDELINESTABLE_SELECTED_ID + 'modal-create').on('show.bs.modal', function (event) {
		var modal = $(this);
		// modal.find('.modal-body').html(guidelinesForm);
		modal.find('#useridCreate').val(getUID());
		modal.find('#useridCreate').attr('readonly','readonly');
		// _SUBJECTTABLE_DATA.map(function(subjectobj){
		// 	// modal.find('.modal-body #createdat').val(Date.now());
		// 	modal.find('#createdat').val(new Date().getTime("Y-m-d H:i:s")).attr('readonly','readonly');
  //           modal.find('#subjectid').append($('<option>').text(subjectobj.name).attr('value', subjectobj.id));
		// });
	});

	$(_GUIDELINESTABLE_SELECTED_ID + 'modal-update').on('show.bs.modal', function (event) {
		var modal = $(this);
		// modal.find('.modal-body').html(guidelinesForm);
		modal.find('.modal-title').text('Edit Entry ID: ' + _USERTABLE_SELECTED_ID);	  
		// modal.find('.modal-body').html(guidelinesForm);
		modal.find('#userid').attr('readonly','readonly');
  		_GUIDELINESTABLE_DATA.map(function(guidelinesobj){
  			if(guidelinesobj.id===_EXAMTABLE_SELECTED_ID){
				// guidelinesobj.subjects_toPass=parseInt(guidelinesobj.subjects_toPass);	
				modal.find('#useridUpdate').val(guidelinesobj.user_id.toUpperCase());	  									  				
				modal.find('#subjectstopassUpdate').attr('value',guidelinesobj.subject_toPass);	  									  				
				modal.find('#createdatUpdate').val(guidelinesobj.date);
				// console.log(guidelinesobj);
				return;
  			}
  		});
	});

	$(_GUIDELINESTABLE_SELECTED_ID + 'modal-delete').on('show.bs.modal', function (event) {
		var modal = $(this);
		// modal.find('.modal-body').html(guidelinesForm);
		modal.find('.modal-title').text('Delete Entry ID: ' + _USERTABLE_SELECTED_ID);	  
		modal.find('.modal-body').html(guidelinesForm);
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('#content').attr('readonly','readonly');
  		_GUIDELINESTABLE_DATA.map(function(guidelinesobj){
  			if(guidelinesobj.id===_EXAMTABLE_SELECTED_ID){
				modal.find('#userid').val(guidelinesobj.user_id.toUpperCase());	  									  				
				modal.find('#subjectstopass').attr('value',guidelinesobj.subject_toPass);	  									  				
				modal.find('#createdat').val(guidelinesobj.date);
				return;
  			}
  		});
	});


	$('#guidelinesbtnmodalcreate').on('click',function(e){	
		e.preventDefault();			
		// console.log("clicked");
		// var newGuidelines = {
			var user_id = $('#useridCreate').val();
			var subjects_toPass = $('#subjectstopassCreate').val();
		// };
		// console.log(newGuidelines);
		if (subjects_toPass!='') {
			$.ajax({
		        method: "POST",
		        url: "app/models/guidelines.php",
		        data: {
		        	action:'createguidelines',
		        	user_id:user_id,	            	
		        	subjects_toPass:subjects_toPass	   
		        }
		    }).done(function(res){
		    	// console.log(res);
		    	let data = JSON.parse(res);
		    	$('#guidelinesmodal-create').modal('hide');
		    	$('#useridCreate').val("");$('#subjectstopassCreate').val("");
		    	if (data.result=="ok") {
		    		setTimeout(function(){
			    		$('#guidelinestable-loading').html('<img src="dist/img/loading1.gif">');
			    		doRenderTable('#guidelines');
			    		swal("Success!", "New guidelines has been created!", "success");
			    	},1000);
		    	}
		    	else{
		    		swal("Error!","Create New Guidelines Failed","error");
		    	}	    	
		    });
		}
		else{
			swal("Error","Please Fill up the form","error");
		}
	});

	$('#guidelinesbtnmodalupdate').on('click',function(e){		
		e.preventDefault();		
		// console.log("updateclicked");
		swal({
		  title: "Are you sure?",
		  text: "You wanna edit this data?",
		  type: "info",
		  showCancelButton: true,
		  confirmButtonColor: "#00c0ef",
		  confirmButtonText: "Yes",
		  cancelButtonText: "No",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
			var subjects_toPass = $('#subjectstopassUpdate').val();
			// console.log(newGuidelines);
			$.ajax({
		        method: "POST",
		        url: "app/models/guidelines.php",
		        data: {
		        	action:'updateguidelines',
		        	id: _EXAMTABLE_SELECTED_ID,
		        	// user_id:newGuidelines.user_id,	            	
		        	subjects_toPass:subjects_toPass	        	
		        	// date:newGuidelines.date 	
		        }
		    }).done(function(res){
		    	let data = JSON.parse(res);
		    	// console.log(res);
		    	$('#guidelinesmodal-update').modal('hide');
		    	// $('#subjectstopassUpdate').val("");
		    	if (data.result=="ok") {
		    		setTimeout(function(){
			    		$('#guidelinestable-loading').html('<img src="dist/img/loading1.gif">');
			    		doRenderTable('#guidelines');
			    		swal("Success!", "Guidelines has been updated!", "success");
			    	},1000);	
		    	}
		    	else{
		    		swal("Error!","Update Guidelines Failed","error");
		    	}	
		    });
		  } else {
			    swal("Cancelled", "Guidelines data is safe :)", "error");
		  }
		});
	});

	$('#guidelinesbtnmodaldelete').on('click',function(){				
		// console.log("delete  clicked");
		swal({
		  title: "Are you sure?",
		  text: "You will not be able to recover this data!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes",
		  cancelButtonText: "No",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
		    $.ajax({
		        method: "POST",
		        url: "app/models/guidelines.php",
		        data: {
		        	action:'deleteguidelines',
		        	id: _EXAMTABLE_SELECTED_ID	
		        }
		    }).done(function(res){
		    	// console.log(res);
		    	$('#guidelinesmodal-delete').modal('hide');
		    	$('#userid').val("");$('#subjectstopass').val("");
		    	$('#createdat').val("");
		    	setTimeout(function(){
		    		$('#guidelinestable-loading').html('<img src="dist/img/loading1.gif">');
		    		doRenderTable('#guidelines');
		    		swal("Deleted!", "The guidelines has been deleted!", "success");
		    	},1000);	    	
		    });
		  } else {
			    swal("Cancelled", "Guidelines data is safe :)", "error");
		  }
		});
		
	});
}

function renderTopicModals(){
	
	$(_TOPICTABLE_SELECTED_ID + 'modal-read').on('show.bs.modal', function (event) {
		// console.log("I'm here " + _EXAMTABLE_SELECTED_ID);
		var modal = $(this);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID);	  
		modal.find('.modal-body').html(topicForm);
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('.modal-body select').attr('disabled','disabled');
  		_TOPICTABLE_DATA.map(function(topicobj){
  			if(topicobj.id===_EXAMTABLE_SELECTED_ID){
  				_SUBJECTTABLE_DATA.map(function(subjectobj){
  					$('#subjectid').append($('<option>').text(subjectobj.name).attr('value', subjectobj.id));
						$("#subjectid option").each(function(i){
				        if (topicobj.subject_id==this.text) {
	  						$(this).attr("selected","selected");
	  					}
				    });
					modal.find('#userid').val(topicobj.user_id);	  									  				
					modal.find('#name').val(topicobj.name);	  									  				
					modal.find('#createdat').val(topicobj.date);
					// console.log(topicobj);
  				});
				return;
  			}
  		});
	});

	$(_TOPICTABLE_SELECTED_ID + 'modal-create').on('show.bs.modal', function (event) {
		var modal = $(this);
		// modal.find('.modal-body').html(topicForm);
		modal.find('#useridCreate').attr('readonly','readonly');
		modal.find('#useridCreate').val(getUID());
		_SUBJECTTABLE_DATA.map(function(subjectobj){
			// modal.find('.modal-body #createdat').val(Date.now());
			// modal.find('#createdat').val(new Date().getTime("Y-m-d H:i:s")).attr('readonly','readonly');
            $('#subjectidCreate').append($('<option>').text(subjectobj.name).attr('value', subjectobj.id));
		});
	});

	$(_TOPICTABLE_SELECTED_ID + 'modal-update').on('show.bs.modal', function (event) {
		var modal = $(this);
		// modal.find('.modal-body').htmUpdatel(topicForm);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID);  
		_SUBJECTTABLE_DATA.map(function(subjectobj){
			modal.find('#subjectidUpdate').append($('<option>').text(subjectobj.name).attr('value', subjectobj.id));
		});
  		_TOPICTABLE_DATA.map(function(topicobj){
  			if(topicobj.id===_EXAMTABLE_SELECTED_ID){
					$("#subjectidUpdate option").each(function(i){
			        if (topicobj.subject_id==this.text) {
  						$(this).attr("selected","selected");
  					}
			    });	  									  				
				modal.find('#nameUpdate').val(topicobj.name);	  									  				
				modal.find('#createdatUpdate').val(topicobj.date);
				// console.log(topicobj);
				return;
  			}
  		});
	});

	$(_TOPICTABLE_SELECTED_ID + 'modal-delete').on('show.bs.modal', function (event) {
		var modal = $(this);
		modal.find('.modal-body').html(topicForm);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID)	  
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('.modal-body select').attr('disabled','disabled');
		_SUBJECTTABLE_DATA.map(function(subjectobj){
			modal.find('#subjectid').append($('<option>').text(subjectobj.name).attr('value', subjectobj.id));
		});
  		_TOPICTABLE_DATA.map(function(topicobj){
  			if(topicobj.id===_EXAMTABLE_SELECTED_ID){
  				$("#subjectid option").each(function(i){
			        if (topicobj.subject_id==this.text) {
  						$(this).attr("selected","selected");
  					}
			    });									  				
				modal.find('#name').val(topicobj.name);	  									  				
				modal.find('#createdat').val(topicobj.date);
				// console.log(topicobj);
				return;
  			}
  		});
	});

	$('#topicbtnmodalcreate').on('click',function(e){	
		e.preventDefault();			
		// console.log("clicked");
		// var newTopic = {
			var subject_id = $('#subjectidCreate').val();
			var name = $('#nameCreate').val();
		// };
		// console.log(newTopic);
		if(subject_id!='' && name!='') {
			$.ajax({
		        method: "POST",
		        url: "app/models/topic.php",
		        data: {
		        	action:'createtopic',        	
		        	subject_id:subject_id,	        	
		        	name:name        
		        }
		    }).done(function(res){
		    	// console.log(res);
		    	let data = JSON.parse(res);
		    	$('#topicmodal-create').modal('hide');
		    	$('#subjectidCreate').val("");$('#nameCreate').val("");
		    	if (data.result=="ok") {
		    		setTimeout(function(){
		    		$('#topictable-loading').html('<img src="dist/img/loading1.gif"><br>Loading....');
			    		doRenderTable('#topic');
			    		swal("Success!", "New topic has been created!", "success");
			    	},1000);
		    	}
		    	else{
		    		swal("Error!","Create New Topic Failed","error");
		    	}	    	
		    });
		}
		else{
			swal("Error","Please Fill up the form","error");
		}
	});
	$('#topicbtnmodalupdate').on('click',function(e){	
		e.preventDefault();			
		// console.log("updateclicked");
		swal({
		  title: "Are you sure?",
		  text: "You wanna edit this data?",
		  type: "info",
		  showCancelButton: true,
		  confirmButtonColor: "#00c0ef",
		  confirmButtonText: "Yes",
		  cancelButtonText: "No",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
			var subject_id = $('#subjectidUpdate').val();
			var name = $('#nameUpdate').val();
			// console.log(newTopic);
			$.ajax({
		        method: "POST",
		        url: "app/models/topic.php",
		        data: {
		        	action:'updatetopic',
		        	id:_EXAMTABLE_SELECTED_ID,        	
		        	subject_id:subject_id,	        	
	        		name:name	
		        }
		    }).done(function(res){
		    	// console.log(res);
		    	let data = JSON.parse(res);
		    	$('#topicmodal-update').modal('hide');
		    	if (data.result=="ok") {
		    		setTimeout(function(){
			    		$('#topictable-loading').html('<img src="dist/img/loading1.gif"><br>Loading....');
			    		doRenderTable('#topic');
			    		swal("Success!", "New topic has been updated!", "success");
			    	},1000);
		    	}
		    	else{
		    		swal("Error!","Update Topic Failed","error");
		    	}	    	
		    });
		  } else {
			    swal("Cancelled", "Topic data is safe :)", "error");
		  }
		});
	});

	$('#topicbtnmodaldelete').on('click',function(){				
		// console.log("delete  clicked");
		swal({
		  title: "Are you sure?",
		  text: "You will not be able to recover this data!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes",
		  cancelButtonText: "No",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
		  	var newTopic = {
				subject_id:$('#subjectid').val(),
				name:$('#name').val(),
			};
		    $.ajax({
		        method: "POST",
		        url: "app/models/topic.php",
		        data: {
		        	action:'deletetopic',
		        	id:_EXAMTABLE_SELECTED_ID,
		        }
		    }).done(function(res){
		    	// console.log(res);
		    	$('#topicmodal-delete').modal('hide');
		    	$('#subjectid').val("");$('#name').val("");
		    	$('#createdat').val("");
		    	setTimeout(function(){
		    		$('#topictable-loading').html('<img src="dist/img/loading1.gif">');
		    		doRenderTable('#topic');
		    		swal("Deleted!", "The topic has been deleted!", "success");
		    	},1000);	    	
		    });
		  } else {
			    swal("Cancelled", "Topic data is safe :)", "error");
		  }
		});
		
	});
}
function renderQuestionModals(){
	
	$(_QUESTIONTABLE_SELECTED_ID + 'modal-read').on('show.bs.modal', function (event) {
		// console.log("I'm here " + _EXAMTABLE_SELECTED_ID);
		var modal = $(this);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID);	  
		modal.find('.modal-body').html(questionForm);
		modal.find('.modal-body textarea').attr('readonly','readonly');
		modal.find('.modal-body select').attr('disabled','disable');
		_TOPICTABLE_DATA.map(function(topicobj){
			$('#topicid').append($('<option>').text(topicobj.name).attr('value', topicobj.id));
		});

  		_SUBJECTTABLE_DATA.map(function(subjectobj){
			$('#subjectid').append($('<option>').text(subjectobj.name).attr('value', subjectobj.id));
		});
  		_QUESTIONTABLE_DATA.map(function(questionobj){
  			if(questionobj.id===_EXAMTABLE_SELECTED_ID){	  	
  				$("#topicid option").each(function(i){
			        if (questionobj.topic_id==this.text) {
  						$(this).attr("selected","selected");
  					}
			    });
			    $("#subjectid option").each(function(i){
		        if (questionobj.subject_id==this.text) {
						$(this).attr("selected","selected");
					}
		    	});
				modal.find('#question').val(questionobj.question);	  									  				
				modal.find('#choice_a').val(questionobj.choice_a);
				modal.find('#choice_b').val(questionobj.choice_b);
				modal.find('#choice_c').val(questionobj.choice_c);
				modal.find('#choice_d').val(questionobj.choice_d);
				modal.find('#answer').val(questionobj.answer);
				modal.find('#reference').val(questionobj.reference);
				// console.log(questionobj);
			}
  		});
	});

	$(_QUESTIONTABLE_SELECTED_ID + 'modal-create').on('show.bs.modal', function (event) {
		var modal = $(this);
		// modal.find('.modal-body').html(questionForm);
		_SUBJECTTABLE_DATA.map(function(subjectobj){
            $('#subjectidCreate').append($('<option>').text(subjectobj.name).attr('value', subjectobj.id));
		});
		_TOPICTABLE_DATA.map(function(topicobj){
            $('#topicidCreate').append($('<option>').text(topicobj.name).attr('value', topicobj.id));
		});
	});

	$(_QUESTIONTABLE_SELECTED_ID + 'modal-update').on('show.bs.modal', function (event) {
		var modal = $(this);
		// modal.find('.modal-body').html(questionForm);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID);  
		_TOPICTABLE_DATA.map(function(topicobj){
			modal.find('#topicidUpdate').append($('<option>').text(topicobj.name).attr('value', topicobj.id));
		});
		_SUBJECTTABLE_DATA.map(function(subjectobj){
			modal.find('#subjectidUpdate').append($('<option>').text(subjectobj.name).attr('value', subjectobj.id));
		});
  		_QUESTIONTABLE_DATA.map(function(questionobj){
  			if(questionobj.id===_EXAMTABLE_SELECTED_ID){
				$("#topicidUpdate option").each(function(i){
			        if (questionobj.topic_id==this.text) {
  						$(this).attr("selected","selected");
  					}
			    });
			    $("#subjectidUpdate option").each(function(i){
			        if (questionobj.subject_id==this.text) {
  						$(this).attr("selected","selected");
  					}
			    });
				modal.find('#questionUpdate').val(questionobj.question);	  									  				
				modal.find('#choice_aUpdate').val(questionobj.choice_a);
				modal.find('#choice_bUpdate').val(questionobj.choice_b);
				modal.find('#choice_cUpdate').val(questionobj.choice_c);
				modal.find('#choice_dUpdate').val(questionobj.choice_d);
				modal.find('#answerUpdate').val(questionobj.answer);
				modal.find('#referenceUpdate').val(questionobj.reference);
				// console.log(questionobj);
				return;
  			}
  		});
	});

	$(_QUESTIONTABLE_SELECTED_ID + 'modal-delete').on('show.bs.modal', function (event) {
		var modal = $(this);
		modal.find('.modal-body').html(questionForm);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID)	  
		modal.find('.modal-body textarea').attr('readonly','readonly');
		modal.find('.modal-body select').attr('disabled','disable');
  		_TOPICTABLE_DATA.map(function(topicobj){
			$('#topicid').append($('<option>').text(topicobj.name).attr('value', topicobj.id));
		});
		
  		_SUBJECTTABLE_DATA.map(function(subjectobj){
			$('#subjectid').append($('<option>').text(subjectobj.name).attr('value', subjectobj.id));
		});
  		_QUESTIONTABLE_DATA.map(function(questionobj){
  			if(questionobj.id===_EXAMTABLE_SELECTED_ID){
				$("#topicid option").each(function(i){
			        if (questionobj.topic_id==this.text) {
  						$(this).attr("selected","selected");
  					}
			    });
			    $("#subjectid option").each(function(i){
		        if (questionobj.subject_id==this.text) {
						$(this).attr("selected","selected");
					}
		    	});
				modal.find('#question').val(questionobj.question);	  									  				
				modal.find('#choice_a').val(questionobj.choice_a);
				modal.find('#choice_b').val(questionobj.choice_b);
				modal.find('#choice_c').val(questionobj.choice_c);
				modal.find('#choice_d').val(questionobj.choice_d);
				modal.find('#answer').val(questionobj.answer);
				modal.find('#reference').val(questionobj.reference);
				// console.log(questionobj);
				return;
  			}
  		});
	});

	$('#questionbtnmodalcreate').on('click',function(){				
		// console.log("clicked");
		var newQuestion = {
			// topic_id:$('#topic_id').val(),
			question:$('#question').val(),
			choice_a:$('#choice_a').val(),
			choice_b:$('#choice_b').val(),
			choice_c:$('#choice_c').val(),
			choice_d:$('#choice_d').val(),
			answer:$('#answer').val(),
			reference:$('#reference').val()
		};
		// console.log(newQuestion);
		$.ajax({
	        method: "POST",
	        url: "app/models/question.php",
	        data: {
	        	action:'createquestion',
	        	// topic_id:newQuestion.topic_id,	        	
	        	question:newQuestion.question,	        	
	        	choice_a:newQuestion.choice_a,	        	
	        	choice_b:newQuestion.choice_b,	        	
	        	choice_c:newQuestion.choice_c,	        	
	        	choice_d:newQuestion.choice_d,	        	
	        	answer:newQuestion.answer,        
	        	reference:newQuestion.reference        
	        }
	    }).done(function(res){
	    	// console.log(res);
	    	// $('#topic_id').val("");
				$('#question').val("");
				$('#choice_a').val("");
				$('#choice_b').val("");
				$('#choice_c').val("");
				$('#choice_d').val("");
				$('#answer').val("");
				$('#reference').val("");
	    	setTimeout(function(){
	    		$('#questiontable-loading').html('<img src="dist/img/loading1.gif"><br>Loading....');
	    		doRenderTable('#question');
	    		swal("Success!", "New question has been created!", "success");
	    	},1000);	    	
	    });
	});
	$('#questionbtnmodalupdate').on('click',function(){				
		// console.log("updateclicked");
		swal({
		  title: "Are you sure?",
		  text: "You wanna edit this data?",
		  type: "info",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes",
		  cancelButtonText: "No",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
			var newQuestion = {
				// topic_id:$('#topic_id').val(),
				question:$('#question').val(),
				choice_a:$('#choice_a').val(),
				choice_b:$('#choice_b').val(),
				choice_c:$('#choice_c').val(),
				choice_d:$('#choice_d').val(),
				answer:$('#answer').val(),
				reference:$('#reference').val()
			};
			// console.log(newQuestion);
			$.ajax({
		        method: "POST",
		        url: "app/models/question.php",
		        data: {
		        	action:'updatequestion',
		        	// topic_id:newQuestion.topic_id,	        	
		        	question:newQuestion.question,	        	
		        	choice_a:newQuestion.choice_a,	        	
		        	choice_b:newQuestion.choice_b,	        	
		        	choice_c:newQuestion.choice_c,	        	
		        	choice_d:newQuestion.choice_d,	        	
		        	answer:newQuestion.answer,        
		        	reference:newQuestion.reference	
		        }
		    }).done(function(res){
		    	// console.log(res);
		    	// $('#topic_id').val("");
				$('#question').val("");
				$('#choice_a').val("");
				$('#choice_b').val("");
				$('#choice_c').val("");
				$('#choice_d').val("");
				$('#answer').val("");
				$('#reference').val("");
		    	setTimeout(function(){
		    		$('#questiontable-loading').html('<img src="dist/img/loading1.gif"><br>Loading....');
		    		doRenderTable('#question');
		    		swal("Success!", "New question has been updated!", "success");
		    	},1000);	    	
		    });
		  } else {
			    swal("Cancelled", "Question data is safe :)", "error");
		  }
		});
	});

	$('#questionbtnmodaldelete').on('click',function(){				
		// console.log("delete  clicked");
		swal({
		  title: "Are you sure?",
		  text: "You will not be able to recover this data!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes",
		  cancelButtonText: "No",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
		  	var newQuestion = {
				user_id:$('#userid').val()
			};
		    $.ajax({
		        method: "POST",
		        url: "app/models/question.php",
		        data: {
		        	action:'deletequestion',
		        	id:_EXAMTABLE_SELECTED_ID,
		        }
		    }).done(function(res){
		    	// console.log(res);
		    	// $('#topic_id').val("");
				$('#question').val("");
				$('#choice_a').val("");
				$('#choice_b').val("");
				$('#choice_c').val("");
				$('#choice_d').val("");
				$('#answer').val("");
				$('#reference').val("");
		    	setTimeout(function(){
		    		$('#questiontable-loading').html('<img src="dist/img/loading1.gif">');
		    		doRenderTable('#question');
		    		swal("Deleted!", "The question has been deleted!", "success");
		    	},1000);	    	
		    });
		  } else {
			    swal("Cancelled", "Question data is safe :)", "error");
		  }
		});
		
	});
}

var _EXAMTABLE_SELECTED_ID=0;
var _SUBJECTTABLE_SELECTED_ID=0;
var _QUESTIONTABLE_SELECTED_ID=0;
var _USERTABLE_SELECTED_ID=0;
var _NEWSTABLE_SELECTED_ID=0;
var _FEEDBACKTABLE_SELECTED_ID=0;
var _GUIDELINESTABLE_SELECTED_ID=0;
var _TOPICTABLE_SELECTED_ID=0;
var _EXAMTABLE_DATA=[];
var _SUBJECTTABLE_DATA=[];
var _QUESTIONTABLE_DATA=[];
var _USERTABLE_DATA=[];
var _NEWSTABLE_DATA=[];
var _FEEDBACKTABLE_DATA=[];
var _GUIDELINESTABLE_DATA=[];
var _TOPICTABLE_DATA=[];
var _QUESTIONTABLE_DATA=[];