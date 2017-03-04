$(function () {
	$('#examSheet').hide();
	$('#countdown').hide();
	// var user_id = $('#user_id').val();
	var user_id = 1;

	// Instance the tour
	var tour = new Tour({
	  steps: [
	  {
	    element: "#sheet",
	    placement: "top",
	    title: "Check Boxes",
	    content: "click diri sa baba para mag answer..."
	  },
      {
	    element: "#submit",
	    title: "Submit Here",
	    placement: "left",
	    content: "click diri pag na answer na tanan"
	  }  
	],
	  backdrop: true,
	  storage: false,
	  smartPlacement: true,
	  onEnd : function(tour){
	  	alert('time starts here');
		$('#countdown').show();
        timedCount();
    	}
	});

	tour.init();

	$.ajax({
        method: "POST",
        url: "../models/subject.php",
        data: {}
	}).done(function(subjectdata){
		_SUBJECTTABLE_DATA = JSON.parse(subjectdata);
		$.ajax({
	        method: "POST",
	        url: "../models/exam.php",
	        data: {}
		}).done(function(examdata){
			_EXAMTABLE_DATA = JSON.parse(examdata);
			_SUBJECTTABLE_DATA.map(function(subjectobj){
				$('#subject_id').append($('<option>').text(subjectobj.name).attr('value', subjectobj.id));
				_EXAMTABLE_DATA.map(function(examobj){
					$('#sel').hide();
					// console.log(user_id+'___'+examobj.user_id+'___'+examobj.subject_id+'___'+subjectobj.id);
					$("#subject_id option").each(function(i){
			        	if (user_id==examobj.user_id && this.value==examobj.subject_id) {
							$(this).text(subjectobj.name+' --Already Taken').attr('disabled', 'disabled');
						}
				    });
					
				});
			});
		});
	});
	
	function doRenderSubject(subjectid){
		$.ajax({
	        method: "POST",
	        url: "../models/subject.php",
	        data: {}
		}).done(function(subjectdata){
			_SUBJECTTABLE_DATA = JSON.parse(subjectdata);
			_SUBJECTTABLE_DATA.map(function(subjectobj){
				if (subjectobj.id===subjectid) {
	    			$('#subjecttitle').html(subjectobj.name);
		    		$('#subjectdesc').html(
		    			'Description: ' + subjectobj.description + '<br/>' +
		    			'Time duration: ' + subjectobj.timeduration + '<br/>' +
		    			'Passing Rate: ' + subjectobj.passingrate + '<br/>' +
		    			'No. of attempts: ' + subjectobj.attempt + '<br/>' +
		    			'No. of items: ' + subjectobj.items + '<br/>'
		    		);
	    		}
			});
    		
		});
		$.ajax({
	        method: "POST",
	        url: "../models/exam.php",
	        data:{'subjectid':subjectid,'action':'getquestions'}
    	}).done(function(questions){
    		// console.log(questions);
    		// $('#subjectdesc').html(getSubjectDesc(subjectid));
    		quest = JSON.parse(questions);
    		// console.log(quest)
    		html = "";
    		var i = 1;
    		for(q in quest){
    			html += '<tr>';
    			html += '<td><div style="position: absolute;margin-left: 7px;margin-top:1px;">A</div><input type="radio" name="item'+i+'" /></td>';
    			html += '<td><div style="position: absolute;margin-left: 7px;margin-top:1px;">B</div><input type="radio" name="item'+i+'" /></td>';
    			html += '<td><div style="position: absolute;margin-left: 7px;margin-top:1px;">C</div><input type="radio" name="item'+i+'" /></td>';
    			html += '<td><div style="position: absolute;margin-left: 7px;margin-top:1px;">D</div><input type="radio" name="item'+i+'" /></td>';
    			html += '<td style="text-align: center;">'+ i++ +'</td>';
    			html += '<td>';
    			html += quest[q].question;
    			html += '<br>A. ' + quest[q].choice_a;
    			html += '<br>B. ' + quest[q].choice_b;
    			html += '<br>C. ' + quest[q].choice_c;
    			html += '<br>D. ' + quest[q].choice_d;
    			html += '</td>';
    			html += '</tr>';
    		}
    		$('#items').html(html);
			$('input[type=radio]').iCheck({
				checkboxClass: 'icheckbox_square-green',
				radioClass: 'iradio_square-green',
		    		increaseArea: '20%' // optional
		    });
		    $('#table-loading').hide();
			tour.start();
    	});
	}
	
	function getSubjectInfo(subjectid){
		$.ajax({
	        method: "POST",
	        url: "../models/subject.php",
	        data: {}
		}).done(function(subjectdata){
			_SUBJECTTABLE_DATA = JSON.parse(subjectdata);
			return info = _SUBJECTTABLE_DATA.map(function(studentobj){
				if(studentobj.id==subjectid){				
					return studentobj;
				}
			})[0];
		});
		 		
	}

	
	$('#takeExam').on('click', function(){
		var subject_id = $('#subject_id').val();
		$('#examSheet').show();
		$('#select_subject').hide();
		setTimeout(doRenderSubject(subject_id),1000);
	});

	
	var time_limit = 1*60;
	var c = time_limit;
	var t;
    
    function timedCount() {
    	var hours = parseInt( c / 3600 ) % 24;
    	var minutes = parseInt( c / 60 ) % 60;
    	var seconds = c % 60;
    	var result = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds  < 10 ? "0" + seconds : seconds);
    	$('#tiles').html(result);
    	// console.log(c+"__"+time_limit);
	    if ( c < ( time_limit / 2 ) )  {
	     $( '#tiles' ).removeClass('color-full');
	     $( '#tiles' ).addClass('color-half');

			} 
	    if ( c < ( time_limit / 4 ) )  {
	    	$( '#tiles' ).removeClass('color-half');
	    	$( '#tiles' ).addClass('color-empty');
	    }
        if(c == 0 ){
        	alert( 'done exam...do things here' );
            $("#submit").submit();
            location.reload();
        }
        c = c - 1;
        t = setTimeout(function(){ timedCount() }, 1000);
    }
var _SUBJECTTABLE_DATA = [];
var _EXAMTABLE_DATA = [];

});
