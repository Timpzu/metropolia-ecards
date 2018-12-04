<?php
  require 'scripts/database.php';

  $sql1 = "DROP TABLE cards";

  $sql2 = "DROP TABLE animations";

  $sql3 = "CREATE TABLE animations (
    anim_id int(5) NOT NULL AUTO_INCREMENT,
    title varchar(120) NOT NULL,
    author varchar(50) NOT NULL,
    copyright varchar(250),
    filename varchar(50) NOT NULL,
    PRIMARY KEY (anim_id))";

  $sql4 = "INSERT INTO animations (title, author, copyright, filename) VALUES
    ('Esimerkkikortti', 'Erkki Esimerkki', 'Äänistä vastasi Erkki Esimerkki', 'kortti')";

  $sql5 = "CREATE TABLE cards (
    id int(11) NOT NULL AUTO_INCREMENT,
    ref varchar(23) NOT NULL,
    user varchar(15) NOT NULL,
    sender varchar(50) NOT NULL,
    receiver varchar(50) NOT NULL,
    message varchar(150) NOT NULL,
    anim_id int(5) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (anim_id) REFERENCES animations(anim_id))";

  if ($mysqli->query($sql1) === TRUE && $mysqli->query($sql2) === TRUE && $mysqli->query($sql3) === TRUE && $mysqli->query($sql4) === TRUE && $mysqli->query($sql5) === TRUE) {
    echo "SQL statements executed successfully";
  } else {
      echo "SQL error: " . $mysqli->error;
  }

  $mysqli->close();
?>
