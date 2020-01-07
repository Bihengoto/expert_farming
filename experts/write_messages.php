<?php

    session_start();

    if(!isset($_SESSION['export'])){
        header('Location: login.php');
    }
    include 'connection.php';
    include 'header.php';

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
                                <form action="" method="POST" class="col-lg-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>
                                                <select name="dusername" class="form-control">
                                                    <?php
                                                        $res = mysqli_query($db, 'SELECT * FROM farmer_registration');

                                                        while($row = mysqli_fetch_assoc($res)){
                                                    ?>
                                                        <option value="<?php echo $row['username']; ?>">
                                                            <?php echo $row['username']."(".$row['contact'].")"; ?>
                                                        </option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <input type="text" name="title" class="form-control" placeholder="Enter Title">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                Message:
                                                <textarea name="msg" class="form-control"></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <input type="submit" name="submit1" value="Send Message" class="form-control">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <?php
            if(isset($_POST['submit1'])){
                $query = "INSERT INTO tofarmer (susername, dusername, title, msg, read1) VALUES ('$_SESSION[expert]', '$_POST[dusername]', '$_POST[title]', '$_POST[msg]', 'n')";

                mysqli_query($db, $query);

                ?>
                    <script>
                        alert('Message Sent Successfully');
                    </script>
                <?php
            }
        ?>

<?php

    include 'footer.php';

?>