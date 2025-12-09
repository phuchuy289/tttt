<?php
     function setUserLogin($user){
    if($user) {
        $_SESSION['user'] = $user;
    }
    }

    function setUserLogout(){
        if(isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            return true;
        }
        return false;
    }

    function isUserLoggedIn(){
        if(isset($_SESSION['user'])) {
            return true;
        } else {
            return false;
        }
    }

    function getUserLoggedIn(){
    if(isset($_SESSION['user'])){
        return unserialize($_SESSION['user']);
    }
    return null;  
    }

    function showMessageRegister($mesg) {
         if ($mesg) {
             return $mesg;
         } else {
            return "";
        }
}

