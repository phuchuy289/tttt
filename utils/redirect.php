<?php
    function redirect($url){
        header("Location: $url");
        die();
    }


    // End of redirect.php