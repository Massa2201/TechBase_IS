<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_2-3</title>
</head>
<body>

<form action = "" method = "post">
    <input type = "text" name = "text">
    <input type = "submit" name = "button01">
</form>
<?php
    $text = $_POST["text"];
    $filename="mission_2-3.txt";

    if (isset ($_POST["text"]) ) {
        if(!empty($text)) {
        $fp = fopen($filename,"a");
        fwrite($fp,$text . "\n");
        fclose($fp);
        echo $filename . "が更新されました";
        }
        else {
            echo "コメントが空です";
        }
    }else {
        echo "コメントを送信してください！";
    }
?>

</body>
</html>