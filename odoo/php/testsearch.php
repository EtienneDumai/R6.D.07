<?php
    require_once('ripcord/ripcord.php');


    //Connexion
    $url = "http://web:8069";
    $db = "odoo18";
    $username = "apiwordpress@admin.fr";
    $cleapi = "332f7355e98b26fda5da63126456fc43a7050777";


    //Création du client XML-RPC à l'adresse de l'API qui permet de se connecter
    $common = ripcord::client($url."/xmlrpc/2/common");


    //Appel de la méthode authenticate qui permet de se connecter à l'API
    $uid = $common->authenticate($db, $username, $cleapi, array());


    if(!empty($uid)){
        echo "<p>Successfully sign in Odoo API with the user id of : " . $uid . '</p>';


        //Création du cliet XML-RPC à l'adresse de l'API qui expose les données
        $object = ripcord::client("$url/xmlrpc/2/object");


        //Construction du tableau Positionnal_argument
        $domain=[
            '|',
            ['state', '=', 'usable'],
            ['state', '=', 'broken'],
        ];
        $positionnal_argument =[$domain];

        //Construction du tableau $keyword_argument
        $offset=0;
        $limit=Null;
        $order='date_purchased desc';      
        $keyword_argument =['offset'=>$offset, 'limit'=>$limit, 'order'=>$order];


        //Appel de méthode execute_kw et affichage du résultat
        $donneesrecues = $object->execute_kw($db, $uid, $cleapi, 'rentcars.vehicle', 'search', $positionnal_argument, $keyword_argument);
        echo "<pre>" . print_r($donneesrecues, true) . "</pre>";


    }else{
        echo "Failed to sign in";
    }
?>

