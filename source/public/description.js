$(document).ready(function() {
	$('.product--description').each(function(i) {
		$description = $(this);
		var innerContent = $description.html();

		if (innerContent.length > 100) {
			$description.data('fulldescription', $description.html());
			$description.html($description.html().slice(0, 100).trim() + '...');
			$description.parent().append('<a class="read-more" href="#">Läs mer</a>');
		}
	});

	$(document).on('click', '.read-more', function(e) {
		e.preventDefault();

		var $productDescription = $(this).siblings('.product--description');
		var fullDescription = $productDescription.data('fulldescription');
		$productDescription.html(fullDescription);

		$(this).remove();
	});
});

