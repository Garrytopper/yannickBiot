$('#blocTableau').hide();
/* Etat inital lorsqu'on arrive sur le tableau */
$('#sectionListeComplet').hide()

$(function(){
    $('#blocTableau').fadeIn(1000);
/* partie lié à l'animation du navigateur 
        dashboardMois -> sectionDashboard
        listeCompleteClient  -> sectionListeComplet
*/
    $('#listeCompleteClient').click(function(){
        /*  1) je retire la class="iconeActif" aux autres icone du navigateur
            2) je cache les sections lié aux navigateur qui ne sont pas actif
            3) j'ajoute class="iconeActif" à la nouvelle icone
            4) je fait apparaitre la section active
        */
        $('#dashboardMois').removeClass('iconeActif');
        $('#sectionDashboard').hide();
        $('#listeCompleteClient').addClass('iconeActif');
        $('#sectionListeComplet').show();
    });

    $('#dashboardMois').click(function(){
        $('#listeCompleteClient').removeClass('iconeActif');
        $('#sectionListeComplet').hide();
        $('#dashboardMois').addClass('iconeActif');
        $('#sectionDashboard').show();
    });
});