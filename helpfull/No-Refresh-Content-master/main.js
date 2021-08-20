$(document).ready(function() {
	//initial
	$('#content').load('content/index.php');

	//handle menu clicks
	$('nav li a').click(function(){
		var page = $(this).attr('href');
		$('#content').load('content/' + page + '.php');
		return false;
	});

});