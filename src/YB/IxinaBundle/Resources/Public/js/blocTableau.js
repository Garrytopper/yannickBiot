$('#blocTableau').hide();
$('#sectionDashboardD').hide();
$('.vueS').hide();
$('.moisDernierFoot').hide();
$('.tableau').hide();
$('.vuePortefeuille').hide();
$('#sectionDashboard').show();
/* Etat inital lorsqu'on arrive sur le tableau */
$('#sectionListeComplet').hide()
$('#sectionListeNouveauxDossier').hide();
$('#bilanMoisDernierFoot').hide();


$(function(){
    $('#blocTableau').fadeIn(1000);
/* partie lié à l'animation du navigateur 
        dashboardMois -> sectionDashboard
        listeCompleteClient  -> sectionListeComplet
*/
    $('#dashboardMois').click(function(){
        $('.icone').removeClass('iconeActif');
        $('.tableau').hide();
        $('#dashboardMois').addClass('iconeActif');
        $('#sectionDashboard').show();
        $('#footBlocTableau').show();
    });

    $('#listeCompleteClient').click(function(){
        $('.icone').removeClass('iconeActif');
        $('.tableau').hide();
        $('#listeCompleteClient').addClass('iconeActif');
        $('#sectionListeComplet').show();
        $('#footBlocTableau').hide();
    });

    $('#listeNouveauDossier').click(function(){
        $('.icone').removeClass('iconeActif');
        $('.tableau').hide();
        $('#footBlocTableau').hide();
        $('#listeNouveauDossier').addClass('iconeActif');
        $('#sectionListeNouveauxDossier').show();
    });
    $('.lienMoisPrecedent').click(function(){
        $('.vueP').hide();
        $('.vueS').show();
    });
    $('.lienMoisSuivant').click(function(){
        $('.vueS').hide();
        $('.vueP').show();
    });

    $('#lienPortefeuilleMoisPrecedent').click(function(){
        $('.tableau').hide();
        $('#portefeuilleMoisPrecedent').show();
        $('#foot1').hide();
        $('#bilanMoisDernierFoot').show();
        $('#bilanMoisProchainFoot').hide();
    });
    $('#lienPortefeuilleMoisActuel').click(function(){
        $('.tableau').hide();
        $('#sectionDashboard').show();
        $('#foot1').show();
        $('#bilanMoisDernierFoot').hide();
        $('#bilanMoisProchainFoot').hide();
    });
    $('#lienPortefeuilleMoisProchain').click(function(){
        $('.tableau').hide();
        $('#bilanMoisProchainFoot').show();
        $('#sectionDashboardD').show();
        $('#foot1').hide();
        $('#bilanMoisDernierFoot').hide();
    });

    $('.marqueur').click(function(){
        var id = $(this).attr('id');
        $(".moisDernierFoot").hide();
        $('#remarque'+id+'').show();
    });

});