<?php
$user = $_GET["user"];
$query = "SELECT * FROM users WHERE username='$user'";
