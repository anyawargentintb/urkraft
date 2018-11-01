<script>
	jQuery(document).ready( function($) {
		$(".readmore-link").click(function() {
			event.preventDefault();
			getSingle();
		});

		$(".popuppost-wrapper").on('click', function(e) {
			if (e.target !== this)
				return;

			$(".popuppost-wrapper").css("overflow", "hidden");
			$(".popuppost-wrapper").fadeOut();
			$(".popuppost-wrapper").fadeOut();
			history.pushState(null, '', '/urkraft/');
			$("html").css("overflow", "scroll");
		});

		function getSingle(e)  {
			var target = event.currentTarget;
			var postUrl = $(target).attr('href');
			//var postId = postUrl.split('=').pop();
			$.ajax({
				type: 'POST',
				url: '<?php echo admin_url("admin-ajax.php"); ?>',
				data: {
					'postUrl' : postUrl,
					//'postId' : postId,
					'action': 'get_single_ur' //this is the name of the AJAX method called in WordPress
				}, 
				success: function (result) {
					window.scrollTo(0, 0);
					$("html").css("overflow", "hidden");
					$(".popuppost-wrapper").css("overflow-y", "scroll");
					history.pushState("data","Title",postUrl);		 	
				 	$(".popuppost-wrapper").fadeIn();
					$(".popuppost-wrapper").html(result);
					$(".popuppost-wrapper").fadeIn();
					setTimeout( function() {$(".popuppost-wrapper").scrollTop(0)}, 10 );

					$(".close-post").on('click', function(e) {
					  if (e.target !== this)
    					return;

						$(".popuppost-wrapper").css("overflow", "hidden");
						$(".popuppost-wrapper").fadeOut();
						$(".popuppost-wrapper").fadeOut();
						history.pushState(null, '', '/urkraft/');
						$("html").css("overflow", "scroll");
					});

					initContactForm();
					function initContactForm() {
					    wpcf7.initForm( $('.wpcf7-form') );
					    $('form.wpcf7-form')
					    .each(function() {
					        //$j(this).find('img.ajax-loader').last().remove();
					    });
					}

				},
				error: function () {
					 console.log('getSingle - fail');					
				}
			});

		}
	});
</script>