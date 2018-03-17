$('#blocDossier').animate({width: '95%'}, 1000, function(){
    $('#pageGauche').fadeIn(1000);
    $('#pageDroite').fadeIn(1000);
});

$(function(){
    $('#bloc2D').dblclick(function(){
        $('#pageGauche').hide(function(){
            $('#pageGaucheCoordonnees').fadeIn(1000);
        });
        $('#pageDroite').hide(function(){
            $('#pageDroiteCoordonnees').fadeIn(1000);
        });
    });
    $('#iconeAnnuler').click(function(){
        $('#pageGaucheCoordonnees').hide(function(){
            $('#pageGauche').fadeIn(1000);
        });  
        $('#pageDroiteCoordonnees').hide(function(){
            $('#pageDroite').fadeIn(1000);
        }); 
    });
    $('#navigationDroiteLogo').click(function(){
        $('#pageGaucheCoordonnees').hide(function(){
            $('#pageGaucheProjet').fadeIn(1000);
        });
        $('#pageDroiteCoordonnees').hide(function(){
            $('#pageDroiteProjet').fadeIn(1000);
        });
    });
});