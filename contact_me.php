<?php
if($_POST)
{
  $to_Email = "szabogabi@gmail.com"; //Replace with recipient email address
  $subject = 'Webes érdeklődés - V2G'; //Subject line for emails


  //check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {

    //exit script outputting json data
    $output = json_encode(
    array(
      'type'=>'error',
      'text' => 'Request must come from Ajax'
    ));

    die($output);
    }

  //check $_POST vars are set, exit if any missing
  if(!isset($_POST["userName"]) || !isset($_POST["userEmail"]) || !isset($_POST["userTel"]))
  {
    $output = json_encode(array('type'=>'error', 'text' => 'Jelölt mezők kitöltése kötelező!'));
    die($output);
  }

  //Sanitize input data using PHP filter_var().
  $user_Name = filter_var($_POST["userName"], FILTER_SANITIZE_STRING);
  $user_Email = filter_var($_POST["userEmail"], FILTER_SANITIZE_EMAIL);
  $user_Tel = filter_var($_POST["userTel"], FILTER_SANITIZE_STRING);

  //$user_Message = str_replace("\&#39;", "'", $user_Message);
  //$user_Message = str_replace("&#39;", "'", $user_Message);

  //additional php validation
  if(strlen($user_Name)<4) // If length is less than 4 it will throw an HTTP error.
  {
    $output = json_encode(array('type'=>'error', 'text' => 'Adja meg nevét!'));
    die($output);
  }
  if(!filter_var($user_Email, FILTER_VALIDATE_EMAIL)) //email validation
  {
    $output = json_encode(array('type'=>'error', 'text' => 'Érvénytelen email cím!'));
    die($output);
  }
  if(strlen($user_Tel)<6) //check emtpy message
  {
    $output = json_encode(array('type'=>'error', 'text' => 'Telefonszám megadása kötelező!'));
    die($output);
  }

  //proceed with PHP email.
  $headers = 'From: '.$user_Email.'' . "\r\n" .
  'Reply-To: '.$user_Email.'' . "\r\n" .
  'X-Mailer: PHP/' . phpversion();

  $sentMail = @mail($to_Email, $subject, $user_Name . "\r\n\n"  .'-- '.$user_Email. "\r\n" .'-- '.$user_Tel, $headers);

  if(!$sentMail)
  {
    $output = json_encode(array('type'=>'error', 'text' => 'Az üzenet elküldése nem sikerült.'));
    die($output);
  }else{

    //response email to the user, added by ceto
    $resp_headers = 'From: '.$to_Email.'' . "\r\n" .
    'Reply-To: '.$to_Email.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    $resp_text="Tisztelt ".$user_Name."\r\n\n".
    "Köszönöm érdeklődését"."\r\n\n".
    "Hamarosan felveszem önnel a kapcsolatot"."\r\n\n".
    "Üdvözlettel"."\r\n"."Galina Zoltán"."\r\n"."Optiles"."\r\n"."Tel: + 36 xx xxx-xxxx";

    @mail($user_Email, $subject, $resp_text, $resp_headers);


    $output = json_encode(array('type'=>'message', 'text' => 'Tisztelt '.$user_Name .'! Üzenetét postáztuk.'));
    die($output);
  }
}
?>
