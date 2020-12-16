<?php

$dataFile ='bbs2.txt';

if(isset($_POST['toukou']))
{

    $message = ($_POST['message']);

    $user = ($_POST['user']);

    $postedAt = date('Y-m-d H:i:s');

    $newData = (sizeof(file($dataFile)) + 1)."<>".$message."<>".$user."<>".$postedAt. "\n";

    $fp = fopen($dataFile,'a');
    fwrite($fp, $newData);
    fclose($fp);
}

if (isset($_POST['delete'])) {

    $delete = $_POST['deleteNo'];
    $delCon = file("bbs2.txt");
    for ($j = 0; $j < count($delCon) ; $j++){ 
    $delData = explode("<>", $delCon[$j]);
    
    if ($delData[0] == $delete) {
    array_splice($delCon, $j, 1);
    file_put_contents($dataFile, implode("\n", $delCon));
    }
}

}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
     <meta charset="utf-8">
     <title>簡易掲示板</title>
</head>
<body>
<h1>簡易掲示板</h1>
     <form action="" method="POST">

       message:<input type="text" name="message">
       user:<input type="text" name="user">
         <input type="submit" name="toukou" value="投稿"></br></br>

     </form>

     <form action="" method="POST">
     削除対象番号<input type="text" name="deleteNo">
         <input type="submit" name="delete" value="削除">
     </form>

<?php

     $file=file($dataFile); // ファイルの内容を配列に格納

     foreach( $file as $value ){

     $line = explode("<>",$value);

     echo $value."<br />\n"; // 改行しながら値を表示

}

?>

</body>
</html>