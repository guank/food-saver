$(document).ready(function(){
	$('#book-grid').dataTable({
		"jQueryUI": true,
		'searching': false,
		'order': [[4, 'desc']]
	});
	$('body').removeClass('jsOff').addClass('jsOn');

$('#tabs a').on('click', function(e){
	e.preventDefault();
	$('#tabs a.current').removeClass('current');
	$('.tab-section:visible').hide();
	$(this.hash).show();
	$(this).addClass('current');
}).filter(':first').click();


});