<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>mission_5-1</title>
    <style>

        .flex {
            display: flex;
            justify-content: space-around;
            width: 700px;
        }

        .center {
            justify-content: center;
        }

        .text-head {
            margin: 30px 0px;
            font-size: 20px;
        }

        input {
            display: block;
        }

        .section {
            margin: 20px 0px;
        }

        .margin-bottom {
            margin-bottom: 91px;
        }

        .box {
            height: 300px;
        }

        .height {
            height: 238px;
        }

        .button {
            width: 100%;
            display: inline-block;
            text-align: center;
            align-items: center;
        }
    </style>
    
    </head>
    <body>
    
    <div class="flex">
        <div class="section">
            <p class="text-head margin-bottom">新規投稿フォーム</p>
            <form action = "" method = "post">
                <div class="box height">
                    <p>name</p> <input type="text" name="name" placeholder = "名前"><br>
                    <p>comment</p> <input type = "text" name = "text" placeholder = "コメント"><br>
                </div>
                <input class="button" type = "submit" name = "button01">
            </form>
        </div>
        
        <div class="section">
            <p class="text-head">投稿削除フォーム</p>
            <form action = "" method = "post">
                <div class="box">
                    <input type = "text" name = "num" placeholder = "削除したい番号を入力">
                </div>
                <input class="button" type = "submit" name = "button02">
            </form>
        </div>
        
        <div  class="section">
            <p class="text-head">投稿編集フォーム</p>
            <form action = "" method = "post">
                <div class="box">
                    <input type = "text" name = "num02" placeholder = "編集したい番号を入力"><br>
                    <p>name</p> 
                    <input type="text" name="edit_name" placeholder = "名前"><br>
                    <p>comment</p> 
                    <input type = "text" name = "edit_text" placeholder = "コメント"><br>
                </div>
                <input class="button" type = "submit" name = "button03">
            </form>
        </div>
    </div>
<?php
    //---------入力フォーム開始---------

    $filename="mission_5-1.txt";
    date_default_timezone_set('Asia/Tokyo');

    $id = null;
    $name = $_POST["name"];
    $contents = $_POST["text"];
    $created_at = date("Y-m-d H:i:s");
    $pdo = new PDO(
        "mysql:dbname=tech_base_db;host=localhost","root","****",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET `utf8`")
    );
    //ここで「DB接続NG」だった場合、接続情報に誤りがあります。
    if ($pdo) {
        echo "DB接続OK";
    } else {
        echo "DB接続NG";
    }
    //SQLを実行。
    $regist = $pdo->prepare("INSERT INTO board(id, name, contents, date) VALUES (:id,:name,:contents,:date)");
    $regist->bindParam(":id", $id);
    $regist->bindParam(":name", $name);
    $regist->bindParam(":contents", $contents);
    $regist->bindParam(":date", $created_at);
    $regist->execute();
    //ここで「登録失敗」だった場合、SQL文に誤りがあります。
    if ($regist) {
        echo "登録成功";
    } else {
        echo "登録失敗";
    }
                    

?>

    </body>
</html>