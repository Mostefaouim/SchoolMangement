<?php
require 'config.php';
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
        <div class="display" id="grades">
            <form action="grades.php" method="post">
                <center>
                    <?php
                    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                        $ID = $_GET['id'];
                        $update = mysqli_query($conn, "SELECT * FROM student WHERE id = $ID");
                        if ($update && mysqli_num_rows($update) > 0) {
                            $data = mysqli_fetch_array($update);
                    ?>
                    <h3><?php echo $data['fname'] . " " . $data['lname']; ?></h3>
                    <input type="hidden" name="student_name" value="<?php echo $data['fname'] . " " . $data['lname']; ?>">
                    <?php } } ?>
                    <table class="table table-hover" style="width: 85%;">
                        <thead>
                            <tr>
                                <th scope="col">Material</th>
                                <th scope="col">Grades</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM material";
                            $display = mysqli_query($conn, $query);
                            while ($dis = mysqli_fetch_array($display)) {
                            ?>
                                <tr>
                                    <td><?php echo $dis['name']; ?></td>
                                    <td>
                                        <input type="hidden" name="name[]" value="<?php echo $dis['name']; ?>">
                                        <input type="number" name="note[]" max="20" step="0.25" required>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <input type="submit" class="btn btn-success" value="Save" name="save">
                </center>
            </form>
        </div>
    </div>
</body>
</html>

<?php
if (isset($_POST['save'])) {
    if (!empty($_POST['student_name']) && isset($_POST['name']) && isset($_POST['note'])) {
        $student_name = mysqli_real_escape_string($conn, $_POST['student_name']);
        $names = $_POST['name'];
        $notes = $_POST['note'];

        for ($i = 0; $i < count($names); $i++) {
            $name = mysqli_real_escape_string($conn, $names[$i]);
            $note = mysqli_real_escape_string($conn, $notes[$i]);

            $query = "INSERT INTO grades (student_name, material_name, grade) VALUES ('$student_name', '$name', $note)";
            if (!mysqli_query($conn, $query)) {
                echo "Error: " . mysqli_error($conn) . "<br>";
            }
        }
    } else {
        echo "Please fill in all fields.";
    }
}
?>
