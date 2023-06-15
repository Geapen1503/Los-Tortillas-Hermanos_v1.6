<?php
$conn = mysqli_connect("localhost", "root", "", "lth");

$_SESSION["login"] = False;
$_SESSION['username'] = 0;
header("Location: login");