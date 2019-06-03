<?php

// Modify to match with your local configs
define("HOST", "localhost");
define("DB_NAME", "ctech-web");
define("MYSQL_USER", "el");
define("MYSQL_PASSWORD", "root");
// End config

$db = new PDO('mysql:host='.HOST.';dbname='.DB_NAME, MYSQL_USER, MYSQL_PASSWORD);
// Input validation
function validate_input(){
    if(empty($_POST['firstname'])){
        $_POST['firstname_error']=TRUE;
        return FALSE;
    }
    if(empty($_POST['lastname'])){
        $_POST['lastname_error']=TRUE;
        return FALSE;
    }
    if(!$_POST['email']){
        $_POST['invalid_email_error']=TRUE;
        return FALSE;
    }
    if(empty($_POST['phone'])){
        $_POST['phone_error']=TRUE;
        return FALSE;
    }
    return TRUE;
}?>