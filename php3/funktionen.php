<?php



session_start();

$db = mysqli_connect("localhost", "root", "", "php3"); //$db ist die connection zu mysql

mysqli_set_charset($db, "utf8"); //ÄÖÜ....


function query ($sql_befehl) { 
    global $db; //keyword global um die $db Variable vom globalen scope zu übernehmen
    $result = mysqli_query($db, $sql_befehl);

    return $result;
}


//Escapen von injections
function escape($post_var){
    global $db; 
   return mysqli_real_escape_string($db, $post_var);
}

//bist du eingeloggt
function ist_eingeloggt(){
    if (empty ($_SESSION["eingeloggt"])){
        header("Location: login.php");
        exit; //damit der teil nicht mehr zum Browser geschickt wird.
    }
}
