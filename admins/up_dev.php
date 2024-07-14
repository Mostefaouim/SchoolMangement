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
    $update = mysqli_query($conn, "SELECT * FROM devision WHERE id = $ID");

    if ($update && mysqli_num_rows($update) > 0) {
        $data = mysqli_fetch_array($update);
        ?>
        <center>
            <div class="col" style="margin-top: 70px;">
                <h2>Update / Delete Grad</h2>
                <form method="post" action="up_dev.php">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $data['id']; ?>"><br>
                    <input style="width: 50%;" type="text" class="form-control" name="dev_name" value="<?php echo $data['grad']; ?>"><br>
                    <input style="width: 50%;" type="number" class="form-control" name="salary" value="<?php echo $data['year']; ?>"><br>
                    <input type="submit" class="btn btn-success" value="Update" name="update" style="margin-top: 20px">
                    <input type="submit" class="btn btn-danger" value="Delete" name="delete" style="margin-top: 20px">
                </form>
            </div>
        </center>
        </body>
        </html>
        <?php
    } else {
        echo "No Grad found with the given ID.";
    }
} else {
    echo "Invalid or missing ID.";
}

if (isset($_POST['update'])) {
    $dev_name = $_POST['dev_name'];
    $year = $_POST['year'];
    $id = $_POST['id'];
    $up = "UPDATE devision SET dev_name = '$dev_name', year = $year WHERE id = $id";
    if (mysqli_query($conn, $up)) {
        header("Location: manage.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} elseif (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $del = "DELETE FROM devision WHERE id = $id";
    if (mysqli_query($conn, $del)) {
        header("Location: manage.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
