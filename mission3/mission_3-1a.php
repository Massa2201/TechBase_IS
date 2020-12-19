<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_3-2</title>
</head>
<body>
    <form method="post" action="" >
<!--名前の入力フォーム-->
        <input type="text" name="name" value="名前"><br>
<!--コメントの入力フォーム-->
        <input type="text" name="comment" value="コメント">
        <input type="submit" name="submit">
    </form>
    <?php
    ini_set('display_errors', "On");//エラー表示
    $filename="mission_3-1.txt";
    //日付データ
    $date = date("Y/m/d H:i:s");
    //ファイルを1行ずつ配列として変数に代入
    $lines=file($filename,FILE_IGNORE_NEW_LINES);
    //ファイルの存在がある場合は投稿番号+1、なかったら１を指定する
    if(file_exists($filename)){
        $lastline=end($lines);
        $last_element=explode("<>",$lastline);
        $lastnum=$last_element[0];
        $num=$lastnum+1;
    }else{
        $num = 1;
    }
    //コメント投稿があった時
    if(!empty($_POST["name"])&&!empty($_POST["comment"])){
        //入力内容を受け取る。
    $name=$_POST["name"];
    $comment=$_POST["comment"];
    //txtファイルに追記するものを組み合わせた変数
    $txt=$num."<>".$name."<>".$comment."<>".$date.PHP_EOL;
    $fp = fopen($filename,"a");
    fwrite($fp,$txt);
    fclose($fp);
    }
    $line=file($filename,FILE_IGNORE_NEW_LINES);
    for($i = 0 ; $i < count($line); $i++){
        $element = explode("<>",$line[$i]);
        echo $element[0]." ".$element[1]." ".$element[2]." ".$element[3]."<br>";
    }
    ?>
</body>
</html>