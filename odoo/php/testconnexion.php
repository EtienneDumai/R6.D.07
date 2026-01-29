<?php
    require_once('ripcord/ripcord.php');
    $url = "http://web:8069";
    $db = "odoo18";
    $username = "apiwordpress@admin.fr";
    $cleapi = "332f7355e98b26fda5da63126456fc43a7050777";
    $common = ripcord::client($url."/xmlrpc/2/common");
    $uid = $common->authenticate($db, $username, $cleapi, array());
    if(!empty($uid)){
        echo "<p>Je suis connecté avec l’id  : " . $uid . '</p>';
        var_dump($uid);
    }else{
        echo "Impossible de me connecter";
    }