<?php

session_start();

if (!isset($_SESSION['usuario']))
    header("Location: login.php");


session_unset();
session_destroy();
setcookie(session_name(), session_id(), time() - 7200, "/");

header("Location: login.php");