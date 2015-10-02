//app.js


$("#unconcat").click(function(){
    event.preventDefault ? event.preventDefault() : event.returnValue = false;

    $(".portfolio-content").addClass("active");
    $("#unconcat").hide();

});

