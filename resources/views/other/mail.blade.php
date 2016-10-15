<?php
use \Illuminate\Support\Facades\Input;
//get the first name
$email = Input::get('email');
$subject = Input::get('subject');
$message = Input::get('message');
$date_time = date("F j, Y, g:i a");
$userIpAddress = Request::getClientIp();
?>

<h1>We been contacted by: </h1>

<p>
    Email address: <?php echo($email);?>
    Subject: <?php echo($subject); ?>
    Message: <?php echo($message);?>
    Date: <?php echo($date_time);?>
    User IP address: <?php echo($userIpAddress);?>
</p>