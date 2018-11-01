<script>
	jQuery(document).ready( function($) {

		$(".readmore-link").click(function() {
			event.preventDefault();
			getSingle();
		});

		$(".page-cover").click(function() {
			$(".page-cover").fadeOut();
			$(".popuppost-wrapper").fadeOut();
			history.pushState(null, '', '/urkraft/');
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
					history.pushState("data","Title",postUrl);		 	
				 	$(".popuppost-wrapper").fadeIn();
					$(".popuppost-wrapper").html(result);
					$(".page-cover").fadeIn();

					$(".close-post").click(function() {
						$(".page-cover").fadeOut();
						$(".popuppost-wrapper").fadeOut();
						history.pushState(null, '', '/urkraft/');
					});

					initContactForm();
					function initContactForm() {
					    wpcf7.initForm( $('.wpcf7-form') );
					    $('form.wpcf7-form')
					    .each(function() {
					        $j(this).find('img.ajax-loader').last().remove();
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