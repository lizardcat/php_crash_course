<?php 
    if (isset($_POST["submit"])) {
        $myFile = fopen("uploads/file.txt", "a");
        $txt = $_POST["age"] . "\n";

        fwrite($myFile, $txt);

        fclose($myFile);
    }

?>

<form action="file_put.php" method="post">
    <input type="text" name="age">
    <input type="submit" name="submit">
</form>