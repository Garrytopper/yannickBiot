var largeurFenetre = $(window).width() ;
var hauteurFenetre = $(window).height() ;
$('body').css('width', largeurFenetre).css('height', hauteurFenetre);
$('body').css('background-size', largeurFenetre/2 );
$('#bureau').hide();
$('#blocNote').hide();
$('#blocDossier').hide();
$('#iconeClientFermer').hide();
$('#iconeTacheFermer').hide();


/* chargement de la page effectué */
$(function(){
	
	$('#bureau').css('margin', 'auto');
	$('#bureau').fadeIn(1000, function(){
        $('#blocNote').fadeIn(200);
    });
    $('#iconeClientAjouter').click(function(){
        $('#blocDossier').fadeIn(200).animate({'width': '1001px'}, 1000, function(){
            $('#iconeClientAjouter').fadeOut(150, function(){
                $('#iconeClientFermer').fadeIn(150);
            });
        });
    });
    $('#iconeClientFermer').click(function(){
        $('#blocDossier').fadeIn(200).animate({'width': '50px'}, 1000, function(){
            $('#iconeClientFermer').fadeOut(150, function(){
                $('#blocDossier').fadeOut(200);
                $('#iconeClientAjouter').fadeIn(150);
            });
        });
    });
    $('#iconeTacheAjouter').click(function(){
        $('#blocNote').animate({'right': '8%'}, 1000, function(){
            $('#iconeTacheAjouter').fadeOut(150, function(){
                $('#iconeTacheFermer').fadeIn(150);
            });
        });
    });
    $('#iconeTacheFermer').click(function(){
        $('#blocNote').animate({'right': '-478'}, 1000, function(){
            $('#iconeTacheFermer').fadeOut(150, function(){
                $('#iconeTacheAjouter').fadeIn(150);
            });
        });
    });
});