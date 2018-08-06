<?php

use MiniChat\SuperPDO;

// Requiert le fichier de configuration
require(__DIR__.'/../_init.php');

// Requête d'insertion des données du message
SuperPDO::query(
    'INSERT INTO messages (nickname, message, ip, user_agent) VALUES(?, ?, ?, ?)',
    [
        $_POST["nickname"], 
        $_POST["message"], 
        $user->getIp(), 
        $_SERVER["HTTP_USER_AGENT"]
    ]
);

// Utilisation de la function nicknameAlreadyExists()
if(!$user->nicknameAlreadyExists()){ 
    $user->setUniqueNicknameColor();
}

// Utilisation de la function setNicknameCookie()
$user->setNicknameCookie();
