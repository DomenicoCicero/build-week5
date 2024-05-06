<?php
session_start();
session_unset();
session_destroy();
header("Location: http://localhost/progetto-netflix-php/build-week5/");
exit;

?>