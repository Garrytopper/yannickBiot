var largeurFenetre = $(window).width() ;
var hauteurFenetre = $(window).height() ;
$('body').css('width', largeurFenetre).css('height', hauteurFenetre);
$('body').css('background-size', largeurFenetre/2 );
$('#bureau').hide();

/* chargement de la page effectué */
$(function(){
	
	$('#bureau').css('margin', 'auto');
	$('#bureau').fadeIn(1000);
});