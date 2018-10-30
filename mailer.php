<?php
/**
 * Ajax mailer.
 *
 * @package understrap
 */
?>

<script>

jQuery(document).ready( function($) {
	$.sendMail =  function SendingMail(To,Subject,Message,Header,Response) {
        $.ajax({
            type: 'POST',
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            data: {
                'to' : To,
                'subject' : Subject,
                'message' : Message,
                'header' : Header,
                'response' : Response.message,
                'action': 'f711_sending_mail' 
            }, 
            success: function (result) {
                
                console.log('SendingMail - success');

                $(Response.target).html(result);

            },
            error: function () {

                console.log('SendingMail - fail');
                
            }
        });
        console.log('SendingMail');
    }
})


</script>
		
