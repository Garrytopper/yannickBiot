$('#blocFormulaire').hide();



$(function(){
	$('#blocMenu').animate({'height': hauteurApp/3}, 750).animate({'width': '400px'}, 750, function(){
		$('#blocFormulaire').fadeIn('200');
	}); 
});