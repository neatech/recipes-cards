$(document).ready( function() {
    $(function() {
        $('.quickFlip').quickFlip();
        $('.quickFlip .front ul li:empty').remove();
        $('ol li span:empty' ).remove();
        $('ol li:empty' ).remove();
        $('button:empty' ).remove();
        $("#accordion").accordion({
            active: false,
            collapsible: false,
            header: "h3",
            heightStyle: "content"
        });
    });
});