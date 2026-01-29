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


        //Création du client XML-RPC à l'adresse de l'API qui expose les données
        $object = ripcord::client("$url/xmlrpc/2/object");


        //Construction de la liste des éléments


        //Première voiture
        $imagePath = 'photos/toyota-3245397_1280.jpg';
        $imageData = file_get_contents($imagePath);
        $base64Image = base64_encode($imageData);


        $vehicule1=[
            'model'=>'voiture API1',
            'date_purchased' => '2021-07-20',
            'immatriculation' => 'GX841DD',
            'garage_id'=>1,
            'state'=>'usable',
            'thumbnail' => $base64Image,
            'option_ids' => [1,2]
        ];

        //Seconde voiture
        $imagePath = 'photos/ford-2616212_1280.png';
        $imageData = file_get_contents($imagePath);
        $base64Image = base64_encode($imageData);
        $vehicule2=[
            'model'=>'voiture API2',
            'date_purchased' => '2021-07-21',
            'immatriculation' => 'GH841DD',
            'garage_id'=>1,
            'state'=>'usable',
            'thumbnail' => $base64Image,
            'option_ids' => []
        ];

        //Création du tableau d'enregistrement
        $vals_list=[$vehicule1, $vehicule2];


        //Création du tableau des arguments positionnels
        $positionnal_argument =[
            $vals_list
        ];


        //Envoi des données et affichage.
        $donneesrecues = $object->execute_kw($db, $uid, $cleapi, 'rentcars.vehicle', 'create', $positionnal_argument);
        echo "<pre>" . print_r($donneesrecues, true) . "</pre>";



    }else{
        echo "Failed to sign in";
    }  
?>
