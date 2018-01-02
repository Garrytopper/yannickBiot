var largeurFenetre = $(window).width() ;
var hauteurFenetre = $(window).height() ;
$('body').css('width', largeurFenetre).css('height', hauteurFenetre);
$('body').css('background-size', largeurFenetre/2 );
$('.blocInfo').hide();

/* chargement de la page effectué */
$(function(){
    $('a').mouseenter(function(){
        var id = $(this).attr('class');
        $('.blocInfo').hide();
        $('#'+id+'').fadeIn(500);
    }).mouseleave(function(){
        $('.blocInfo').hide();
    });
});