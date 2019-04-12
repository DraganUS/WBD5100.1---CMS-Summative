<?php
$database = new mysqli("127.0.0.1:8889", "root", "root", 'news');

if($database->connect_errno){
    echo 'ERROR errno'.$database->connect_errno .'ERROR error' .$database ->connect_error;
}

