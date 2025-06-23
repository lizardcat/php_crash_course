<?php 
    if (isset($_FILES['file'])) {
        echo $name = $_FILES['file']['name'];
        echo "<br>";
        echo $type = $_FILES['file']['type'];
        echo "<br>";
        echo $tmp_location = $_FILES['file']['tmp_name'];
    }
?>

<form action="file.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit">SUBMIT</button>
</form>