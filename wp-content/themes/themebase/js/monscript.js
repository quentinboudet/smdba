jQuery(function($) {
$(document).ready(function(){
	
//SLIDER///
	var hs = $("#home_slider");
	var sim = hs.children(".slider_image");
	var imv = sim.children().first();
	var sbt = hs.children(".slider_bouton");
	var bta = sbt.children().first();
	var sliderAutoInter = 0;
	function sliderAuto(){ 
		sliderAutoInter = setInterval(
			function(){
				//imv.children('.slider_texte').hide(function(){

					imv.animate({width:"0"});
					bta.removeClass("active");
					if (imv.next().length) {
						imv = imv.next().animate({width:"100%"});
						bta = bta.next().addClass("active");
					}
					else {
						imv = sim.children().first().animate({width:"100%"});
						bta = sbt.children().first().addClass("active");
					}
				//});
			}, 10000
		);
	}
	sliderAuto();

	sbt.children().click(function(){
		if (!$(this).hasClass("active")){
			bta.removeClass("active");
			//imv.children('.slider_texte').hide();
			imv.animate({width:"0"});
			bta = $(this).addClass("active");
			imv = sim.children().eq(bta.index()).animate({width:"100%"});
			//imv.children('.slider_texte').show();
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