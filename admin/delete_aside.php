<?php
    include('../include/connection.php');

    $query  = "DELETE FROM aside WHERE aside_id = {$_GET['aside_id']} ";
    $result = mysqli_query($conn, $query);

    header("Location: manage_aside.php"); /* back to manage admin page */
