<?php
// clear dir: find -type f ! -name index.php -exec rm {} \;

    function genRandomString( $length = 8 ) {
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;
    }

    if(isset($_POST["text"])) {
        $text = $_POST["text"];
        $randomName = genRandomString();
        $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . dirname($_SERVER['PHP_SELF']);
        file_put_contents('n/' . $randomName, $text);
        echo "$link" . "/n/" . "$randomName" . "\n";
    }
?>
