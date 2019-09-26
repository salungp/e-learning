$('#openSidebar').on('click', function (e) {
	$('.sidebar').toggleClass('sidebar-active');
	$('.content-wrapper').toggleClass('content-wrapper-active');
});

$('.form-post-title').on('click', function () {
	$('#form').slideToggle();
});

var current = $('.sidebar-link[href="'+location.href+'"]');
current.addClass('sidebar-link-active');

$('.post-dropdown-btn').on('click', function () {
	let dropdown = $(this).next();
	dropdown.toggle();
});

$('.nav-item').on('click', function (e) {
	e.preventDefault();
	let target = $(this).next();
	target.toggle();
});

$('.openComment').on('click', function (e) {
	e.preventDefault();
	let target = $(this).parents('.post').children('.comment');
	target.slideToggle();
});