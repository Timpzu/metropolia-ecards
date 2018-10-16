<?php
include 'database.php';

// prepare and bind
$stmt = $mysqli->prepare("INSERT INTO cards (sender, receiver, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $sender, $receiver, $message);

// define variables and set to empty values
$senderErr = $receiverErr = $messageErr = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (empty($_POST['sender'])) {
    $senderErr = 'Sender is required';
  } else {
    $sender = test_input($_POST['sender']);
    // check if name only contains letters and whitespace
   if (!preg_match('/^[a-zA-Z ]*$/', $sender)) {
     $senderErr = 'Only letters and white space allowed';
   }
  }
  if (empty($_POST['receiver'])) {
    $receiverErr = 'Receiver is required';
  } else {
    $receiver = test_input($_POST['receiver']);
    if (!preg_match('/^[a-zA-Z ]*$/', $receiver)) {
      $receiverErr = 'Only letters and white space allowed';
    }
  }
  if (empty($_POST['message'])) {
    $messageErr = 'Message is required';
  } else {
    $message = test_input($_POST['message']);
  }
  $stmt->execute();
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$stmt->close();
$mysqli->close();
?>
