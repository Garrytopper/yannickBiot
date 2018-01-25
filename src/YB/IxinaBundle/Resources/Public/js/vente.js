$('#formVerif').hide(function(){
    $('#formVerifNavSuivant').hide();
    $('#formVerifNavRetour').hide();
});
$('#formSuivi').hide(function(){
    $('#formSuiviNavRetour').hide();
});
$('#champRelCheque').hide();

$(function(){
    $('#formVenteNavSuivant').click(function(){
        $('#formVente').hide();
        $('#formVenteNavSuivant').hide();
        $('#formVerif').show();
        $('#formVerifNavSuivant').show();
        $('#formVerifNavRetour').show();
    });
    $('#formVerifNavRetour').click(function(){
        $('#formVerif').hide();
        $('#formVerifNavSuivant').hide();
        $('#formVerifNavRetour').hide();
        $('#formVente').show();
        $('#formVenteNavSuivant').show();
    });
    $('#formVerifNavSuivant').click(function(){
        $('#formVerif').hide();
        $('#formVerifNavSuivant').hide();
        $('#formVerifNavRetour').hide();
        $('#formSuivi').show();
        $('#formSuiviNavRetour').show();
    });
    $('#formSuiviNavRetour').click(function(){
        $('#formSuivi').hide();
        $('#formSuiviNavRetour').hide();
        $('#formVerif').show();
        $('#formVerifNavSuivant').show();
        $('#formVerifNavRetour').show();
    });
    // partie pour le suivi de la vente 
    $('#relCheque').click(function(){
        if($('#champRelCheque').hasClass('actif'))
        {
            $('#champRelCheque').animate({'height': '10px'}, 500, function(){
                $('#champRelCheque').removeClass('actif');
                $('#champRelCheque').hide();
            });

        }
        else
        {
            $('#champRelCheque').show(function(){
            $('#champRelCheque').animate({'height': '100px'}, 500);
            $('#champRelCheque').addClass('actif');
            });
        }
        
    });
});