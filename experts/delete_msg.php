<?php

    include 'connection.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "DELETE FROM toexpert WHERE id = $id";

        mysqli_query($db, $query);

        header("Location: read_messages.php");
    }

?>