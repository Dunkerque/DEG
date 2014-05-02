// lance une fonction lorsque on clique sur un lien appartenant à la classe .main_nav(= menu principal)
// sous firefox on doit preciser le parametre dans la fonction anonyme
$(".main_nav a, .p_register a").click(function(event)
{	// annule l'effet par default d'un clique sur un lien
	event.preventDefault();
	// on recupere l'element cliquer
	var pages = $(this).attr("href");
	// on fait une requete ajax pour charge le module
	$.ajax(pages).done(function(page){
		// on affiche le module 
		$(".content.main_div").html(page);
	});
	// retun false => ie 
	return false;
});             

