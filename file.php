<?php 
    if (isset($_FILES['file'])) {
        $name = $_FILES['file']['name'];
        $type = $_FILES['file']['type'];
        $tmp_location = $_FILES['file']['tmp_name'];
        $size = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];
    
        $tempExtension = explode('.', $name);
        $fileExtension = strtolower(end($tempExtension));
        $isAcceptable = ['jpg', 'pdf', 'jpeg', 'png', 'pdf'];

        if (in_array($fileExtension, $isAcceptable)) {
            if ($error === 0) {
                if ($size < 30000) {
                    $newFileName = uniqid('', true) . "." . $name . "." . $fileExtension;
                    $newDestination = "uploads/" . $newFileName;
                    move_uploaded_file($tmp_location, $newDestination);
                    header("Location: file.php?uploadedsuccessfully");
                } else {
                    echo "Sorry, your file size is too big!";
                }
            } else {
                echo "There was an error!";
            }
        } else {
            echo "File type not supported";
        }

    }
?>



<form action="file.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit">SUBMIT</button>
</form>