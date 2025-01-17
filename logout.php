<?php

session_start();
unset($_SESSION['name']);

header("Location:/Bank Management/login_page.php");
