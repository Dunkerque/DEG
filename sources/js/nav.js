$(".main_nav a").click(function()
{
	var pages = $(this).attr("href");
	$.ajax(pages).done(function(page){
		$(".content.main_div").html(page);
	});
	event.preventDefault();
	return false;
});