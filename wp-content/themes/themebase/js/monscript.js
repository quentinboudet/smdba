jQuery(function($) {
$(document).ready(function(){
	
//SLIDER///
	var temps = 700;
	var hs = $("#home_slider");
	var sim = hs.children(".slider_image").children();
	var imv = sim.first();
	var sbt = hs.children(".slider_bouton").children();
	var bta = sbt.first();
	var sliderAutoInter = 0;
	function sliderAuto(){ 
		sliderAutoInter = setInterval(
			function(){
				//imv.children('.slider_texte').hide(function(){

					//imv.animate({left:"100%"});
					bta.removeClass("active");
					if (imv.next().length) {
						imv = imv.next().animate({left:"0%"}, temps);
						bta = bta.next().addClass("active");
					}
					else {
						sim.slice(1).animate({left:"100%"}, temps);
						imv = sim.first();
						bta = sbt.first().addClass("active");
					}
				//});
			}, 1000
		);
	}
	sliderAuto();

	sbt.click(function(){
		var btc = $(this);
		if (!$(this).hasClass("active")){
			bta.removeClass("active");

			if(bta.index() < btc.index())
				sim.slice(0, btc.index()+1).animate({left:"0%"}, temps);
			else
				sim.slice(btc.index()+1).animate({left:"100%"}, temps);

			imv = sim.eq(btc.index());
			bta = btc.addClass("active");
		}

	});
	hs.hover(function(){
		window.clearInterval(sliderAutoInter);
	},function(){
		window.clearInterval(sliderAutoInter);
		sliderAuto();
	});

	$(window).focus(function() {
		window.clearInterval(sliderAutoInter);
		sliderAuto();
	}).blur(function() {
		window.clearInterval(sliderAutoInter);
	});

}); 
});