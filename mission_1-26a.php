<?php
    
    // ファイルを変数に格納
    $filename = 'mission_1-24.txt';
    
    // ファイルを配列に格納し、さらに変数に格納
    $lines = file($filename);
    
    ?>
    
    <ul>
    
    <!-- foreachでファイルの配列をループ処理 -->
    <?php foreach ($lines as $line) : ?>
    
    <!-- 配列の要素を1行ずつ<li>タグに埋め込む -->
    <li><?php echo $line; ?></li>
    
    <?php endforeach; ?>
    </ul>