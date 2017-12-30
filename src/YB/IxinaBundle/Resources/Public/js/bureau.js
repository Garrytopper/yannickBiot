var largeurFenetre = $(window).width() ;
var hauteurFenetre = $(window).height() ;
$('body').css('width', largeurFenetre).css('height', hauteurFenetre);
$('body').css('background-size', largeurFenetre/2 );
$('#bureau').hide();
$('#blocNote').hide();
$('#blocDossier').hide();
$('#blocTableau').hide();
$('#iconeClientFermer').hide();
$('#iconeTableauFermer').hide();
$('#iconeTacheFermer').hide();
$('#navigationDossier').hide();
$('#pageGauche').hide();
$('#pageDroite').hide();
$('#pageOnglet2').hide();
$('#pageOnglet3').hide();
$('#pageOnglet4').hide();
$('#pageOnglet5').hide();
$('#pageOnglet6').hide();



/* chargement de la page effectué */
$(function(){
	
	$('#bureau').css('margin', 'auto');
	$('#bureau').fadeIn(1000, function(){
        $('#blocNote').fadeIn(200);
    });
    $('#iconeClientAjouter').click(function(){
        $('#blocDossier').fadeIn(200).animate({'width': '1001px'}, 500, function(){
            $('#iconeClientAjouter').fadeOut(150, function(){
                $('#navigationDossier').fadeIn(150);
                $('#pageGauche').fadeIn(150);
                $('#pageDroite').fadeIn(150);
                $('#iconeClientFermer').fadeIn(150);
            });
        });
    });
    $('#iconeClientFermer').click(function(){
        $('#navigationDossier').fadeOut(150);
        $('#pageGauche').fadeOut(150);
        $('#pageDroite').fadeOut(150);
        $('#blocDossier').fadeIn(200).animate({'width': '50px'}, 500, function(){
            $('#iconeClientFermer').fadeOut(150, function(){
                $('#blocDossier').fadeOut(200);
                $('#iconeClientAjouter').fadeIn(150);
            });
        });
    });
    $('#iconeTacheAjouter').click(function(){
        $('#blocNote').animate({'right': '8%'}, 500, function(){
            $('#iconeTacheAjouter').fadeOut(150, function(){
                $('#iconeTacheFermer').fadeIn(150);
            });
        });
    });
    $('#iconeTacheFermer').click(function(){
        $('#blocNote').animate({'right': '-478'}, 500, function(){
            $('#iconeTacheFermer').fadeOut(150, function(){
                $('#iconeTacheAjouter').fadeIn(150);
            });
        });
    });
    $('#iconeTableauConsulter').click(function(){
        $('#blocDossier').hide();
        $('#blocTableau').fadeIn(200, function(){
            $('#iconeTableauConsulter').fadeOut(150, function(){
                $('#iconeTableauFermer').fadeIn(150);
            });
        });
    });
    $('#iconeTableauFermer').click(function(){
        $('#blocTableau').fadeOut(200, function(){
            $('#iconeTableauFermer').fadeOut(150, function(){
                $('#iconeTableauConsulter').fadeIn(150);
            });
        });
    });
    $('#onglet1').click(function(){
        $('#onglet1').addClass("ongletActif");
        $('#pageOnglet1').show();
        $('#onglet2').removeClass("ongletActif");
        $('#pageOnglet2').hide();
        $('#onglet3').removeClass("ongletActif");
        $('#pageOnglet3').hide();
        $('#onglet4').removeClass("ongletActif");
        $('#pageOnglet4').hide();
        $('#onglet5').removeClass("ongletActif");
        $('#pageOnglet5').hide();
        $('#onglet6').removeClass("ongletActif");
        $('#pageOnglet6').hide();
    });
    $('#onglet2').click(function(){
        $('#onglet2').addClass("ongletActif");
        $('#pageOnglet2').show();
        $('#onglet1').removeClass("ongletActif");
        $('#pageOnglet1').hide();
        $('#onglet3').removeClass("ongletActif");
        $('#pageOnglet3').hide();
        $('#onglet4').removeClass("ongletActif");
        $('#pageOnglet4').hide();
        $('#onglet5').removeClass("ongletActif");
        $('#pageOnglet5').hide();
        $('#onglet6').removeClass("ongletActif");
        $('#pageOnglet6').hide();
    });
    $('#onglet3').click(function(){
        $('#onglet3').addClass("ongletActif");
        $('#pageOnglet3').show();
        $('#onglet1').removeClass("ongletActif");
        $('#pageOnglet1').hide();
        $('#onglet2').removeClass("ongletActif");
        $('#pageOnglet2').hide();
        $('#onglet4').removeClass("ongletActif");
        $('#pageOnglet4').hide();
        $('#onglet5').removeClass("ongletActif");
        $('#pageOnglet5').hide();
        $('#onglet6').removeClass("ongletActif");
        $('#pageOnglet6').hide();
    });
    $('#onglet4').click(function(){
        $('#onglet4').addClass("ongletActif");
        $('#pageOnglet4').show();
        $('#onglet1').removeClass("ongletActif");
        $('#pageOnglet1').hide();
        $('#onglet3').removeClass("ongletActif");
        $('#pageOnglet3').hide();
        $('#onglet2').removeClass("ongletActif");
        $('#pageOnglet2').hide();
        $('#onglet5').removeClass("ongletActif");
        $('#pageOnglet5').hide();
        $('#onglet6').removeClass("ongletActif");
        $('#pageOnglet6').hide();
    });
    $('#onglet5').click(function(){
        $('#onglet5').addClass("ongletActif");
        $('#pageOnglet5').show();
        $('#onglet1').removeClass("ongletActif");
        $('#pageOnglet1').hide();
        $('#onglet3').removeClass("ongletActif");
        $('#pageOnglet3').hide();
        $('#onglet4').removeClass("ongletActif");
        $('#pageOnglet4').hide();
        $('#onglet2').removeClass("ongletActif");
        $('#pageOnglet2').hide();
        $('#onglet6').removeClass("ongletActif");
        $('#pageOnglet6').hide();
    });
    $('#onglet6').click(function(){
        $('#onglet6').addClass("ongletActif");
        $('#pageOnglet6').show();
        $('#onglet1').removeClass("ongletActif");
        $('#pageOnglet1').hide();
        $('#onglet3').removeClass("ongletActif");
        $('#pageOnglet3').hide();
        $('#onglet4').removeClass("ongletActif");
        $('#pageOnglet4').hide();
        $('#onglet5').removeClass("ongletActif");
        $('#pageOnglet5').hide();
        $('#onglet2').removeClass("ongletActif");
        $('#pageOnglet2').hide();
    });
});