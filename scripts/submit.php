<?php
include 'database.php';

// prepare and bind
$stmt = $mysqli->prepare("INSERT INTO cards (ref, user, sender, receiver, message) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $ref, $user, $sender, $receiver, $message);

// define variables and set to empty values
$senderErr = $receiverErr = $messageErr = $userErr = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $ref = uniqid('', true);
  if (empty($_POST['sender'])) {
    $senderErr = 'Sender is required';
  } else {
    $sender = test_input($_POST['sender']);
    // check if name only contains letters and whitespace
   if (!preg_match('/^[a-zA-Z ]*$/', $sender)) {
     $senderErr = 'Only letters and white space allowed';
   }
  }
  if (empty($_POST['user'])) {
    $userErr = 'User is required';
  } else {
    $user = test_input($_POST['user']);
    // check if name only contains letters and whitespace
   if (!preg_match('/^[a-zA-Z ]*$/', $user)) {
     $userErr = 'Only letters and white space allowed';
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
  $last_id = $mysqli->insert_id;
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$data = array('lastID'=>$last_id, 'lastSerial'=>$ref);
echo json_encode($data);

$stmt->close();
$mysqli->close();
?>
