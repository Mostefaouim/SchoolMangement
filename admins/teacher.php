<?php 
require ('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="../images/360_F_212260413_HTV9k3PKyKv4Qy4GdQZVtSBuwCx4p7Cx.jpg">
    <title>Teacher</title>

</head>
<body>
<?php
    if (isset($_POST['add'])) {
        $F_name = $_POST['fname'];
        $L_name = $_POST['lname'];
        $material = $_POST['material'];
        $Salary = $_POST['salary'];
        if (empty($F_name) || empty($L_name)|| empty($material) || $material == "Select-Material"|| empty($Salary)) {
            echo "<center><div class='alert alert-danger' role='alert'>Please Check Your Information</div></center>";
        } else {
            echo "<center><div class='alert alert-success' role='alert'>The Teacher Added Successfully</div></center>";
            $query = "INSERT INTO teacher (fname, lname, salary, materiel) VALUES ('$F_name', '$L_name', $Salary, '$material')";
            if (!mysqli_query($conn, $query)) {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }
    ?>
    <div class="container">
        <div class="form">
            <form action="teacher.php" method="post">
                <center>
                    <div class="col" id="std">
                        <br><h2>Add Teacher</h2><br>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="First name" name="fname">
                            <br>
                            <input type="text" class="form-control" placeholder="Last name" name="lname">
                            <br>
                            <input type="number" class="form-control" placeholder="Salary" name="salary" min="1500">
                            <br>
                            <select name="material" id="material">
                                <option value="Select-Material">Select Material</option>
                                <?php 
                                $Material = mysqli_query($conn, "SELECT name FROM material");
                                while($m=mysqli_fetch_array($Material)){
                                ?>
                                <option value="<?php echo $m['name']; ?>"><?php echo $m['name']; } ?></option>
                            </select>
                            <br>
                            <br><button type="submit" class="btn btn-primary" name="add">Add Teacher</button>
                        </div>
                    </div>
                </center>
            </form>
        </div>
    </div>
    <center><a href="index.php" class="btn btn-info" style="margin-bottom:10px ;">Back To Home Page</a></center>

    <script src="../js/script.js"></script>
</body>
</html>
<?php header ("location 2: manage.php");?>