<?php
session_start();
$_SESSION['score'] = 0;
header("location: question.php?n=1");