<script>
	jQuery(document).ready( function($) {
		function getSingle(e)  {
			// var target = $(this);
			// var key = target.attr('data-product_key');
			$.ajax({
				type: 'POST',
				url: '<?php echo admin_url("admin-ajax.php"); ?>';
				data: {
					'text' : 'hej',
					'action': 'wp_ajax_get_singel' //this is the name of the AJAX method called in WordPress
				}, 
				success: function (result) {
				 	
				 	console.log('getSingle - success');

				 	console.log(result);

				},
				error: function () {

					 console.log('getSingle - fail');
					
				}
			});

			console.log('getSingle');

		}
	});
</script>