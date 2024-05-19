<?php
session_start();
session_unset();
session_destroy();
header('Location: /grancy/src/signin.php');
exit();
