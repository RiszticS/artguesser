<?php

function Connect(){
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'artguesser';
    
    $Con = new mysqli($host, $username,$password, $db_name);

    $Con-> set_charset("utf8");
    if ($Con-> connect_error)
    die("Nem sikerült csatlakozni az adatbázishoz");
	return $Con;
}

function Disconnect(&$Con){$Con-> close();}

?>