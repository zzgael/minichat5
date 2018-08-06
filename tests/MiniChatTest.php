<?php

use PHPUnit\Framework\TestCase;

class MiniChatTest extends TestCase
{
    public function testPostRequestMessageDatabaseInsert() 
    {
        // Instanciation de la connexion à base de données 
        // utilisée pour vérifier la présence du message dans la table messages
        $pdo = new PDO('', '','');
        // Définition des données POST qui simulent un message
        $postData = [
            '' => '', 
            '' => ''
        ];
        // Envoi de la requête POST
        $result = $this->postRequest('', $postData);
        // Si $result est vide c'est que la requête POST a bien été envoyée.
        // = store.php n'a renvoyé aucune erreur et donc n'a rien affiché.
        $this->assertEmpty();
        // On vérifie que le message existe bien dans la table messages
        $messageQuery = $pdo->query('');
        $message = $messageQuery->fetchAll()[0];
        // Pour vérifier que les datas sont identiques
        //print_r([$postData, $message]);
        $this->assertEquals();
    }

    private function postRequest($url, $data) 
    {
        $data = $data;
        // use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header'  => 
                    "Content-type: application/x-www-form-urlencoded\r\n".
                    "User-Agent: "
                ,
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        return $result;
    }
}
