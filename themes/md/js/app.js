//app.js


$("#details").click(function(){
	
	$(".portfolio-post-details").toggleClass("show hide");
	if ($("#details").html() == "Details +") {
		$("#details").html("Details -");
	} else {
		$("#details").html("Details +");
	}
	
	
	
	
	console.log(this);
});