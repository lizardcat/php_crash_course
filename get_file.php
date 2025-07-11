<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    $filePath = "uploads/file.txt";
    $contents = file_get_contents($filePath);
    
    $ages = explode("\n", $contents);

    foreach ($ages as $age) {
        echo $age . "<br>";
    } 
?>

</body>
</html>