
<?php
$dir = dirname(__DIR__);

$fld = $dir."/test";
$file = "setfile.txt";
$path = $fld.'/'.$file;

//Check if the directory exists; if not, create it
if (!is_dir($fld)) {
    mkdir($fld, 0777, true); // You may adjust the permissions as needed
}

// Check if the file already exists
if (file_exists($path)) {
    echo "File already exists: $path";
} else {
    // Use file_put_contents to write content to the file
    $content = "John Doe\n";
    file_put_contents($path, $content);

    echo "File created: $path";
}


if (file_exists($path)) {
    // Attempt to delete the file
    if (unlink($path)) {
        echo "File '$path' has been deleted.";
    } else {
        echo "Unable to delete the file.";
    }
} else {
    echo "File '$path' does not exist.";
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
</body>
</html>