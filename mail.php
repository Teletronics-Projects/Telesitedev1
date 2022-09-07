<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];
header('Content-Type: application/json');
if ($name === ''){
  print json_encode(array('message' => 'Please Enter Your Name', 'code' => 0));
  exit();
}
if ($email === ''){
  print json_encode(array('message' => 'Email Cannot Be Empty!', 'code' => 0));
  exit();
} else {
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
  print json_encode(array('message' => 'Please Enter a Valid Email!', 'code' => 0));
  exit();
  }
}
if ($subject === ''){
  print json_encode(array('message' => 'Please Add Your Subject!', 'code' => 0));
  exit();
}
if ($message === ''){
  print json_encode(array('message' => 'Message cannot be empty!', 'code' => 0));
  exit();
}
$content="From: $name \nEmail: $email \nMessage: $message";
$recipient = "ntulir@infoverge.co.za";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
print json_encode(array('message' => 'Email successfully sent!', 'code' => 1));
exit();
?>