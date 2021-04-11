<?php
session_start();
$_SESSION["email"] = "";
header("Location: ../views/login.html");