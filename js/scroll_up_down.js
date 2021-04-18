$(document).ready(function(){
    var step = 25;
    var scrolling = false;
    // Wire up events for the 'scrollUp' link:
    $("#scrollDown").on('click', function (event) {
        event.preventDefault();
        // Animates the scrollTop property by the specified
        // step.
        $('#scroll_items').animate({
            scrollTop: "-=" + step + "px"
        });
        scrolling = true;
        scrollContent("up");
    }).on('click', function (event) {
        scrolling = true;
        scrollContent("up");
    }).on('mouseout', function (event) {
        scrolling = false;
    });
    
    
    $("#scrollUp").on('click', function (event) {
        event.preventDefault();
        $('#scroll_items').animate({
            scrollTop: "+=" + step + "px"
        });
        scrolling = true;
        scrollContent("down");
    }).on('click', function (event) {
        scrolling = true;
        scrollContent("down");
    }).on('mouseout', function (event) {
        scrolling = false;
    });
    
    function scrollContent(direction) {
        var amount = (direction === "up" ? "-=1px" : "+=1px");
        $('#scroll_items').animate({
            scrollTop: amount
        }, 1, function () {
            if (scrolling) {
                scrollContent(direction);
            }
        });
    }
    });