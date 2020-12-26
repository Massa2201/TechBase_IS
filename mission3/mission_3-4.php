<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>mission_3-4</title>
    </head>
    <body>

    <p>新規投稿フォーム</p>
    <form action = "" method = "post">
        <input type = "text" name = "text">
        <input type = "submit" name = "button01">
    </form>

    <p>投稿削除フォーム</p>
    <form action = "" method = "post">
        <input type = "text" name = "num">
        <input type = "submit" name = "button02">
    </form>

    <p>編集番号指定用フォーム</p>
    <form action = "" method = "post">
        <input type = "text" name = "num02">
        <input type = "submit" name = "button03">
    </form>
    
<?php
    //---------入力フォーム開始---------
    $text = $_POST["text"];
    $filename="mission_3-3.txt";
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
    //----------編集フォーム開始--------

    $num02 = $_POST["num02"];

    if (isset ($_POST["num02"])) {
        if (!empty($num)) {
            $replace = $_POST["num02"];
            $re_con = file("mission_3-4.txt");
            for ($j = 0; $j < count($re_con); $j++) {
                $re_data = explode("<>", $re_con[$j]);
                
                if ($re_data[0] == $replace) {
                    array_splice($re_con, $j, 1);
                    file_put_contents($filename, implode("\n", $re_con));
                }
            }
        }
    }

    //----------編集フォーム終了--------
?>

    </body>
</html>