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

/*var element = document.getElementById('concat');

var ellipsis = new Ellipsis(element);

ellipsis.calc();
ellipsis.set();*/

$("#unconcat").click(function(){
    event.preventDefault();
    //ellipsis.unset();
    $(".portfolio-content").addClass("active");
    $("#unconcat").hide();

});
/*
var element2 = document.getElementById('concat2');

var ellipsis2 = new Ellipsis(element2);

ellipsis2.calc();
ellipsis2.set();*/

//$(".portfolio-post-details").hide();
$(".portfolio-post-heading .staff-coin-list, h1.internal").click(function(event) {
 //   event.preventDefault();
 //   $(".portfolio-post-details").slideToggle();
 ///   $("#details-toggle, .portfolio-post-heading").toggleClass("active")
    /*if ($("#details-toggle").html() == "Details +") {
		$("#details-toggle").html("Details -");
	} else {
		$("#details-toggle").html("Details +");
	}*/
    //console.log(this);
});
$(".staff-coin-list li img").each(function(index) {
     //$(this).delay((index++) * 100).fadeTo(1000, 1); 
});
