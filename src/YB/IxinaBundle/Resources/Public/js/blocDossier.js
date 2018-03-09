$('#pageGauche').hide();
$('#pageDroite').hide();
$('#blocDossier').animate({width: '95%'}, 1000, function(){
    $('#pageGauche').fadeIn(1000);
    $('#pageDroite').fadeIn(1000);
});

$(function(){
    
});