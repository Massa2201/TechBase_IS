<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>mission_3-4</title>
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

    <p>投稿編集フォーム</p>
    <form action = "" method = "post">
        <input type = "text" name = "num02"><br>
        name: 
        <input type="text" name="edit_name"><br>
        comment: 
        <input type = "text" name = "edit_text"><br>
        <input type = "submit" name = "button03">
    </form>
    
<?php
    //---------入力フォーム開始---------
    $text = $_POST["text"];
    $user_name = $_POST["name"];
    $filename="mission_3-4.txt";
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

    //編集フォーム

    $num02 = $_POST["num02"];

    if (isset ($_POST["num02"]) ) {
        if(!empty($num02)) {

                    $new_name = $_POST["edit_name"];
                    $new_comment = $_POST["edit_text"];
                    $content = file_get_contents($filename);
                    $arr = explode("\n", $content);
                    $fp = fopen($filename, "w");
                    foreach($arr as $comment_raw){
                        $comment = explode("<>", $comment_raw);
                        if($comment[0] == $num02){
                            fwrite($fp, $comment[0]."<>".$new_name."<>".htmlspecialchars($new_comment)."<>".$date."<br>\n");    
                        }else{
                            fwrite($fp, $comment[0]."<>".$comment[1]."<>".htmlspecialchars($comment[2])."<>".$comment[3]."\n");
                        }
                    }
                    $del_con = file($filename, FILE_IGNORE_NEW_LINES);
                    array_pop ($del_con);
                    file_put_contents($filename, implode("\n", $del_con).PHP_EOL);
        }
    }
                    

?>

    </body>
</html>