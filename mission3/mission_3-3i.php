<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_3-3</title>
</head>
<body>
    <form action="mission_3-3i.php" method="post">
        <input type="text" name="name" placeholder="名前"> <br>
        <input type="text" name="str" placeholder="コメント"> <br>
        <input type="submit" name="submit" value="送信"><br>
        <input type="text" name="deleteNo" 
        placeholder="削除番号"><br>
        <input type="submit" name="delete" value="削除">
    </form>
    
    <?php
    ini_set('display_errors', "On");
    
    $filename="mission_3-3.txt";
    $name=$_POST["name"];
    $str=$_POST["str"];
    $date=date("Y/m/d H:i:s");
    $deleteNo=$_POST["deleteNo"];
    
    /*if(file_exists($filename)){
            $num=count(file($filename))+1;
        }else{
            $num=1;
        }*/
        
    if(!empty($name)&&!empty($str)){
        //もし名前とコメントが空でなければ
            if(file_exists($filename)){
            //もし$filenameが存在するならば
            $num=count(file($filename))+1;
            //$numは$filenameにある要素プラス１を表す
        }else{
            //その他は$num=1
            $num=1;
        }
        $fp=fopen($filename,"a");
        //$filenameを追記モードで開く
        $comment=$num."<>".$name."<>".$str."<>".$date;
        fwrite($fp,$comment.PHP_EOL);
        //$commentを改行しながら書く
        fclose($fp);
        //$fpを閉じる
        
        $line=file($filename,FILE_IGNORE_NEW_LINES);
        //配列の各要素の最後の改行を無視する
    for($num=0 ; $num<count($line); $num++){
        //$lineの要素の1つ目を０として数える
            $comment=explode("<>",$line[$num]);
            //<>を区切りとして分割する
                echo $comment[0]." ".$comment[1]." ".
                $comment[2]." ".$comment[3]."<br>";
        }
    }
    
    elseif(!empty($deleteNo)&&file_exists($filename)){
        //もし、$deleteNoが空ではないかつ$filenameが存在するならば
        $lines=file($filename,FILE_IGNORE_NEW_LINES);
        /*foreach($lines as $line)*/
        for($num=0 ; $num<count($lines) ; $num++){
            $line_div=explode("<>",$lines[$num]);
        if($line_div[0]==$deleteNo){
            /*foreach($lines as $line);*/
            array_splice($lines,$num,1);
            file_put_contents($filename,implode("\n",$lines).PHP_EOL);
            }
        }
    }
    /*   
    $line=file($filename,FILE_IGNORE_NEW_LINES);
    for($num=0 ; $num<count($line); $num++){
        
    $comment=explode("<>",$line[$num]);
    echo $comment[0]." ".$comment[1]." ".
    $comment[2]." ".$comment[3]."<br>";
    }
        }elseif(!empty($deleteNo)){
            for($num=0;$num<count($filename);$num++){
                $delDate=explode("<>",$filename[$num]);
        if($delDate[0]==$deleteNo){
            array_splice($filename,$num,1);
            foreach($lines as $line)
        }
            }
        }
        */
    
    ?>
    
</body>
</html>