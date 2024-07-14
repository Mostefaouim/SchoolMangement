<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="../images/360_F_212260413_HTV9k3PKyKv4Qy4GdQZVtSBuwCx4p7Cx.jpg">
    <link rel="stylesheet" href="../css/style.css">
    <title>Manage</title>
</head>
<body>
<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $ID = $_GET['id'];
    $update = mysqli_query($conn, "SELECT * FROM teacher WHERE id = $ID");

    if ($update && mysqli_num_rows($update) > 0) {
        $data = mysqli_fetch_array($update);
        ?>
        <center>
            <div class="col" style="margin-top: 70px;">
                <h2>Update / Delete Teacher</h2>
                <form method="post" action="up_teach.php">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $data['id']; ?>"><br>
                    <input style="width: 50%;" type="text" class="form-control" name="fname" value="<?php echo $data['fname']; ?>"><br>
                    <input style="width: 50%;" type="text" class="form-control" name="lname" value="<?php echo $data['lname']; ?>"><br>
                    <input style="width: 50%;" type="number" class="form-control" name="salary" value="<?php echo $data['salary']; ?>"><br>
                    <select name="material" id="material">
                        <?php 
                        $material = mysqli_query($conn, "SELECT name FROM material");
                        while ($m = mysqli_fetch_array($material)) {
                            $selected = ($data['materiel'] == $m['name']) ? 'selected' : '';                            
                            ?>
                            <option value="<?php echo $m['name']; ?>" <?php echo $selected; ?>><?php echo $m['name']; ?></option>
                            <?php
                        }
                        ?>
                    </select><br>
                    <input type="submit" class="btn btn-success" value="Update" name="update" style="margin-top: 20px">
                    <input type="submit" class="btn btn-danger" value="Delete" name="delete" style="margin-top: 20px">
                </form>
            </div>
        </center>
        </body>
        </html>
        <?php
    } else {
        echo "No teacher found with the given ID.";
    }
} else {
    echo "Invalid or missing ID.";
}

if (isset($_POST['update'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $material = $_POST['material'];
    $salary = $_POST['salary'];
    $id = $_POST['id'];
    $up = "UPDATE teacher SET fname = '$fname', lname = '$lname', materiel = '$material', salary = $salary WHERE id = $id";
    if (mysqli_query($conn, $up)) {
        header("Location: manage.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} elseif (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $del = "DELETE FROM teacher WHERE id = $id";
    if (mysqli_query($conn, $del)) {
        header("Location: manage.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
