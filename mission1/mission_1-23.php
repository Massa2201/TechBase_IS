<?php

    $member = array("Ken", "Alice", "Judy", "BOSS", "Bob");

    foreach($member as $item) {
        if($item == "BOSS") {
            echo "Good morning $item!<br>";
        }else {
            echo "Hi! $item<br>";
        }
    }