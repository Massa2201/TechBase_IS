<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_2-4</title>
</head>
<body>

<?php
    //$text = $_POST['text'] . PHP_EOL;
    $filename="mission_2-4.txt";

    //if(!empty($_POST["text"])){
        $fp = fopen($filename,"a");
        $lines = file($filename,FILE_IGNORE_NEW_LINES);
        foreach($lines as $line) {
            echo $line . "<br>";
        }
        fclose($fp);
        $texts = file($filename);
    //}
    
?>

</body>
</html>