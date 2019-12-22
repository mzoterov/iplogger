<?php
define ('PASS', '2O7y8Q7r');
define ('DBNAME', 'logger');
define ('USERNAME', 'zot');
define ('HOST', 'localhost');
$link = new mysqli(HOST, USERNAME, PASS, DBNAME);
if($link == false){
    echo "Fatal error. No connection with datebase \n";
    exit();
}
else{
    function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    
    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }
    
    return $ip;
}


$user_ip = getUserIP();
    $stmt = $link->prepare("INSERT INTO `ips` SET `ip` = ?, `time` = ?");
        $stmt->bind_param('si', $user_ip, time());
        $stmt->execute();
   header("Location:https://vk.com/bager_kontaktov");
}

?>