function doRenderTable(id){
	$.ajax({
            method: "POST",
            url: "app/models/user.php"
        }).done(function(userdata){
            _USERTABLE_DATA = JSON.parse(userdata);
            // $.ajax({
            //     method: "POST",
            //     url: "../app/models/topic.php"
            // }).done(function(topicdata){
                // _TOPICTABLE_DATA = JSON.parse(topicdata);
                $.ajax({
                    method: "POST",
                    url: "app/models/subject.php"
                }).done(function(subjectdata){
                    _SUBJECTTABLE_DATA = JSON.parse(subjectdata);
                    $.ajax({
                        method: "POST",
                        url: "app/models/question.php"
                    }).done(function(questiondata){
                        _QUESTIONTABLE_DATA = JSON.parse(questiondata);
                        //renderTable([id],[data],[table columns],[actions])

                        // _SUBJECTTABLE_DATA.map(function(subjectobj){
                        //     $('#subjectid').append($('<option>').text(subjectobj.name).attr('value', subjectobj.id));
                        //     _TOPICTABLE_DATA.map(function(topictobj){
                        //         $('#topicid').append($('<option>').text(topicobj.name).attr('value', topicobj.id));
                        //     });
                        // });
                        
                        renderTable(id,questiondata,['id','subject','topic','question','choice_a','choice_b','choice_c','choice_d','answer','reference'],['create','read','update','delete','import']);
                    });
                });         
            // }); 
        });
}
	
$(function () {	
	setTimeout(doRenderTable('#question'),3000);
});


