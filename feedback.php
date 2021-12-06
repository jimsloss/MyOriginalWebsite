<?php

/* Set e-mail recipient */
$myemail  = "j.sloss@btinternet.com";

/* Check all form inputs using check_input function */

$name     = check_input($_POST['name'], "You have not provided your name");

$number   = check_input($_POST['number'], "You have not provided a contact number");
$type     = check_input($_POST['Type'], "You have not selected the type of feedback");



$detailnotes   = check_input($_POST['detailnotes']);



$subject = "Feedback from $name via www.jspencilportraits.co.uk";

/* Let's prepare the message for the e-mail */

$message = "


############ FEEDBACK ############


Feedback has been received from:


  Name:             $name
  

  Contact Number:   $number



detail;


  Feedback Type:              $type



                              $detailnotes







###################################

End of message
";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: feedbackthanks.htm');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>
