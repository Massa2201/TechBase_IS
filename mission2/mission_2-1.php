<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_2-1</title>
</head>
<body>

<form action = "" method = "post">
    <input type = "text" name = "text">
    <input type = "submit" name = "button01">
</form>
<?php
    $text = $_POST["text"];
    if (isset ($_POST["text"]) ) {
        echo $text . "を受け付けました";
    }else {
        echo "コメントを送信してください！";
    }
?>

</body>
</html>