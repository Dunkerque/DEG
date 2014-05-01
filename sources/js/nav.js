// lance une fonction lorsque on clique sur un lien appartenant à la classe .main_nav(= menu principal)
$(".main_nav a").click(function()
{	// on recupere l'element cliquer
	var pages = $(this).attr("href");
	// on fait une requete ajax pour charge le module
	$.ajax(pages).done(function(page){
		// on affiche le module 
		$(".content.main_div").html(page);
	});
	// annule l'effet par default d'un clique sur un lien
	// retun false => ie 
	event.preventDefault();
	return false;
});