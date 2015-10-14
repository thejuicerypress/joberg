window.onload = (function(){ 
	var windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
	$(window).scroll(function() { 
		//var shrinkHeader = parseInt($(".banner img").height(),10); 
		if(windowWidth>767){
		  if ( window.pageYOffset > 175) {
			   $('.header-content').addClass('shrink');
			   $(".logo").css("display","none");
			   $(".header-title").css("display","block");
			   $('.banner').css('opacity', (1 - (window.pageYOffset / parseInt(parseInt($(".banner").height())*2-parseInt(window.pageYOffset), 10))));
			}
			else {
				$('.header-content').removeClass('shrink');
				$(".logo").css("display","block");
				$(".header-title").css("display","none");
			}
			if(window.pageYOffset==0){
				$('.banner').css('opacity',1);
			}
		}
	});
function getCurrentScroll() {
    return window.pageYOffset || document.documentElement.scrollTop;
    }
});