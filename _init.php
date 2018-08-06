<?php

// Requiert composer autoload
require(__DIR__.'/vendor/autoload.php');

// Instancie toutes les dépendances au projet
use MiniChat\SuperPDO;
use MiniChat\MiniChat;
use MiniChat\User;

$miniChat = new MiniChat();

$user = new User();

$superPDO = SuperPDO::connect($miniChat->getConfig("pdo"));