/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	//bind add bg button to media uploader	
	$('.add-page-header-bg').on('click', function(evt) {

		evt.preventDefault();
		
		renderMediaUploader($);

	});
	
	if ($('#case_location_feature_in_homepage').is(':checked')) {
		$('#propel_advance_case-propel-advance-case, #postimagediv, #case_sectordiv').css({
			display: 'none',
		});

		$('.post-type-case_study_home #postdivrich, #case_study_home_cta-welcome-cta').css({
			display: 'block',
		});

	}
	else {
		$('#propel_advance_case-propel-advance-case, #postimagediv, #case_sectordiv').css({
			display: 'block',
		});
		$('.post-type-case_study_home #postdivrich, #case_study_home_cta-welcome-cta').css({
			display: 'none',
		});
	}
	
	//case checkbox
	$('#case_location_feature_in_homepage').change(function() {
		//case hide.show
		if ($('#case_location_feature_in_homepage').is(':checked')) {
			
			$('#propel_advance_case-propel-advance-case, #postimagediv, #case_sectordiv').css({
				display: 'none',
			});
			$('.post-type-case_study_home #postdivrich, #case_study_home_cta-welcome-cta').css({
				display: 'block',
			});
		}else  {
			$('#propel_advance_case-propel-advance-case, #postimagediv, #case_sectordiv').css({
				display: 'block',
			});
			$('.post-type-case_study_home #postdivrich, #case_study_home_cta-welcome-cta').css({
				display: 'none',
			});
		}
	});

} )( jQuery );
