<script>
	jQuery(document).ready( function($) {
		$(".readmore-link").click(function() {
			event.preventDefault();
			getSingle();
		});

		$(".page-cover").click(function() {
			$(".page-cover").hide();
			$(".popuppost-wrapper").hide();
			history.pushState(null, '', '/urkraft/');

		});
		$(".").click(function() {
			$(".page-cover").hide();
			$(".popuppost-wrapper").hide();
			history.pushState(null, '', '/urkraft/');

		});
		function getSingle(e)  {
			var target = event.target;
			var postUrl = $(target).attr('href');
			var postId = $(target).attr('data-id');
			$.ajax({
				type: 'POST',
				url: '<?php echo admin_url("admin-ajax.php"); ?>',
				data: {
					'postUrl' : postUrl,
					'postId' : postId,
					'action': 'get_single_ur' //this is the name of the AJAX method called in WordPress
				}, 
				success: function (result) {
					history.pushState("data","Title",postUrl);		 	
				 	$(".popuppost-wrapper").show();
					$(".popuppost-wrapper").html(result);
					$(".page-cover").show();
				},
				error: function () {

					 console.log('getSingle - fail');
					
				}
			});

		}
	});
</script>