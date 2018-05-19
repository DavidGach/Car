$(window).on('scroll', function() {
	if($(window).scrollTop() > 30) {
		$('nav').addClass('sticky');
	}
	else {
		$('nav').removeClass('sticky');
	}
})