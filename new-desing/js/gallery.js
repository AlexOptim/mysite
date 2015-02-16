$(document).ready(function() {

$('#front_bottom a').click(function(eventObject) {
	$('#galerry img').hide().attr('src',$(this).attr('href'));
	$('#galerry img').load(function() {
		$(this).fadeIn(1000);
	});
	eventObject.preventDefault();
});

}); //Кінець ready


