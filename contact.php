<?php

/* Set e-mail recipient */
$myemail  = "j.sloss@btinternet.com";

/* Check all form inputs using check_input function */

$name     = check_input($_POST['name'], "You have not provided your name");
$address  = check_input($_POST['address'], "You have not provided your address");
$number   = check_input($_POST['number'], "You have not provided a contact number");
$type     = check_input($_POST['Type'], "You have not selected your required portrait type");
$size     = check_input($_POST['size'], "You have not selected your required portrait size");
$subjects = check_input($_POST['subjects'], "You have not input the number of subjects required in the portrait");
$detail   = check_input($_POST['detail'], "You have not selected wether you need extra detail or not");
$detailnotes   = check_input($_POST['detailnotes']);
$sendingphotos = check_input($_POST['sendphotos'], "Please select how you wish to send the photos");


$subject = "New order from www.jspencilportraits.co.uk";

/* Let's prepare the message for the e-mail */

$message = "


############ NEW ORDER ############


A Portrait Order has been placed by:


  Name:             $name

  Address:          $address

  Contact Number:   $number



Order details;


  Portrait Type:              $type

  Preferred Size:             $size

  Subjects to be drawn:       $subjects

  Additional detail needed:   $detail additional detail to be included

                              $detailnotes


  Method of Sending Photos :  $sendingphotos




###################################

End of message
";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: thanks.htm');
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
