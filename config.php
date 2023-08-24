<?php

/* This file contains database configuration assuming we are running mysql using user "root" and password "" */

define('db_server','localhost');
define('db_username','root');  
define('db_password','');
define('db_name','login');

//try connecting to the database
$conn = mysqli_connect(db_server, db_username, db_password, db_name);

//check the connection
if($conn == false){
    dir('Error: Cannot Connect');
}





?>