$('#navigationDossier').hide();
$('#pageGauche').hide();
$('#pageDroite').hide();
$('#pageOnglet2').hide();
$('#pageOnglet3').hide();
$('#pageOnglet4').hide();
$('#pageOnglet5').hide();
$('#pageOnglet6').hide();
$('#blocDossier').hide();

$(function(){
    $('#blocDossier').fadeIn(200).animate({'width': '1001px'}, 500, function(){
        $('#navigationDossier').fadeIn(150);
        $('#pageGauche').fadeIn(150);
        $('#pageDroite').fadeIn(150);
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