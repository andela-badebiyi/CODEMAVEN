$(document).ready(function() {
	$('.reply-link').click(function() {
		$(this).next().toggle();
		return false;
	});
});

$(document).ready(function() {
  $('#like').click(function(e) {
    e.preventDefault();
    var likeLink = $(this);
    
    $.ajax({
      url: likeLink.attr('href'),
      success: function(result) {
        if (result == 1) {
          likeLink.removeAttr('class', 'fa-thumbs-down');
          likeLink.attr('class', 'fa-thumbs-up');

          likeCount = $('#like-count');
          likeCount.html(parseInt(likeCount.html()) - 1);
        }
        if (result == 2) {
          likeLink.removeAttr('class', 'fa-thumbs-up');
          likeLink.attr('class', 'fa-thumbs-down');

          likeCount = $('#like-count');
          likeCount.html(parseInt(likeCount.html()) + 1);
        }
      }
    });
  });
});