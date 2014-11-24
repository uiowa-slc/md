//app.js

$(".portfolio-post-details").hide();

$("#details-toggle").click(function(event){
	event.preventDefault();

	$(".portfolio-post-details").slideToggle();

	$("#details-toggle").toggleClass("active")

	/*if ($("#details-toggle").html() == "Details +") {
		$("#details-toggle").html("Details -");
	} else {
		$("#details-toggle").html("Details +");
	}*/
	
	//console.log(this);
});

/*$(".staff-work-list li").each(function(index) {
	$(this).hide();
});

$(".staff-work-list li").each(function(index) {
    $(this).delay(400*index).fadeIn(300).rotate({duration:1500, angle: 180, animateTo:0});
});*/