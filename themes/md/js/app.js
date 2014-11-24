//app.js

$(".portfolio-post-details").hide();

$("#details-toggle, .staff-work-list li img").click(function(event){
	event.preventDefault();

	$(".portfolio-post-details").slideToggle();

	$("#details-toggle, .portfolio-post-heading").toggleClass("active")

	/*if ($("#details-toggle").html() == "Details +") {
		$("#details-toggle").html("Details -");
	} else {
		$("#details-toggle").html("Details +");
	}*/
	
	//console.log(this);
});


$(".staff-work-list li img").each(function(index) {
   // $(this).delay((index++) * 100).fadeTo(1000, 1); 
});

;(function() {
    // Initialize
    var bLazy = new Blazy();
})();