<?php 

add_action( 'wp_ajax_f711_sending_mail', 'f711_sending_mail_callback' );
add_action( 'wp_ajax_nopriv_f711_sending_mail', 'f711_sending_mail_callback' );

function f711_sending_mail_callback() {

    $alerts = get_field('mail','options');
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $message = $_POST['message']; 
    $headers = array('Content-Type: text/html; charset=UTF-8',$_POST['header']);

    if( wp_mail($to, $subject, $message, $headers)){
        echo  $_POST['response'];
    } else {
        echo $alerts['fel_meddelande'];
    }

    die();

} ?>