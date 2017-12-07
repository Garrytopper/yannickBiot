/* avant que le DOM ne soit fini je m'occupe de redimenssioner la taille de #bureau en fonction de la hauteur du navigateur - hauteur du navigateur principal et secondaire cumulé */
var hauteurFenetre = $(window).height();
var hauteurApp = hauteurFenetre - 150;
$('#bureau').css('height', hauteurApp);

$('#listApp').hide();

$('#ixinaApp').hide();
$('.ixinaAppMenu').hide();

/* La fonction qui s'assure que le DOM est bien défini */
$(function(){
    /* partie qui controle l'apparition et la disparition de la liste des applications */
    $('#listApp').delay('100').fadeIn('800').addClass('visible');
    $('.btn').hide().delay('400').fadeIn('200');
    $('#logoCentral').click(function(){
        if ($('#listApp').hasClass('visible')) {
            $('#listApp').fadeOut('800').removeClass('visible');
        }
        else{
            $('#ixinaApp').hide().css('width', '50').css('height', '50');
            $('.ixinaAppMenu').hide();
            $('#listApp').fadeIn('800').addClass('visible');
            $('.btn').hide().delay('400').fadeIn('200');
        };
        
    });
    /* action quand on click sur les App du menu */
    /* IXINA */

    $('#listApp  .btnIxina').click(function(){
        $('#listApp').hide();
        $('#logoCentral').removeClass('btnTellingStory').html('').addClass('btnIxina');
        $('#ixinaApp').fadeIn('200').delay('200').animate({"height": hauteurApp}, 750).animate({"width": "700px"}, 750);
        $('.ixinaAppMenu').delay('2000').fadeIn('200');
    });
    $('#listApp  .btnTellingStory').click(function(){
        $('#listApp').fadeOut('800');
        $('#logoCentral').removeClass('btnIxina').addClass('btnTellingStory').html('Telling Story');
    });
    
});