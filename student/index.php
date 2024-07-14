<?php
require '../admins/config.php';

if (isset($_POST['logIn'])) {
    $F_name = mysqli_real_escape_string($conn, $_POST['fname']);
    $L_name = mysqli_real_escape_string($conn, $_POST['lname']);
    $NAME = $F_name . ' ' . $L_name;

    if (empty($F_name) || empty($L_name)) {
        echo "<center><div class='alert alert-danger' role='alert'>Please Check Your Information</div></center>";
    } else {
        ?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Informations</title>
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
                        <th scope="col">Material</th>
                        <th scope="col">Grade</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT * FROM grades WHERE student_name = '$NAME'";
                $data = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <!-- <td><?php // echo $dis['id']; ?></td> -->
                        <td><?php echo $row['material_name']; ?></td>
                        <td><?php echo $row['grade']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <form method="post">
                <button class="btn btn-danger"name='logOut'>LogOut</button>
            </form>
        </center>
        <br><br>
    </div>
</div>
</body>
</html>
<?php 
    }
}
if (isset($_POST['logOut'])){
    header("location:logIn.php");
}
?>
