<?php namespace MiniChat;

use MiniChat\SuperPDO;


class MiniChat
{
    private $config;

    // Configuration de la class
    public function __construct() {
        $this->config = include(__DIR__."/../config/app.php");
    }

    // "Getter" permet de retourner la config si les clés ne sont pas null
    public function getConfig($key = null) {
        if(!$key) {
            return $this->config;
        }

        return $this->config[$key];
    }
    /***
     * Retourne tous les messages récents
     * Le nombre d'entrées est limitée par le fichier de config
     *
     * @return array
     */
    public function recentMessages()
    {
        $queryLimit = 'LIMIT 0, ' . $this->config["limitMessages"] ;

        $messagesQuery = SuperPDO::query(
            'SELECT m.*, u.color 
            FROM messages m
            LEFT OUTER JOIN users u 
            on m.nickname = u.nickname
            ORDER BY id DESC ' . $queryLimit
        );

        return array_reverse($messagesQuery->fetchAll());
    }
}