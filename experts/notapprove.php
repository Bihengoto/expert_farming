<?php

    include 'connection.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "UPDATE farmer_registration SET status='no' WHERE id='$id'";
        $query = mysqli_query($db, $query);

        header("Location: display_farmer_info.php");
    }

?>