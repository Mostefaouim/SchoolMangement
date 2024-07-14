<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="../images/360_F_212260413_HTV9k3PKyKv4Qy4GdQZVtSBuwCx4p7Cx.jpg">
    <title>School Management</title>
</head>
<body>
    
    <?php
    if (isset($_POST['add'])) {
        $F_name = $_POST['fname'];
        $L_name = $_POST['lname'];
        $std_grad = $_POST['grad'];
        $years = $_POST['years'];
        if (empty($F_name) || empty($L_name) || empty($years) || empty($std_grad) || $std_grad == "Select-Grad") {
            echo "<center><div class='alert alert-danger' role='alert'>Please Check Your Information</div></center>";
        } else {
            $query = "INSERT INTO student (fname, lname, std_grad, Year) VALUES ('$F_name', '$L_name', '$std_grad', $years)";
            if (mysqli_query($conn, $query)) {
                echo "<center><div class='alert alert-success' role='alert'>The Student Added Successfully</div></center>";
                header("Location: home.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }
    ?>
    
    <div class="container">
        <div class="form">
            <form action="student.php" method="post">
                <center>
                    <div class="col" id="std">
                        <br><h2>Add Student</h2><br>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="First name" name="fname"><br>
                            <input type="text" class="form-control" placeholder="Last name" name="lname"><br>
                            <input type="number" name="years" id="years" min="1" max="3" style="width: 15%; margin-right:25px;" placeholder="Years" oninput="fetchGrades(this.value)">
                            <select name="grad" id="grad">
                                <option value="Select-Grad">Select Grad</option>
                                
                            </select><br>
                            <br><button type="submit" class="btn btn-primary" name="add">Add Student</button>
                        </div>
                    </div>
                </center>
            </form>
        </div>
    </div>
    

    <center><a href=".index.php" class="btn btn-info" style="margin-bottom:10px ;">Back To Home Page</a></center>

    <script src="../js/script.js">
        
    </script>
</body>
</html>
