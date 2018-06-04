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
    $('#bulleMenu').click(function(){
        if ($('#bulleMenu').hasClass('ouvert')) {
            $('#bulleMenu').removeClass('ouvert');
            $('#bulleMenu').animate({top: '-75'}, 1000, function(){});
        }
        else {
            $('#bulleMenu').animate({top: '0'}, 1000, function(){});
            $('#bulleMenu').addClass('ouvert');
        };
    });
    $('#bulleBloc').click(function(){
        $('#feuilleDeBloc').show(500, function(){
            $('#feuilleDeBloc').animate({width: '88%'}, 1000, function(){});
        });
    });
    $('#feuilleDeBloc').click(function(){
        $('#feuilleDeBloc').animate({width: '2%'}, 1000, function(){
            $('#feuilleDeBloc').hide(500);
        });
    });
});