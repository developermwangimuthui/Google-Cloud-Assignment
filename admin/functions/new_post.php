
<?php 

include("../includes/db.php");



  $message_image = $_POST["message_image"];
  $subject = $_POST['subject'];
  $message_body = $_POST['message_body'];
  $date = date(DATE_RFC822);
  
  
  if(isset($_POST['addMessage'])){
    
    
    $data = [
        'message_image' => $message_image,
        'message_body' => $message_body,
        'subject' => $subject,
        'date' => $date
        
    ];
    
    $ref = "messages/";
    $pushData = $database->getReference($ref)->push($data);
    header("Location:../index.php");
}elseif (isset($_POST['updateMessage'])) {

  $data = [
    'message_image' => $message_image,
    'message_body' => $message_body,
    'subject' => $subject,
    'date' => $date
    
];
$ref = $_POST['ref'];

$pushData = $database->getReference($ref)->set($data);
header("Location:../index.php");
}
 








?>