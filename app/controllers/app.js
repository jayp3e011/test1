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
      for(o in arrofobj[obj])
        html += '<td>'+arrofobj[obj][o]+'</td>';
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
    if(id=='#news')renderNewsModals()
    if(id=='#topic')renderTopicModals()
    if(id=='#feedback')renderFeedbackModals()
    if(id=='#guidelines')renderGuidelinesModals()
}

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
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('#subjectdescription').attr('readonly','readonly');

		_EXAMTABLE_DATA.map(function(examobj){
	  		_SUBJECTTABLE_DATA.map(function(subjectobj){
	  			if(subjectobj.id===_EXAMTABLE_SELECTED_ID){
					modal.find('#subjectname').val(subjectobj.name);
					modal.find('#subjecttimeduration').val(subjectobj.timeduration);
					modal.find('#subjectpassingrate').val(subjectobj.passingrate);
					modal.find('#subjectdescription').val(subjectobj.description);
					modal.find('#subjectattempt').val(subjectobj.attempt);		  									  				
					modal.find('#subjectitems').val(subjectobj.items);		  									  				
					return;
				}
			});
			return;
		});
	});

	$('#subjectbtnmodalcreate').on('click',function(){				
		console.log("clicked");
		var newSubject = {
			name:$('#subjectcreatename').val(),
			timeduration:$('#subjectcreatetimeduration').val(),
			passingrate:$('#subjectcreatepassingrate').val(),
			description:$('#subjectcreatedescription').val(),
			attempt:$('#subjectcreateattempt').val(),
			items:$('#subjectcreateitems').val()
		};
		console.log(newSubject);
		$.ajax({
	        method: "POST",
	        url: "../app/models/subject.php",
	        data: {
	        	action:'createsubject',
	        	name:newSubject.name,	        	
	        	timeduration:newSubject.timeduration,	        	
	        	passingrate:newSubject.passingrate,	        	
	        	description:newSubject.description,	        	
	        	attempt:newSubject.attempt,	        	
	        	items:newSubject.items     	
	        }
	    }).done(function(res){
	    	// console.log(res);
	    	$('#subjectmodal-create').modal('hide');
	    	$('#subjectcreatename').val("");$('#subjectcreatetimeduration').val("");
	    	$('#subjectcreatepassingrate').val("");$('#subjectcreatedescription').val("");
	    	$('#subjectcreateattempt').val("");$('#subjectcreateitems').val("");
	    	setTimeout(function(){
	    		$('#subjecttable-loading').html('<img src="dist/img/loading1.gif">');
	    		doRenderTable('#subject');
	    		swal("Success!", "New subject has been created!", "success");
	    	},1000);	    	
	    });
	});
}
function renderUserModals(){

	$(_USERTABLE_SELECTED_ID + 'modal-read').on('show.bs.modal', function (event) {
		console.log("I'm here " + _EXAMTABLE_SELECTED_ID);
		var modal = $(this);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID)	  
		modal.find('.modal-body input').attr('readonly','readonly');
  		_USERTABLE_DATA.map(function(userobj){
  			if(userobj.id===_EXAMTABLE_SELECTED_ID){
  				var role="Student";
  				if (userobj.isadmin==1) {
  					role="Admin";
  				}
				modal.find('#userfirstname').val(userobj.firstname);
				modal.find('#userlastname').val(userobj.lastname);
				modal.find('#useremail').val(userobj.email);
				modal.find('#userpassword').val(userobj.password);
				modal.find('#userisadmin').val(role);		  									  				
				modal.find('#usercreatedat').val(userobj.createdat);
				console.log(userobj);
				return;
  			}
  		});
	});

	$('#userbtnmodalcreate').on('click',function(){				
		console.log("clicked");
		var newUser = {
			firsname:$('#createuserfirstname').val(),
			lastname:$('#createuserlastname').val(),
			email:$('#createuseremail').val(),
			password:$('#createuserpassword').val(),
			isadmin:$('#createuserisadmin').val(),
			createdat:$('#createusercreatedat').val()
		};
		console.log(newUser);
		$.ajax({
	        method: "POST",
	        url: "../app/models/user.php",
	        data: {
	        	action:'createuser',
	        	firstname:newUser.firstname,	        	
	        	lastname:newUser.lastname,	        	
	        	email:newUser.email,	        	
	        	password:newUser.password,	        	
	        	createdat:newUser.createdat,	        	
	        	isadmin:newUser.isadmin     	
	        }
	    }).done(function(res){
	    	// console.log(res);
	    	$('#usermodal-create').modal('hide');
	    	$('#createuserfirstname').val("");$('#createuserlastname').val("");
	    	$('#createuseremail').val("");$('#createuserpassword').val("");
	    	$('#createusercreatedat').val("");$('#createuserisadmin').val("");
	    	$('#createuserconfirmpassword').val("");
	    	setTimeout(function(){
	    		$('#usertable-loading').html('<img src="dist/img/loading1.gif">');
	    		doRenderTable('#user');
	    		swal("Success!", "New user has been created!", "success");
	    	},1000);	    	
	    });
	});
}

function renderNewsModals(){
	$(_NEWSTABLE_SELECTED_ID + 'modal-read').on('show.bs.modal', function (event) {
		console.log("I'm here " + _EXAMTABLE_SELECTED_ID);
		var modal = $(this);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID)	  
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('#newscontent').attr('readonly','readonly');
  		_NEWSTABLE_DATA.map(function(newsobj){
  			if(newsobj.id===_EXAMTABLE_SELECTED_ID){
  				_USERTABLE_DATA.map(function(userobj){
  					if (userobj.id===newsobj.userid) {
  						modal.find('#newsuserid').val(userobj.firstname.toUpperCase()+' '+userobj.lastname.toUpperCase());
						modal.find('#newsname').val(newsobj.name);
						modal.find('#newscontent').val(newsobj.content);	  									  				
						modal.find('#newscreatedat').val(newsobj.date);
						console.log(newsobj);
						return;
  					}
  				});
				return;
  			}
  		});
	});

	$('#newsbtnmodalcreate').on('click',function(){				
		console.log("clicked");
		var newNews = {
			userid:$('#createnewsuserid').val(),
			name:$('#createnewsname').val(),
			content:$('#createnewscontent').val(),
			date:$('#createnewscreatedat').val()
		};
		console.log(newNews);
		$.ajax({
	        method: "POST",
	        url: "../app/models/news.php",
	        data: {
	        	action:'createnews',
	        	userid:newNews.userid,	        	
	        	name:newNews.name,	        	
	        	content:newNews.content,	        	
	        	date:newNews.date 	
	        }
	    }).done(function(res){
	    	// console.log(res);
	    	$('#newsmodal-create').modal('hide');
	    	$('#createnewsuserid').val("");$('#createnewsname').val("");
	    	$('#createnewscontent').val("");$('#createnewscreatedat').val("");
	    	$('#createnewscreatedat').val("");
	    	setTimeout(function(){
	    		$('#newstable-loading').html('<img src="dist/img/loading1.gif">');
	    		doRenderTable('#news');
	    		swal("Success!", "New news has been created!", "success");
	    	},1000);	    	
	    });
	});
}

function renderFeedbackModals(){
	$(_FEEDBACKTABLE_SELECTED_ID + 'modal-read').on('show.bs.modal', function (event) {
		console.log("I'm here " + _EXAMTABLE_SELECTED_ID);
		var modal = $(this);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID)	  
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('#feedbackcontent').attr('readonly','readonly');
  		_FEEDBACKTABLE_DATA.map(function(feedbackobj){
  			if(feedbackobj.id===_EXAMTABLE_SELECTED_ID){
  				_USERTABLE_DATA.map(function(userobj){
  					if (userobj.id===feedbackobj.user_id) {
  						modal.find('#feedbackuserid').val(userobj.firstname.toUpperCase()+' '+userobj.lastname.toUpperCase());
						modal.find('#feedbackcontent').val(feedbackobj.content);	  									  				
						modal.find('#feedbackcreatedat').val(feedbackobj.date);
						console.log(feedbackobj);
						return;
  					}
  				});
				return;
  			}
  		});
	});

	$('#feedbackbtnmodalcreate').on('click',function(){				
		console.log("clicked");
		var newFeedback = {
			user_id:$('#createfeedbackuserid').val(),
			content:$('#createfeedbackcontent').val(),
			date:$('#createfeedbackcreatedat').val()
		};
		console.log(newFeedback);
		$.ajax({
	        method: "POST",
	        url: "../app/models/feedback.php",
	        data: {
	        	action:'createfeedback',
	        	user_id:newFeedback.user_id,	        	
	        	name:newFeedback.name,	        	
	        	content:newFeedback.content,	        	
	        	date:newFeedback.date 	
	        }
	    }).done(function(res){
	    	// console.log(res);
	    	$('#feedbackmodal-create').modal('hide');
	    	$('#createfeedbackuserid').val("");
	    	$('#createfeedbackcontent').val("");$('#createfeedbackcreatedat').val("");
	    	$('#createfeedbackcreatedat').val("");
	    	setTimeout(function(){
	    		$('#feedbacktable-loading').html('<img src="dist/img/loading1.gif">');
	    		doRenderTable('#feedback');
	    		swal("Success!", "New feedback has been created!", "success");
	    	},1000);	    	
	    });
	});
}

function renderGuidelinesModals(){
	$(_GUIDELINESTABLE_SELECTED_ID + 'modal-read').on('show.bs.modal', function (event) {
		console.log("I'm here " + _EXAMTABLE_SELECTED_ID);
		var modal = $(this);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID)	  
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('#guidelinescontent').attr('readonly','readonly');
  		_GUIDELINESTABLE_DATA.map(function(guidelinesobj){
  			if(guidelinesobj.id===_EXAMTABLE_SELECTED_ID){
				_USERTABLE_DATA.map(function(userobj){
					if (userobj.id===guidelinesobj.user_id) {
						modal.find('#guidelinesuserid').val(userobj.firstname.toUpperCase()+' '+userobj.lastname.toUpperCase());
					modal.find('#guidelinessubjectid').val(subjectobj.name);	  									  				
					modal.find('#guidelinessubjectstopass').val(guidelinesobj.subjects_toPass);	  									  				
					modal.find('#guidelinescreatedat').val(guidelinesobj.date);
					console.log(guidelinesobj);
					return;
					}
				});
				return;
  			}
  		});
	});

	$('#guidelinesbtnmodalcreate').on('click',function(){				
		console.log("clicked");
		var newGuidelines = {
			user_id:$('#createguidelinesuserid').val(),
			subjects_toPass:$('#createguidelinessubjectstopass').val(),
			date:$('#createguidelinescreatedat').val()
		};
		console.log(newGuidelines);
		$.ajax({
	        method: "POST",
	        url: "../app/models/guidelines.php",
	        data: {
	        	action:'createguidelines',
	        	user_id:newGuidelines.user_id,	            	
	        	subjects_toPass:newGuidelines.subjects_toPass,	        	
	        	date:newGuidelines.date 	
	        }
	    }).done(function(res){
	    	// console.log(res);
	    	$('#guidelinesmodal-create').modal('hide');
	    	$('#createguidelinesuserid').val("");$('#createguidelinessubjectstopass').val("");
	    	$('#createguidelinescreatedat').val("");
	    	setTimeout(function(){
	    		$('#guidelinestable-loading').html('<img src="dist/img/loading1.gif">');
	    		doRenderTable('#guidelines');
	    		swal("Success!", "New guidelines has been created!", "success");
	    	},1000);	    	
	    });
	});
}

function renderTopicModals(){
	$(_TOPICTABLE_SELECTED_ID + 'modal-read').on('show.bs.modal', function (event) {
		console.log("I'm here " + _EXAMTABLE_SELECTED_ID);
		var modal = $(this);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID)	  
		modal.find('.modal-body input').attr('readonly','readonly');
  		_TOPICTABLE_DATA.map(function(topicobj){
  			if(topicobj.id===_EXAMTABLE_SELECTED_ID){
  				_SUBJECTTABLE_DATA.map(function(subjectobj){
  					if (subjectobj.id===topicobj.subject_id) {
  						_USERTABLE_DATA.map(function(userobj){
		  					if (userobj.id===topicobj.user_id) {
		  						modal.find('#topicuserid').val(userobj.firstname.toUpperCase()+' '+userobj.lastname.toUpperCase());
								modal.find('#topicsubjectid').val(subjectobj.name);	  									  				
								modal.find('#topicname').val(topicobj.name);	  									  				
								modal.find('#topiccreatedat').val(topicobj.date);
								console.log(topicobj);
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

	$('#topicbtnmodalcreate').on('click',function(){				
		console.log("clicked");
		_SUBJECTTABLE_DATA.map(function(subjectobj){
			$.each(subjectobj, function(i, obj){
                    $('#createtopicsubjectid').append($('<option>').text(obj.name).attr('value', obj.id));
            });
            foreach

		});
		var newTopic = {
			user_id:$('#createtopicuserid').val(),
			subject_id:$('#createtopicsubjectid').val(),
			name:$('#createtopicname').val(),
			date:$('#createtopiccreatedat').val()
		};
		console.log(newTopic);
		$.ajax({
	        method: "POST",
	        url: "../app/models/topic.php",
	        data: {
	        	action:'createtopic',
	        	user_id:newTopic.user_id,	        	
	        	subject_id:newTopic.subject_id,	        	
	        	name:newTopic.name,	        	
	        	date:newTopic.date 	
	        }
	    }).done(function(res){
	    	// console.log(res);
	    	$('#topicmodal-create').modal('hide');
	    	$('#createtopicuserid').val("");
	    	$('#createtopicsubjectid').val("");$('#createtopicname').val("");
	    	$('#createtopiccreatedat').val("");
	    	setTimeout(function(){
	    		$('#topictable-loading').html('<img src="dist/img/loading1.gif"><br>Loading....');
	    		doRenderTable('#topic');
	    		swal("Success!", "New topic has been created!", "success");
	    	},1000);	    	
	    });
	});
}
$('#login-form').on('submit',function(e){
	_USERTABLE_DATA.map(function(userobj){
		if (userobj.email===!$('#email').val()) {}
		if (userobj.password===!md5($('#password').val())) {}
	});
});
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