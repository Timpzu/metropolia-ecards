<?php
include 'database.php';

function curPageURL() {
  $pageURL = 'http';
  if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
  $pageURL .= "://";
  if ($_SERVER["SERVER_PORT"] != "80") {
    $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
  } else {
    $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
  }
  return $pageURL;
}
$urlPathId = trim(parse_url(curPageURL(), PHP_URL_QUERY), 'ref=');

$sql = "SELECT * FROM cards WHERE ref='$urlPathId'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_assoc($result);

$mysqli->close();
?>
