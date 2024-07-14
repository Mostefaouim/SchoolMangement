<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Manage Devision</title>
</head>
<body>
    <?php
    if (isset($_POST['add_devision'])) {
        $dev_name = $_POST['devision'];
        $year = $_POST['year'];
         if (empty($dev_name)||empty($year)) {
            echo "<center><div class='alert alert-danger' role='alert'>Please Check Your Information</div></center>";
        } else {
            echo "<center><div class='alert alert-success' role='alert'>The Division Added Successfully</div></center>";
            $query = "INSERT INTO devision (dev_name, year) VALUES ('$dev_name', $year)";
            if (!mysqli_query($conn, $query)) {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }
    ?>
    <div class="container">
        <div class="form">
            <form  method="post">
                 <center>
                    <div class="col" id="std">
                        <br><h2>Add Grad</h2><br>
                        <div class="col">
                            <br><input type="text" name="devision" id="devision" placeholder="Enter The Name Of devision" class="form-control" style="width:50%; margin-left:none;"><br>
                            <br><input type="number" name="year" id="year" placeholder="Enter The Year" max="3" min="1" class="form-control" style="width:50%; margin-left:none;" ><br>
                            <br><button type="submit" class="btn btn-primary" name="add_devision">Add Devision</button>
                        </div>
                    </div></center>
            </form>
        </div>
    </div>

    <center><a href="index.php" class="btn btn-info" style="margin-bottom:10px ;">Back To Home Page</a></center>

    <script src="../js/script.js"></script>
</body>
</html>