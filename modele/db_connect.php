<?php

/**
 * @return PDO|null
 */
function db_connect(){
    $db_host = "192.168.1.2"; // :"172.30.0.235";
    $db_name = "bddjobs";
    $db_charset = "utf8";
    $db_user = "bddjobs_user";
    $db_passwd = "XhcwCxyEH/tBo@nH";
    try{
        $bdd = new PDO("mysql:host={$db_host};dbname={$db_name};charset={$db_charset}", $db_user, "$db_passwd");
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    }catch(PDOException $e){
        echo $e->getMessage();
        return null;
    }

}

?>