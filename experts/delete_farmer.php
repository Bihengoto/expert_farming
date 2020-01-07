<?php

    include 'connection.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "DELETE FROM farmer_registration WHERE id =$id";

        mysqli_query($db, $query);

        header("Location: display_farmer_info.php");
    }

?>