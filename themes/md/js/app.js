//app.js

$(".portfolio-post-details").hide();

$("#details").click(function(event){
	event.preventDefault();

	$(".portfolio-post-details").slideToggle();
	if ($("#details").html() == "Details +") {
		$("#details").html("Details -");
	} else {
		$("#details").html("Details +");
	}
	
	console.log(this);
});