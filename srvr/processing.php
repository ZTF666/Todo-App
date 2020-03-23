<?php
include("dao.php");

$dao = new dao();

$task = $_POST['task'];

$X = $dao->AddTask($task);

header('location:../index.php');
