function doRenderTable(id){
	$.ajax({
        method: "POST",
        url: "../app/models/user.php"
    }).done(function(userdata){
         console.log("tang ina1");
    	_USERTABLE_DATA = JSON.parse(userdata);
    	$.ajax({
    		method: "POST",
    		url: "../app/models/subject.php"
    	}).done(function(subjectdata){
    		_SUBJECTTABLE_DATA = JSON.parse(subjectdata);
            console.log("tang ina2");
            $.ajax({
                method: "POST",
                url: "../app/models/topic.php"
            }).done(function(topicdata){
                _TOPICTABLE_DATA = JSON.parse(topicdata);
                renderTable(id,topicdata,['id', 'user_id', 'subject_id', 'name', 'date'],['create','read','update','delete']); 
                console.log("tang ina3");
            });
    	});
	});
}
	
$(function () {	
	setTimeout(doRenderTable('#topic'),3000);
    console.log("wew pota");
});
