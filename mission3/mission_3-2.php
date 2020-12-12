<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_3-2</title>
</head>
<body>

<?php
    if(file_exists("mission_3-1.txt")){
        $text = file_get_contents("mission_3-1.txt");
    }else{
        $text = "";
    }

    $text_sep = explode("\n", $text);
    $filename = "mission_3-1.txt";
    
    $fp = fopen($filename,"a");
    //$lines = file($filename,FILE_IGNORE_NEW_LINES);

    foreach($text_sep as $line) {
        $parts = explode("<>", $line);
        for($i = 0; $i < 4; $i++) {
            echo $parts[$i];
        }
        echo "<br>";
    }
    fclose($fp);

?>

</body>
</html>