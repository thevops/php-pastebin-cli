<?php
// use:
// echo "some text" | curl -F 'text=<-' https://domain.com/logs/extended.php?d=X
// or
// echo "some text" | curl -F 'text=<-' https://domain.com/logs/extended.php?m=X



    function genRandomString( $length = 8 ) {
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;
    }


    if(isset($_POST["text"]) && (count($_GET) == 1) ) {
        $text = $_POST["text"];
        $randomName = genRandomString();
        file_put_contents('n/' . $randomName, $text);

        $date = date('Y-m-d_H:i');
        if(isset($_GET['d']) && is_int($_GET['d'])) {
            $time = $_GET['d'];
            $delete_date = date('Y-m-d_H:i', strtotime($date . ' + ' . $time . ' days'));
            file_put_contents('delete.txt', $randomName . ' ' . $delete_date . '\n', FILE_APPEND | LOCK_EX);
        } 
        elseif (isset($_GET['m'])) {
            $time = $_GET['m'];
            $delete_date = date('Y-m-d_H:i', strtotime($date . ' + ' . $time . ' minutes'));
            file_put_contents('delete.txt', $randomName . ' ' . $delete_date . '\n', FILE_APPEND | LOCK_EX);
        } 
        else {
            echo "Invalid syntax";
            die();
        }

        $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        echo "$link" . "$randomName";
    }
?>
