function doRenderTable(id){
	$.ajax({
        method: "POST",
        url: "../app/models/user.php"
    }).done(function(userdata){
    	_USERTABLE_DATA = JSON.parse(userdata);
    	$.ajax({
    		method: "POST";
    		url: "../app/models/feedback.php";
    	}).done(function(feedbackdata)){
    		_NEWSTABLE_DATA = JSON.parse(feedbackdata);
            renderTable(id,feedbackdata,['id', 'user_id', 'feedback', 'date'],['create','read','update','delete']);
    	});	
	});
}
	
$(function () {	
	setTimeout(doRenderTable('#news'),3000);
});

