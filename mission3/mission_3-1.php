<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_3-1</title>
</head>
<body>

<form action = "" method = "post">
    <input type = "text" name = "text">
    <input type = "submit" name = "button01">
</form>
<?php
    $text = $_POST["text"];
    $filename="mission_3-1.txt";
    date_default_timezone_set('Asia/Tokyo');
    $date = date("Y/m/d H:i:s");
    $user_name = "phpくん"; 
    
    if (isset ($_POST["text"]) ) {
        if(!empty($text)) {
        $fp = fopen($filename,"r+");
        flock($fp, LOCK_EX);
        while (fgets($fp) !== false) {
            $count++;
        }
        $next = $count + 1;
        $board = $next ."<>" .$user_name . "<>" . $text . "<>" . $date;
        fwrite($fp,$board . PHP_EOL);
        flock($fp, LOCK_UN);
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