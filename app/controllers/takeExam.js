$(function () {
	

	$.ajax({
        method: "POST",
        url: "../models/subject.php",
        data: {}
	}).done(function(subjectdata){
		var _SUBJECTTABLE_DATA = JSON.parse(subjectdata);
		_SUBJECTTABLE_DATA.map(function(subjectobj){
			$('#subject_id').append($('<option>').text(subjectobj.name).attr('value', subjectobj.id));
		});
	});
	
	function doRenderSubject(subjectid){
		$.ajax({
	        method: "POST",
	        url: "../models/exam.php",
	        data:{'subjectid':subjectid,'action':'getquestions'}
    	}).done(function(questions){
    		// console.log(questions);
    		var subjectinfo = getSubjectInfo(subjectid);
    		// console.log(subjectinfo);
    		$('#subjecttitle').html(subjectinfo.name);
    		$('#subjectdesc').html(
    			'Description: ' + subjectinfo.description + '<br/>' +
    			'Time duration: ' + subjectinfo.timeduration + '<br/>' +
    			'Passing Rate: ' + subjectinfo.passingrate + '<br/>' +
    			'No. of attempts: ' + subjectinfo.attempt + '<br/>' +
    			'No. of items: ' + subjectinfo.items + '<br/>'
    		);
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
    	});
	}
	
	function getSubjectInfo(subjectid){
		 return info = _SUBJECTTABLE_DATA.map(function(studentobj){
			if(studentobj.id==subjectid){				
				return studentobj;
			}
		})[0];		
	}

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
        timedCount();
    	}
	});

	tour.init();
	$('#takeExam').on('click', function(){

	});

	tour.start();
	var time_limit = 1*60;
	var c = time_limit;
	var t;
    var target_date = new Date().getTime() + (c * 1000);
    
    function timedCount() {
    	var current_date = new Date().getTime();
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
        	alert( 'done exam...do thing here' );
            $("#submit").submit();
        }
        c = c - 1;
        t = setTimeout(function(){ timedCount() }, 1000);
    }

});
