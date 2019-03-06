<?php

define("ServerName","localhost");
define("ServerUser","root");
define("ServerPass","");
define("ServerDB","db_store");

$conn = mysqli_connect(ServerName,ServerUser,ServerPass,ServerDB);
?>