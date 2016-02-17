$(document).ready(function(){
	$('#edit-profile').click(function(){
		console.log('clicked');
		$('input').toggle('slow');
		$('textarea').toggle('show');
		$('p span').toggle();
		$('#upload-button').toggle();

		if ($(this).html() === " Edit Profile") {
			$(this).removeClass('fa-pencil-square-o');
			$(this).addClass('fa-times');
			$(this).html(' Cancel');
		} else {
			$(this).removeClass('fa-times');
			$(this).addClass('fa-pencil-square-o');
			$(this).html(" Edit Profile");
		}
		return false;
	});

	$("#upload-button").click(function(){
	  console.log('clicked');
	  $("#upload").trigger('click');
	  $(this).hide();
	  $('#upload-label').show();
	});

	$( ".dob" ).datepicker({
	dateFormat: "yy-mm-dd"
	});
    
});