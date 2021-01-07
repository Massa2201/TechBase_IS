<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>mission_3-3</title>
    </head>
    <body>

    <p>新規投稿フォーム</p>
    <form action = "" method = "post">
        name: <input type="text" name="name"><br>
        comment: <input type = "text" name = "text"><br>
        <input type = "submit" name = "button01">
    </form>

    <p>投稿削除フォーム</p>
    <form action = "" method = "post">
        <input type = "text" name = "num">
        <input type = "submit" name = "button02">
    </form>
    
<?php
    //---------入力フォーム開始---------
    $text = $_POST["text"];
    $user_name = $_POST["name"];
    $filename="mission_3-3.txt";
    date_default_timezone_set('Asia/Tokyo');
    $date = date("Y/m/d H:i:s");
    
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
    }
    //---------入力フォーム終了---------

    $num = $_POST["num"];

    if (isset ($_POST["num"]) ) {
        if(!empty($num)) {
            $delete = $_POST['num'];
            $del_con = file($filename, FILE_IGNORE_NEW_LINES);
            for ($n = 0; $n < count($del_con); $n++) {
                $del_data = explode("<>", $del_con[$n]);
                if ($del_data[0] == $delete) {
                    array_splice($del_con, $n, 1);
                    file_put_contents($filename, implode("\n", $del_con).PHP_EOL);
                    echo "指定した" . $filename . "の文章を削除しました。";
                }
            }
        }
    }

?>

    </body>
</html>