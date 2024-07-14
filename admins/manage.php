<?php
require 'config.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="../images/360_F_212260413_HTV9k3PKyKv4Qy4GdQZVtSBuwCx4p7Cx.jpg">
    <link rel="stylesheet" href="../css/style.css">
    <title>ManageS</title>
</head>
<body>
    <center><h1 class="h1">Manage The Informations</h1></center>
    <div class="container">
        <div class="display" id="student">
            <center>
                <table class="table table-hover" style="width: 85%;">
                    <thead>
                        <tr>
                            <!-- <th scope="col">Id</th> -->
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Devision</th>
                            <th scope="col">Grad</th>
                            <th scope="col" style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        echo "<center><h1>All Students</h1></center><br>";
                        $query = "SELECT * FROM student";
                        $display = mysqli_query($conn, $query);
                        while ($dis = mysqli_fetch_array($display)) {
                        ?>
                            <tr>
                                <!-- <td><?php // echo $dis['id']; ?></td> -->
                                <td><?php echo $dis['fname']; ?></td>
                                <td><?php echo $dis['lname']; ?></td>
                                <td><?php echo $dis['std_grad']; ?></td>
                                <td>
                                    <a href='up_std.php? id=<?php echo $dis['id']; ?>' class='btn btn-dark' style='margin-right: 10px;'>Update / Delete</a>
                                </td>
                                <td>
                                    <a href='grades.php? id=<?php echo $dis['id']; ?>' class='btn btn-info' style='margin-right: 10px;'>Enter His Grades</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <form method="post">
                    <button type="submit" class="btn btn-danger" name="del_All">Delete All</button>
                </form>
            </center>
            <br><br>
            <?php
                if(isset($_POST['del_All'])){
                    $del_all = "DELETE FROM student";
                    mysqli_query($conn, $del_all);
                }
             
            ?>
        </div>
    </div>
    
    <div class="container">
        <div class="display" id="teacher">
            <center>
                <table class="table table-hover" style="width: 85%;">
                    <thead>
                        <tr>
                            <!-- <th scope="col">Id</th> -->
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Material</th>
                            <th scope="col">Salary</th>
                            <th scope="col" style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        echo "<center><h1>All Teachers</h1></center><br>";
                        $query2 = "SELECT * FROM teacher";
                        $display2 = mysqli_query($conn, $query2);
                        while ($dis2 = mysqli_fetch_array($display2)) {
                        ?>
                            <tr>
                                <!-- <td><?php // echo $dis2['id']; ?></td> -->
                                <td><?php echo $dis2['fname']; ?></td>
                                <td><?php echo $dis2['lname']; ?></td>
                                <td><?php echo $dis2['materiel']; ?></td>
                                <td><?php echo $dis2['salary']; ?></td>
                                <td>
                                    <a href='up_teach.php? id=<?php echo $dis2['id']; ?>' class='btn btn-dark' style='margin-right: 10px;'>Update / Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <form method="post">
                    <button type="submit" class="btn btn-danger" name="del_All1">Delete All</button>
                </form>
            </center>
            <br><br>
            <?php
                if(isset($_POST['del_All1'])){
                    $del_all1 = "DELETE FROM teacher";
                    mysqli_query($conn, $del_all1);
                }
             
            ?>
        </div>
    </div>


    <div class="container">
        <div class="display" id="grad">
            <center>
                <table class="table table-hover" style="width: 85%;">
                    <thead>
                        <tr>
                            <!-- <th scope="col">Id</th> -->
                            <th scope="col">Devision Name</th>
                            <th scope="col">Years</th>
                            <th scope="col" style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        echo "<center><h1>All Devision</h1></center><br>";
                        $query3 = "SELECT * FROM devision ORDER BY year";
                        $display3 = mysqli_query($conn, $query3);
                        while ($dis3 = mysqli_fetch_array($display3)) {
                        ?>
                            <tr>
                                <!-- <td><?php //echo $dis3['id']; ?></td> -->
                                <td><?php echo $dis3['dev_name']; ?></td>
                                <td><?php echo $dis3['year']; ?></td>
                                <td>
                                    <a href='up_dev.php? id=<?php echo $dis3['id']; ?>' class='btn btn-dark' style='margin-right: 10px;'>Update / Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <form method="post">
                    <button type="submit" class="btn btn-danger" name="del_All2">Delete All</button>
                </form>
            </center>
            <br><br>
            <?php
                if(isset($_POST['del_All2'])){
                    $del_all2 = "DELETE FROM devision";
                    mysqli_query($conn, $del_all2);
                }
             
            ?>
        </div>
    </div>



    <center><a href="index.php" class="btn btn-info" style="margin-bottom:10px ;">Back To Home Page</a></center>
</body>
</html>