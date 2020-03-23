<?php
include("dao.php");

$dao = new dao();

if (isset($_POST['delete'])) {
    $id = $_POST['task_id'];
    $dao->deleteTask($id);

    header('location:../index.php');
}

if (isset($_POST['done'])) {
    $id = $_POST['task_id'];
    $dao->SetTaskDone($id);


    header('location:../index.php');
}
