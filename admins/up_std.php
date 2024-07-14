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
    <title>Manage</title>
</head>
<body>
<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $ID = $_GET['id'];
    $update = mysqli_query($conn, "SELECT * FROM student WHERE id = $ID");
    if ($update && mysqli_num_rows($update) > 0) {
        $data = mysqli_fetch_array($update);    
    ?>
 <center><div class="col" style="margin-top: 70px;" >
        <h2>Update / Delete Student</h2>
        <form  method="post" action="up_std.php" >
            <input type="text" class="form-control" name="id" value="<?php echo $data['id']?>" style="display:none;"><br>
            <input style="width: 50%;" type="text" class="form-control" name="fname" value="<?php echo $data['fname']?>"><br>
            <input style="width: 50%;" type="text" class="form-control" name="lname" value="<?php echo $data['lname']?>"><br>
            <select name="grad" id="grad">
                <?php 
                $Grad = mysqli_query($conn, "SELECT grad FROM grad");
                while($g=mysqli_fetch_array($Grad)){
                    $selected = ($data['std_grad'] == $g['grad']) ? 'selected' : '';
                 ?>
                <option value="<?php echo $g['grad']; ?>" <?php echo $selected; ?>><?php echo $g['grad'];?></option>
                <?php } ?>
            </select><br>
            <input type="submit" class="btn btn-success" value="Update " name="update"style="margin-top: 20px">
            <input type="submit" class="btn btn-danger" value="Delete " name="delete"style="margin-top: 20px">
        </form>
    </div></center>
</body>
</html>
<?php
    } else {
        echo "No teacher found with the given ID.";
    }
}
if (isset($_POST['update'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $grad = $_POST['grad'];
    $id = $_POST['id'];
    $up = "UPDATE student SET fname = '$fname', lname = '$lname' , std_grad = '$grad' WHERE id = $id";
    if (!mysqli_query($conn, $up)) {
        echo "Error updating record: " .mysqli_error($conn);
    }
    else{
        header("Location: manage.php");
    }
}
elseif (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $del = "DELETE FROM student WHERE id = $id";
    if (!mysqli_query($conn, $del)) {
    echo "Error deleting record: " .mysqli_error($conn);
    }
    else{
        header("Location: manage.php");
    }
}
header("location : manage.php")
?>