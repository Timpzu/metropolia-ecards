<?php
include 'database.php';
include 'pageURL.php';

$urlPathId = trim(parse_url(curPageURL(), PHP_URL_QUERY), 'ref=');

$sql = "SELECT * FROM cards INNER JOIN animations ON cards.anim_id = animations.anim_id WHERE ref='$urlPathId'";

$result = $mysqli->query($sql);
$row = mysqli_fetch_assoc($result);

$mysqli->close();
?>
