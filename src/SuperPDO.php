<?php namespace MiniChat; 

// Définition de la class qui hérite de PDO
class SuperPDO 
{
    // L'attribut qui stockera l'instance unique, la function est statique car on ne veut l'instancier qu'une seule fois
    public static $pdo; 

    // Function connect avec le paramètre config
    static public function connect($config) {
        static::$pdo = new \PDO($config["dsn"], $config["user"], $config["password"]);

        // Par défaut MySQL va désormais retourner des erreurs fatales
        static::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    // Fonction permettant de génériser la connexion
    static public function query($sql, $parameters = false) {
        if($parameters) {
            if(!is_array($parameters)) {
                $parameters = [$parameters];
            }

            $query = static::$pdo->prepare($sql);
            $query->execute($parameters);
        }
        else {
            $query = static::$pdo->query($sql);
        }

        return $query;
    }
}
