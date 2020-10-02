<?php
# Permet d'établir la connexion avec la base de données
try
{
    $db = new PDO('mysql:host=localhost; port=3306; port=3306; dbname=boutique', 'root', '');
    $db->exec("SET CHARACTER SET utf8");

    }
    catch(Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
?>
