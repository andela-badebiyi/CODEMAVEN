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
          likeLink.removeAttr('class', 'fa-heart');
          likeLink.attr('class', 'fa-heart-o');

          likeCount = $('#like-count');
          likeCount.html(parseInt(likeCount.html()) - 1);
        }
        if (result == 2) {
          likeLink.removeAttr('class', 'fa-heart-o');
          likeLink.attr('class', 'fa-heart');

          likeCount = $('#like-count');
          likeCount.html(parseInt(likeCount.html()) + 1);
        }
      }
    });
  });
});
