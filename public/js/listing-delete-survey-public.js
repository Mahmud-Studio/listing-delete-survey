(function( $ ) {
	jQuery(".rtcl-delete-listing").hide().after('<a href data-toggle="modal" data-target="#takeASurvey" class="btn btn-danger btn-sm delete-survey">Delete</a>');

	$(".delete-survey").on('click', function (e) {
		e.preventDefault();

		localStorage.setItem('data-id', $(this).siblings().attr('data-id'))
		console.log(localStorage.getItem('data-id'));
	})

	$('#survey-submit-btn').on('click', function(e){
		e.preventDefault();

		let id = localStorage.getItem('data-id');
		let surveyData = jQuery('#surveyForm').serializeArray()[0].value;
		$(`.rtcl-delete-listing[data-id=${id}]`).click();
		var data = {
			action: 'listing_survey_data',
			post_id: id,
			survey_data: surveyData
		};
		$.post(ajax_object.ajax_url, data,
			function (data, textStatus, jqXHR) {
				console.log(data);
			},
			"dataType"
		);
	})


})( jQuery );
