<?php
require 'config.php';

if (isset($_GET['year']) && is_numeric($_GET['year'])) {
    $year = $_GET['year'];
    $result = mysqli_query($conn, "SELECT dev_name FROM devision WHERE year = $year");
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='{$row['dev_name']}'>{$row['dev_name']}</option>";
    }
}
?>
