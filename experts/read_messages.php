<?php

    session_start();

    if(!isset($_SESSION['expert'])){
        header('Location: login.php');
    }
    include 'connection.php';
    include 'header.php';

    $query = "UPDATE toexpert SET read1 = 'y' where dusername = '$_SESSION[expert]'";
    mysqli_query($db, $query);

?>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Plain Page</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Plain Page</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php
                                    echo "<table class='table table-bordered'>";
                                        echo "<tr>";
                                            echo "<th>"; echo "Sender"; echo "</th>";
                                            echo "<th>"; echo "Me"; echo "</th>";
                                            echo "<th>"; echo "Title"; echo "</th>";
                                            echo "<th>"; echo "Message"; echo "</th>";
                                            echo "<th>"; echo "Respond"; echo "</th>";
                                            echo "<th>"; echo "Deletion"; echo "</th>";
                                        echo "</tr>";

                                        $query = "SELECT * FROM toexpert";
                                        $res = mysqli_query($db, $query);

                                        while($row = mysqli_fetch_assoc($res)){
                                            echo "<tr>";
                                                echo "<td>"; echo $row['susername']; echo "</td>";
                                                echo "<td>"; echo $row['dusername']; echo "</td>";
                                                echo "<td>"; echo $row['title']; echo "</td>";
                                                echo "<td>"; echo $row['msg']; echo "</td>";
                                                echo "<td>"; ?> <a href="write_messages.php"> Reply </a> <?php echo "</td>";
                                                echo "<td>"; ?> <a href="delete_msg.php?id=<?php echo $row['id']; ?>">Delete</a> <?php echo "</td>";
                                            echo "</tr>";
                                        }
                                    echo "</table>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php

    include 'footer.php';

?>