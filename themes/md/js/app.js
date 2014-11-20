//app.js

$(".portfolio-post-details").hide();

$("#details-toggle").click(function(event){
	event.preventDefault();

	$(".portfolio-post-details").slideToggle();
	if ($("#details-toggle").html() == "Details +") {
		$("#details-toggle").html("Details -");
	} else {
		$("#details-toggle").html("Details +");
	}
	
	console.log(this);
});