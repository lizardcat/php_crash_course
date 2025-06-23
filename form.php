<?php
    if (isset($_POST['name'])) {
        echo "Thank you " . $_POST['name'] . "! Your response has been saved!";
    }
?>

<form action="form.php" method="post">
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="age" placeholder="Age">
    <button type="submit">SUBMIT</button>
</form>

<p>Please submit the form.</p>