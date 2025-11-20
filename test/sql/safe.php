<?php
$stmt = $db->prepare("SELECT * FROM users WHERE username=?");
$stmt->execute([$user]);