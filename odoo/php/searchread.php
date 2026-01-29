<?php
    require_once('ripcord/ripcord.php');


    //Connexion
    $url = "http://web:8069";
    $db = "odoo18";
    $username = "apiwordpress@admin.fr";
    $cleapi = "332f7355e98b26fda5da63126456fc43a7050777";


    //Création du cliet XML-RPC à l'adresse de l'API qui permet de se connecter
    $common = ripcord::client($url."/xmlrpc/2/common");


    //Appel de la méthode authenticate qui permet de se connecter à l'API
    $uid = $common->authenticate($db, $username, $cleapi, array());


    if(!empty($uid)){
        echo "<p>Successfully sign in Odoo API with the user id of : " . $uid . '</p>';


        //Création du client XML-RPC à l'adresse de l'API qui expose les données
        $object = ripcord::client("$url/xmlrpc/2/object");


        //Construction du tableau Positionnal_argument       
        $positionnal_argument =[];

        //Construction du tableau $keyword_argument
        $domain=[
            ['age_vehicle', '>', '1'],
            ['state', '!=', 'broken'],
        ];
        $order='model desc';
        $fields=['model', 'date_purchased', 'garage_id', 'age_vehicle'];




        //Appel de méthode execute_kw et affichage du résultat
        //Cette version utilise l'argument load et donc le nom du garage n'est pas chargé
        $keyword_argument = ['order' => $order, 'domain' => $domain, 'fields' => $fields, "load"=>"None" ];

        //Cette version n'utilise pas l'argument load et donc le nom du garage est récupéré
        //$keyword_argument = ['order' => $order, 'domain' => $domain, 'fields' => $fields ];


        $donneesrecues = $object->execute_kw($db, $uid, $cleapi, 'rentcars.vehicle', 'search_read', $positionnal_argument, $keyword_argument);
        echo "<pre> " . print_r($donneesrecues, true) . "</pre>";

    }else{
        echo "Failed to sign in";
    }     
?>