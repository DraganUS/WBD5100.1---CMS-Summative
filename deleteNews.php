<?php
require 'dbConect.php';
require 'functions.php';
if (array_key_exists('ID_news', $_GET)) {
    $ID_news = $_GET['ID_news'];
    $ID_news = filter_var($ID_news, FILTER_SANITIZE_NUMBER_INT);
    if (!empty($ID_news)) {
        try {
            deleteNews( $database, $ID_news);
            header('Location: welcome.php');
        } catch (Exception $exception) {
            header("Location: Location: welcome.php");
        }
    }
}
