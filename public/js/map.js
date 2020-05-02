var resizeCallback = function() {
    $('#map_content').height($(window).height()+'px');
    $('#map_content').width($(window).width()+'px');
};
$( window ).resize(resizeCallback);
$( document ).ready(resizeCallback);