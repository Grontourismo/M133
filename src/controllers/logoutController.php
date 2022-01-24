<?php
session_start();
unset($_SESSION["email"]);
unset($_SESSION["pw"]);
header("Location: ../../index.html");