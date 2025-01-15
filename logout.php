<?php

session_destroy();
$msg = "logged out";
$msg = urlencode($msg);
header("Location: index.php?m=$msg");
