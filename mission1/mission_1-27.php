<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_1-27</title>
</head>
<body>

<form action = "" method = "post">
    <input type = "number" name = "num" placeholder = "数字を入力してください">
    <input type = "submit" name = "submit">
</form>
<?php
    $num = $_POST["num"];
    if (isset ($_POST["num"]) ) {
        if ($num % 15 == 0) {
            $num02 = "FizzBuzz\n";
        }else if ($num % 3 == 0) {
            $num02 = "Fizz\n";
        }else if ($num % 5 == 0) {
            $num02 = "Buzz\n";
        }else {
            $num02 =  $num . "\n";
        }
    }else {
        $num = "15";
    }

    $filename="mission_1-27.txt";
    $fp = fopen($filename,"a");
    fwrite($fp,$num02);
    fclose($fp);
?>

</body>
</html>