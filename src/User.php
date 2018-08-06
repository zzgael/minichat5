<?php namespace MiniChat;

use Colors\RandomColor;

class User
{
    // Si l'user existe, on récupère la couleur enregistrée 
    public function nicknameAlreadyExists() {
        $nicknameQuery = SuperPDO::query(
            'SELECT count(*) FROM users WHERE nickname=?', 
            $_POST['nickname']
        );

        return $nicknameQuery->fetchColumn() !== "0";
    }

    // On crée la couleur de l'user et la stocke en bdd
    public function setUniqueNicknameColor() {
        $color = RandomColor::one();

        SuperPDO::query(
            'INSERT INTO users (nickname, color) VALUE(?, ?)',
            [$_POST['nickname'], $color]
        );
    }

    // On crée le cookie pour retenir le pseudo de l'user
    public function setNicknameCookie()
    {
        setcookie(
            'nickname',
            $_POST["nickname"],
            time() + 365 * 24 * 3600,
            '/',
            null,
            false,
            true
        );
    }

    // On récupère l'IP de l'user
    public function getIp()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }
}