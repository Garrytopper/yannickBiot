
$(function (){
    $('#menuPreparation').click(function(){
        $('.men1').removeClass('ongletActif');
        $('#menuPreparation').addClass('ongletActif');
        $('.bulle').hide();
        $('.sectionPhoto').hide();
        $('.bubulePreparation').show();
        $('#imagePreparation').show();
    });

        $('#bullePreparation').click(function(){
            $('.sectionPhoto').hide();
            $('#imagePreparation').show();
        });
        $('#bullePreparationSimon').click(function(){
            $('.sectionPhoto').hide();
            $('#imagePreparationSimon').show();
        });
        $('#bullePreparationAguilar').click(function(){
            $('.sectionPhoto').hide();
            $('#imagePreparationAguilar').show();
        });
        $('#bullePreparationCuddy').click(function(){
            $('.sectionPhoto').hide();
            $('#imagePreparationCuddy').show();
        });

    $('#menuAccueil').click(function(){
        $('.men1').removeClass('ongletActif');
        $('#menuAccueil').addClass('ongletActif');
        $('.bulle').hide();
        $('.sectionPhoto').hide();
        $('.bubuleAccueil').show();
        $('#imageAccueil').show();
    });

        $('#bulleAccueil').click(function(){
            $('.sectionPhoto').hide();
            $('#imageAccueil').show();
        });
        $('#bulleAccueilOne').click(function(){
            $('.sectionPhoto').hide();
            $('#imageAccueilOneMinute').show();
        });
        $('#bulleAccueilValeurs').click(function(){
            $('.sectionPhoto').hide();
            $('#imageAccueilValeurs').show();
        });
       $('#bulleAccueilEtat').click(function(){
            $('.sectionPhoto').hide();
            $('#imageAccueilEtat').show();
        });
       $('#bulleAccueilCongruence').click(function(){
            $('.sectionPhoto').hide();
            $('#imageAccueilCongruence').show();
        });
       $('#bulleAccueilAttente').click(function(){
            $('.sectionPhoto').hide();
            $('#imageAccueilAttente').show();
        });

    $('#menuDecouverte').click(function(){
        $('.men1').removeClass('ongletActif');
        $('#menuDecouverte').addClass('ongletActif');
        $('.bulle').hide();
        $('.sectionPhoto').hide();
        $('.bubuleDecouverte').show();
        $('#imageDecouverte').show();
    });

        $('#bulleDecouverte').click(function(){
            $('.sectionPhoto').hide();
            $('#imageDecouverte').show();
        })
        $('#bulleDecouverte1').click(function(){
            $('.sectionPhoto').hide();
            $('#imageDecouverte1').show();
        });
        $('#bulleDecouverteSoncas').click(function(){
            $('.sectionPhoto').hide();
            $('#imageDecouverteSoncas').show();
        });

    $('#menuDessin').click(function(){
        $('.men1').removeClass('ongletActif');
        $('#menuDessin').addClass('ongletActif');
        $('.bulle').hide();
        $('.sectionPhoto').hide();
        $('.bubuleDessin').show();
        $('#imageDessin').show();
    });

        $('#bulleDessin').click(function(){
            $('.sectionPhoto').hide();
            $('#imageDessin').show();
        });

    $('#menuRecommander').click(function(){
        $('.men1').removeClass('ongletActif');
        $('#menuRecommander').addClass('ongletActif');
        $('.bulle').hide();
        $('.sectionPhoto').hide();
        $('.bubuleReco').show();
        $('#imageReco').show();
    });

        $('#bulleReco').click(function(){
            $('.sectionPhoto').hide();
            $('#imageReco').show();
        })

    $('#menuConclusion').click(function(){
        $('.men1').removeClass('ongletActif');
        $('#menuConclusion').addClass('ongletActif');
        $('.bulle').hide();
        $('.sectionPhoto').hide();
        $('.bubuleConclusion').show();
        $('#imageConclusion').show();
    });

    $('#bulleConclusion').click(function(){
            $('.sectionPhoto').hide();
            $('#imageConclusion').show();
        })

    $('#menuObjections').click(function(){
        $('.men1').removeClass('ongletActif');
        $('#menuObjections').addClass('ongletActif');
        $('.bulle').hide();
        $('.sectionPhoto').hide();
    });

});