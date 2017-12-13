/* avant que le DOM ne soit fini je m'occupe de redimenssioner la taille de #bureau en fonction de la hauteur du navigateur - hauteur du navigateur principal et secondaire cumulé */
var hauteurFenetre = $(window).height();
var hauteurApp = hauteurFenetre - 150;
$('#bureau').css('height', hauteurApp);

$('#listApp').hide();

$('#ixinaApp').hide();
    $('.ixinaAppMenu').hide();

$('#ixinaGestionUser').hide();
    $('.ixinaUserMenu').hide();

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
            /* on efface tous les menus */
            $('#ixinaApp').hide().css('width', '50').css('height', '50');
            $('.ixinaAppMenu').hide();
            $('#ixinaGestionUser').hide().css('width', '50').css('height', '50');
            $('.ixinaUserMenu').hide();
            /* on fait apparaitre la liste des applications */
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
    /* IXINA User */
    $('#iconeGestionUser').click(function(){
        /* disparition des éléments du menu */
        $('.ixinaAppMenu').fadeOut('200');
        /* rétrécissement de ixinaMenu et disparition */
        $('#ixinaApp').delay('200').animate({"width": "50px"}, 750, function(){
            $('#ixinaApp').hide();
            /* apparition du menu de gestion des users */
            $('#ixinaGestionUser').css('height', hauteurApp).fadeIn('200').animate({"width": "700px"}, 750);
            /* apparition du menu User */
            $('.ixinaUserMenu').delay('1000').fadeIn('200');
        });
        
    });
    
});