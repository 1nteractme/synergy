<?php 
    $text_to_type = "Hm, looks like I see you there first time. Maybe you wanna join to our friendly team?";

    include("header.html");
    include("main.html");

    $user_choose = $_POST["choose"];

    if(isset($user_choose)){
        switch ($user_choose) {
            case "-reg":
                header("Location: registration.php");
                exit();
    
            case "-log":
                header("Location: login.php");
                exit();
        }
    }
?> 


