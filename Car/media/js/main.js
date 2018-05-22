$(document).ready(function() {

	$(window).on('scroll', function() {
		if($(window).scrollTop() > 30) {
			$('nav').addClass('sticky');
		}
		else {
			$('nav').removeClass('sticky');
		}
	});

	$('.logo').click(function(event) {
   		event.preventDefault();
  		$('html, body').animate({ scrollTop: $('header').offset().top });
  		$('.menu').removeClass('active');
  		$('body').removeClass('red');
  		$('.close').hide();
  		$('.open').show();
	});

	$('#home-link').click(function(event) {
   		event.preventDefault();
  		$('html, body').animate({ scrollTop: $('header').offset().top });
  		$('.menu').removeClass('active');
  		$('body').removeClass('red');
  		$('.close').hide();
  		$('.open').show();
	});

	$('#services-link').click(function(event) {
   		event.preventDefault();
  		$('html, body').animate({ scrollTop: $('#services').offset().top });
  		$('.menu').removeClass('active');
  		$('body').removeClass('red');
  		$('.close').hide();
  		$('.open').show();
	});

	$('#contact-link').click(function(event) {
   		event.preventDefault();
  		$('html, body').animate({ scrollTop: $('#contact').offset().top });
  		$('.menu').removeClass('active');
  		$('body').removeClass('red');
  		$('.close').hide();
  		$('.open').show();
	});

	$('.close').hide();

	$('.open').on('click', function() {
		$('.open').hide();
		$('.close').show();
		$('.menu').addClass('active');
		$('body').addClass('red');
	});

	$('.close').on('click', function() {
		$('.close').hide();
		$('.open').show();
		$('.menu').removeClass('active');
		$('body').removeClass('red');
	});

	function animate() {

		requestAnimationFrame(animate);

		$('.trees').animate({
			'background-position-x': '+=3px'
		}, 0);

		$('.mountains').animate({
			'background-position-x': '+=2px'
		}, 0);
	}

	$('#name').on("invalid", function() {
		$('.name').text("Please write your name");
	});

	$('#name').on("input", function() {
		$('.name').text('');
	});

	$('#email').on("invalid", function() {
		$('.email').text("Please write your email");
	});

	$('#email').on("input", function() {
		$('.email').text('');
	});

	$('#subject').on("invalid", function() {
		$('.subject').text("Please write subject");
	});

	$('#subject').on("input", function() {
		$('.subject').text('');
	});

	$('textarea').on("invalid", function() {
		$('.text').text("Please write text");
	});

	$('textarea').on("input", function() {
		$('.text').text('');
	});

	$('#male').on("invalid", function() {
		$('.gender').text("Please choose your gender");
	});

	$('#male').on("input", function() {
		$('.gender').text('');
	});

	$('#female').on("invalid", function() {
		$('.gender').text("Please choose your gender");
	});

	$('#female').on("input", function() {
		$('.gender').text('');
	});

	animate();
});
