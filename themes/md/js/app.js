//app.js

    var bLazy = new Blazy({
        breakpoints: [{
            width: 420 // max-width
            ,
            src: 'data-src-small'
        }, {
            width: 768 // max-width
            ,
            src: 'data-src-medium'
        }
       ]
    });



$(".portfolio-post-details").hide();
$(".portfolio-post-heading .staff-work-list, h1.internal").click(function(event) {
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
